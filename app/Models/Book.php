<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Book extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'seller_id',
        'title',
        'author',
        'country',
        'language',
        'link',
        'pages',
        'year',
        'category_id',
        'stock',
        'price',
        'is_active',
    ];

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class)->withDefault([
            'name' => 'Uncategorized'
        ]);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaCollection('book_cover')
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 500, 500)
            ->nonQueued();
    }


}
