@extends('layouts.app')

@section('title', __('app.categories') . ' | ' . ($settings->company_name ?? ''))

@section('content')
<!-- Page Header -->
<div class="page-header py-6 sm:py-10 rounded-b-2xl sm:rounded-b-[2.5rem] shadow-sm mb-6 sm:mb-10">
    <div class="page-header-grid"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-primary-600/60 text-xs font-bold uppercase tracking-wider mb-3">
            <a href="{{ route('home') }}" class="hover:text-primary-600 transition-colors">{{ __('app.home') }}</a>
            <span class="text-primary-600/40">/</span>
            <span class="text-primary-600">{{ __('app.categories') }}</span>
        </nav>
        <div class="accent-line mb-3"></div>
        <h1 class="text-3xl sm:text-4xl font-black text-primary-950 leading-tight">{{ __('app.featured_categories') }}</h1>
    </div>
</div>

<!-- Categories Grid -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-3 sm:px-8">
        @if($categories->count())
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-5">
                @foreach($categories as $category)
                    <div class="rounded-xl sm:rounded-3xl overflow-hidden hover-grow">
                        <x-category-card :category="$category" :show-description="false"/>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20">
                <svg class="w-20 h-20 text-neutral-200 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
                <p class="text-neutral-500">{{ __('app.no_products') }}</p>
            </div>
        @endif
    </div>
</section>
@endsection
