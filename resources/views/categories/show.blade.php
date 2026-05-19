@extends('layouts.app')

@section('title', $category->getTranslation('name', app()->getLocale()) . ' | ' . ($settings->company_name ?? ''))

@section('content')
<!-- Page Header -->
<div class="relative bg-gradient-to-br from-primary-800 to-primary-600 py-20 overflow-hidden">
    @if($category->hasMedia('image'))
        <div class="absolute inset-0">
            <img src="{{ $category->getFirstMediaUrl('image') }}" class="w-full h-full object-cover opacity-20">
        </div>
    @endif
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-white/60 text-sm mb-4">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">{{ __('messages.home') }}</a>
            <span>/</span>
            <a href="{{ route('categories.index') }}" class="hover:text-white transition-colors">{{ __('messages.categories') }}</a>
            <span>/</span>
            <span class="text-white">{{ $category->getTranslation('name', app()->getLocale()) }}</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-bold text-white">{{ $category->getTranslation('name', app()->getLocale()) }}</h1>
        @if($category->getTranslation('description', app()->getLocale()))
        <p class="mt-3 text-white/70 max-w-2xl">{{ $category->getTranslation('description', app()->getLocale()) }}</p>
        @endif
    </div>
</div>

<!-- Subcategories Section -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @if($category->subCategories->count())
        <div class="mb-10">
            <h2 class="text-2xl font-bold text-neutral-900 mb-6">
                {{ app()->getLocale() === 'ar' ? 'الأقسام الفرعية' : 'Subcategories' }}
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($category->subCategories as $subCategory)
                <a href="{{ route('categories.subcategory', [$category->slug, $subCategory->slug]) }}"
                   class="group flex items-center gap-4 p-5 bg-white rounded-2xl border border-neutral-100 hover:border-primary-200 shadow-sm hover:shadow-md transition-all duration-200">
                    <div class="w-14 h-14 rounded-xl overflow-hidden bg-primary-50 shrink-0">
                        @if($subCategory->hasMedia('image'))
                            <img src="{{ $subCategory->getFirstMediaUrl('image') }}" alt="{{ $subCategory->getTranslation('name', app()->getLocale()) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-primary-100">
                                <svg class="w-7 h-7 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-semibold text-neutral-900 group-hover:text-primary-700 transition-colors truncate">
                            {{ $subCategory->getTranslation('name', app()->getLocale()) }}
                        </h3>
                        @if($subCategory->getTranslation('description', app()->getLocale()))
                        <p class="text-sm text-neutral-500 mt-0.5 line-clamp-1">{{ $subCategory->getTranslation('description', app()->getLocale()) }}</p>
                        @endif
                    </div>
                    <svg class="w-5 h-5 text-neutral-400 group-hover:text-primary-600 shrink-0 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
                @endforeach
            </div>
        </div>
        @endif

        <!-- View all products CTA -->
        <div class="mt-8 text-center">
            <a href="{{ route('products.index') }}?category={{ $category->id }}"
               class="inline-flex items-center gap-2 px-6 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-colors">
                {{ __('messages.view_all') }} {{ __('messages.products') }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>
@endsection
