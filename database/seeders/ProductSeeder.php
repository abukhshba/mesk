<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::query()->forceDelete();

        $soluble = Category::where('slug', 'soluble-fertilizer')
            ->orWhere('slug', 'alasmd-althoab')
            ->orWhere('name_en', 'Soluble Fertilizer')
            ->first();

        if ($soluble) {
            $products = $this->solubleProducts($soluble->id);

            foreach ($products as $k => $data) {
                $product = Product::create(array_merge($data, [
                    'slug' => Str::slug($data['name_en']).'-'.$soluble->id.'-'.$k,
                    'is_active' => true,
                    'is_featured' => $k === 0,
                    'sort_order' => $k,
                ]));

                $imageName = 'product_fertilizer_bag.png';
                $imagePath = public_path('images/'.$imageName);
                if (file_exists($imagePath)) {
                    $product->addMedia($imagePath)
                        ->preservingOriginal()
                        ->toMediaCollection('main_image');
                    $product->addMedia($imagePath)
                        ->preservingOriginal()
                        ->toMediaCollection('gallery');
                }
            }
        }

        $granular = Category::where('slug', 'granular-fertilizer')
            ->orWhere('name_en', 'Granular Fertilizer')
            ->first();

        if ($granular) {
            $granularProducts = $this->granularProducts($granular->id);
            foreach ($granularProducts as $k => $data) {
                $product = Product::create(array_merge($data, [
                    'slug' => Str::slug($data['name_en']).'-'.$granular->id.'-'.$k,
                    'is_active' => true,
                    'is_featured' => $k === 0,
                    'sort_order' => $k,
                ]));

                $imageName = 'product_granules.png'; // Assuming granular image name
                $imagePath = public_path('images/'.$imageName);
                if (! file_exists($imagePath)) {
                    $imagePath = public_path('images/product_fertilizer_bag.png');
                }

                if (file_exists($imagePath)) {
                    $product->addMedia($imagePath)
                        ->preservingOriginal()
                        ->toMediaCollection('main_image');
                    $product->addMedia($imagePath)
                        ->preservingOriginal()
                        ->toMediaCollection('gallery');
                }
            }
        }

        $liquid = Category::where('slug', 'liquid-fertilizer')
            ->orWhere('name_en', 'Liquid Fertilizer')
            ->first();

        if ($liquid) {
            $liquidProducts = $this->liquidProducts($liquid->id);
            foreach ($liquidProducts as $k => $data) {
                $product = Product::create(array_merge($data, [
                    'slug' => Str::slug($data['name_en']).'-'.$liquid->id.'-'.$k,
                    'is_active' => true,
                    'is_featured' => $k === 0,
                    'sort_order' => $k,
                ]));

                $imageName = 'product_liquid_bottle.png'; // Assuming liquid image name
                $imagePath = public_path('images/'.$imageName);
                if (! file_exists($imagePath)) {
                    $imagePath = public_path('images/product_fertilizer_bag.png');
                }

                if (file_exists($imagePath)) {
                    $product->addMedia($imagePath)
                        ->preservingOriginal()
                        ->toMediaCollection('main_image');
                    $product->addMedia($imagePath)
                        ->preservingOriginal()
                        ->toMediaCollection('gallery');
                }
            }
        }

        $suspension = Category::where('slug', 'suspension-fertilizers')
            ->orWhere('name_en', 'Suspension Fertilizers')
            ->first();

        if ($suspension) {
            $suspensionProducts = $this->suspensionProducts($suspension->id);
            foreach ($suspensionProducts as $k => $data) {
                $product = Product::create(array_merge($data, [
                    'slug' => Str::slug($data['name_en']).'-'.$suspension->id.'-'.$k,
                    'is_active' => true,
                    'is_featured' => $k === 0,
                    'sort_order' => $k,
                ]));

                $imageName = 'product_suspension_bucket.png'; // Assuming suspension image name
                $imagePath = public_path('images/'.$imageName);
                if (! file_exists($imagePath)) {
                    $imagePath = public_path('images/product_liquid_bottle.png');
                }
                if (! file_exists($imagePath)) {
                    $imagePath = public_path('images/product_fertilizer_bag.png');
                }

                if (file_exists($imagePath)) {
                    $product->addMedia($imagePath)
                        ->preservingOriginal()
                        ->toMediaCollection('main_image');
                    $product->addMedia($imagePath)
                        ->preservingOriginal()
                        ->toMediaCollection('gallery');
                }
            }
        }
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function solubleProducts(int $categoryId): array
    {
        $standardTableNoNotes = [
            ['crop_ar' => 'القمح والشعير', 'crop_en' => 'Wheat and barley', 'rate_ar' => '4 - 6 لتر/هكتار', 'rate_en' => '4 – 6 liters/hectare'],
            ['crop_ar' => 'محاصيل الأعلاف', 'crop_en' => 'Forage crops', 'rate_ar' => '4 - 6 لتر/هكتار', 'rate_en' => '4 – 6 liters/hectare'],
            ['crop_ar' => 'الخضروات المكشوفة', 'crop_en' => 'Open-field vegetables', 'rate_ar' => '4 - 6 لتر/هكتار', 'rate_en' => '4 – 6 liters/hectare'],
            ['crop_ar' => 'البطاطس', 'crop_en' => 'Potatoes', 'rate_ar' => '4 - 6 لتر/هكتار', 'rate_en' => '4 – 6 liters/hectare'],
            ['crop_ar' => 'زراعات البيوت المحمية', 'crop_en' => 'Greenhouse crops', 'rate_ar' => '1 - 2 لتر / 1000 م²', 'rate_en' => '1–2 liter / 1000 m²'],
            ['crop_ar' => 'أشجار الفاكهة والنخيل', 'crop_en' => 'Fruit trees and palm trees', 'rate_ar' => '4 - 6 لتر/هكتار', 'rate_en' => '4 – 6 liters/hectare'],
            ['crop_ar' => 'نباتات الزينة والمسطحات الخضراء', 'crop_en' => 'Ornamental plants and turfgrass', 'rate_ar' => '4 - 6 لتر/هكتار', 'rate_en' => '4 – 6 liters/hectare'],
        ];

        return [
            // ── 1. MISK - PREMIER 20-20-20 ──
            [
                'category_id' => $categoryId,
                'name_ar' => 'مسك - بريمير 20-20-20',
                'name_en' => 'MISK - PREMIER 20-20-20',
                'active_ingredient' => '20 - 20 - 20',
                'package_sizes_en' => '1 kg, 10 kg, 25 kg, 50 kg',
                'package_sizes_ar' => '1 كجم, 10 كجم, 25 كجم, 50 كجم',
                'short_description_ar' => 'سماد ذواب يحتوي على النيتروجين والفوسفور والبوتاسيوم',
                'short_description_en' => 'A water-soluble fertilizer containing nitrogen, phosphorus, and potassium.',
                'properties_ar' => 'سماد ذواب يحتوي على النيتروجين والفوسفور والبوتاسيوم',
                'properties_en' => 'A water-soluble fertilizer containing nitrogen, phosphorus, and potassium.',
                'application_rates_type' => 'table',
                'application_rates_has_notes' => false,
                'application_rates_rows' => $standardTableNoNotes,
                'application_rates_footer_ar' => 'للرش الورقي: 2-3 كجم / 1000 لتر ماء / هكتار',
                'application_rates_footer_en' => 'For foliar spray: 2–3 kg / 1000 liters of water / hectare',
                'application_rates_text_ar' => null,
                'application_rates_text_en' => null,
            ],

            // ── 2. MISK - PREMIER 40-0-4 ──
            [
                'category_id' => $categoryId,
                'name_ar' => 'مسك - بريمير 40-0-4',
                'name_en' => 'MISK - PREMIER 40-0-4',
                'active_ingredient' => '40 - 0 - 4',
                'package_sizes_en' => '1 kg, 10 kg, 25 kg, 50 kg',
                'package_sizes_ar' => '1 كجم, 10 كجم, 25 كجم, 50 كجم',
                'short_description_ar' => 'سماد ذواب يحتوي على النيتروجين والبوتاسيوم',
                'short_description_en' => 'A water-soluble fertilizer containing nitrogen and potassium.',
                'properties_ar' => 'سماد ذواب يحتوي على النيتروجين والبوتاسيوم',
                'properties_en' => 'A water-soluble fertilizer containing nitrogen and potassium.',
                'application_rates_type' => 'table',
                'application_rates_has_notes' => false,
                'application_rates_rows' => $standardTableNoNotes,
                'application_rates_footer_ar' => 'للرش الورقي: 2-3 كجم / 1000 لتر ماء / هكتار',
                'application_rates_footer_en' => 'For foliar spray: 2–3 kg / 1000 liters of water / hectare',
                'application_rates_text_ar' => null,
                'application_rates_text_en' => null,
            ],

            // ── 3. Nop Green NPK 13-5-40 ──
            [
                'category_id' => $categoryId,
                'name_ar' => 'نوب جرين',
                'name_en' => 'Nop Green',
                'active_ingredient' => 'NPK: 13 - 5 - 40',
                'package_sizes_en' => '1 kg, 10 kg, 25 kg, 50 kg',
                'package_sizes_ar' => '1 كجم, 10 كجم, 25 كجم, 50 كجم',
                'short_description_ar' => 'سماد ذواب يحتوي على البوتاسيوم والفوسفور والنيتروجين',
                'short_description_en' => 'A water-soluble fertilizer containing potassium, nitrogen, and phosphorus.',
                'properties_ar' => "سماد ذواب يحتوي على البوتاسيوم والفوسفور والنيتروجين.\nالبوتاسيوم: مهم في مراحل النمو المختلفة وخاصة مرحلة الإثمار لزيادة حجم الثمار والإنتاجية.\nالفوسفور: مهم في مراحل النمو المختلفة وخاصة المراحل الأولى لعمر النباتات لتكوين ونمو الجذور واستطالتها، وكذلك مرحلة التزهير لزيادة نسبة الأزهار.\nالنيتروجين: مهم في مراحل النمو المختلفة وخاصة المراحل الأولى من عمر النباتات لزيادة النمو الخضري.",
                'properties_en' => "A water-soluble fertilizer containing potassium, nitrogen, and phosphorus.\nPotassium: Important during various growth stages, especially during the fruiting stage, to increase fruit size and productivity.\nPhosphorus: Important during different growth stages, particularly in the early stages of plant life for root formation, growth, and elongation, and during the flowering stage to increase the flowering rate.\nNitrogen: Important during various growth stages, especially in the early stages of plant growth, to enhance vegetative growth.",
                'application_rates_type' => 'table',
                'application_rates_has_notes' => true,
                'application_rates_rows' => [
                    ['crop_ar' => 'القمح - الشعير', 'crop_en' => 'Wheat – Barley', 'rate_ar' => '4 - 6 لتر/هكتار', 'rate_en' => '4 – 6 liters/hectare', 'notes_ar' => 'يعطى ثلاث دفعات بداية ظهور السنابل', 'notes_en' => 'Three irrigation cycles are required from the beginning of the ear of grain.'],
                    ['crop_ar' => 'محاصيل الأعلاف', 'crop_en' => 'Forage crops', 'rate_ar' => '4 - 6 لتر/هكتار', 'rate_en' => '4 – 6 liters/hectare', 'notes_ar' => 'يعطى ثلاث دفعات بالموسم بعد الحصاد', 'notes_en' => 'Three irrigation cycles are given per season after harvest.'],
                    ['crop_ar' => 'الخضروات المكشوفة', 'crop_en' => 'Open-field vegetables', 'rate_ar' => '5 - 7 لتر/هكتار', 'rate_en' => '5 – 7 liters/hectare', 'notes_ar' => 'تضاف مرحلة تطور الثمار', 'notes_en' => 'Fruit development stage added.'],
                    ['crop_ar' => 'البطاطس', 'crop_en' => 'Potato', 'rate_ar' => '5 - 7 لتر/هكتار', 'rate_en' => '5 – 7 liters/hectare', 'notes_ar' => 'يعطى بعد تحضين البطاطس', 'notes_en' => 'It is given after the potatoes have been incubated.'],
                    ['crop_ar' => 'زراعات البيوت المحمية', 'crop_en' => 'Greenhouse crops', 'rate_ar' => '1 - 2 كجم / 1000 م²', 'rate_en' => '1–2 kg / 1000 m²', 'notes_ar' => 'تعطى مرة واحدة اسبوعيا خلال مرحلة تطور الثمار', 'notes_en' => 'Give once a week during the fruit development stage.'],
                    ['crop_ar' => 'أشجار الفاكهة والنخيل', 'crop_en' => 'Fruit trees and Palm', 'rate_ar' => '6 - 8 لتر/هكتار', 'rate_en' => '6 – 8 liters/hectare', 'notes_ar' => 'تعطى مرة واحدة شهريا خلال مرحلة تطور الثمار', 'notes_en' => 'Give once a month during the fruit development stage.'],
                    ['crop_ar' => 'نباتات الزينة والمسطحات الخضراء', 'crop_en' => 'Ornamental plants and turfgrass', 'rate_ar' => '3 - 4 لتر/هكتار', 'rate_en' => '3 – 4 liters/hectare', 'notes_ar' => 'تضاف عند الحاجة أو مرة كل شهرين', 'notes_en' => 'Add as needed or once every two months.'],
                ],
                'application_rates_footer_ar' => 'للرش الورقي: 2-3 كجم / 1000 لتر ماء / هكتار',
                'application_rates_footer_en' => 'For foliar spray: 2–3 kg / 1000 liters of water / hectare',
                'application_rates_text_ar' => null,
                'application_rates_text_en' => null,
            ],

            // ── 4. MISK 0-0-50+1% MgO+18% S ──
            [
                'category_id' => $categoryId,
                'name_ar' => 'مسك 0-0-50+1% MgO+18% S',
                'name_en' => 'MISK 0-0-50+1% MgO+18% S',
                'active_ingredient' => '0 - 0 - 50 + 1% MgO + 18% S',
                'package_sizes_en' => '1 kg, 10 kg, 25 kg, 50 kg',
                'package_sizes_ar' => '1 كجم, 10 كجم, 25 كجم, 50 كجم',
                'short_description_ar' => 'سماد ذواب يحتوي على البوتاسيوم والكبريت والماغنيسيوم',
                'short_description_en' => 'A water-soluble fertilizer containing potassium, sulfur, and magnesium.',
                'properties_ar' => "سماد ذواب يحتوي على البوتاسيوم والكبريت والماغنيسيوم.\nمهم في مراحل النمو المختلفة وخاصة مرحلة الإثمار لزيادة حجم الثمار والإنتاجية.",
                'properties_en' => "A water-soluble fertilizer containing potassium, sulfur, and magnesium.\nIt is important during various growth stages, especially the fruiting stage, to increase fruit size and productivity.",
                'application_rates_type' => 'table',
                'application_rates_has_notes' => true,
                'application_rates_rows' => [
                    ['crop_ar' => 'القمح - الشعير', 'crop_en' => 'Wheat – Barley', 'rate_ar' => '4 - 6 لتر/هكتار', 'rate_en' => '4 – 6 liters/hectare', 'notes_ar' => 'يعطى ثلاث دفعات بداية ظهور السنابل', 'notes_en' => 'Three irrigation cycles are required from the beginning of the ear of grain.'],
                    ['crop_ar' => 'محاصيل الأعلاف', 'crop_en' => 'Forage crops', 'rate_ar' => '4 - 6 لتر/هكتار', 'rate_en' => '4 – 6 liters/hectare', 'notes_ar' => 'يعطى ثلاث دفعات بالموسم بعد الحصاد', 'notes_en' => 'Three irrigation cycles are given per season after harvest.'],
                    ['crop_ar' => 'الخضروات المكشوفة', 'crop_en' => 'Open-field vegetables', 'rate_ar' => '5 - 7 لتر/هكتار', 'rate_en' => '5 – 7 liters/hectare', 'notes_ar' => 'تضاف مرحلة تطور الثمار', 'notes_en' => 'Fruit development stage added.'],
                    ['crop_ar' => 'البطاطس', 'crop_en' => 'Potato', 'rate_ar' => '5 - 7 لتر/هكتار', 'rate_en' => '5 – 7 liters/hectare', 'notes_ar' => 'يعطى بعد تحضين البطاطس', 'notes_en' => 'It is given after the potatoes have been incubated.'],
                    ['crop_ar' => 'زراعات البيوت المحمية', 'crop_en' => 'Greenhouse crops', 'rate_ar' => '1 - 2 كجم / 1000 م²', 'rate_en' => '1–2 kg / 1000 m²', 'notes_ar' => 'تعطى مرة واحدة اسبوعيا خلال مرحلة تطور الثمار', 'notes_en' => 'Give once a week during the fruit development stage.'],
                    ['crop_ar' => 'أشجار الفاكهة', 'crop_en' => 'Fruit trees', 'rate_ar' => '6 - 8 لتر/هكتار', 'rate_en' => '6 – 8 liters/hectare', 'notes_ar' => 'تعطى مرة واحدة شهريا خلال مرحلة تطور الثمار', 'notes_en' => 'Give once a month during the fruit development stage.'],
                    ['crop_ar' => 'النخيل', 'crop_en' => 'Palm', 'rate_ar' => '5 - 8 لتر/هكتار', 'rate_en' => '5 – 8 liters/hectare', 'notes_ar' => 'تضاف عند الحاجة أو مرة كل شهرين', 'notes_en' => 'Add as needed or once every two months.'],
                ],
                'application_rates_footer_ar' => 'للرش الورقي: 2-3 كجم / 1000 لتر ماء / هكتار',
                'application_rates_footer_en' => 'For foliar spray: 2–3 kg / 1000 liters of water / hectare',
                'application_rates_text_ar' => null,
                'application_rates_text_en' => null,
            ],

            // ── 5. MISK 0-52-34+1% MgO ──
            [
                'category_id' => $categoryId,
                'name_ar' => 'مسك 0-52-34+1% MgO',
                'name_en' => 'MISK 0-52-34+1% MgO',
                'active_ingredient' => '0 - 52 - 34 + 1% MgO',
                'package_sizes_en' => '1 kg, 10 kg, 25 kg, 50 kg',
                'package_sizes_ar' => '1 كجم, 10 كجم, 25 كجم, 50 كجم',
                'short_description_ar' => 'سماد ذواب يحتوي على الفوسفور والبوتاسيوم والماغنيسيوم',
                'short_description_en' => 'A water-soluble fertilizer containing phosphorus, potassium, and magnesium.',
                'properties_ar' => 'سماد ذواب يحتوي على الفوسفور والبوتاسيوم والماغنيسيوم',
                'properties_en' => 'A water-soluble fertilizer containing phosphorus, potassium, and magnesium.',
                'application_rates_type' => 'table',
                'application_rates_has_notes' => true,
                'application_rates_rows' => [
                    ['crop_ar' => 'القمح - الشعير', 'crop_en' => 'Wheat – Barley', 'rate_ar' => '4 - 6 لتر/هكتار', 'rate_en' => '4 – 6 liters/hectare', 'notes_ar' => 'يعطى بعد الزراعة بداية التفريع', 'notes_en' => 'Apply after planting at the beginning of tillering.'],
                    ['crop_ar' => 'محاصيل الأعلاف', 'crop_en' => 'Forage crops', 'rate_ar' => '4 - 6 لتر/هكتار', 'rate_en' => '4 – 6 liters/hectare', 'notes_ar' => 'يعطى بعد الحصاد بأسبوع', 'notes_en' => 'Apply one week after harvest.'],
                    ['crop_ar' => 'الخضروات المكشوفة', 'crop_en' => 'Open-field vegetables', 'rate_ar' => '5 - 7 لتر/هكتار', 'rate_en' => '5 – 7 liters/hectare', 'notes_ar' => 'تضاف بعد الزراعة وقبل التزهار', 'notes_en' => 'Apply after planting and before flowering.'],
                    ['crop_ar' => 'زراعات البيوت المحمية', 'crop_en' => 'Greenhouse crops', 'rate_ar' => '1 - 2 كجم / 1000 م²', 'rate_en' => '1–2 kg / 1000 m²', 'notes_ar' => 'تضاف بعد الزراعة وقبل التزهار', 'notes_en' => 'Apply after planting and before flowering.'],
                    ['crop_ar' => 'أشجار الفاكهة والنخيل', 'crop_en' => 'Fruit trees and palm trees', 'rate_ar' => '6 - 8 لتر/هكتار', 'rate_en' => '6 – 8 liters/hectare', 'notes_ar' => 'تعطى دفعتين خلال التزهار والعقد', 'notes_en' => 'Apply in two doses during flowering and fruit set.'],
                    ['crop_ar' => 'نباتات الزينة والمسطحات الخضراء', 'crop_en' => 'Ornamental plants and turfgrass', 'rate_ar' => '3 - 4 لتر/هكتار', 'rate_en' => '3 – 4 liters/hectare', 'notes_ar' => 'تضاف عند الحاجة أو مرة كل شهرين', 'notes_en' => 'Apply as needed or once every two months.'],
                ],
                'application_rates_footer_ar' => 'للرش الورقي: 2-3 كجم / 1000 لتر ماء / هكتار',
                'application_rates_footer_en' => 'For foliar spray: 2–3 kg / 1000 liters of water / hectare',
                'application_rates_text_ar' => null,
                'application_rates_text_en' => null,
            ],

            // ── 6. MISK 12-60-0+1MgO ──
            [
                'category_id' => $categoryId,
                'name_ar' => 'مسك 12-60-0+1MgO',
                'name_en' => 'MISK 12-60-0+1MgO',
                'active_ingredient' => '12 - 60 - 0 + 1MgO',
                'package_sizes_en' => '1 kg, 10 kg, 25 kg, 50 kg',
                'package_sizes_ar' => '1 كجم, 10 كجم, 25 كجم, 50 كجم',
                'short_description_ar' => 'سماد ذواب يحتوي علي نسب عالية من الفوسفور و النتروجين و الماغنيسيوم.',
                'short_description_en' => 'A water-soluble fertilizer containing high levels of phosphorus, nitrogen, and magnesium.',
                'properties_ar' => 'سماد ذواب يحتوي علي نسب عالية من الفوسفور و النتروجين و الماغنيسيوم.',
                'properties_en' => 'A water-soluble fertilizer containing high levels of phosphorus, nitrogen, and magnesium.',
                'application_rates_type' => 'table',
                'application_rates_has_notes' => true,
                'application_rates_rows' => [
                    ['crop_ar' => 'القمح - الشعير', 'crop_en' => 'Wheat – Barley', 'rate_ar' => '4 - 6 لتر/هكتار', 'rate_en' => '4 – 6 liters/hectare', 'notes_ar' => 'استخدم بعد الانبات وعند مرحلة التفريع', 'notes_en' => 'Use after germination and at the tillering stage.'],
                    ['crop_ar' => 'محاصيل الأعلاف', 'crop_en' => 'Forage crops', 'rate_ar' => '4 - 6 لتر/هكتار', 'rate_en' => '4 – 6 liters/hectare', 'notes_ar' => 'تعطي مرة واحدة بعد 7-10 أيام من كل قطفة', 'notes_en' => 'Apply once, 7–10 days after each cutting.'],
                    ['crop_ar' => 'الخضروات المكشوفة', 'crop_en' => 'Open-field vegetables', 'rate_ar' => '5 - 7 لتر/هكتار', 'rate_en' => '5 – 7 liters/hectare', 'notes_ar' => 'استخدم بعد زراعة الشتول وعند مرحلة الازهار', 'notes_en' => 'Use after transplanting and at the flowering stage.'],
                    ['crop_ar' => 'زراعات البيوت المحمية', 'crop_en' => 'Greenhouse crops', 'rate_ar' => '1 - 2 كجم / 1000 م²', 'rate_en' => '1–2 kg / 1000 m²', 'notes_ar' => 'استخدم بعد زراعة الشتول وعند مرحلة الازهار', 'notes_en' => 'Use after transplanting and at the flowering stage.'],
                    ['crop_ar' => 'أشجار الفاكهة والنخيل', 'crop_en' => 'Fruit trees and palm trees', 'rate_ar' => '6 - 8 لتر/هكتار', 'rate_en' => '6 – 8 liters/hectare', 'notes_ar' => 'تضاف دفعة واحدة كل اسبوعين خلال الازهار و العقد', 'notes_en' => 'Apply in one dose every two weeks during flowering and fruit set.'],
                    ['crop_ar' => 'نباتات الزينة والمسطحات الخضراء', 'crop_en' => 'Ornamental plants and turfgrass', 'rate_ar' => '3 - 4 لتر/هكتار', 'rate_en' => '3 – 4 liters/hectare', 'notes_ar' => 'استخدم قبل الازهار ، تعطي بعد الزراعة للمروج', 'notes_en' => 'Use before flowering; for turf, apply after planting.'],
                ],
                'application_rates_footer_ar' => 'للرش الورقي: 2-3 كجم / 1000 لتر ماء / هكتار',
                'application_rates_footer_en' => 'For foliar spray: 2–3 kg / 1000 liters of water / hectare',
                'application_rates_text_ar' => null,
                'application_rates_text_en' => null,
            ],

            // ── 7. MISK 21 N + 1MgO + 24 S ──
            [
                'category_id' => $categoryId,
                'name_ar' => 'مسك 21 N + 1MgO + 24 S',
                'name_en' => 'MISK 21 N + 1MgO + 24 S',
                'active_ingredient' => '21 N + 1MgO + 24 S',
                'package_sizes_en' => '1 kg, 10 kg, 25 kg, 50 kg',
                'package_sizes_ar' => '1 كجم, 10 كجم, 25 كجم, 50 كجم',
                'short_description_ar' => 'سماد ذواب يحتوي علي النتروجين و الماغنيسيوم و الكبريت',
                'short_description_en' => 'A water-soluble fertilizer containing nitrogen, magnesium, and sulfur.',
                'properties_ar' => 'سماد ذواب يحتوي علي النتروجين و الماغنيسيوم و الكبريت',
                'properties_en' => 'A water-soluble fertilizer containing nitrogen, magnesium, and sulfur.',
                'application_rates_type' => 'table',
                'application_rates_has_notes' => true,
                'application_rates_rows' => [
                    ['crop_ar' => 'القمح - الشعير - ذرة', 'crop_en' => 'Wheat – Barley - Corn', 'rate_ar' => '4 - 6 لتر/هكتار', 'rate_en' => '4 – 6 liters/hectare', 'notes_ar' => 'تعطى ثلاث دفعات خلال مراحل النمو الخضري', 'notes_en' => 'Apply in three split doses during the vegetative growth stages.'],
                    ['crop_ar' => 'محاصيل الأعلاف', 'crop_en' => 'Forage crops', 'rate_ar' => '4 - 6 لتر/هكتار', 'rate_en' => '4 – 6 liters/hectare', 'notes_ar' => 'تضاف مرة في الاسبوع', 'notes_en' => 'Apply once a week.'],
                    ['crop_ar' => 'الخضروات المكشوفة و البطاطس', 'crop_en' => 'Open-field vegetables and potatoes', 'rate_ar' => '5 - 7 لتر/هكتار', 'rate_en' => '5 – 7 liters/hectare', 'notes_ar' => 'تعطي مرتين أسبوعيا خلال مراحل النمو الخضري', 'notes_en' => 'Apply twice a week during the vegetative growth stages.'],
                    ['crop_ar' => 'زراعات البيوت المحمية', 'crop_en' => 'Greenhouse crops', 'rate_ar' => '1 - 2 كجم / 1000 م²', 'rate_en' => '1–2 kg / 1000 m²', 'notes_ar' => 'تعطي ثلاث مرات أسبوعيا خلال مراحل النمو الخضري', 'notes_en' => 'Apply three times a week during the vegetative growth stages.'],
                    ['crop_ar' => 'أشجار الفاكهة والنخيل', 'crop_en' => 'Fruit trees and palm trees', 'rate_ar' => '6 - 8 لتر/هكتار', 'rate_en' => '6 – 8 liters/hectare', 'notes_ar' => 'حسب حجم الشجرة تضاف شهريا للنمو الخضري', 'notes_en' => 'According to tree size, apply monthly during the vegetative growth stage.'],
                    ['crop_ar' => 'نباتات الزينة والمسطحات الخضراء', 'crop_en' => 'Ornamental plants and turfgrass', 'rate_ar' => '3 - 4 لتر/هكتار', 'rate_en' => '3 – 4 liters/hectare', 'notes_ar' => 'تعطي مرة واحدة كل اسبوعين', 'notes_en' => 'Apply once every two weeks.'],
                ],
                'application_rates_footer_ar' => 'للرش الورقي: 2-3 كجم / 1000 لتر ماء / هكتار',
                'application_rates_footer_en' => 'For foliar spray: 2–3 kg / 1000 liters of water / hectare',
                'application_rates_text_ar' => null,
                'application_rates_text_en' => null,
            ],

            // ── 8. Amino Green 50% ──
            [
                'category_id' => $categoryId,
                'name_ar' => 'أمينو جرين 50%',
                'name_en' => 'Amino Green 50%',
                'active_ingredient' => 'PLANT AMINO ACID 50% - NITROGEN 16%',
                'package_sizes_en' => '1 kg, 10 kg, 20 kg, 50 kg',
                'package_sizes_ar' => '1 كجم, 10 كجم, 20 كجم, 50 كجم',
                'short_description_ar' => 'منشط حيوي للنبات، يحتوي على الاحماض الامينية النباتية الحرة اضافة الى النتروجين',
                'short_description_en' => 'A plant stimulant containing free plant amino acids and nitrogen.',
                'properties_ar' => 'منشط حيوي للنبات، يحتوي على الاحماض الامينية النباتية الحرة اضافة الى النتروجين وتساهم الاحماض الامينية في تحمل النبات للظروف البيئية القاسية مثل الإجهاد المائي (الجفاف) والتغيرات المناخية، والملوثات. ووجود النتروجين في المنتج يعمل على زيادة المجموع الخضري.',
                'properties_en' => "A plant stimulant containing free plant amino acids and nitrogen. The amino acids contribute to the plant's tolerance to harsh environmental conditions such as water stress (drought), climate change, and pollutants. The nitrogen in the product promotes increased vegetative growth.",
                'application_rates_type' => 'text',
                'application_rates_has_notes' => false,
                'application_rates_rows' => null,
                'application_rates_footer_ar' => null,
                'application_rates_footer_en' => null,
                'application_rates_text_ar' => "هذه المعدلات استرشادية تختلف حسب تحليل التربة والمياه، ونوع النبات ومراحل النمو، وتكرر حسب البرنامج التسميدي: يستخدم لجميع المحاصيل الحقلية و الاعلاف والخضراوات المكشوفة والمحمية وأشجار الفاكهة ونباتات الزينة و المسطحات الخضراء بمعدل :\n1 - 1.5 كجم / 1000لتر ماء / هكتار في حال الرش الورقي\n2.5 - 3.5 كجم / هكتار في حال الري الأرضي",
                'application_rates_text_en' => "These rates are guidelines and vary depending on soil and water analysis, plant type, and growth stage. Application is repeated according to the fertilization program. Suitable for all field crops, fodder, open-field and greenhouse vegetables, fruit trees, ornamental plants, and lawns at the following rates:\n1-1.5 kg/1000 liters of water/hectare for foliar application\n2.5-3.5 kg/hectare for ground irrigation",
            ],

            // ── 9. Humi Green ──
            [
                'category_id' => $categoryId,
                'name_ar' => 'هيومي جرين',
                'name_en' => 'Humi Green',
                'active_ingredient' => '65 Humic + 15 Fulvic + 10 K2O',
                'package_sizes_en' => '1 kg, 10 kg, 25 kg, 50 kg',
                'package_sizes_ar' => '1 كجم, 10 كجم, 25 كجم, 50 كجم',
                'short_description_ar' => 'سماد عضوي يحتوي على أحماض الهيوميك والفولفيك مستخرج من صخور الليونارديت الطبيعية',
                'short_description_en' => 'An organic fertilizer containing humic and fulvic acids extracted from natural leonardite rocks.',
                'properties_ar' => 'سماد عضوي يحتوي على أحماض الهيوميك والفولفيك مستخرج من صخور الليونارديت الطبيعية، له دور في تحسين خواص التربة الفيزيائية والكيميائية والحيوية مما يساهم في زيادة تيسر العناصر الغذائية للنباتات وزيادة الإنتاجية',
                'properties_en' => 'An organic fertilizer containing humic and fulvic acids extracted from natural leonardite rocks, which helps improve the physical, chemical, and biological properties of the soil, thereby enhancing nutrient availability to plants and increasing productivity.',
                'application_rates_type' => 'text',
                'application_rates_has_notes' => false,
                'application_rates_rows' => null,
                'application_rates_footer_ar' => null,
                'application_rates_footer_en' => null,
                'application_rates_text_ar' => "هذه المعدلات استرشادية تختلف حسب تحليل التربة والمياه، ونوع النبات ومراحل النمو، وتكرر حسب البرنامج التسميدي:\nيستخدم بمعدل : 2 - 4 كجم / هكتار مع مياه الري لجميع المحاصيل الحقلية ،الاعلاف ،الخضراوات المكشوفة والمحمية ،اشجار الفاكهة ،نباتات الزينة و المسطحات الخضراء",
                'application_rates_text_en' => "These rates are for guidance only and may vary depending on soil and water analysis, plant type, and growth stages, and are repeated according to the fertilization program:\nUsed at a rate of 2–4 kg/ha with irrigation water for all field crops, forages, open-field and protected vegetables, fruit trees, ornamental plants, and turfgrass.",
            ],

            // ── 10. Micro Special ──
            [
                'category_id' => $categoryId,
                'name_ar' => 'مايكروسبيشال',
                'name_en' => 'Micro Special',
                'active_ingredient' => 'Soluble Fertilizer',
                'package_sizes_en' => '1 kg',
                'package_sizes_ar' => '1 كجم',
                'short_description_ar' => 'سماد ذواب يحتوي علي النيتروجين والبوتاسيوم',
                'short_description_en' => 'Soluble fertilizer containing nitrogen and potassium',
                'properties_ar' => 'سماد ذواب يحتوي علي النيتروجين والبوتاسيوم',
                'properties_en' => 'Soluble fertilizer containing nitrogen and potassium',
                'application_rates_type' => 'table',
                'application_rates_has_notes' => true,
                'application_rates_rows' => [
                    ['crop_ar' => 'المحاصيل الحقلية و الاعلاف', 'crop_en' => 'Forage crops', 'rate_ar' => '0.5 - 1 كجم / 1000 لتر ماء / هكتار', 'rate_en' => '0.5 - 1 kg / 1000 liters of water / hectare', 'notes_ar' => '2 كجم / هكتار (ري أرضي)', 'notes_en' => '2kg / Hectare (Ground application)'],
                    ['crop_ar' => 'الخضروات المحمية و المكشوفة', 'crop_en' => 'Protected and exposed vegetables', 'rate_ar' => '0.5 - 1 كجم / 1000 لتر ماء / هكتار', 'rate_en' => '0.5 - 1 kg / 1000 liters of water / hectare', 'notes_ar' => '2 كجم / هكتار (ري أرضي)', 'notes_en' => '2kg / Hectare (Ground application)'],
                    ['crop_ar' => 'زراعات البيوت المحمية', 'crop_en' => 'Greenhouse crops', 'rate_ar' => '0.5 - 1 كجم / 1000 لتر ماء / هكتار', 'rate_en' => '0.5 - 1 kg / 1000 liters of water / hectare', 'notes_ar' => '2 كجم / هكتار (ري أرضي)', 'notes_en' => '2kg / Hectare (Ground application)'],
                    ['crop_ar' => 'نباتات الزينة والمسطحات الخضراء', 'crop_en' => 'Ornamental plants and turfgrass', 'rate_ar' => '0.5 - 1 كجم / 1000 لتر ماء / هكتار', 'rate_en' => '0.5 - 1 kg / 1000 liters of water / hectare', 'notes_ar' => '2 كجم / هكتار (ري أرضي)', 'notes_en' => '2kg / Hectare (Ground application)'],
                ],
                'application_rates_footer_ar' => null,
                'application_rates_footer_en' => null,
                'application_rates_text_ar' => null,
                'application_rates_text_en' => null,
            ],
        ];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function granularProducts(int $categoryId): array
    {
        $standardGranularTable = [
            ['crop_ar' => 'المحاصيل الحقلية', 'crop_en' => 'Field crops', 'rate_ar' => '150 - 300 كجم / هكتار', 'rate_en' => '150–300 kg/ha', 'notes_ar' => 'تضاف نثراً بمعدل 150 - 300 كجم / هكتار.', 'notes_en' => 'Apply by broadcasting at a rate of 150–300 kg/ha.'],
            ['crop_ar' => 'البيوت المحمية', 'crop_en' => 'Greenhouses', 'rate_ar' => '15 - 30 كجم / 1000م2', 'rate_en' => '15–30 kg/1000 m²', 'notes_ar' => 'تضاف نثراً بمعدل من 15 - 30 كجم / 1000م2', 'notes_en' => 'Apply by broadcasting at a rate of 15–30 kg/1000 m².'],
            ['crop_ar' => 'المحاصيل البستانية', 'crop_en' => 'Horticultural crops', 'rate_ar' => '0.25 - 1 كجم / شجرة', 'rate_en' => '0.25–1 kg/tree', 'notes_ar' => 'تضاف نثراً للشجرة حسب عمرها من 0.25 - 1 كجم / شجرة', 'notes_en' => 'Apply by broadcasting around each tree according to its age at a rate of 0.25–1 kg/tree.'],
            ['crop_ar' => 'النخيل', 'crop_en' => 'Palm trees', 'rate_ar' => '0.5 - 1 كجم / نخلة', 'rate_en' => '0.5–1 kg/palm tree', 'notes_ar' => 'حسب العمر: تضاف نثراً بمعدل من 0.5 - 1 كجم / نخلة', 'notes_en' => 'According to age: apply by broadcasting at a rate of 0.5–1 kg/palm tree.'],
        ];

        return [
            // ── 1. MISK - GREEN FARM 12-12-17 ──
            [
                'category_id' => $categoryId,
                'name_ar' => 'مسك - جرين فارم 12-12-17',
                'name_en' => 'MISK - GREEN FARM 12-12-17',
                'active_ingredient' => '12 - 12 - 17',
                'package_sizes_en' => '1 kg, 10 kg, 25 kg, 50 kg',
                'package_sizes_ar' => '1 كجم, 10 كجم, 25 كجم, 50 كجم',
                'short_description_ar' => 'سماد محبب يحتوي علي النيتروجين والفوسفور والبوتاسيوم',
                'short_description_en' => 'A granular fertilizer containing nitrogen, phosphorus, and potassium.',
                'properties_ar' => 'سماد محبب يحتوي علي النيتروجين والفوسفور والبوتاسيوم',
                'properties_en' => 'A granular fertilizer containing nitrogen, phosphorus, and potassium.',
                'application_rates_type' => 'table',
                'application_rates_has_notes' => true,
                'application_rates_rows' => $standardGranularTable,
                'application_rates_footer_ar' => 'للرش الورقي : 2-3 كجم / 1000 لتر ماء / هكتار',
                'application_rates_footer_en' => 'For foliar spray: 2–3 kg / 1000 liters of water / hectare',
                'application_rates_text_ar' => null,
                'application_rates_text_en' => null,
            ],

            // ── 2. MISK - GREEN FARM 18-18-5 ──
            [
                'category_id' => $categoryId,
                'name_ar' => 'مسك - جرين فارم 18-18-5',
                'name_en' => 'MISK - GREEN FARM 18-18-5',
                'active_ingredient' => '18 - 18 - 5',
                'package_sizes_en' => '1 kg, 10 kg, 25 kg, 50 kg',
                'package_sizes_ar' => '1 كجم, 10 كجم, 25 كجم, 50 كجم',
                'short_description_ar' => 'سماد محبب يحتوي علي النيتروجين والفوسفور والبوتاسيوم',
                'short_description_en' => 'A granular fertilizer containing nitrogen, phosphorus, and potassium.',
                'properties_ar' => 'سماد محبب يحتوي علي النيتروجين والفوسفور والبوتاسيوم',
                'properties_en' => 'A granular fertilizer containing nitrogen, phosphorus, and potassium.',
                'application_rates_type' => 'table',
                'application_rates_has_notes' => true,
                'application_rates_rows' => $standardGranularTable,
                'application_rates_footer_ar' => 'للرش الورقي : 2-3 كجم / 1000 لتر ماء / هكتار',
                'application_rates_footer_en' => 'For foliar spray: 2–3 kg / 1000 liters of water / hectare',
                'application_rates_text_ar' => null,
                'application_rates_text_en' => null,
            ],

            // ── 3. MISK - GREEN FARM 15-15-15+4%MgO ──
            [
                'category_id' => $categoryId,
                'name_ar' => 'مسك - جرين فارم 15-15-15+4%MgO',
                'name_en' => 'MISK - GREEN FARM 15-15-15+4%MgO',
                'active_ingredient' => '15 - 15 - 15 + 4% MgO',
                'package_sizes_en' => '1 kg, 10 kg, 25 kg, 50 kg',
                'package_sizes_ar' => '1 كجم, 10 كجم, 25 كجم, 50 كجم',
                'short_description_ar' => 'سماد محبب يحتوي علي النيتروجين والفوسفور والمغنيسيوم',
                'short_description_en' => 'A granular fertilizer containing nitrogen, phosphorus, and magnesium.',
                'properties_ar' => 'سماد محبب يحتوي علي النيتروجين والفوسفور والمغنيسيوم',
                'properties_en' => 'A granular fertilizer containing nitrogen, phosphorus, and magnesium.',
                'application_rates_type' => 'table',
                'application_rates_has_notes' => true,
                'application_rates_rows' => $standardGranularTable,
                'application_rates_footer_ar' => 'للرش الورقي : 2-3 كجم / 1000 لتر ماء / هكتار',
                'application_rates_footer_en' => 'For foliar spray: 2–3 kg / 1000 liters of water / hectare',
                'application_rates_text_ar' => null,
                'application_rates_text_en' => null,
            ],

            // ── 4. MISK 0-0-50+1%MgO+18%S (Granular) ──
            [
                'category_id' => $categoryId,
                'name_ar' => 'مسك 0-0-50+1%MgO+18%S (محبب)',
                'name_en' => 'MISK 0-0-50+1%MgO+18%S (Granular)',
                'active_ingredient' => '0 - 0 - 50 + 1% MgO + 18% S',
                'package_sizes_en' => '1 kg, 10 kg, 25 kg, 50 kg',
                'package_sizes_ar' => '1 كجم, 10 كجم, 25 كجم, 50 كجم',
                'short_description_ar' => 'سماد محبب يحتوي علي البوتاسيوم والكبريت والمغنيسيوم',
                'short_description_en' => 'Granulated fertilizer containing potassium, sulfur, and magnesium',
                'properties_ar' => 'سماد محبب يحتوي علي البوتاسيوم والكبريت والمغنيسيوم',
                'properties_en' => 'Granulated fertilizer containing potassium, sulfur, and magnesium',
                'application_rates_type' => 'table',
                'application_rates_has_notes' => true,
                'application_rates_rows' => [
                    ['crop_ar' => 'القمح والشعير', 'crop_en' => 'Wheat and barley', 'rate_ar' => '150 - 300 كجم / هكتار', 'rate_en' => '150–300 kg/hectare', 'notes_ar' => 'تضاف مع البذار او فيما بعده', 'notes_en' => 'Added with the seeds or afterward.'],
                    ['crop_ar' => 'محاصيل الأعلاف', 'crop_en' => 'Forage crops', 'rate_ar' => '150 - 300 كجم / هكتار', 'rate_en' => '150–300 kg/hectare', 'notes_ar' => 'يعطى 2-3 دفعات بالموسم بعد الحصاد', 'notes_en' => 'Give 2-3 applications per season after harvest.'],
                    ['crop_ar' => 'الخضروات المكشوفة', 'crop_en' => 'Open-field vegetables', 'rate_ar' => '150 - 300 كجم / هكتار', 'rate_en' => '150–300 kg/hectare', 'notes_ar' => 'تضاف في مرحلة تطور الثمار', 'notes_en' => 'Given during fruit development.'],
                    ['crop_ar' => 'البطاطس', 'crop_en' => 'Potatoes', 'rate_ar' => '150 - 300 كجم / هكتار', 'rate_en' => '150–300 kg/hectare', 'notes_ar' => 'يعطى بعد تحضين البطاطس', 'notes_en' => 'Given after potato incubation.'],
                    ['crop_ar' => 'زراعات البيوت المحمية', 'crop_en' => 'Greenhouse crops', 'rate_ar' => '15 - 30 كجم / 1000 م2', 'rate_en' => '15–30 kg/1000 m²', 'notes_ar' => 'تعطى مرة واحدة قبل الزراعة', 'notes_en' => 'Given once before planting.'],
                    ['crop_ar' => 'أشجار الفاكهة', 'crop_en' => 'Fruit trees', 'rate_ar' => '0.25 - 1 كجم / شجرة', 'rate_en' => '0.25–1 kg/tree', 'notes_ar' => 'حسب عمر الشجرة تعطي خلال مرحلة تطور الثمار', 'notes_en' => 'Given during fruit development depending on tree age.'],
                    ['crop_ar' => 'النخيل', 'crop_en' => 'Palm trees', 'rate_ar' => '5 - 10 كجم / شجرة', 'rate_en' => '5–10 kg/tree', 'notes_ar' => 'حسب عمر النخلة تعطي خلال مرحلة تطور الثمار', 'notes_en' => 'Given during fruit development depending on palm age.'],
                ],
                'application_rates_footer_ar' => 'للرش الورقي: 2-3 كجم / 1000 لتر ماء / هكتار',
                'application_rates_footer_en' => 'For foliar spray: 2–3 kg / 1000 liters of water / hectare',
                'application_rates_text_ar' => null,
                'application_rates_text_en' => null,
            ],
        ];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function liquidProducts(int $categoryId): array
    {
        return [
            // ── 1. TERRA SALT ──
            [
                'category_id' => $categoryId,
                'name_ar' => 'تيرا سولت',
                'name_en' => 'TERRA SALT',
                'active_ingredient' => 'Anti-Salinity معالج ملوحة',
                'package_sizes_en' => '5 L, 17 L',
                'package_sizes_ar' => '5 لتر, 17 لتر',
                'short_description_ar' => 'سماد سائل يحتوي علي النتروجين و الكالسيوم و الاحماض العضوية',
                'short_description_en' => 'A liquid fertilizer containing nitrogen, calcium, and organic acids.',
                'properties_ar' => 'سماد سائل يحتوي علي النتروجين و الكالسيوم و الاحماض العضوية ، يستخدم كمعالج ملوحة و لمعالجة نقص عنصر الكالسيوم. يزيد من سعة التبادل الكاتيوني لحبيبات التربة ، فيعمل على طرد الصوديوم من التربة و يعمل على تحسين قوام التربة',
                'properties_en' => 'A liquid fertilizer containing nitrogen, calcium, and organic acids. It is used as an anti-salinity treatment and for correcting calcium deficiency. It increases the cation exchange capacity of soil particles, helping to displace sodium from the soil and improve soil structure',
                'application_rates_type' => 'table',
                'application_rates_has_notes' => true,
                'application_rates_rows' => [
                    ['crop_ar' => 'القمح والشعير', 'crop_en' => 'Wheat and barley', 'rate_ar' => '5 - 7 لتر / هكتار', 'rate_en' => '5 - 7 liters/hectare', 'notes_ar' => '3 - 4 لتر /هكتار (لمعالجة نقص الكالسيوم)', 'notes_en' => '3 - 4 liters/hectare (For correcting Calcium Deficiency)'],
                    ['crop_ar' => 'محاصيل الأعلاف', 'crop_en' => 'Forage crops', 'rate_ar' => '5 - 7 لتر / هكتار', 'rate_en' => '5 - 7 liters/hectare', 'notes_ar' => '3 - 4 لتر /هكتار (لمعالجة نقص الكالسيوم)', 'notes_en' => '3 - 4 liters/hectare (For correcting Calcium Deficiency)'],
                    ['crop_ar' => 'الخضروات المكشوفة', 'crop_en' => 'Open-field vegetables', 'rate_ar' => '5 - 7 لتر / هكتار', 'rate_en' => '5 - 7 liters/hectare', 'notes_ar' => '3 - 4 لتر /هكتار (لمعالجة نقص الكالسيوم)', 'notes_en' => '3 - 4 liters/hectare (For correcting Calcium Deficiency)'],
                    ['crop_ar' => 'البطاطس', 'crop_en' => 'Potatoes', 'rate_ar' => '5 - 7 لتر / هكتار', 'rate_en' => '5 - 7 liters/hectare', 'notes_ar' => '3 - 4 لتر /هكتار (لمعالجة نقص الكالسيوم)', 'notes_en' => '3 - 4 liters/hectare (For correcting Calcium Deficiency)'],
                    ['crop_ar' => 'زراعات البيوت المحمية', 'crop_en' => 'Greenhouse crops', 'rate_ar' => '5 - 7 لتر / هكتار', 'rate_en' => '5 - 7 liters/hectare', 'notes_ar' => '3 - 4 لتر /هكتار (لمعالجة نقص الكالسيوم)', 'notes_en' => '3 - 4 liters/hectare (For correcting Calcium Deficiency)'],
                    ['crop_ar' => 'أشجار الفاكهة والنخيل', 'crop_en' => 'Fruit trees and palm trees', 'rate_ar' => '5 - 7 لتر / هكتار', 'rate_en' => '5 - 7 liters/hectare', 'notes_ar' => '3 - 4 لتر /هكتار (لمعالجة نقص الكالسيوم)', 'notes_en' => '3 - 4 liters/hectare (For correcting Calcium Deficiency)'],
                    ['crop_ar' => 'نباتات الزينة و المسطحات الخضراء', 'crop_en' => 'Ornamental plants and turfgrass', 'rate_ar' => '5 - 7 لتر / هكتار', 'rate_en' => '5 - 7 liters/hectare', 'notes_ar' => '3 - 4 لتر /هكتار (لمعالجة نقص الكالسيوم)', 'notes_en' => '3 - 4 liters/hectare (For correcting Calcium Deficiency)'],
                ],
                'application_rates_footer_ar' => 'للرش الورقي: 2-3 كجم / 1000 لتر ماء / هكتار',
                'application_rates_footer_en' => 'For foliar spray: 2–3 kg / 1000 liters of water / hectare',
                'application_rates_text_ar' => null,
                'application_rates_text_en' => null,
            ],

            // ── 2. ROOT FARM ──
            [
                'category_id' => $categoryId,
                'name_ar' => 'روت فارم',
                'name_en' => 'ROOT FARM',
                'active_ingredient' => 'Root stimulation منشط الجذور',
                'package_sizes_en' => '1 L, 5 L, 20 L',
                'package_sizes_ar' => '1 لتر, 5 لتر, 20 لتر',
                'short_description_ar' => 'سماد سائل لتنشيط الجذور يحتوي علي النتروجين و الفوسفور و البوتاسيوم و المغنيسيوم',
                'short_description_en' => 'A liquid fertilizer for root stimulation containing nitrogen, phosphorus, potassium, and magnesium',
                'properties_ar' => 'سماد سائل لتنشيط الجذور يحتوي علي النتروجين و الفوسفور و البوتاسيوم و المغنيسيوم و نسب بسيطة من العناصر الصغرى ( الحديد،الزنك، المنجنيز) المخلبة على ايديتا .',
                'properties_en' => 'A liquid fertilizer for root stimulation containing nitrogen, phosphorus, potassium, and magnesium, along with small amounts of micronutrients (iron, zinc, and manganese) chelated with EDTA.',
                'application_rates_type' => 'table',
                'application_rates_has_notes' => false,
                'application_rates_rows' => [
                    ['crop_ar' => 'القمح والشعير', 'crop_en' => 'Wheat and barley', 'rate_ar' => '4 - 6 لتر /هكتار', 'rate_en' => '4 - 6 liters/hectare', 'notes_ar' => null, 'notes_en' => null],
                    ['crop_ar' => 'محاصيل الأعلاف', 'crop_en' => 'Forage crops', 'rate_ar' => '4 - 6 لتر /هكتار', 'rate_en' => '4 - 6 liters/hectare', 'notes_ar' => null, 'notes_en' => null],
                    ['crop_ar' => 'الخضروات المكشوفة', 'crop_en' => 'Open-field vegetables', 'rate_ar' => '4 - 6 لتر /هكتار', 'rate_en' => '4 - 6 liters/hectare', 'notes_ar' => null, 'notes_en' => null],
                    ['crop_ar' => 'البطاطس', 'crop_en' => 'Potatoes', 'rate_ar' => '4 - 6 لتر /هكتار', 'rate_en' => '4 - 6 liters/hectare', 'notes_ar' => null, 'notes_en' => null],
                    ['crop_ar' => 'زراعات البيوت المحمية', 'crop_en' => 'Greenhouse crops', 'rate_ar' => '1 - 2 لتر / 1000 م2', 'rate_en' => '1 - 2 liter / 1000 m2', 'notes_ar' => null, 'notes_en' => null],
                    ['crop_ar' => 'أشجار الفاكهة والنخيل', 'crop_en' => 'Fruit trees and palm trees', 'rate_ar' => '4 - 6 لتر /هكتار', 'rate_en' => '4 - 6 liters/hectare', 'notes_ar' => null, 'notes_en' => null],
                    ['crop_ar' => 'نباتات الزينة و المسطحات الخضراء', 'crop_en' => 'Ornamental plants and turfgrass', 'rate_ar' => '4 - 6 لتر /هكتار', 'rate_en' => '4 - 6 liters/hectare', 'notes_ar' => null, 'notes_en' => null],
                ],
                'application_rates_footer_ar' => 'للرش الورقي: 2-3 كجم / 1000 لتر ماء / هكتار',
                'application_rates_footer_en' => 'For foliar spray: 2–3 kg / 1000 liters of water / hectare',
                'application_rates_text_ar' => null,
                'application_rates_text_en' => null,
            ],

            // ── 3. Amino ──
            [
                'category_id' => $categoryId,
                'name_ar' => 'أمينو',
                'name_en' => 'Amino',
                'active_ingredient' => 'Improves soil properties يحسن خواص التربة',
                'package_sizes_en' => '1 L, 5 L, 20 L',
                'package_sizes_ar' => '1 لتر, 5 لتر, 20 لتر',
                'short_description_ar' => 'سماد سائل يحتوي علي الاحماض الامينية و النيتروجين و البوتاسيوم',
                'short_description_en' => 'Liquid fertilizer containing amino acids, nitrogen, and potassium',
                'properties_ar' => 'سماد سائل يحتوي علي الاحماض الامينية و النيتروجين و البوتاسيوم ويحتوي على حمض الهيوميك و الفولفيك المستخرجة من صخور الليونارديت الطبيعية. تساهم الاحماض الامينية في تحمل النبات للظروف البيئية القاسية مثل الإجهاد المائي (الجفاف)، والتغيرات المناخية، والملوثات.كما يساهم حمض الهيوميك و الفولفيك في تحسين خواص التربة الفيزيائية والكيميائية ، مما يساهم في زيادة تيسر العناصر الغذائية للنباتات وزيادة الإنتاجية',
                'properties_en' => 'Liquid fertilizer containing amino acids, nitrogen, and potassium, and enriched with humic and fulvic acids extracted from natural leonardite rock. Amino acids help plants tolerate harsh environmental conditions such as water stress (drought), climate fluctuations, and pollutants. Humic and fulvic acids also improve the physical and chemical properties of the soil, which enhances nutrient availability to plants and contributes to increased productivity.',
                'application_rates_type' => 'text',
                'application_rates_has_notes' => false,
                'application_rates_rows' => null,
                'application_rates_footer_ar' => null,
                'application_rates_footer_en' => null,
                'application_rates_text_ar' => "هذه المعدلات استرشادية تختلف حسب تحليل التربة والمياه، ونوع المحصول و الصنف ومراحل النمو، وتكرر حسب البرنامج التسميدي:\nيستخدم على المحاصيل الحقلية (القمح والشعير) و محاصيل الأعلاف و الخضروات المكشوفة والمحمية و البطاطس و أشجار الفاكهة والنخيل و نباتات الزينة و المسطحات الخضراء.\nمعدل الاستخدام مع مياه الري : 2.5 - 3.5 لتر / هكتار\nمعدل الاستخدام في الرش الورقي : 1 - 1.5 لتر / 1000 لتر ماء / هكتار",
                'application_rates_text_en' => "These recommended application rates vary depending on soil and water analysis, crop type, variety, growth stage, and frequency of use according to the fertilization program.\nIt is used on field crops (wheat and barley), forage crops, open-field and protected vegetables, potatoes, fruit trees, palms, ornamental plants, and turfgrass.\nApplication rate with irrigation water: 2.5–3.5 L/hectare\nFoliar spray application rate: 1–1.5 L / 1000 L water / hectare",
            ],

            // ── 4. PhosphoGreen 85% ──
            [
                'category_id' => $categoryId,
                'name_ar' => 'فوسفوجرين 85%',
                'name_en' => 'PhosphoGreen 85%',
                'active_ingredient' => 'Phosphogreen 85%',
                'package_sizes_en' => '1 L, 5 L, 20 L',
                'package_sizes_ar' => '1 لتر, 5 لتر, 20 لتر',
                'short_description_ar' => 'سماد سائل يحتوي على نسبة عالية من الفوسفور',
                'short_description_en' => 'Liquid fertilizer with a high phosphorus content',
                'properties_ar' => 'سماد سائل يحتوي على نسبة عالية من الفوسفور',
                'properties_en' => 'Liquid fertilizer with a high phosphorus content',
                'application_rates_type' => 'table',
                'application_rates_has_notes' => true,
                'application_rates_rows' => [
                    ['crop_ar' => 'القمح والشعير', 'crop_en' => 'Wheat and barley', 'rate_ar' => '2 - 3 لتر /هكتار', 'rate_en' => '2 - 3 liters/hectare', 'notes_ar' => 'تعطى بعد 20 يوم من الإنبات و تكرر كل أسبوعين', 'notes_en' => 'Apply 20 days after germination and repeat every two weeks.'],
                    ['crop_ar' => 'محاصيل الأعلاف', 'crop_en' => 'Forage crops', 'rate_ar' => '2 - 3 لتر /هكتار', 'rate_en' => '2 - 3 liters/hectare', 'notes_ar' => 'تعطى مرة واحدة بعد 20 يوما من الإنبات و تكرر بعد 10 أيام من كل حشة', 'notes_en' => 'Apply once 20 days after germination, then repeat 10 days after each cutting.'],
                    ['crop_ar' => 'الخضروات المكشوفة', 'crop_en' => 'Open-field vegetables', 'rate_ar' => '2 - 3 لتر /هكتار', 'rate_en' => '2 - 3 liters/hectare', 'notes_ar' => 'تعطى بعد 20 يوم من الإنبات و تكرر كل أسبوعين', 'notes_en' => 'Apply 20 days after germination and repeat every two weeks.'],
                    ['crop_ar' => 'البطاطس', 'crop_en' => 'Potatoes', 'rate_ar' => '2 - 3 لتر /هكتار', 'rate_en' => '2 - 3 liters/hectare', 'notes_ar' => 'تعطى بعد 20 يوم من الانبات وبعد التحضين و في مرحلة التبييض', 'notes_en' => 'Apply 20 days after germination, after transplant establishment, and at the flowering stage.'],
                    ['crop_ar' => 'زراعات البيوت المحمية', 'crop_en' => 'Greenhouse crops', 'rate_ar' => '0.5 - 1 لتر / 1000 م2', 'rate_en' => '0.5 - 1 liter / 1000 m2', 'notes_ar' => 'تعطى بعد 20 يوم من الإنبات و تكرر كل أسبوعين', 'notes_en' => 'Apply 20 days after germination and repeat every two weeks.'],
                    ['crop_ar' => 'أشجار الفاكهة والنخيل', 'crop_en' => 'Fruit trees and palm trees', 'rate_ar' => '2 - 3 لتر /هكتار', 'rate_en' => '2 - 3 liters/hectare', 'notes_ar' => 'تكرر عدة مرات خلال الموسم و توقف عند مرحلة الازهار ثم تعطى مرة واحدة عند تكون الثمار', 'notes_en' => 'Repeat several times during the season, stop at the flowering stage, then apply once at fruit set.'],
                    ['crop_ar' => 'نباتات الزينة و المسطحات الخضراء', 'crop_en' => 'Ornamental plants and turfgrass', 'rate_ar' => '2 - 3 لتر /هكتار', 'rate_en' => '2 - 3 liters/hectare', 'notes_ar' => 'تضاف عند الحاجة', 'notes_en' => 'Apply as needed.'],
                ],
                'application_rates_footer_ar' => 'للرش الورقي: 2-3 كجم / 1000 لتر ماء / هكتار',
                'application_rates_footer_en' => 'For foliar spray: 2–3 kg / 1000 liters of water / hectare',
                'application_rates_text_ar' => null,
                'application_rates_text_en' => null,
            ],
        ];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function suspensionProducts(int $categoryId): array
    {
        return [
            // ── 1. NUTRIVA 25-25-18 ──
            [
                'category_id' => $categoryId,
                'name_ar' => 'نوتريفا 25-25-18',
                'name_en' => 'NUTRIVA 25-25-18',
                'active_ingredient' => '25 - 25 - 18',
                'package_sizes_en' => '20 kg',
                'package_sizes_ar' => '20 كجم',
                'short_description_ar' => 'سماد معلق يحتوي علي النيتروجين و الفوسفور و البوتاسيوم .',
                'short_description_en' => 'A suspension fertilizer containing nitrogen, phosphorus, and potassium.',
                'properties_ar' => 'سماد معلق يحتوي علي النيتروجين و الفوسفور و البوتاسيوم .',
                'properties_en' => 'A suspension fertilizer containing nitrogen, phosphorus, and potassium.',
                'application_rates_type' => 'table',
                'application_rates_has_notes' => false,
                'application_rates_rows' => [
                    ['crop_ar' => 'القمح والشعير', 'crop_en' => 'Wheat and barley', 'rate_ar' => '4 - 6 لتر /هكتار', 'rate_en' => '4 - 6 liters/hectare', 'notes_ar' => null, 'notes_en' => null],
                    ['crop_ar' => 'محاصيل الأعلاف', 'crop_en' => 'Forage crops', 'rate_ar' => '4 - 6 لتر /هكتار', 'rate_en' => '4 - 6 liters/hectare', 'notes_ar' => null, 'notes_en' => null],
                    ['crop_ar' => 'الخضروات المكشوفة', 'crop_en' => 'Open-field vegetables', 'rate_ar' => '4 - 6 لتر /هكتار', 'rate_en' => '4 - 6 liters/hectare', 'notes_ar' => null, 'notes_en' => null],
                    ['crop_ar' => 'البطاطس', 'crop_en' => 'Potatoes', 'rate_ar' => '4 - 6 لتر /هكتار', 'rate_en' => '4 - 6 liters/hectare', 'notes_ar' => null, 'notes_en' => null],
                    ['crop_ar' => 'زراعات البيوت المحمية', 'crop_en' => 'Greenhouse crops', 'rate_ar' => '1 - 2 لتر / 1000 م2', 'rate_en' => '1 - 2 liter / 1000 m2', 'notes_ar' => null, 'notes_en' => null],
                    ['crop_ar' => 'أشجار الفاكهة والنخيل', 'crop_en' => 'Fruit trees and palm trees', 'rate_ar' => '4 - 6 لتر /هكتار', 'rate_en' => '4 - 6 liters/hectare', 'notes_ar' => null, 'notes_en' => null],
                    ['crop_ar' => 'نباتات الزينة و المسطحات الخضراء', 'crop_en' => 'Ornamental plants and turfgrass', 'rate_ar' => '4 - 6 لتر /هكتار', 'rate_en' => '4 - 6 liters/hectare', 'notes_ar' => null, 'notes_en' => null],
                ],
                'application_rates_footer_ar' => 'للرش الورقي: 2-3 كجم / 1000 لتر ماء / هكتار',
                'application_rates_footer_en' => 'For foliar spray: 2–3 kg / 1000 liters of water / hectare',
                'application_rates_text_ar' => null,
                'application_rates_text_en' => null,
            ],

            // ── 2. NUTRIVA 0-52-34 ──
            [
                'category_id' => $categoryId,
                'name_ar' => 'نوتريفا 0-52-34',
                'name_en' => 'NUTRIVA 0-52-34',
                'active_ingredient' => '0 - 52 - 34',
                'package_sizes_en' => '20 kg',
                'package_sizes_ar' => '20 كجم',
                'short_description_ar' => 'سماد معلق يحتوي علي الفوسفور و البوتاسيوم',
                'short_description_en' => 'A suspension fertilizer containing phosphorus and potassium.',
                'properties_ar' => 'سماد معلق يحتوي علي الفوسفور و البوتاسيوم',
                'properties_en' => 'A suspension fertilizer containing phosphorus and potassium.',
                'application_rates_type' => 'table',
                'application_rates_has_notes' => false,
                'application_rates_rows' => [
                    ['crop_ar' => 'القمح والشعير', 'crop_en' => 'Wheat and barley', 'rate_ar' => '2 - 3 لتر /هكتار', 'rate_en' => '2 - 3 liters/hectare', 'notes_ar' => null, 'notes_en' => null],
                    ['crop_ar' => 'محاصيل الأعلاف', 'crop_en' => 'Forage crops', 'rate_ar' => '2 - 3 لتر /هكتار', 'rate_en' => '2 - 3 liters/hectare', 'notes_ar' => null, 'notes_en' => null],
                    ['crop_ar' => 'الخضروات المكشوفة', 'crop_en' => 'Open-field vegetables', 'rate_ar' => '2 - 3 لتر /هكتار', 'rate_en' => '2 - 3 liters/hectare', 'notes_ar' => null, 'notes_en' => null],
                    ['crop_ar' => 'البطاطس', 'crop_en' => 'Potatoes', 'rate_ar' => '2 - 3 لتر /هكتار', 'rate_en' => '2 - 3 liters/hectare', 'notes_ar' => null, 'notes_en' => null],
                    ['crop_ar' => 'زراعات البيوت المحمية', 'crop_en' => 'Greenhouse crops', 'rate_ar' => '0.5 - 1 لتر / 1000 م2', 'rate_en' => '0.5 - 1 liter / 1000 m2', 'notes_ar' => null, 'notes_en' => null],
                    ['crop_ar' => 'أشجار الفاكهة والنخيل', 'crop_en' => 'Fruit trees and palm trees', 'rate_ar' => '2 - 3 لتر /هكتار', 'rate_en' => '2 - 3 liters/hectare', 'notes_ar' => null, 'notes_en' => null],
                    ['crop_ar' => 'نباتات الزينة و المسطحات الخضراء', 'crop_en' => 'Ornamental plants and turfgrass', 'rate_ar' => '2 - 3 لتر /هكتار', 'rate_en' => '2 - 3 liters/hectare', 'notes_ar' => null, 'notes_en' => null],
                ],
                'application_rates_footer_ar' => 'للرش الورقي: 2-3 كجم / 1000 لتر ماء / هكتار',
                'application_rates_footer_en' => 'For foliar spray: 2–3 kg / 1000 liters of water / hectare',
                'application_rates_text_ar' => null,
                'application_rates_text_en' => null,
            ],
        ];
    }
}
