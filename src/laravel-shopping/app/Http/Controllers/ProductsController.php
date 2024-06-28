<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ProductsController extends Controller
{
    public function list () {
        $products = Product::all(); // すべての製品を取得
        return view('/', ['products' => $products]); // ビューに製品データを渡す
    }

    public function item(Item $item, $slug)
    {
        return view('item', compact('item', 'slug'));
    }    
}
