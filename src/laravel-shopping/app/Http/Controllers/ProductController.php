<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Product;

class ProductController extends Controller
{
    public function index () {
        $products = Product::paginate(12); // 1ページあたり12個の製品を取得
        return view('products', ['products' => $products]); // ビューに製品データを渡す
    }

    public function show(Item $item, $slug)
    {
        return view('item', compact('item', 'slug'));
    }    
}
