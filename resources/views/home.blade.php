@extends('layouts.app')

@section('title', $settings->company_name ?? __('messages.hero_title'))

@section('content')

{{-- HERO SECTION --}}
<section class="relative min-h-[85vh] flex items-center overflow-hidden">
    <!-- Background -->
    <div class="hero-gradient absolute inset-0"></div>
    <!-- Pattern overlay -->
    <div class="absolute inset-0 opacity-5">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
            <defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/></pattern></defs>
            <rect width="100%" height="100%" fill="url(#grid)"/>
        </svg>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white/80 text-sm font-medium mb-6">
                <div class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></div>
                {{ __('messages.years_experience') }} · {{ date('Y') - 2010 }}+
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight">
                {{ __('messages.hero_title') }}
            </h1>
            <p class="mt-6 text-lg text-white/70 leading-relaxed max-w-2xl">
                {{ __('messages.hero_subtitle') }}
            </p>
            <div class="mt-10 flex flex-wrap gap-4">
                <a href="{{ route('products.index') }}"
                   class="inline-flex items-center gap-2 px-7 py-3.5 bg-white text-primary-800 font-semibold rounded-xl hover:bg-primary-50 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                    {{ __('messages.hero_cta') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('contact') }}"
                   class="inline-flex items-center gap-2 px-7 py-3.5 bg-white/10 backdrop-blur-sm text-white font-semibold rounded-xl border border-white/30 hover:bg-white/20 transition-all duration-200">
                    {{ __('messages.hero_cta_secondary') }}
                </a>
            </div>
        </div>
    </div>

    <!-- Wave decoration -->
    <div class="absolute bottom-0 inset-x-0">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 60V40C240 0 480 0 720 20C960 40 1200 40 1440 20V60H0Z" fill="white"/>
        </svg>
    </div>
</section>

{{-- FEATURED CATEGORIES --}}
@if($categories->count())
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-primary-600 font-semibold text-sm uppercase tracking-widest">{{ __('messages.categories') }}</span>
            <h2 class="mt-2 text-3xl font-bold text-neutral-900">{{ __('messages.featured_categories') }}</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $category)
                <x-category-card :category="$category"/>
            @endforeach
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('categories.index') }}"
               class="inline-flex items-center gap-2 px-6 py-3 border-2 border-primary-600 text-primary-700 font-semibold rounded-xl hover:bg-primary-600 hover:text-white transition-all duration-200">
                {{ __('messages.view_all') }}
            </a>
        </div>
    </div>
</section>
@endif

{{-- STATS SECTION --}}
<section class="py-16 bg-primary-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach([
                ['number' => '15+', 'label' => __('messages.years_experience')],
                ['number' => '200+', 'label' => __('messages.products_count')],
                ['number' => '5000+', 'label' => __('messages.clients_count')],
                ['number' => '10+', 'label' => __('messages.countries_count')],
            ] as $stat)
            <div class="text-center">
                <div class="text-4xl font-bold text-primary-700">{{ $stat['number'] }}</div>
                <div class="mt-1 text-sm text-neutral-600">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FEATURED PRODUCTS --}}
@if($featuredProducts->count())
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-end justify-between mb-12">
            <div>
                <span class="text-primary-600 font-semibold text-sm uppercase tracking-widest">{{ __('messages.products') }}</span>
                <h2 class="mt-2 text-3xl font-bold text-neutral-900">{{ __('messages.featured_products') }}</h2>
            </div>
            <a href="{{ route('products.index') }}" class="text-primary-600 hover:text-primary-800 font-medium text-sm transition-colors">
                {{ __('messages.view_all') }} →
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($featuredProducts as $product)
                <x-product-card :product="$product"/>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ABOUT PREVIEW --}}
@if($about)
<section class="py-20 bg-neutral-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-primary-600 font-semibold text-sm uppercase tracking-widest">{{ __('messages.about_preview_title') }}</span>
                <h2 class="mt-2 text-3xl font-bold text-neutral-900">{{ $about->getTranslation('title', app()->getLocale()) }}</h2>
                <p class="mt-5 text-neutral-600 leading-relaxed">
                    {!! Str::limit(strip_tags($about->getTranslation('description', app()->getLocale())), 300) !!}
                </p>
                <a href="{{ route('about') }}"
                   class="mt-8 inline-flex items-center gap-2 px-6 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-colors">
                    {{ __('messages.view_all') }}
                </a>
            </div>
            <div class="relative">
                @if($about->hasMedia('image'))
                    <img src="{{ $about->getFirstMediaUrl('image') }}" alt="{{ $about->getTranslation('title', app()->getLocale()) }}"
                         class="w-full rounded-2xl shadow-2xl object-cover aspect-video">
                @else
                    <div class="w-full rounded-2xl bg-gradient-to-br from-primary-100 to-primary-200 aspect-video flex items-center justify-center">
                        <svg class="w-24 h-24 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                        </svg>
                    </div>
                @endif
                <div class="absolute -bottom-6 {{ app()->getLocale() === 'ar' ? '-right-6' : '-left-6' }} w-28 h-28 bg-accent-500 rounded-2xl opacity-20 -z-10"></div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- WHATSAPP CTA --}}
@if(!empty($settings->whatsapp))
<section class="py-20 bg-green-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-6">
            <svg class="w-9 h-9 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
        </div>
        <h2 class="text-3xl font-bold text-white">{{ __('messages.whatsapp_cta_title') }}</h2>
        <p class="mt-3 text-white/80 text-lg">{{ __('messages.whatsapp_cta_subtitle') }}</p>
        <a href="https://wa.me/{{ $settings->whatsapp }}" target="_blank"
           class="mt-8 inline-flex items-center gap-3 px-8 py-4 bg-white text-green-700 font-bold rounded-xl hover:bg-green-50 shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-200">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
            {{ __('messages.whatsapp_cta_button') }}
        </a>
    </div>
</section>
@endif

@endsection
