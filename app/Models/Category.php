<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasSlug;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate(); // Prevent slug changes for SEO
    }

    public function book(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    /**
     * Get all categories with an "Uncategorized" option at the beginning
     */
    public static function allWithUncategorized()
    {
        $categories = static::all();

        // Create a virtual "Uncategorized" category
        $uncategorized = new static();
        $uncategorized->id = null;
        $uncategorized->name = 'Uncategorized';
        $uncategorized->slug = 'uncategorized';
        $uncategorized->exists = false;

        return collect([$uncategorized])->concat($categories);
    }
}
