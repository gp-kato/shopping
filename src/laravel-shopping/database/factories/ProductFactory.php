<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(), // ランダムなプロダクト名
            'path'=> 'https://1.bp.blogspot.com/-0no-image.png', // no image画像のURL
            'price'=> $this->faker->numberBetween(1000, 100000), // ランダムな価格
        ];
    }
}
