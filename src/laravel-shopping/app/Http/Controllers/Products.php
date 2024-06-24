<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Products extends Controller
{
    //
    public function list () {
        $products = Product::all(); // すべての製品を取得
        return view('products', ['products' => $products]); // ビューに製品データを渡す
    }
}
