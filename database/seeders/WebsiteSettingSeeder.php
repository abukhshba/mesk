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
        WebsiteSetting::firstOrCreate([], [
            'company_name' => 'مسك للمبيدات والأسمدة',
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
