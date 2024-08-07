<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Item;

class CartController extends Controller
{
    public function add(Request $request) {
        $data = [
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'session_quantity' => $request->quantity,
        ];
        $cartData = $request->session()->put('session_data', $data);
        return view('cart', compact('cartData'));
    }
}
