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
        if (Product::count() > 0) {
            return;
        }

        $productsMap = [
            'insecticides' => [
                [
                    'name_ar' => 'إمداكلوبريد 70%',
                    'name_en' => 'Imidacloprid 70%',
                    'active_ingredient' => 'Imidacloprid 70%',
                    'short_description_ar' => 'مبيد حشري جهازي قوي جداً وفعال لمكافحة حشرات التربة والأوراق.',
                    'short_description_en' => 'Highly effective systemic insecticide for controlling soil and foliar pests.',
                ],
                [
                    'name_ar' => 'كلوربيريفوس 48%',
                    'name_en' => 'Chlorpyrifos 48%',
                    'active_ingredient' => 'Chlorpyrifos 48%',
                    'short_description_ar' => 'مبيد حشري فسفوري عضوي يعمل بالملامسة وعن طريق الجهاز الهضمي للحشرات.',
                    'short_description_en' => 'Organophosphorus insecticide acting through contact and stomach ingestion.',
                ],
            ],
            'fungicides' => [
                [
                    'name_ar' => 'مانكوزيب 80%',
                    'name_en' => 'Mancozeb 80%',
                    'active_ingredient' => 'Mancozeb 80%',
                    'short_description_ar' => 'مبيد فطري وقائي واسع المدى لمكافحة مجموعة واسعة من الفطريات.',
                    'short_description_en' => 'Broad-spectrum protective fungicide for controlling a wide range of fungi.',
                ],
                [
                    'name_ar' => 'أزوكسيستروبين 25%',
                    'name_en' => 'Azoxystrobin 25%',
                    'active_ingredient' => 'Azoxystrobin 25%',
                    'short_description_ar' => 'مبيد فطري جهازي ذو خواص وقائية وعلاجية ممتازة.',
                    'short_description_en' => 'Systemic fungicide with excellent preventative and curative properties.',
                ],
            ],
            'herbicides' => [
                [
                    'name_ar' => 'غلايفوسيت 41%',
                    'name_en' => 'Glyphosate 41%',
                    'active_ingredient' => 'Glyphosate 41%',
                    'short_description_ar' => 'مبيد أعشاب عام غير اختياري وجهازي لمكافحة جميع الحشائش الحولية والمعمرة.',
                    'short_description_en' => 'Non-selective systemic herbicide to control annual and perennial weeds.',
                ],
                [
                    'name_ar' => 'باراكوات 20%',
                    'name_en' => 'Paraquat 20%',
                    'active_ingredient' => 'Paraquat 20%',
                    'short_description_ar' => 'مبيد حشائش بالملامسة وسريع المفعول للقضاء على الأعشاب الضارة.',
                    'short_description_en' => 'Fast-acting contact herbicide to eliminate invasive weeds.',
                ],
            ],
            'fertilizers' => [
                [
                    'name_ar' => 'NPK متوازن 20-20-20',
                    'name_en' => 'Balanced NPK 20-20-20',
                    'active_ingredient' => 'Nitrogen 20%, Phosphorus 20%, Potassium 20%',
                    'short_description_ar' => 'سماد ذواب متكامل يمد النبات بالعناصر الغذائية الرئيسية بنسب متوازنة.',
                    'short_description_en' => 'Highly soluble fertilizer supplying key crop nutrients in balanced ratios.',
                ],
                [
                    'name_ar' => 'يوريا 46%',
                    'name_en' => 'Urea 46%',
                    'active_ingredient' => 'Nitrogen 46%',
                    'short_description_ar' => 'سماد نيتروجيني عالي التركيز لتعزيز النمو الخضري للنباتات والمحاصيل.',
                    'short_description_en' => 'Concentrated nitrogen fertilizer to boost vegetative crop growth.',
                ],
            ],
            'growth-regulators' => [
                [
                    'name_ar' => 'حمض الجبرليك 10%',
                    'name_en' => 'Gibberellic Acid 10%',
                    'active_ingredient' => 'Gibberellic Acid 10%',
                    'short_description_ar' => 'منظم نمو نباتي لتحسين العقد، زيادة حجم الثمار، وتسريع الاستطالة.',
                    'short_description_en' => 'Plant growth regulator to improve fruit set, size, and cell elongation.',
                ],
                [
                    'name_ar' => 'إيثيفون 48%',
                    'name_en' => 'Ethephon 48%',
                    'active_ingredient' => 'Ethephon 48%',
                    'short_description_ar' => 'منظم نمو نباتي يعمل على تسريع عملية النضج وتجانس تلوين الثمار.',
                    'short_description_en' => 'Plant growth regulator designed to accelerate fruit ripening and uniform coloring.',
                ],
            ],
            'soil-conditioners' => [
                [
                    'name_ar' => 'حمض الهيوميك 85%',
                    'name_en' => 'Humic Acid 85%',
                    'active_ingredient' => 'Humic Acid 85%',
                    'short_description_ar' => 'محسن تربة طبيعي يزيد من قدرة التربة على الاحتفاظ بالماء والعناصر الغذائية.',
                    'short_description_en' => 'Natural soil conditioner that improves water retention and nutrient holding capacity.',
                ],
                [
                    'name_ar' => 'حمض الفولفيك 70%',
                    'name_en' => 'Fulvic Acid 70%',
                    'active_ingredient' => 'Fulvic Acid 70%',
                    'short_description_ar' => 'محسن تربة عالي النشاط يعزز امتصاص الجذور للعناصر المعدنية الصغرى والكبرى.',
                    'short_description_en' => 'Highly active organic soil conditioner enhancing root mineral uptake.',
                ],
            ],
            'plant-nutrition' => [
                [
                    'name_ar' => 'خليط العناصر الصغرى المخلبة',
                    'name_en' => 'Chelated Micronutrients Mix',
                    'active_ingredient' => 'Fe, Zn, Mn, Cu, B, Mo',
                    'short_description_ar' => 'عناصر صغرى مخلبة ممتازة للوقاية وعلاج مظاهر نقص العناصر على النبات.',
                    'short_description_en' => 'Premium chelated trace elements to prevent and correct plant nutrient deficiencies.',
                ],
                [
                    'name_ar' => 'أسمدة الكالسيوم والبورون السائلة',
                    'name_en' => 'Liquid Calcium Boron',
                    'active_ingredient' => 'Calcium oxide 15%, Boron 1%',
                    'short_description_ar' => 'مزيج مثالي لمنع تساقط الأزهار وتجنب تشقق الثمار وتحسين الجودة.',
                    'short_description_en' => 'Ideal blend to prevent flower drop, avoid fruit cracking, and improve shelf-life.',
                ],
            ],
            'adjuvants' => [
                [
                    'name_ar' => 'مساعد رصاص فائق الانتشار',
                    'name_en' => 'Super Spreader Adjuvant',
                    'active_ingredient' => 'Organosilicone Spreader 100%',
                    'short_description_ar' => 'مادة ناشرة فائقة الانتشار تحسن بشكل كبير تغطية وامتصاص الرش الورقي.',
                    'short_description_en' => 'Super spreading surfactant that dramatically improves foliar spray coverage and uptake.',
                ],
                [
                    'name_ar' => 'مادة ناشرة وملاصقة ممتازة',
                    'name_en' => 'Premium Sticker & Spreader',
                    'active_ingredient' => 'Alkyl Aryl Polyethoxylate 80%',
                    'short_description_ar' => 'مادة مساعدة تعمل على زيادة التصاق محاليل الرش بأسطح الأوراق ومقاومة الغسيل بالأمطار.',
                    'short_description_en' => 'Adjuvant designed to improve spray solution stickiness to leaf surfaces and rainfastness.',
                ],
            ],
        ];

        $imagePool = [
            'prod_insecticide_1.png',
            'prod_insecticide_2.png',
            'prod_fungicide_1.png',
            'prod_fungicide_2.png',
            'prod_herbicide_1.png',
            'product_bottle.png',
            'product_fertilizer_bag.png',
            'product_liquid.png',
            'product_granules.png',
            'hero2.jpg',
            'hero3.jpg',
            'hero_bg.png',
            'hero_leaf.png',
        ];

        $categories = Category::all();
        $seededCount = 0;

        foreach ($categories as $category) {
            // Find root parent to determine category theme
            $themeKey = $category->isParent() ? $category->slug : ($category->parent ? $category->parent->slug : $category->slug);

            // Fallback if not found in map
            $productsToSeed = $productsMap[$themeKey] ?? $productsMap['insecticides'];

            foreach ($productsToSeed as $k => $item) {
                $product = Product::create([
                    'category_id' => $category->id,
                    'name_ar' => $item['name_ar'],
                    'name_en' => $item['name_en'],
                    'slug' => $category->slug.'-'.Str::slug($item['name_en']).'-'.$category->id.'-'.$k,
                    'short_description_ar' => $item['short_description_ar'],
                    'short_description_en' => $item['short_description_en'],
                    'description_ar' => 'منتج زراعي متميز من فئة '.$category->name_ar.'، مصمم خصيصاً لتحسين جودة المحاصيل وحماية المزارع باحترافية وأمان.',
                    'description_en' => 'A premium agricultural product from the '.$category->name_en.' category, designed to optimize crop quality and protect farms professionally and safely.',
                    'active_ingredient' => $item['active_ingredient'],
                    'usage_instructions' => 'اتبع تعليمات الاستخدام المدونة على العبوة بدقة. قم بالرش في الصباح الباكر أو المساء. Follow application label instructions carefully. Spray during early morning or late evening.',
                    'application_rate' => '100-250 مل لكل 100 لتر ماء',
                    'safety_precautions' => 'تجنب الاستنشاق أو ملامسة العينين. ارتدِ قفازات واقية ونظارات حماية. Avoid inhalation or contact with eyes. Wear protective gloves and eye protection.',
                    'package_sizes' => '250مل, 500مل, 1لتر, 5لتر',
                    'is_featured' => $k === 0,
                    'is_active' => true,
                    'sort_order' => $k,
                ]);

                // Choose a unique image from the pool
                $imageIndex = $seededCount % count($imagePool);
                $imageName = $imagePool[$imageIndex];
                $seededCount++;

                // Attach product image
                $productImagePath = public_path('images/'.$imageName);
                if (file_exists($productImagePath)) {
                    $product->addMedia($productImagePath)
                        ->preservingOriginal()
                        ->toMediaCollection('main_image');
                }
            }
        }
    }
}
