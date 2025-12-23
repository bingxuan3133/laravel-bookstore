<?php

namespace App\Models;

use App\Enums\SellerStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Seller extends Model
{
    protected $guarded = ['user_id'];

    protected $casts = [
        'seller_status' => SellerStatus::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function orderItems(): HasManyThrough
    {
        return $this->hasManyThrough(OrderItem::class, Book::class);
    }
}
