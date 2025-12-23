<?php

use function Pest\Laravel\actingAs;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class)
    ->beforeEach(function () {
    });

test('user can access index', function () {
    $this->get('/')
        ->assertStatus(200);
});

test('user got redirect to login when try to access admin page', function () {
    $this->get('/admin/dashboard')
        ->assertStatus(302);
});

test('user got redirect to login when try to access seller page', function () {
    $this->get('/seller/dashboard')
        ->assertStatus(302);
});
