<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->admin()->create([
            'email' => 'admin@bookoo.com',
            'password' => Hash::make('password'),
        ]);
        User::factory()->seller()->create([
            'email' => 'seller@bookoo.com',
            'password' => Hash::make('password'),
        ]);
        User::factory()->user()->create([
            'email' => 'user@bookoo.com',
            'password' => Hash::make('password'),
        ]);
    }
}
