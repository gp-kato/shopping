<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PurchaseConfirmation;
use App\Models\Product;

class CartController extends Controller
{
    private function updateSessionData(Request $request, $data) {
        $sessionData = $request->session()->get('session_data', []);

        $found = false;
        foreach ($sessionData as &$item) {
            if ($item['id'] == $data['id']) {
                $item['session_quantity'] += $data['session_quantity'];
                $found = true;
                break;
            }
        }

        if (!$found) {
            $sessionData[] = $data;
        }

        $request->session()->put('session_data', $sessionData);

        return $sessionData;
    }

    public function cart(Request $request) {
        $data = [
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'session_quantity' => $request->quantity,
        ];

        $sessionData = $this->updateSessionData($request, $data);

        return view('cart', compact('sessionData'));
    }

    public function add(Request $request) {
        $data = [
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'session_quantity' => $request->quantity,
        ];

        $sessionData = $this->updateSessionData($request, $data);

        return view('cart', compact('sessionData'));
    }

    public function remove(Request $request) {
        $sessionData = $request->session()->get('session_data', []);
        
        foreach ($sessionData as $key => $item) {
            if ($item['id'] == $request->id) {
                unset($sessionData[$key]);
                break;
            }
        }
    
        $request->session()->put('session_data', $sessionData);
    
        return view('cart', compact('sessionData'));
    }    

    public function purchase(Request $request) {
        $data = [
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'session_quantity' => $request->quantity,
        ];

        $sessionData = $this->updateSessionData($request, $data);

        // Send email notification
        $userEmail = $request->user()->email; // Assuming the user is authenticated
        Mail::to($userEmail)->send(new PurchaseConfirmation($sessionData));

        $request->session()->forget('session_data');

        return redirect()->route('product')->with('sessionData', $sessionData);
    }
}
