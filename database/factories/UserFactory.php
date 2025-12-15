<?php

namespace Database\Factories;

use App\Enums\SellerStatus as EnumsSellerStatus;
use App\Models\Role;
use App\Models\Seller;
use App\Enums\UserRole;
use App\Enums\SellerStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    public function admin(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Admin ' . $attributes['name'],
                'role' => UserRole::ADMIN,
            ];
        });
    }

    public function seller(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Seller ' . $attributes['name'],
                'role' => UserRole::SELLER,
            ];
        })->afterCreating(function ($user) {
            $user->seller()->create([
                'store_name' => fake()->company(),
                'about' => fake()->sentence(),
                'seller_status' => SellerStatus::Approved,
            ]);
        });
    }

    public function user(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'User ' . $attributes['name'],
                'role' => UserRole::USER,
            ];
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
