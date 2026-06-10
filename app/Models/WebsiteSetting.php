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
        'company_name_ar',
        'company_name_en',
        'logo',
        'favicon',
        'email',
        'phone',
        'whatsapp',
        'address',
        'google_maps_link',
        'contact_info_pdf',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
    ];

    public function getCompanyNameAttribute(): ?string
    {
        return app()->getLocale() === 'ar' ? $this->company_name_ar : $this->company_name_en;
    }

    public static function getSettings(): self
    {
        return static::firstOrCreate([], [
            'company_name_ar' => 'شركة المسك للصناعة',
            'company_name_en' => 'ALMISK COMPANY FOR INDUSTRY',
        ]);
    }
}
