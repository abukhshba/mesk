<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\WebsiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@mesk.sa'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
            ]
        );

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

        AboutUs::firstOrCreate(['id' => 1], [
            'title' => ['ar' => 'من نحن', 'en' => 'About Us'],
            'description' => [
                'ar' => 'مسك للمبيدات والأسمدة هي شركة رائدة في المملكة العربية السعودية متخصصة في توفير أفضل المنتجات الزراعية من مبيدات وأسمدة عالية الجودة.',
                'en' => 'Mesk Pesticides & Fertilizers is a leading company in Saudi Arabia specialized in providing the best agricultural products including premium pesticides and fertilizers.',
            ],
            'mission' => [
                'ar' => 'مهمتنا تقديم حلول زراعية متكاملة وعالية الجودة تساعد المزارعين على تحقيق أعلى إنتاجية مع الحفاظ على البيئة.',
                'en' => 'Our mission is to provide comprehensive and high-quality agricultural solutions that help farmers achieve maximum productivity while preserving the environment.',
            ],
            'vision' => [
                'ar' => 'رؤيتنا أن نكون الشركة الأولى في المملكة العربية السعودية في مجال توريد وتوزيع المستلزمات الزراعية.',
                'en' => 'Our vision is to be the number one company in Saudi Arabia in the field of agricultural supplies distribution.',
            ],
        ]);

        if (Category::count() > 0) {
            return;
        }

        $categoryData = [
            ['ar' => 'مبيدات الحشرات', 'en' => 'Insecticides'],
            ['ar' => 'مبيدات الفطريات', 'en' => 'Fungicides'],
            ['ar' => 'مبيدات الأعشاب', 'en' => 'Herbicides'],
            ['ar' => 'الأسمدة', 'en' => 'Fertilizers'],
        ];

        foreach ($categoryData as $i => $catName) {
            $slug = \Illuminate\Support\Str::slug($catName['en']);
            $category = Category::create([
                'name' => $catName,
                'slug' => $slug,
                'description' => [
                    'ar' => 'منتجات ' . $catName['ar'] . ' عالية الجودة والفاعلية.',
                    'en' => 'High quality and effective ' . $catName['en'] . ' products.',
                ],
                'is_active' => true,
                'sort_order' => $i,
            ]);

            $subData = [
                ['ar' => 'منتجات للمحاصيل الحقلية', 'en' => 'Field Crops Products'],
                ['ar' => 'منتجات للخضروات', 'en' => 'Vegetable Products'],
            ];
            foreach ($subData as $j => $subName) {
                SubCategory::create([
                    'category_id' => $category->id,
                    'name' => $subName,
                    'slug' => $slug . '-' . \Illuminate\Support\Str::slug($subName['en']),
                    'description' => [
                        'ar' => 'منتجات ' . $catName['ar'] . ' المخصصة لـ' . $subName['ar'],
                        'en' => $catName['en'] . ' products for ' . $subName['en'],
                    ],
                    'is_active' => true,
                    'sort_order' => $j,
                ]);
            }

            $productNames = [
                ['ar' => 'إمداكلوبريد 70%', 'en' => 'Imidacloprid 70%'],
                ['ar' => 'مانكوزيب 80%', 'en' => 'Mancozeb 80%'],
                ['ar' => 'يوريا 46%', 'en' => 'Urea 46%'],
            ];
            foreach ($productNames as $k => $prodName) {
                Product::create([
                    'category_id' => $category->id,
                    'name' => $prodName,
                    'slug' => $slug . '-' . \Illuminate\Support\Str::slug($prodName['en']) . '-' . $k,
                    'short_description' => [
                        'ar' => 'منتج زراعي عالي الجودة فعّال وسريع التأثير.',
                        'en' => 'High quality agricultural product, effective and fast-acting.',
                    ],
                    'description' => [
                        'ar' => 'منتج متميز يستخدم في المكافحة الزراعية لتحقيق أفضل النتائج في الحماية والإنتاجية.',
                        'en' => 'A premium product used in agricultural control to achieve the best results in protection and productivity.',
                    ],
                    'active_ingredient' => $prodName['en'],
                    'usage_instructions' => 'اتبع تعليمات الاستخدام المدونة على العبوة. Follow instructions on label.',
                    'application_rate' => '200-400 مل / 100 لتر ماء',
                    'safety_precautions' => 'ارتدِ معدات الحماية الشخصية. Wear PPE during application.',
                    'package_sizes' => '100مل, 250مل, 1لتر, 5لتر',
                    'is_featured' => $k === 0,
                    'is_active' => true,
                    'sort_order' => $k,
                ]);
            }
        }

        ContactMessage::factory(5)->create();
    }
}
