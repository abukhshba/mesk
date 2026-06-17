@extends('layouts.app')

@section('title', __('app.categories') . ' | ' . ($settings->company_name ?? ''))

@section('content')
<!-- Page Header -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 sm:pt-10 mb-8">
    <!-- Breadcrumb -->
    <nav class="mb-6" aria-label="Breadcrumb">
        <ol class="flex items-center gap-1.5 sm:gap-2 text-sm flex-wrap">
            <li class="flex items-center gap-1.5 sm:gap-2">
                <a href="{{ route('home') }}" class="flex items-center gap-1.5 text-neutral-400 hover:text-primary-600 transition-colors duration-200 group">
                    <svg class="w-4 h-4 shrink-0 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="hidden sm:inline">{{ __('app.home') }}</span>
                </a>
                <svg class="w-3.5 h-3.5 text-neutral-300 shrink-0 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </li>
            <li>
                <span class="text-neutral-700 font-semibold">
                    {{ __('app.categories') }}
                </span>
            </li>
        </ol>
    </nav>
    <h1 class="text-3xl sm:text-5xl font-black text-neutral-900">{{ __('app.featured_categories') }}</h1>
</div>

<!-- Categories Grid -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-3 sm:px-8">
        @if($categories->count())
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-5">
                @foreach($categories as $category)
                    <x-category-card :category="$category" :show-description="false"/>
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
