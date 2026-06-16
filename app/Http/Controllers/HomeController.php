<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Category;
use App\Models\Product;
use App\Models\WebsiteSetting;
use App\Services\ProductService;

class HomeController extends Controller
{
    public function __construct(private readonly ProductService $productService) {}

    public function __invoke()
    {
        $parentCategoriesQuery = Category::active()->parents();
        $parentCount = $parentCategoriesQuery->count();
        $singleParent = null;
        $categoriesDisplayMode = 'all';

        if ($parentCount > 1) {
            $categories = Category::active()->parents()->with('media')->orderBy('sort_order')->get();
            $categoriesDisplayMode = 'parents';
        } elseif ($parentCount === 1) {
            $singleParent = Category::active()->parents()->first();
            $categories = $singleParent
                ? $singleParent->subCategories()->active()->with('media')->orderBy('sort_order')->limit(4)->get()
                : collect();
            $categoriesDisplayMode = 'children';
        } else {
            $categories = Category::active()->with('media')->orderBy('sort_order')->limit(4)->get();
            $categoriesDisplayMode = 'all';
        }

        $featuredProducts = $this->productService->getFeaturedProducts(8);
        $about = AboutUs::first();
        $settings = WebsiteSetting::getSettings();

        $productsCount = Product::active()->count();
        $productsCountAr = str_replace(
            ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
            ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'],
            $productsCount
        );

        return view('home', compact(
            'categories',
            'categoriesDisplayMode',
            'singleParent',
            'featuredProducts',
            'about',
            'settings',
            'productsCount',
            'productsCountAr'
        ));
    }
}
