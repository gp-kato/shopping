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
        $imagePaths = [
            'img/87321qXnHCrwSlepvVQtLmkdezSPwcv3.jpg',
            'img/AZeeBmlcuDiglCeNTpde6KgqoZebnbrs.jpg',
            'img/cXQ4yhsNgdpaI4qBK7LqRFhSUTW0qJXA.jpg',
            'img/GhPbey8IFqNzLtNTiQjnP0SeF4A6IJte.jpg',
            'img/h8ydJHHmjr1zlKUHJZb0bbNohBwnuUt5.jpg',
            'img/Loho4S04ZYKeIz5yS9qhLfQFTUfyfksx.jpg',
            'img/LUPwAqNBaNUeL4GEwA17yQzdI25NtYYc.jpg',
            'img/qG7Cezpi1PcXPJb1H46LwSYXwV4qBdoh.jpg',
            'img/qSgZU0Df8TzNikYx74FEtiRUQjKYost5.jpg',
            'img/snNhAFOzU00rSZbxBLjojsVH6nqlDAfj.jpg',
            'img/VJJWjD2pgLarrmf1qSxCHxTSmumUklNM.jpg',
            'img/x4CXhaIpOX5LPNYGeCqpJb2StITBKsxv.jpg',
            'img/XGFZivxjQHDWlUGiA1DwrwUfWPTCSmme.jpg',
            'img/YaRqDOLWhMEBNxfzLuCCvUJsRi3WysBb.jpg',
            'img/yYe1EcEAHBlGH5K7NKWqy9BqLfdxCxsI.jpg',
            'img/Z9fgLM6POkIwotNsXiaFMNkm2kh6gZB7.jpg',
        ];
                     
        return [
            'name' => $this->faker->words(3, true), // ランダムなプロダクト名
            'path' => $this->faker->randomElement($imagePaths), // 固定の画像パス
            'price'=> $this->faker->numberBetween(1000, 100000), // ランダムな価格
        ];
    }
}
