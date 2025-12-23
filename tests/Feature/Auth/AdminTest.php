<?php

use function Pest\Laravel\actingAs;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class)
    ->beforeEach(function () {
    });

test('admin can login', function () {
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->get('/admin/dashboard')
        ->assertStatus(200);
});

test('admin got 403 when trying to access seller page', function () {
    $admin = User::factory()->admin()->create();

    actingAs($admin) 
        ->get('/seller/dashboard')
        ->assertStatus(403);
});

test('admin got redirect to login when havent logged in', function () {
    $response = $this->get('/admin/dashboard');
    $response->assertRedirect(route('login'));
});
