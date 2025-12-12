<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\Seller;
use App\Models\SellerStatus;
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
            $role = Role::where('name', 'Admin')->first();

            return [
                'name' => 'Admin ' . $attributes['name'],
                'role_id' => $role->id,
            ];
        });
    }

    public function seller(): static
    {
        return $this->state(function (array $attributes) {
            $role = Role::where('name', 'Seller')->first();

            return [
                'name' => 'Seller ' . $attributes['name'],
                'role_id' => $role->id,
            ];
        })->afterCreating(function ($user) {
            $approvedSellerStatus = SellerStatus::where('name', 'Approved')->first();

            Seller::create([
                'user_id' => $user->id,
                'store_name' => fake()->company(),
                'description' => fake()->sentence(),
                'seller_status_id' => $approvedSellerStatus->id, // Active status
            ]);
        });
    }

    public function user(): static
    {
        return $this->state(function (array $attributes) {
            $role = Role::where('name', 'User')->first();

            return [
                'name' => 'User ' . $attributes['name'],
                'role_id' => $role->id,
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
