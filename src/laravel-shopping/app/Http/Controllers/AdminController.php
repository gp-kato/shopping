<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function admin() {
        $products = Product::all();
        return view('admin.dashboard', ['products' => $products]);
    }

    public function create() {
        return view('admin.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:16',
            'path' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
        ]);

        // 画像ファイルを保存し、そのパスを取得
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'img');
        }

        Product::create($validated);

        return redirect()->route('index')
        ->with('success', 'Product created successfully.');
    }
}
