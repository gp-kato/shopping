<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

        if ($request->hasFile('path')) {
            // 画像ファイルをstorage/app/public/uploadsに保存し、パスを取得
            $path = $request->file('path')->store('uploads', 'public');
            // データベース保存用にパスを加工
            $validated['path'] = 'storage/' . $path;
        }
        Product::create($validated);

        return redirect()->route('admin')->with('success', 'Product created successfully.');
    }

    public function edit($id) {
        $product = Product::find($id);
        return view('admin.edit', compact('product'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'path' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::find($id); // ここで$productを取得

        // name と price を更新
        $product->fill($request->only(['name', 'price']));

        // 新しい画像がアップロードされた場合のみ処理
        if ($request->hasFile('path')) {
            // 既存の画像がある場合、削除
            if ($product->path) {
                Storage::disk('public')->delete(str_replace('storage/', '', $product->path));
            }
            $path = $request->file('path')->store('uploads', 'public');
            $product->path =  'storage/' . $path;
        }

        $product->save();
    
        return redirect()->route('admin', compact('product'))->with('success', 'Product updated successfully.');
    }
}
