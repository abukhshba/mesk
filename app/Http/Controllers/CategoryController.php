<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\WebsiteSetting;
use App\Services\ProductService;

class CategoryController extends Controller
{
    public function __construct(private readonly ProductService $productService) {}

    public function index()
    {
        $categories = Category::active()->with('media')->orderBy('sort_order')->get();
        $settings = WebsiteSetting::getSettings();

        return view('categories.index', compact('categories', 'settings'));
    }

    public function show(string $slug)
    {
        $category = Category::where('slug', $slug)->active()->with(['subCategories' => fn ($q) => $q->active()->with('media'), 'media'])->firstOrFail();
        $settings = WebsiteSetting::getSettings();

        return view('categories.show', compact('category', 'settings'));
    }

    public function subCategory(string $categorySlug, string $subSlug)
    {
        $category = Category::where('slug', $categorySlug)->active()->firstOrFail();
        $subCategory = Category::where('slug', $subSlug)->where('parent_id', $category->id)->active()->with('media')->firstOrFail();
        $products = $this->productService->getProductsByCategory($category, $subCategory->id);
        $settings = WebsiteSetting::getSettings();

        return view('categories.subcategory', compact('category', 'subCategory', 'products', 'settings'));
    }
}
