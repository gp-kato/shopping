<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PurchaseConfirmation;
use App\Models\Product;

class CartController extends Controller
{
    public function cart(Request $request, Product $product) {
        $cartData = $this->getSessionData($product);

        return view('cart', compact('cartData', 'product'));
    }

    public function add(Request $request, Product $product) {
        $data = [
            'id' => $product->id,
            'path' => $product->path,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
        ];
    
        $cartData = $this->getSessionData($product);
        $cartData = $this->updateCartData($cartData, $data);
        session()->put('session_data', $cartData);
    
        return redirect()->route('cart');
    }
        
    public function remove(Request $request, Product $product) {
        $cartData = $this->getSessionData();

        foreach ($cartData as $key => $item) {
            if ($item['id'] == $product->id) {
                unset($cartData[$key]);
                break;
            }
        }

        session()->put('session_data', $cartData);

        return redirect()->route('cart', ['product' => $product]);
    }

    public function purchase(Request $request, Product $product) {
        $cartData = $this->getSessionData($product);

        // Send email notification
        $userEmail = $request->user()->email; // Assuming the user is authenticated
        Mail::to($userEmail)->send(new PurchaseConfirmation($cartData));

        $request->session()->forget('session_data');

        return redirect()->route('product')->with('cartData', $cartData);
    }

    private function getSessionData(): array {
        return session()->get('session_data', []);
    }

    private function updateCartData(array $cartData, array $data): array {
        $found = false;
        foreach ($cartData as &$item) {
            if (isset($item['id']) && $item['id'] == $data['id']) {
                $item['quantity'] += $data['quantity'];
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cartData[] = $data;
        }

        return $cartData;
    }
}
