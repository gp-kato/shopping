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
        // 新規作成時には画像が必須
        $validatedData = $this->validateProduct($request, isUpdate: false);

        if ($request->hasFile('path')) {
            $validatedData['path'] = $this->storeImage($request->file('path'));
        }
        Product::create($validated);

        return redirect()->route('admin')->with('success', 'Product created successfully.');
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('admin.edit', compact('product'));
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id); // ここで$productを取得

        // 更新時には画像は任意
        $validatedData = $this->validateProduct($request, isUpdate: true);

        // name と price を更新
        $product->fill($request->only(['name', 'price']));

        // 新しい画像がアップロードされた場合のみ処理
        if ($request->hasFile('path')) {
            // 既存の画像がある場合、削除
            if ($product->path) {
                Storage::disk('public')->delete(str_replace('storage/', '', $product->path));
            }
            $validatedData['path'] = $this->storeImage($request->file('path'));
        }

        $product->save();
    
        return redirect()->route('admin', compact('product'))->with('success', 'Product updated successfully.');
    }

    private function validateProduct(Request $request, bool $isUpdate = false) {
        $rules = [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ];

        // 更新時のみ画像は任意、作成時には画像が必須
        $rules['path'] = $isUpdate 
            ? 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048' 
            : 'required|file|mimes:jpeg,png,jpg,gif|max:2048';

        return $request->validate($rules);
    }

    private function storeImage($image) {
        return 'storage/' . $image->store('uploads', 'public');
    }
}
