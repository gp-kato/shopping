<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    protected static $counter = 17;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'プロダクトタイトルプロダクトタイトル',
            'id'=> self::$counter++, // IDを1ずつ増やす
            'path'=> 'img/' . fake()->unique()->word() . '.jpg', // Pathを1ずつ増やす
            'price'=> 99999,
        ];
    }
}
