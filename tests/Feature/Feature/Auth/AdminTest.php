<?php

use function Pest\Laravel\actingAs;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class)
    ->beforeEach(function () {
        // $this->seed(\Database\Seeders\RoleSeeder::class);
        // $this->seed(\Database\Seeders\SellerStatusSeeder::class);
        // $this->seed(\Database\Seeders\CategorySeeder::class);
    });

test('admin can login', function () {
    // $this->seed([RoleSeeder::class]);
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->get('/admin/dashboard')
        ->assertStatus(200);
});

test('admin got 403 when trying to access seller page', function () {
    $this->seed([RoleSeeder::class]);
    $admin = User::factory()->admin()->create();

    actingAs($admin) 
        ->get('/seller/dashboard')
        ->assertStatus(403);
});

test('admin got redirect to login when havent logged in', function () {
    $response = $this->get('/admin/dashboard');
    $response->assertRedirect(route('login'));
});
