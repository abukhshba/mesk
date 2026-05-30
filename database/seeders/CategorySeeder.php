<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing categories to ensure a fresh clean state
        Category::query()->forceDelete();

        $parent = Category::create([
            'name_ar' => 'الأسمدة',
            'name_en' => 'Fertilizers',
            'slug' => 'fertilizers',
            'description_ar' => 'أسمدة عالية الجودة تمد النباتات بالعناصر الغذائية الأساسية لتحقيق أعلى إنتاجية وأفضل جودة للمحاصيل.',
            'description_en' => 'High-quality fertilizers that supply plants with essential nutrients to achieve maximum productivity and best crop quality.',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        // Attach parent category image
        $parentImagePath = public_path('images/fertilizers.png');
        if (! file_exists($parentImagePath)) {
            $parentImagePath = public_path('images/product_fertilizer_bag.png');
        }
        if (file_exists($parentImagePath)) {
            $parent->addMedia($parentImagePath)
                ->preservingOriginal()
                ->toMediaCollection('image');
        }

        $children = [
            [
                'name_ar' => 'سماد ذواب',
                'name_en' => 'Soluble Fertilizer',
                'slug' => 'soluble-fertilizer',
                'description_ar' => 'أسمدة ذوابة متكاملة وسريعة الذوبان والامتصاص للنبات.',
                'description_en' => 'Highly soluble integrated fertilizers for quick absorption and uptake.',
                'image' => 'product_fertilizer_bag.png',
            ],
            [
                'name_ar' => 'الأسمدة المحببة',
                'name_en' => 'Granular Fertilizer',
                'slug' => 'granular-fertilizer',
                'description_ar' => 'أسمدة محببة بطيئة الإطلاق تضمن تغذية مستدامة للتربة والنبات.',
                'description_en' => 'Slow-release granular fertilizers ensuring sustainable soil and plant nutrition.',
                'image' => 'product_granules.png',
            ],
            [
                'name_ar' => 'الأسمدة السائلة',
                'name_en' => 'Liquid Fertilizer',
                'slug' => 'liquid-fertilizer',
                'description_ar' => 'محاليل مغذية سائلة سهلة الاستخدام ومثالية لجميع شبكات الري والرش الورقي.',
                'description_en' => 'Easy-to-use liquid nutrient solutions perfect for all irrigation and foliar systems.',
                'image' => 'product_liquid.png',
            ],
            [
                'name_ar' => 'الأسمدة المعلقة',
                'name_en' => 'Suspension Fertilizers',
                'slug' => 'suspension-fertilizers',
                'description_ar' => 'أسمدة معلقة عالية التركيز تضمن توزيعاً متوازناً للمغذيات الكبرى والصغرى.',
                'description_en' => 'Highly concentrated suspension fertilizers guaranteeing balanced micro and macro nutrient distribution.',
                'image' => 'product_bottle.png',
            ],
        ];

        foreach ($children as $j => $childData) {
            $imageFile = $childData['image'];
            unset($childData['image']);

            $child = Category::create(array_merge($childData, [
                'parent_id' => $parent->id,
                'is_active' => true,
                'sort_order' => $j + 1,
            ]));

            // Attach specific or default image to the subcategory
            $childImagePath = public_path('images/'.$imageFile);
            if (! file_exists($childImagePath)) {
                $childImagePath = $parentImagePath;
            }
            if (file_exists($childImagePath)) {
                $child->addMedia($childImagePath)
                    ->preservingOriginal()
                    ->toMediaCollection('image');
            }
        }
    }
}
