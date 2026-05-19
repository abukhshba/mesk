<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function getFeaturedProducts(int $limit = 8): Collection
    {
        return Product::active()->featured()
            ->with(['category', 'media'])
            ->orderBy('sort_order')
            ->limit($limit)
            ->get();
    }

    public function getAllProducts(?string $search = null, ?int $categoryId = null): LengthAwarePaginator
    {
        $query = Product::active()
            ->with(['category', 'subCategory', 'media'])
            ->orderBy('sort_order');

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->whereRaw("JSON_EXTRACT(name, '$.ar') LIKE ?", ["%{$search}%"])
                    ->orWhereRaw("JSON_EXTRACT(name, '$.en') LIKE ?", ["%{$search}%"])
                    ->orWhere('active_ingredient', 'like', "%{$search}%");
            });
        }

        return $query->paginate(12);
    }

    public function getProductsByCategory(Category $category, ?int $subcategoryId = null, ?string $search = null): LengthAwarePaginator
    {
        $query = Product::active()
            ->where('category_id', $category->id)
            ->with(['category', 'subCategory', 'media'])
            ->orderBy('sort_order');

        if ($subcategoryId) {
            $query->where('subcategory_id', $subcategoryId);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->whereRaw("JSON_EXTRACT(name, '$.ar') LIKE ?", ["%{$search}%"])
                    ->orWhereRaw("JSON_EXTRACT(name, '$.en') LIKE ?", ["%{$search}%"])
                    ->orWhere('active_ingredient', 'like', "%{$search}%");
            });
        }

        return $query->paginate(12);
    }

    public function getRelatedProducts(Product $product, int $limit = 4): Collection
    {
        return Product::active()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->with(['media'])
            ->orderBy('sort_order')
            ->limit($limit)
            ->get();
    }

    public function getActiveCategories(): Collection
    {
        return Category::active()
            ->with(['media'])
            ->orderBy('sort_order')
            ->get();
    }
}
