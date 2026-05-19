@extends('layouts.app')

@section('title', $subCategory->getTranslation('name', app()->getLocale()) . ' | ' . ($settings->company_name ?? ''))

@section('content')
<!-- Page Header -->
<div class="bg-gradient-to-br from-primary-800 to-primary-600 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-white/60 text-sm mb-4 flex-wrap">
            <a href="{{ route('home') }}" class="hover:text-white">{{ __('messages.home') }}</a>
            <span>/</span>
            <a href="{{ route('categories.index') }}" class="hover:text-white">{{ __('messages.categories') }}</a>
            <span>/</span>
            <a href="{{ route('categories.show', $category->slug) }}" class="hover:text-white">{{ $category->getTranslation('name', app()->getLocale()) }}</a>
            <span>/</span>
            <span class="text-white">{{ $subCategory->getTranslation('name', app()->getLocale()) }}</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-bold text-white">{{ $subCategory->getTranslation('name', app()->getLocale()) }}</h1>
    </div>
</div>

<section class="py-16">
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
