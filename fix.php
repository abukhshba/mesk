<?php

$file = 'database/seeders/ProductSeeder.php';
$content = file_get_contents($file);

$content = preg_replace_callback('/\'package_sizes\'\s*=>\s*\'(.*?)\',/m', function ($matches) {
    $size = $matches[1];
    $sizeAr = str_replace(['L', 'kg'], ['لتر', 'كجم'], $size);

    return "'package_sizes_en' => '{$size}',\n                'package_sizes_ar' => '{$sizeAr}',";
}, $content, -1, $count);

echo 'Replaced: '.$count."\n";
file_put_contents($file, $content);
