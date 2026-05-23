<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUs::firstOrCreate(['id' => 1], [
            'title_ar' => 'من نحن',
            'title_en' => 'About Us',
            'description_ar' => 'مسك للمبيدات والأسمدة هي شركة رائدة في المملكة العربية السعودية متخصصة في توفير أفضل المنتجات الزراعية من مبيدات وأسمدة عالية الجودة.',
            'description_en' => 'Mesk Pesticides & Fertilizers is a leading company in Saudi Arabia specialized in providing the best agricultural products including premium pesticides and fertilizers.',
            'mission_ar' => 'مهمتنا تقديم حلول زراعية متكاملة وعالية الجودة تساعد المزارعين على تحقيق أعلى إنتاجية مع الحفاظ على البيئة.',
            'mission_en' => 'Our mission is to provide comprehensive and high-quality agricultural solutions that help farmers achieve maximum productivity while preserving the environment.',
            'vision_ar' => 'رؤيتنا أن نكون الشركة الأولى في المملكة العربية السعودية في مجال توريد وتوزيع المستلزمات الزراعية.',
            'vision_en' => 'Our vision is to be the number one company in Saudi Arabia in the field of agricultural supplies distribution.',
        ]);
    }
}
