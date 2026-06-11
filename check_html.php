<?php

use App\Models\Product;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$product = Product::where('name_en', 'like', '%MISK - GREEN FARM%')->first();
$html = view('products.show', ['product' => $product, 'locale' => 'ar'])->render();

echo substr($html, strpos($html, '<p dir="ltr"'), 200);
