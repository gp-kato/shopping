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

        // inputのnameに合わせて、image → path に修正(以降も同様に修正)
        if ($request->hasFile('path')) {
            // 画像ファイルをstorage/app/public/uploadsに保存し、パスを取得
            $path = $request->file('path')->store('uploads', 'public');
            // データベース保存用にパスを加工
            $validated['path'] = 'storage/' . $path;
        }
        Product::create($validated);

        return redirect()->route('index')
        ->with('success', 'Product created successfully.');
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('admin.edit', compact('product'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'path' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id); // ここで$productを取得

        // name と price を更新
        $product->fill($request->only(['name', 'price']));

        // 新しい画像がアップロードされた場合のみ処理
        if ($request->hasFile('path')) {
            $imagePath = $request->file('path')->store('uploads', 'public');
            $product->path = $imagePath;
        }

        $product->save();
    
        return redirect()->route('index', compact('product'))->with('success', 'Product updated successfully.');
    }
}
