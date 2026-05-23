<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = [
            ['ar' => 'إمداكلوبريد', 'en' => 'Imidacloprid 70%'],
            ['ar' => 'كلوربيريفوس', 'en' => 'Chlorpyrifos 48%'],
            ['ar' => 'مانكوزيب', 'en' => 'Mancozeb 80%'],
            ['ar' => 'غلايفوسيت', 'en' => 'Glyphosate 41%'],
            ['ar' => 'يوريا', 'en' => 'Urea 46%'],
            ['ar' => 'NPK المتوازن', 'en' => 'Balanced NPK'],
        ];
        $name = fake()->randomElement($names);
        $slug = Str::slug($name['en']).'-'.fake()->unique()->numberBetween(1, 99999);

        return [
            'category_id' => Category::factory(),
            'name_ar' => $name['ar'],
            'name_en' => $name['en'],
            'slug' => $slug,
            'short_description_ar' => fake()->sentence(8),
            'short_description_en' => fake()->sentence(8),
            'description_ar' => fake()->paragraph(3),
            'description_en' => fake()->paragraph(3),
            'active_ingredient' => fake()->randomElement(['Imidacloprid 70%', 'Chlorpyrifos 48%', 'Mancozeb 80%', 'NPK 20-20-20']),
            'usage_instructions' => fake()->paragraph(2),
            'application_rate' => fake()->randomElement(['200 مل/دونم', '500 مل/هكتار', '1 لتر/فدان']),
            'safety_precautions' => fake()->paragraph(2),
            'package_sizes' => fake()->randomElement(['100 مل, 250 مل, 1 لتر', '500 جم, 1 كجم, 5 كجم', '1 لتر, 5 لتر, 20 لتر']),
            'is_featured' => fake()->boolean(30),
            'is_active' => true,
            'sort_order' => fake()->numberBetween(0, 50),
        ];
    }
}
