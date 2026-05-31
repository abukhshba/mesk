@extends('layouts.app')

@section('title', __('app.products') . ' | ' . ($settings->company_name ?? ''))

@section('content')
<!-- Page Header -->
<div class="page-header py-6 sm:py-10 rounded-b-2xl sm:rounded-b-[2.5rem] shadow-sm mb-6 sm:mb-10">
    <div class="page-header-grid"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-primary-600/60 text-xs font-bold uppercase tracking-wider mb-3">
            <a href="{{ route('home') }}" class="hover:text-primary-600 transition-colors">{{ __('app.home') }}</a>
            <span class="text-primary-600/40">/</span>
            <span class="text-primary-600">{{ __('app.products') }}</span>
        </nav>
        <div class="accent-line mb-3"></div>
        <h1 class="text-3xl sm:text-4xl font-black text-primary-950 leading-tight">{{ __('app.products') }}</h1>
    </div>
</div>

<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Search & Filter Bar -->
        <form method="GET" action="{{ route('products.index') }}" class="flex flex-col sm:flex-row gap-3 mb-10 bg-white p-3 rounded-2xl border border-neutral-100 shadow-sm">
            <div class="flex-1 relative">
                <svg class="absolute {{ app()->getLocale() === 'ar' ? 'right-3.5' : 'left-3.5' }} top-1/2 -translate-y-1/2 w-4 h-4 text-neutral-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" name="search" value="{{ $search }}" placeholder="{{ __('app.search_placeholder') }}"
                       class="w-full {{ app()->getLocale() === 'ar' ? 'pr-10 pl-4' : 'pl-10 pr-4' }} py-3 text-sm border-0 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-300 bg-neutral-50">
            </div>
            <select name="category" class="px-4 py-3 text-sm border-0 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-300 bg-neutral-50 min-w-[180px]">
                <option value="">{{ __('app.all_categories') }}</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $categoryId == $cat->id ? 'selected' : '' }}>
                        {{ $cat->getTranslation('name', app()->getLocale()) }}
                    </option>
                @endforeach
            </select>
            <div class="flex gap-2">
                <button type="submit" class="px-6 py-3 bg-neutral-900 text-white font-semibold rounded-xl hover:bg-neutral-800 transition-colors whitespace-nowrap text-sm">
                    {{ app()->getLocale() === 'ar' ? 'بحث' : 'Search' }}
                </button>
                @if($search || $categoryId)
                <a href="{{ route('products.index') }}" class="px-5 py-3 border border-neutral-200 text-neutral-600 font-medium rounded-xl hover:bg-neutral-50 transition-colors whitespace-nowrap text-sm">
                    {{ app()->getLocale() === 'ar' ? 'مسح' : 'Clear' }}
                </a>
                @endif
            </div>
        </form>

        <!-- Results count -->
        @if($products->total())
        <p class="text-sm text-neutral-500 mb-6">
            {{ $products->total() }} {{ app()->getLocale() === 'ar' ? 'منتج' : 'products' }}
        </p>
        @endif

        <!-- Products Grid -->
        @if($products->count())
            <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-6">
                @foreach($products as $product)
                    <x-product-card :product="$product"/>
                @endforeach
            </div>
            <div class="mt-12">{{ $products->links() }}</div>
        @else
            <div class="text-center py-20">
                <svg class="w-20 h-20 text-neutral-200 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-neutral-500 text-lg">{{ __('app.no_products') }}</p>
                <a href="{{ route('products.index') }}" class="mt-4 inline-block text-primary-600 hover:underline text-sm">
                    {{ app()->getLocale() === 'ar' ? 'عرض جميع المنتجات' : 'View all products' }}
                </a>
            </div>
        @endif
    </div>
</section>
@endsection
