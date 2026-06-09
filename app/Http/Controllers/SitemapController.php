<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class SitemapController extends Controller
{
    public function __invoke()
    {
        $products = Product::active()->select('slug', 'updated_at')->get();
        $categories = Category::active()->select('slug', 'updated_at')->with('subCategories')->get();

        return response()->view('sitemap', compact('products', 'categories'))
            ->header('Content-Type', 'text/xml');
    }
}
