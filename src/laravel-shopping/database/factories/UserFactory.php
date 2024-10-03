<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static $idcounter = 2;
    protected static $namecounter = 2;
    protected static $emailcounter = 1234;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => self::$idcounter++,
            'name' => 'テストTEST0' . self::$namecounter++, // 名前を連番にする
            'email' => 'test@ ' . self::$emailcounter++ . ' email.com',
            'email_verified_at' => null,
            'password' => fake()->password(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
