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
        \App\Models\Product::factory(16)->create();

        $images = File::files(public_path('img'));

        $paths = [];
        foreach ($images as $image) {
            $paths[] = 'img/products/' . $image->getFilename();
        }
    }
}
