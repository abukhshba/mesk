<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Category::count() > 0) {
            return;
        }

        $categories = [
            [
                'name_ar' => 'مبيدات الحشرات',
                'name_en' => 'Insecticides',
                'slug' => 'insecticides',
                'image' => 'insecticides.png',
                'description_ar' => 'مجموعة شاملة من مبيدات الحشرات عالية الفاعلية للقضاء على الآفات الزراعية وحماية المحاصيل من الخسائر الاقتصادية.',
                'description_en' => 'A comprehensive range of highly effective insecticides to eliminate agricultural pests and protect crops from economic losses.',
                'sort_order' => 1,
                'subcategories' => [
                    ['name_ar' => 'مبيدات حشرية للمحاصيل الحقلية', 'name_en' => 'Field Crops Insecticides'],
                    ['name_ar' => 'مبيدات حشرية للخضروات', 'name_en' => 'Vegetables Insecticides'],
                ],
            ],
            [
                'name_ar' => 'مبيدات الفطريات',
                'name_en' => 'Fungicides',
                'slug' => 'fungicides',
                'image' => 'fungicides.png',
                'description_ar' => 'حلول متكاملة لمكافحة الأمراض الفطرية التي تصيب المحاصيل الزراعية بما يضمن أعلى جودة للإنتاج.',
                'description_en' => 'Integrated solutions for controlling fungal diseases affecting agricultural crops, ensuring the highest production quality.',
                'sort_order' => 2,
                'subcategories' => [
                    ['name_ar' => 'مبيدات فطريات وقائية', 'name_en' => 'Protective Fungicides'],
                    ['name_ar' => 'مبيدات فطريات علاجية', 'name_en' => 'Curative Fungicides'],
                ],
            ],
            [
                'name_ar' => 'مبيدات الأعشاب',
                'name_en' => 'Herbicides',
                'slug' => 'herbicides',
                'image' => 'herbicides.png',
                'description_ar' => 'مبيدات أعشاب فعّالة للقضاء على الحشائش الضارة التي تنافس المحاصيل على الغذاء والماء والضوء.',
                'description_en' => 'Effective herbicides to eliminate weeds that compete with crops for nutrients, water, and light.',
                'sort_order' => 3,
                'subcategories' => [
                    ['name_ar' => 'مبيدات أعشاب اختيارية', 'name_en' => 'Selective Herbicides'],
                    ['name_ar' => 'مبيدات أعشاب عامة', 'name_en' => 'Non-selective Herbicides'],
                ],
            ],
            [
                'name_ar' => 'الأسمدة',
                'name_en' => 'Fertilizers',
                'slug' => 'fertilizers',
                'image' => 'fertilizers.png',
                'description_ar' => 'أسمدة عالية الجودة تمد النباتات بالعناصر الغذائية الأساسية لتحقيق أعلى إنتاجية وأفضل جودة للمحاصيل.',
                'description_en' => 'High-quality fertilizers that supply plants with essential nutrients to achieve maximum productivity and best crop quality.',
                'sort_order' => 4,
                'subcategories' => [
                    ['name_ar' => 'أسمدة ورقية', 'name_en' => 'Foliar Fertilizers'],
                    ['name_ar' => 'أسمدة ذوابة', 'name_en' => 'Soluble Fertilizers'],
                ],
            ],
            [
                'name_ar' => 'منظمات النمو',
                'name_en' => 'Growth Regulators',
                'slug' => 'growth-regulators',
                'image' => 'growth_regulators.png',
                'description_ar' => 'منظمات نمو متخصصة تعزز تطور النبات وتحسّن العقد وتزيد من حجم الثمار وجودتها.',
                'description_en' => 'Specialized growth regulators that enhance plant development, improve fruit set, and increase fruit size and quality.',
                'sort_order' => 5,
                'subcategories' => [],
            ],
            [
                'name_ar' => 'محسنات التربة',
                'name_en' => 'Soil Conditioners',
                'slug' => 'soil-conditioners',
                'image' => 'soil_conditioners.png',
                'description_ar' => 'منتجات لتحسين خواص التربة الفيزيائية والكيميائية والبيولوجية وتعزيز نشاط الكائنات الدقيقة المفيدة.',
                'description_en' => 'Products to improve the physical, chemical, and biological properties of soil and enhance beneficial microbial activity.',
                'sort_order' => 6,
                'subcategories' => [],
            ],
            [
                'name_ar' => 'التغذية النباتية',
                'name_en' => 'Plant Nutrition',
                'slug' => 'plant-nutrition',
                'image' => 'plant_nutrition.png',
                'description_ar' => 'برامج تغذية متكاملة تشمل الأحماض الأمينية والعناصر الصغرى والكبرى لتحقيق أعلى إنتاجية.',
                'description_en' => 'Comprehensive nutrition programs including amino acids, micro and macro elements to achieve maximum productivity.',
                'sort_order' => 7,
                'subcategories' => [],
            ],
            [
                'name_ar' => 'مساعدات الرش',
                'name_en' => 'Adjuvants',
                'slug' => 'adjuvants',
                'image' => 'adjuvants.png',
                'description_ar' => 'مواد مساعدة تُضاف إلى محاليل الرش لتحسين التغطية والالتصاق وزيادة فاعلية المبيدات والأسمدة.',
                'description_en' => 'Additives to spray solutions to improve coverage, adhesion, and increase the effectiveness of pesticides and fertilizers.',
                'sort_order' => 8,
                'subcategories' => [],
            ],
        ];

        foreach ($categories as $data) {
            $subcategories = $data['subcategories'];
            $imageFile = $data['image'];
            unset($data['subcategories'], $data['image']);

            $category = Category::create(array_merge($data, ['is_active' => true]));

            // Attach parent category image
            $parentImagePath = public_path('images/'.$imageFile);
            if (file_exists($parentImagePath)) {
                $category->addMedia($parentImagePath)
                    ->preservingOriginal()
                    ->toMediaCollection('image');
            }

            foreach ($subcategories as $j => $subName) {
                $subcategory = Category::create([
                    'parent_id' => $category->id,
                    'name_ar' => $subName['name_ar'],
                    'name_en' => $subName['name_en'],
                    'slug' => $category->slug.'-'.Str::slug($subName['name_en']),
                    'description_ar' => 'منتجات '.$category->name_ar.' المخصصة لـ '.$subName['name_ar'],
                    'description_en' => $category->name_en.' products for '.$subName['name_en'],
                    'is_active' => true,
                    'sort_order' => $j,
                ]);

                // Attach parent image to the subcategory for aesthetic consistency
                if (file_exists($parentImagePath)) {
                    $subcategory->addMedia($parentImagePath)
                        ->preservingOriginal()
                        ->toMediaCollection('image');
                }
            }
        }
    }
}
