<?php

use App\Models\User;
use App\Models\Book;
use App\Models\Seller;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('checkout success', function () {
    // Disable exception handling to see actual errors
    $this->withoutExceptionHandling();

    // Create a seller
    $seller = User::factory()->seller()->create();

    // Create a book with stock available
    $book = Book::factory()->create([
        'seller_id' => $seller->id,
        'title' => 'Test Book',
        'price' => 29.99,
        'stock' => 5,
        'is_active' => true,
    ]);

    $this->actingAsGuest();

    // User adds book to cart (simulating session cart)
    $response = $this->post('/cart/add', [
        'book_id' => $book->id,
        'quantity' => 2,
    ]);

    // Verify item was added to cart
    $response->assertRedirect();
    $response->assertSessionHas('success', 'Item added to cart!');

    // Verify cart session contains the book
    $cart = session()->get('cart', []);
    expect($cart)->toHaveKey($book->id);
    expect($cart[$book->id]['quantity'])->toBe(2);

    // User attempts to checkout with customer information
    $checkoutResponse = $this->post('/checkout', [
        'customer_name' => 'John Doe',
        'customer_email' => 'john.doe@example.com',
        'shipping_address' => '123 Main St, City, State 12345',
    ]);

    // Verify checkout was successful
    $checkoutResponse->assertRedirect();
    $checkoutResponse->assertSessionHas('success', 'Order placed successfully!');

    // Verify order was created
    expect(\App\Models\Order::count())->toBe(1);

    $order = \App\Models\Order::first();
    expect($order->customer_name)->toBe('John Doe');
    expect($order->customer_email)->toBe('john.doe@example.com');
    expect($order->shipping_address)->toBe('123 Main St, City, State 12345');
    expect($order->status)->toBe('pending');
    expect($order->user_id)->toBeNull(); // Guest checkout

    // Verify order items
    expect($order->items()->count())->toBe(1);
    $orderItem = $order->items()->first();
    expect($orderItem->book_id)->toBe($book->id);
    expect($orderItem->quantity)->toBe(2);
    expect($orderItem->price)->toBe(29.99);

    // Verify stock was decremented
    $book->refresh();
    expect($book->stock)->toBe(3); // 5 - 2 = 3

    // Verify cart was cleared
    $cart = session()->get('cart', []);
    expect($cart)->toBeEmpty();
});

test('checkout fails when item stock becomes 0 after adding to cart', function () {
    // Create a seller
    $seller = User::factory()->seller()->create();

    // Create a book with stock available
    $book = Book::factory()->create([
        'seller_id' => $seller->id,
        'title' => 'Test Book',
        'price' => 29.99,
        'stock' => 5,
        'is_active' => true,
    ]);

    $this->actingAsGuest();

    // User adds book to cart (simulating session cart)
    $response = $this->post('/cart/add', [
        'book_id' => $book->id,
        'quantity' => 2,
    ]);

    // Verify item was added to cart
    $response->assertRedirect();
    $response->assertSessionHas('success', 'Item added to cart!');

    // Verify cart session contains the book
    $cart = session()->get('cart', []);
    expect($cart)->toHaveKey($book->id);
    expect($cart[$book->id]['quantity'])->toBe(2);

    // Simulate stock becoming 0 (someone else bought all remaining stock)
    $book->update(['stock' => 0]);

    // User attempts to checkout with customer information
    $checkoutResponse = $this->post('/checkout', [
        'customer_name' => 'John Doe',
        'customer_email' => 'john.doe@example.com',
        'shipping_address' => '123 Main St, City, State 12345',
    ]);

    // Checkout should fail and redirect back with error
    // This assumes checkout validates stock before processing
    $checkoutResponse->assertRedirect();
    $checkoutResponse->assertSessionHas('error', 'Some items in your cart are no longer available. Please review your cart.');

    // Verify no order was created
    expect(\App\Models\Order::count())->toBe(0);
});
