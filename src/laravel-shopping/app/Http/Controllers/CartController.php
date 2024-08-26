<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PurchaseConfirmation;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request) {
        $data = [
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'session_quantity' => $request->quantity,
        ];
    
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

    public function purchase(Request $request)
    {
        // Handle the purchase logic here
    
        // Send email notification
        Mail::to('customer@example.com')->send(new PurchaseConfirmation());
    
        return redirect()->route('product');
    }
}
