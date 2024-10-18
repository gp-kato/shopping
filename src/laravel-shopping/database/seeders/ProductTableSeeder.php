<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $products = \App\Models\Product::factory(16)->create();

        // プロダクト画像のパスを取得
        $imagePaths = collect(File::files(public_path('img/products')))
            ->map(function ($image) {
                return 'img/products/' . $image->getFilename();
            })
            ->all();

        // 製品に画像パスを関連付け
        $products->each(function ($product, $index) use ($imagePaths) {
            if (isset($imagePaths[$index])) {
                $product->update(['path' => $imagePaths[$index]]);
            }
        });
    }
}
