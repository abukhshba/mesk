<?php

namespace App\Models;

use Database\Factories\AboutUsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AboutUs extends Model implements HasMedia
{
    /** @use HasFactory<AboutUsFactory> */
    use HasFactory;

    use InteractsWithMedia;

    protected $table = 'about_us';

    protected $fillable = [
        'id',
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'mission_ar',
        'mission_en',
        'vision_ar',
        'vision_en',
    ];

    public function getTranslation(string $key, string $locale): ?string
    {
        return $this->{"{$key}_{$locale}"} ?? '';
    }

    public function getTitleAttribute(): string
    {
        return $this->getTranslation('title', app()->getLocale()) ?? '';
    }

    public function getDescriptionAttribute(): ?string
    {
        return $this->getTranslation('description', app()->getLocale());
    }

    public function getMissionAttribute(): ?string
    {
        return $this->getTranslation('mission', app()->getLocale());
    }

    public function getVisionAttribute(): ?string
    {
        return $this->getTranslation('vision', app()->getLocale());
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
    }
}
