<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PurchaseConfirmation;
use App\Models\Product;

class CartController extends Controller
{
    public function cart(Request $request, Product $product) {
        $sessionData = $this->getSessionData($product);

        return view('cart', compact('sessionData', 'product'));
    }

    public function add(Request $request, Product $product) {
        $data = [
            'id' => $product->id,
            'path' => $product->path,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
        ];
    
        $sessionData = $this->getSessionData($product);
        $sessionData = $this->updateSessionData($sessionData, $data);
        session()->put('session_data', $sessionData);
    
        return redirect()->route('cart');
    }
        
    public function remove(Request $request, Product $product) {
        $sessionData = $this->getSessionData();

        foreach ($sessionData as $key => $item) {
            if ($item['id'] == $product->id) {
                unset($sessionData[$key]);
                break;
            }
        }

        session()->put('session_data', $sessionData);

        return redirect()->route('cart', ['product' => $product]);
    }

    public function purchase(Request $request, Product $product) {
        $sessionData = $this->getSessionData($product);

        // Send email notification
        $userEmail = $request->user()->email; // Assuming the user is authenticated
        Mail::to($userEmail)->send(new PurchaseConfirmation($sessionData));

        $request->session()->forget('session_data');

        return redirect()->route('product')->with('sessionData', $sessionData);
    }

    private function getSessionData(): array {
        return session()->get('session_data', []);
    }

    private function updateSessionData(array $sessionData, array $data): array {
        $found = false;
        foreach ($sessionData as &$item) {
            if (isset($item['id']) && $item['id'] == $data['id']) {
                $item['quantity'] += $data['quantity'];
                $found = true;
                break;
            }
        }

        if (!$found) {
            $sessionData[] = $data;
        }

        return $sessionData;
    }
}
