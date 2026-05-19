<?php

namespace App\Models;

use Database\Factories\AboutUsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class AboutUs extends Model implements HasMedia
{
    /** @use HasFactory<AboutUsFactory> */
    use HasFactory;

    use HasTranslations;
    use InteractsWithMedia;

    protected $table = 'about_us';

    protected $fillable = [
        'title',
        'description',
        'mission',
        'vision',
    ];

    /** @var list<string> */
    public array $translatable = ['title', 'description', 'mission', 'vision'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
    }
}
