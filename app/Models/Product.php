<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'name_ar',
        'name_en',
        'slug',
        'short_description_ar',
        'short_description_en',
        'description_ar',
        'description_en',
        'active_ingredient',
        'usage_instructions',
        'application_rate',
        'safety_precautions',
        'package_sizes',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    public function getTranslation(string $key, string $locale): ?string
    {
        return $this->{"{$key}_{$locale}"} ?? '';
    }

    public function getNameAttribute(): string
    {
        return $this->getTranslation('name', app()->getLocale()) ?? '';
    }

    public function getShortDescriptionAttribute(): ?string
    {
        return $this->getTranslation('short_description', app()->getLocale());
    }

    public function getDescriptionAttribute(): ?string
    {
        return $this->getTranslation('description', app()->getLocale());
    }

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main_image')->singleFile();
        $this->addMediaCollection('gallery');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
