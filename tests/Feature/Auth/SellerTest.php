<?php

use function Pest\Laravel\actingAs;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class)
    ->beforeEach(function () {
    });

test('seller can login', function () {
    $seller = User::factory()->seller()->create();

    actingAs($seller) 
        ->get('/seller/dashboard')
        ->assertStatus(200);
});

test('seller got 403 when trying to access admin page', function () {
    $seller = User::factory()->seller()->create();

    actingAs($seller) 
        ->get('/admin/dashboard')
        ->assertStatus(403);
});

test('seller got redirect to login when havent logged in', function () {
    $response = $this->get('/seller/dashboard');
    $response->assertRedirect(route('login'));
});
