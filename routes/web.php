<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Seller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\EnsureSellerIsApproved;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Middleware\EnsureUserIsSeller;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/books', [BookController::class, 'index'])->name('books.index');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
// Admin Routes (Add authentication middleware when ready)
    Route::middleware(EnsureUserIsAdmin::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

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
    Route::middleware(EnsureUserIsSeller::class)->prefix('seller')->name('seller.')->group(function () {
        Route::get('/dashboard', [Seller\DashboardController::class, 'index'])->name('dashboard');

        // Placeholder routes for seller sections
        Route::get('/books', [Seller\BookController::class, 'index'])->name('books.index');
        // Only available after approval
        Route::middleware(EnsureSellerIsApproved::class)->group(function() {
            Route::get('/books/create', [Seller\BookController::class, 'create'])->name('books.create');
            Route::post('/books', [Seller\BookController::class, 'store'])->name('books.store');
            Route::patch('/books/{book}/publish', [Seller\BookController::class, 'publish'])->name('books.publish');
            Route::patch('/books/{book}/unpublish', [Seller\BookController::class, 'unpublish'])->name('books.unpublish');
        });
        Route::resource('orders', Seller\OrderController::class)
            ->only(['index', 'show']);
        Route::get('/store/settings', [Seller\StoreController::class, 'settings'])->name('store.settings');
        Route::patch('/store/settings', [Seller\StoreController::class, 'settings'])->name('store.settings.update');
        Route::get('/help', function () { return 'Help & Support'; })->name('help');
    });
});