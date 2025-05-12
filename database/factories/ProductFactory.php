<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name'=>fake()->name(),
            'user_id'=>User::factory(),
            'category'=>'category',
            'description'=>fake()->realText(),
            'price'=>fake()->randomDigit(),
            'image'=>fake()->image(),
            'quantity'=>fake()->randomDigit(),
        ];
    }
}
