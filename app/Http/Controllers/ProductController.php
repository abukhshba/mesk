<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\WebsiteSetting;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private readonly ProductService $productService) {}

    public function index(Request $request)
    {
        $search = $request->string('search')->toString();
        $categoryId = $request->integer('category') ?: null;

        $products = $this->productService->getAllProducts($search ?: null, $categoryId);
        $categories = $this->productService->getActiveCategories();
        $settings = WebsiteSetting::getSettings();

        return view('products.index', compact('products', 'categories', 'settings', 'search', 'categoryId'));
    }

    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->active()
            ->with(['category.parent', 'media'])
            ->firstOrFail();

        $relatedProducts = $this->productService->getRelatedProducts($product, 4);
        $settings = WebsiteSetting::getSettings();

        return view('products.show', compact('product', 'relatedProducts', 'settings'));
    }
}
