<?php

namespace App\Models;

use Database\Factories\WebsiteSettingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    /** @use HasFactory<WebsiteSettingFactory> */
    use HasFactory;

    protected $fillable = [
        'company_name',
        'logo',
        'favicon',
        'email',
        'phone',
        'whatsapp',
        'address',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
    ];

    public static function getSettings(): self
    {
        return static::firstOrCreate([], [
            'company_name' => 'مسك للمبيدات والأسمدة',
        ]);
    }
}
