<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;

class AdminController extends Controller
{
    public function admin() {
    }

    public function index() {
        $products = Product::all();
        return view('admin.dashboard', ['products' => $products]);
    }

    public function create() {
        return view('admin.create');
    }

    public function store(AddProductRequest $request) {
        $validated = $request->validated();


        if ($request->hasFile('path')) {
            // 画像ファイルをstorage/app/public/uploadsに保存し、パスを取得
            $path = $request->file('path')->store('uploads', 'public');
            // データベース保存用にパスを加工
            $validated['path'] = 'storage/' . $path;
        }
        Product::create($validated);

        return redirect()->route('index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product) {
        return view('admin.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product) {
        $request->validated();

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
    
        return redirect()->route('index', compact('product'))->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product) {
        $product->delete();
        if ($product->path) {
            Storage::disk('public')->delete(str_replace('storage/', '', $product->path));
        }
        return redirect('admin');
    }
}
