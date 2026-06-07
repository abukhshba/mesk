@extends('layouts.app')

@section('title', $category->getTranslation('name', app()->getLocale()) . ' | ' . ($settings->company_name ?? ''))

@section('content')
<!-- Page Header -->
<div class="page-header py-6 sm:py-10 rounded-b-2xl sm:rounded-b-[2.5rem] shadow-sm mb-6 sm:mb-10">
    @if($category->hasMedia('image'))
        <div class="absolute inset-0">
            <img src="{{ $category->getFirstMediaUrl('image') }}" class="w-full h-full object-cover opacity-30">
        </div>
    @endif
    <div class="page-header-grid"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-primary-600/60 text-xs font-bold uppercase tracking-wider mb-3">
            <a href="{{ route('home') }}" class="hover:text-primary-600 transition-colors">{{ __('app.home') }}</a>
            <span class="text-primary-600/40">/</span>
            <a href="{{ route('categories.index') }}" class="hover:text-primary-600 transition-colors">{{ __('app.categories') }}</a>
            <span class="text-primary-600/40">/</span>
            <span class="text-primary-600">{{ $category->getTranslation('name', app()->getLocale()) }}</span>
        </nav>
        <div class="accent-line mb-3"></div>
        <h1 class="text-3xl sm:text-4xl font-black text-primary-950 leading-tight">{{ $category->getTranslation('name', app()->getLocale()) }}</h1>
        @if($category->getTranslation('description', app()->getLocale()))
        <p class="mt-4 text-primary-800/70 max-w-2xl text-base font-light leading-relaxed">{{ $category->getTranslation('description', app()->getLocale()) }}</p>
        @endif
    </div>
</div>

<!-- Subcategories Section -->
<section class="py-6 sm:py-16">
    <div class="max-w-7xl mx-auto px-3 sm:px-8">

        @if($category->subCategories->count())
        <div class="mb-10">
            <h2 class="text-2xl font-bold text-neutral-900 mb-6">
                {{ app()->getLocale() === 'ar' ? 'الأقسام الفرعية' : 'Subcategories' }}
            </h2>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-5">
                @foreach($category->subCategories as $subCategory)
                    @php
                        $cardHref = route('categories.subcategory', [$category->slug, $subCategory->slug]);
                    @endphp
                    <x-category-card :category="$subCategory" :show-description="false" :href="$cardHref"/>
                @endforeach
            </div>
        </div>
        @endif

        <!-- View all products CTA -->
        <div class="mt-8 text-center">
            <a href="{{ route('products.index') }}?category={{ $category->id }}"
               class="inline-flex items-center gap-2 px-6 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-colors">
                {{ __('app.view_all') }} {{ __('app.products') }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>
@endsection
