@extends('layouts.app')

@section('title', $subCategory->getTranslation('name', app()->getLocale()) . ' | ' . ($settings->company_name ?? ''))

@section('content')
<!-- Page Header -->
<div class="page-header py-6 sm:py-10 rounded-b-2xl sm:rounded-b-[2.5rem] shadow-sm mb-6 sm:mb-10">
    <div class="page-header-grid"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-primary-600/60 text-xs font-bold uppercase tracking-wider mb-3 flex-wrap">
            <a href="{{ route('home') }}" class="hover:text-primary-600 transition-colors">{{ __('messages.home') }}</a>
            <span class="text-primary-600/40">/</span>
            <a href="{{ route('categories.index') }}" class="hover:text-primary-600 transition-colors">{{ __('messages.categories') }}</a>
            <span class="text-primary-600/40">/</span>
            <a href="{{ route('categories.show', $category->slug) }}" class="hover:text-primary-600 transition-colors">{{ $category->getTranslation('name', app()->getLocale()) }}</a>
            <span class="text-primary-600/40">/</span>
            <span class="text-primary-600">{{ $subCategory->getTranslation('name', app()->getLocale()) }}</span>
        </nav>
        <div class="accent-line mb-3"></div>
        <h1 class="text-3xl sm:text-4xl font-black text-primary-950 leading-tight">{{ $subCategory->getTranslation('name', app()->getLocale()) }}</h1>
    </div>
</div>

<section class="py-4 sm:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($products->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($products as $product)
                    <x-product-card :product="$product"/>
                @endforeach
            </div>
            <div class="mt-12">{{ $products->links() }}</div>
        @else
            <div class="text-center py-20">
                <p class="text-neutral-500 text-lg">{{ __('messages.no_products') }}</p>
            </div>
        @endif
    </div>
</section>
@endsection
