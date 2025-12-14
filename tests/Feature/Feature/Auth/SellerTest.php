<?php

use function Pest\Laravel\actingAs;
use Illuminate\Support\Facades\Auth;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class)
    ->beforeEach(function () {
        $this->seed(\Database\Seeders\DatabaseSeeder::class);
        // $this->seed(\Database\Seeders\RoleSeeder::class);
        // $this->seed(\Database\Seeders\SellerStatusSeeder::class);
    });

test('seller can login', function () {
    $seller = Auth::loginUsingId(2);

    actingAs($seller) 
        ->get('/seller/dashboard')
        ->assertStatus(200);
});

test('seller got 403 when trying to access admin page', function () {
    $seller = Auth::loginUsingId(2);

    actingAs($seller) 
        ->get('/admin/dashboard')
        ->assertStatus(403);
});

test('seller got redirect to login when havent logged in', function () {
    $response = $this->get('/seller/dashboard');
    $response->assertRedirect(route('login'));
});
