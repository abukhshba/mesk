<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = [
            ['ar' => 'مبيدات الحشرات', 'en' => 'Insecticides'],
            ['ar' => 'مبيدات الفطريات', 'en' => 'Fungicides'],
            ['ar' => 'مبيدات الأعشاب', 'en' => 'Herbicides'],
            ['ar' => 'الأسمدة', 'en' => 'Fertilizers'],
            ['ar' => 'منظمات النمو', 'en' => 'Growth Regulators'],
        ];
        $name = fake()->randomElement($names);
        $slug = Str::slug($name['en']).'-'.fake()->unique()->numberBetween(1, 9999);

        return [
            'name_ar' => $name['ar'],
            'name_en' => $name['en'],
            'slug' => $slug,
            'description_ar' => fake()->paragraph(2),
            'description_en' => fake()->paragraph(2),
            'is_active' => true,
            'sort_order' => fake()->numberBetween(0, 10),
        ];
    }
}
