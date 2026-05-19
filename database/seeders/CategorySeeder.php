<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name'        => ['ar' => 'مبيدات الحشرات', 'en' => 'Insecticides'],
                'slug'        => 'insecticides',
                'description' => ['ar' => 'مجموعة شاملة من مبيدات الحشرات عالية الفاعلية للقضاء على الآفات الزراعية وحماية المحاصيل من الخسائر الاقتصادية.', 'en' => 'A comprehensive range of highly effective insecticides to eliminate agricultural pests and protect crops from economic losses.'],
                'sort_order'  => 1,
            ],
            [
                'name'        => ['ar' => 'مبيدات الفطريات', 'en' => 'Fungicides'],
                'slug'        => 'fungicides',
                'description' => ['ar' => 'حلول متكاملة لمكافحة الأمراض الفطرية التي تصيب المحاصيل الزراعية بما يضمن أعلى جودة للإنتاج.', 'en' => 'Integrated solutions for controlling fungal diseases affecting agricultural crops, ensuring the highest production quality.'],
                'sort_order'  => 2,
            ],
            [
                'name'        => ['ar' => 'مبيدات الأعشاب', 'en' => 'Herbicides'],
                'slug'        => 'herbicides',
                'description' => ['ar' => 'مبيدات أعشاب فعّالة للقضاء على الحشائش الضارة التي تنافس المحاصيل على الغذاء والماء والضوء.', 'en' => 'Effective herbicides to eliminate weeds that compete with crops for nutrients, water, and light.'],
                'sort_order'  => 3,
            ],
            [
                'name'        => ['ar' => 'الأسمدة', 'en' => 'Fertilizers'],
                'slug'        => 'fertilizers',
                'description' => ['ar' => 'أسمدة عالية الجودة تمد النباتات بالعناصر الغذائية الأساسية لتحقيق أعلى إنتاجية وأفضل جودة للمحاصيل.', 'en' => 'High-quality fertilizers that supply plants with essential nutrients to achieve maximum productivity and best crop quality.'],
                'sort_order'  => 4,
            ],
            [
                'name'        => ['ar' => 'منظمات النمو', 'en' => 'Growth Regulators'],
                'slug'        => 'growth-regulators',
                'description' => ['ar' => 'منظمات نمو متخصصة تعزز تطور النبات وتحسّن العقد وتزيد من حجم الثمار وجودتها.', 'en' => 'Specialized growth regulators that enhance plant development, improve fruit set, and increase fruit size and quality.'],
                'sort_order'  => 5,
            ],
            [
                'name'        => ['ar' => 'محسنات التربة', 'en' => 'Soil Conditioners'],
                'slug'        => 'soil-conditioners',
                'description' => ['ar' => 'منتجات لتحسين خواص التربة الفيزيائية والكيميائية والبيولوجية وتعزيز نشاط الكائنات الدقيقة المفيدة.', 'en' => 'Products to improve the physical, chemical, and biological properties of soil and enhance beneficial microbial activity.'],
                'sort_order'  => 6,
            ],
            [
                'name'        => ['ar' => 'التغذية النباتية', 'en' => 'Plant Nutrition'],
                'slug'        => 'plant-nutrition',
                'description' => ['ar' => 'برامج تغذية متكاملة تشمل الأحماض الأمينية والعناصر الصغرى والكبرى لتحقيق أعلى إنتاجية.', 'en' => 'Comprehensive nutrition programs including amino acids, micro and macro elements to achieve maximum productivity.'],
                'sort_order'  => 7,
            ],
            [
                'name'        => ['ar' => 'مساعدات الرش', 'en' => 'Adjuvants'],
                'slug'        => 'adjuvants',
                'description' => ['ar' => 'مواد مساعدة تُضاف إلى محاليل الرش لتحسين التغطية والالتصاق وزيادة فاعلية المبيدات والأسمدة.', 'en' => 'Additives to spray solutions to improve coverage, adhesion, and increase the effectiveness of pesticides and fertilizers.'],
                'sort_order'  => 8,
            ],
        ];

        foreach ($categories as $data) {
            Category::firstOrCreate(['slug' => $data['slug']], array_merge($data, ['is_active' => true]));
        }
    }
}
