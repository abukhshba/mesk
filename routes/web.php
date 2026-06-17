<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

// Locale switcher
Route::get('/locale/{locale}', LocaleController::class)->name('locale.switch');

// Frontend routes
Route::get('/', HomeController::class)->name('home');
Route::get('/about', AboutController::class)->name('about');

// Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{categorySlug}/sub/{subSlug}', [CategoryController::class, 'subCategory'])->name('categories.subcategory');

// Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/api/products/search', [ProductController::class, 'searchApi'])->name('api.products.search');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Sitemap
Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');
