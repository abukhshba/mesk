<?php

namespace Database\Seeders;

use App\Models\WebsiteSetting;
use Illuminate\Database\Seeder;

class WebsiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WebsiteSetting::updateOrCreate(['id' => 1], [
            'company_name_ar' => 'شركة المسك للصناعة',
            'company_name_en' => 'ALMISK COMPANY FOR INDUSTRY',
            'email' => 'info@mesk.sa',
            'phone' => '+966500000000',
            'whatsapp' => '966500000000',
            'address' => 'الرياض، المملكة العربية السعودية',
            'facebook' => 'https://facebook.com',
            'instagram' => 'https://instagram.com',
            'twitter' => 'https://twitter.com',
            'linkedin' => 'https://linkedin.com',
        ]);
    }
}
