<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Seller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Middleware\EnsureSellerIsApproved;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Middleware\EnsureUserIsSeller;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/remove/{book}', [CartController::class, 'removeFromCart'])->name('cart.remove');

// Route::get('orders/{order}', [CheckoutController::class, 'show']); // View order details
// Route::post('orders', [CheckoutController::class, 'store']); // Place an order

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware('auth')->group(function () {
    // Admin Routes (Add authentication middleware when ready)
    Route::middleware(EnsureUserIsAdmin::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

        // Books
        Route::get('/books', [Admin\BookController::class, 'index'])->name('books.index');
        Route::patch('/books/{book}/category', [Admin\BookController::class, 'updateCategory'])->name('books.updateCategory');

        // Categories
        Route::get('/categories', [Admin\CategoryController::class, 'index'])->name('categories.index');
        Route::post('/categories', [Admin\CategoryController::class, 'store'])->name('categories.store');
        Route::put('/categories/{category}', [Admin\CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [Admin\CategoryController::class, 'destroy'])->name('categories.destroy');

        // Sellers
        Route::get('/sellers', [Admin\SellerController::class, 'index'])->name('sellers.index');
        Route::patch('/sellers/{seller}/approve', [Admin\SellerController::class, 'approve'])->name('sellers.approve');
        Route::patch('/sellers/{seller}/reject', [Admin\SellerController::class, 'reject'])->name('sellers.reject');

        // Placeholder routes
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
