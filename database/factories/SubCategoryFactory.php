<?php

namespace Database\Factories;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SubCategory>
 */
class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = [
            ['ar' => 'مبيدات الحشرات القارضة', 'en' => 'Chewing Insecticides'],
            ['ar' => 'مبيدات الحشرات الماصة', 'en' => 'Sucking Insecticides'],
            ['ar' => 'مبيدات الفطريات الجهازية', 'en' => 'Systemic Fungicides'],
            ['ar' => 'أسمدة التربة', 'en' => 'Soil Fertilizers'],
            ['ar' => 'أسمدة الورقية', 'en' => 'Foliar Fertilizers'],
        ];
        $name = fake()->randomElement($names);
        $slug = \Illuminate\Support\Str::slug($name['en']) . '-' . fake()->unique()->numberBetween(1, 9999);

        return [
            'category_id' => \App\Models\Category::factory(),
            'name' => $name,
            'slug' => $slug,
            'description' => [
                'ar' => fake()->paragraph(2),
                'en' => fake()->paragraph(2),
            ],
            'is_active' => true,
            'sort_order' => fake()->numberBetween(0, 10),
        ];
    }
}
