<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Category;
use App\Models\WebsiteSetting;
use App\Services\ProductService;

class HomeController extends Controller
{
    public function __construct(private readonly ProductService $productService) {}

    public function __invoke()
    {
        $categories = Category::active()->with('media')->orderBy('sort_order')->limit(6)->get();
        $featuredProducts = $this->productService->getFeaturedProducts(8);
        $about = AboutUs::first();
        $settings = WebsiteSetting::getSettings();

        return view('home', compact('categories', 'featuredProducts', 'about', 'settings'));
    }
}
