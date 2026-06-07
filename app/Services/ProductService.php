<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function getFeaturedProducts(int $limit = 8): Collection
    {
        return Product::active()->featured()
            ->with(['category.parent', 'media'])
            ->orderBy('sort_order')
            ->limit($limit)
            ->get();
    }

    public function getAllProducts(?string $search = null, ?int $categoryId = null): LengthAwarePaginator
    {
        $query = Product::active()
            ->with(['category.parent', 'media'])
            ->orderBy('sort_order');

        if ($categoryId) {
            $category = Category::find($categoryId);
            if ($category) {
                if ($category->isParent()) {
                    $categoryIds = Category::where('parent_id', $category->id)->pluck('id')->push($category->id);
                    $query->whereIn('category_id', $categoryIds);
                } else {
                    $query->where('category_id', $categoryId);
                }
            } else {
                $query->where('category_id', $categoryId);
            }
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name_ar', 'like', "%{$search}%")
                    ->orWhere('name_en', 'like', "%{$search}%")
                    ->orWhere('active_ingredient', 'like', "%{$search}%");
            });
        }

        return $query->paginate(12);
    }

    public function getProductsByCategory(Category $category, ?int $subcategoryId = null, ?string $search = null): LengthAwarePaginator
    {
        $query = Product::active()
            ->with(['category.parent', 'media'])
            ->orderBy('sort_order');

        if ($subcategoryId) {
            $query->where('category_id', $subcategoryId);
        } else {
            if ($category->isParent()) {
                $categoryIds = Category::where('parent_id', $category->id)->pluck('id')->push($category->id);
                $query->whereIn('category_id', $categoryIds);
            } else {
                $query->where('category_id', $category->id);
            }
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name_ar', 'like', "%{$search}%")
                    ->orWhere('name_en', 'like', "%{$search}%")
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
            ->whereNotNull('parent_id')
            ->with(['media'])
            ->orderBy('sort_order')
            ->get();
    }
}
