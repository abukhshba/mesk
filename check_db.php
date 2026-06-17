<?php

use App\Models\Product;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$products = Product::all();
foreach ($products as $p) {
    if (strpos($p->name_ar, 'جرين فارم') !== false) {
        echo 'Product: '.$p->name_ar."\n";
        echo 'Sub AR: '.$p->sub_title_ar."\n";
        echo 'Sub EN: '.$p->sub_title_en."\n";
    }
}
