<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Item;

class CartController extends Controller
{
    public function add(Request $request) {
        $cartData = $request->session()->get('session_data', []);
        dd($cartData);
        return view('cart', compact('cartData'));
    }
}
