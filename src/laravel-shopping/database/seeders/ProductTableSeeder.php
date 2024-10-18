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
        // プロダクト画像のパスを取得
        $imagePaths = collect(File::files(public_path('img/products')))
            ->map(function ($image) {
                return 'img/products/' . $image->getFilename();
            })
            ->all();


        // 画像の数だけ製品データを生成
        foreach ($imagePaths as $imagePath) {
            // Factoryを使って製品データを生成し、画像パスを追加
            Product::factory()->create([
                'path' => $imagePath,
            ]);
        }
    }
}
