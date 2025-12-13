<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Seller\SellerDashboardController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/books', [BookController::class, 'index'])->name('books.index');

// Admin Routes (Add authentication middleware when ready)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Placeholder routes for admin sections
    Route::get('/books', function () { return 'Admin Books'; })->name('books.index');
    Route::get('/books/create', function () { return 'Create Book'; })->name('books.create');
    Route::get('/categories', function () { return 'Admin Categories'; })->name('categories.index');
    Route::get('/categories/create', function () { return 'Create Category'; })->name('categories.create');
    Route::get('/sellers', function () { return 'Admin Sellers'; })->name('sellers.index');
    Route::get('/users', function () { return 'Admin Users'; })->name('users.index');
    Route::get('/settings', function () { return 'Admin Settings'; })->name('settings');
});

// Seller Routes (Add authentication middleware when ready)
Route::prefix('seller')->name('seller.')->group(function () {
    Route::get('/dashboard', [SellerDashboardController::class, 'index'])->name('dashboard');

    // Placeholder routes for seller sections
    Route::get('/books', function () { return 'Seller Books'; })->name('books.index');
    Route::get('/books/create', function () { return 'Create Book Listing'; })->name('books.create');
    Route::get('/orders', function () { return 'Seller Orders'; })->name('orders.index');
    Route::get('/earnings', function () { return 'Seller Earnings'; })->name('earnings');
    Route::get('/analytics', function () { return 'Seller Analytics'; })->name('analytics');
    Route::get('/store/settings', function () { return 'Store Settings'; })->name('store.settings');
    Route::get('/help', function () { return 'Help & Support'; })->name('help');
});

// Logout route placeholder
Route::post('/logout', function () {
    return redirect('/');
})->name('logout');
