<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'name' => $this->faker->words(3, true), // ランダムなプロダクト名
            'path' => 'img/no_image.jpeg', // 画像パス
            'price'=> $this->faker->numberBetween(1000, 100000), // ランダムな価格
        ];
    }
}
