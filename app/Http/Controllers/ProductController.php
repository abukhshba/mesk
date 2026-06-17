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

    public function searchApi(Request $request)
    {
        $q = $request->string('q')->toString();
        if (empty($q)) {
            return response()->json([]);
        }

        $products = Product::active()
            ->where(function ($query) use ($q) {
                $query->where('name_ar', 'like', "{$q}%")
                      ->orWhere('name_en', 'like', "{$q}%")
                      ->orWhere('name_ar', 'like', "% {$q}%")
                      ->orWhere('name_en', 'like', "% {$q}%");
            })
            ->with(['media', 'category'])
            ->limit(4)
            ->get();

        $results = $products->map(function ($product) {
            $locale = app()->getLocale();
            $subTitle = $product->getTranslation('sub_title', $locale);
            return [
                'id' => $product->id,
                'name' => $product->getTranslation('name', $locale),
                'url' => route('products.show', $product->slug),
                'image' => $product->hasMedia('main_image') ? $product->getFirstMediaUrl('main_image') : asset('images/products/main/' . $product->id . '.png'),
                'subtitle' => $subTitle,
            ];
        });

        return response()->json($results);
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
