<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Product;

class ProductController extends Controller
{
    public function index () {
        $products = Product::paginate(12); // 1ページあたり12個の製品を取得
        $current_page = request()->query('page', 1); // 現在のページのURLを取得
        $total_pages = $products->lastPage(); // 総ページ数を取得
        return view('products', ['products' => $products, 'current_page' => $current_page, 'total_pages' => $total_pages]); // ビューに製品データを渡す
    }

    public function product() {
        return view('index');
    }

    public function company() {
        return view('company');
    }

    public function about() {
        return view('about');
    }

    public function show(Item $item, $slug) {
        $product = $item; // $productという変数を定義

        $data = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'session_quantity' => $product->quantity,
        ];
            
        return view('item', compact('product', 'slug'));
    }    
}
