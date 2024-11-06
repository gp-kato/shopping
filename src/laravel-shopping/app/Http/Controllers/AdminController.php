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

        $product = Product::findOrFail($id);

        if ($request->hasFile('path')) {
            // 古い画像がある場合、削除する
            if ($product->path) {
                try {
                    Storage::delete($product->path);
                } catch (\Exception $e) {
                    return redirect()->back()->withErrors('Image deletion failed.');
                }
            }
            // 新しい画像を保存してパスを取得する
            $path = $request->file('path')->store('public/uploads');
            $product->path = $path;
        }
    
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->save();
    
        return redirect()->route('index')->with('success', 'Product updated successfully.');
    }
}
