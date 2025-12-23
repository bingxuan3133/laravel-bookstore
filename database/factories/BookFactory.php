<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'title' => fake()->sentence(),
                'author' => fake()->name(),
                'country' => fake()->country(),
                'language' => fake()->languageCode(),
                'link' => fake()->url(),
                'pages' => fake()->numberBetween(100, 1000),
                'year' => fake()->year(),
                'category_id' => null,
                'is_active' => true,
                'stock' => fake()->randomDigit(),
                'price' => fake()->numberBetween(10, 50),
        ];
    }
}
