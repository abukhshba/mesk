@extends('layouts.app')

@section('title', $settings->company_name ?? __('messages.hero_title'))

@section('content')

{{-- 1. BRIGHT ORGANIC HERO --}}
<section class="relative pt-16 pb-16 lg:pt-32 lg:pb-24 overflow-hidden bg-primary-50/30">
    {{-- Soft background glows --}}
    <div class="absolute top-0 right-0 w-[300px] sm:w-[500px] h-[300px] sm:h-[500px] bg-primary-200/40 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[300px] sm:w-[500px] h-[300px] sm:h-[500px] bg-accent-100/40 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10 sm:mt-16 lg:mt-0">
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">

            {{-- Text Content --}}
            <div class="w-full lg:w-1/2 text-center rtl:lg:text-right ltr:lg:text-left z-20">
                <div class="inline-flex items-center gap-2 px-3 sm:px-4 py-1.5 rounded-full bg-white border border-primary-100 text-primary-600 text-[10px] sm:text-xs lg:text-sm font-bold tracking-wide mb-6 sm:mb-8 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-accent-500 animate-pulse"></span>
                    {{ app()->getLocale() === 'ar' ? 'تقنيات الحماية والتغذية الزراعية' : 'Agrochemical Protection & Nutrition' }}
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-black text-neutral-900 leading-[1.2] lg:leading-[1.1] tracking-tight mb-4 sm:mb-6">
                    @if(app()->getLocale() === 'ar')
                        نقاء <span class="text-primary-600">التقنية</span><br>الزراعية
                    @else
                        Pure <span class="text-primary-600">Agro</span><br>nomy.
                    @endif
                </h1>

                <p class="text-neutral-500 text-sm sm:text-base lg:text-lg font-medium leading-relaxed mb-8 sm:mb-10 max-w-lg mx-auto lg:mx-0">
                    {{ __('messages.hero_subtitle') }}
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3 sm:gap-4">
                    <a href="{{ route('products.index') }}"
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 sm:px-8 py-3.5 sm:py-4 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-2xl shadow-lg shadow-primary-600/20 transition-all duration-300 hover:-translate-y-1">
                        {{ __('messages.hero_cta') }}
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <a href="{{ route('about') }}"
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 sm:px-8 py-3.5 sm:py-4 bg-white hover:bg-neutral-50 text-neutral-900 font-bold rounded-2xl border border-neutral-200 shadow-sm transition-all duration-300 hover:-translate-y-1">
                        {{ __('messages.about') }}
                    </a>
                </div>
            </div>

            {{-- Image & Shapes --}}
            <div class="w-full lg:w-1/2 relative mt-4 lg:mt-0 z-10">
                <div class="relative w-full aspect-[4/3] sm:aspect-square lg:aspect-[4/5] max-w-md sm:max-w-lg mx-auto lg:max-w-none">
                    {{-- Organic background shape behind image --}}
                    <div class="absolute inset-0 bg-primary-200 rounded-[2.5rem] sm:rounded-[3rem] rotate-3 scale-105 transition-transform duration-700 hover:rotate-6"></div>

                    {{-- Main image --}}
                    <div class="absolute inset-0 bg-neutral-100 rounded-[2.5rem] sm:rounded-[3rem] overflow-hidden border-[6px] sm:border-8 border-white shadow-2xl">
                        <img src="{{ asset('images/hero2.jpg') }}" alt="Mesk Agrotech" class="w-full h-full object-cover">
                    </div>

                    {{-- Floating Badge --}}
                    <div class="absolute -bottom-4 lg:-bottom-6 {{ app()->getLocale() === 'ar' ? '-right-2 sm:-right-6' : '-left-2 sm:-left-6' }} bg-white rounded-2xl p-3 sm:p-4 shadow-xl border border-neutral-100 flex items-center gap-3 animate-bounce" style="animation-duration: 3s;">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-accent-50 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <div>
                            <p class="text-[9px] sm:text-[10px] text-neutral-400 font-bold uppercase tracking-wider mb-0.5">{{ app()->getLocale() === 'ar' ? 'اعتماد الجودة' : 'Certified' }}</p>
                            <p class="text-[11px] sm:text-xs md:text-sm font-black text-neutral-900">{{ app()->getLocale() === 'ar' ? 'مرخص من الغذاء والدواء' : 'SFDA Approved' }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- 1.5. VISION 2030 BANNER --}}
<section class="relative py-8 sm:py-10 overflow-hidden">
    {{-- Beautiful Dynamic Background Gradient --}}
    <div class="absolute inset-0 bg-gradient-to-r from-primary-800 via-primary-600 to-accent-600"></div>

    {{-- Decorative grid overlay --}}
    <div class="absolute inset-0 opacity-[0.08] bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCI+CgkJPGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNmZmZmZmYiLz4KCTwvc3ZnPg==')] bg-[length:24px_24px] mix-blend-overlay"></div>

    {{-- Soft ambient glows --}}
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-white/20 blur-[100px] rounded-full -translate-y-1/2 translate-x-1/3"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-primary-900/30 blur-[80px] rounded-full translate-y-1/2 -translate-x-1/3"></div>

    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 relative z-10">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6 md:gap-8">
            <div class="flex flex-col sm:flex-row items-center text-center sm:text-left rtl:sm:text-right gap-4 sm:gap-6">
                {{-- Vision 2030 stylized icon --}}
                <div class="w-14 h-14 sm:w-16 sm:h-16 shrink-0 rounded-2xl bg-white/10 flex items-center justify-center border border-white/20 backdrop-blur-md shadow-lg transition-transform hover:scale-105">
                    <svg class="w-7 h-7 sm:w-8 sm:h-8 text-white drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl md:text-2xl font-black text-white mb-1.5 tracking-wide drop-shadow-sm">
                        {{ app()->getLocale() === 'ar' ? 'نساهم في تحقيق رؤية 2030' : 'Contributing to Vision 2030' }}
                    </h3>
                    <p class="text-white/90 text-xs sm:text-sm font-semibold drop-shadow-sm">
                        {{ app()->getLocale() === 'ar' ? 'نحو قطاع زراعي مستدام ومزدهر للمملكة العربية السعودية' : 'Towards a sustainable and thriving agricultural sector for Saudi Arabia' }}
                    </p>
                </div>
            </div>

            {{-- Official Vision 2030 Logo --}}
            <div class="flex items-center justify-center bg-white/10 border border-white/20 backdrop-blur-md py-3 px-6 sm:px-8 rounded-2xl shadow-lg hover:bg-white/15 transition-all">
                <img src="{{ asset('images/Saudi_Vision_2030_logo.svg') }}" alt="Saudi Vision 2030" class="h-10 sm:h-12 md:h-14 w-auto object-contain brightness-0 invert drop-shadow-md">
            </div>
        </div>
    </div>
</section>

{{-- 3. CATEGORIES --}}
@if($categories->count())
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

        {{-- Section header --}}
        <div class="flex items-end justify-between mb-12">
            <div>
                <div class="accent-line mb-4"></div>
                <h2 class="text-4xl font-black text-neutral-900">{{ __('messages.featured_categories') }}</h2>
            </div>
            <a href="{{ route('categories.index') }}"
               class="hidden sm:inline-flex items-center gap-1.5 text-sm font-bold text-neutral-500 hover:text-neutral-900 transition-colors">
                {{ app()->getLocale() === 'ar' ? 'عرض الكل' : 'View all' }}
                <svg class="w-4 h-4 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        {{-- Asymmetric grid: first item spans 2 rows --}}
        @php $cats = $categories->take(5); @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 auto-rows-[280px]">
            @foreach($cats as $i => $category)
                @if($i === 0)
                <div class="lg:row-span-2 lg:h-full h-[280px] rounded-3xl overflow-hidden hover-grow">
                    <x-category-card :category="$category" class="h-full"/>
                </div>
                @else
                <div class="rounded-3xl overflow-hidden hover-grow">
                    <x-category-card :category="$category"/>
                </div>
                @endif
            @endforeach
        </div>

    </div>
</section>
@endif


{{-- 4. FEATURED PRODUCTS --}}
@if($featuredProducts->count())
<section class="py-24 bg-neutral-50 border-t border-neutral-100">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

        <div class="flex items-end justify-between mb-12">
            <div>
                <div class="accent-line mb-4"></div>
                <h2 class="text-4xl font-black text-neutral-900">{{ __('messages.featured_products') }}</h2>
            </div>
            <a href="{{ route('products.index') }}"
               class="hidden sm:inline-flex items-center gap-1.5 text-sm font-bold text-neutral-500 hover:text-neutral-900 transition-colors">
                {{ app()->getLocale() === 'ar' ? 'عرض الكل' : 'View all' }}
                <svg class="w-4 h-4 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($featuredProducts as $product)
                <x-product-card :product="$product"/>
            @endforeach
        </div>

    </div>
</section>
@endif


{{-- 5. ABOUT — ORGANIC SHAPES --}}
@if($about)
<section class="py-24 bg-white overflow-hidden relative">
    <div class="absolute top-0 left-0 w-full h-[800px] bg-primary-50 rounded-br-[100px] sm:rounded-br-[200px] -z-10"></div>

    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

        {{-- Image with Organic Shape --}}
        <div class="relative">
            <div class="absolute inset-0 bg-primary-200 rounded-[3rem] translate-x-4 translate-y-4"></div>
            <div class="relative rounded-[3rem] overflow-hidden aspect-[4/5] border border-white shadow-xl">
                @if($about->hasMedia('image'))
                    <img src="{{ $about->getFirstMediaUrl('image') }}" alt="" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-primary-100 to-primary-300 flex items-center justify-center">
                        <svg class="w-24 h-24 text-primary-500/50" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
                    </div>
                @endif
            </div>

            {{-- Floating element --}}
            <div class="absolute top-12 {{ app()->getLocale() === 'ar' ? '-right-6 sm:-right-12' : '-left-6 sm:-left-12' }} bg-white p-4 rounded-2xl shadow-xl border border-neutral-100 animate-bounce" style="animation-duration: 3s;">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-accent-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <div>
                        <p class="text-xs text-neutral-500 font-bold uppercase tracking-wider">{{ app()->getLocale() === 'ar' ? 'طاقة' : 'Energy' }}</p>
                        <p class="text-sm font-black text-neutral-900">{{ app()->getLocale() === 'ar' ? 'نمو مستدام' : 'Sustainable Growth' }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Content --}}
        <div>
            <p class="inline-block px-4 py-1.5 rounded-full bg-primary-50 text-primary-700 text-xs font-bold tracking-widest uppercase mb-6 border border-primary-100">
                {{ __('messages.about_preview_title') }}
            </p>

            <h2 class="text-4xl lg:text-5xl font-black text-neutral-900 leading-tight mb-6">
                {{ $about->getTranslation('title', app()->getLocale()) }}
            </h2>

            <p class="text-neutral-500 text-base leading-relaxed font-light mb-10 max-w-lg">
                {!! Str::limit(strip_tags($about->getTranslation('description', app()->getLocale())), 320) !!}
            </p>

            <a href="{{ route('about') }}"
               class="inline-flex items-center gap-2 px-8 py-4 bg-neutral-900 hover:bg-neutral-800 text-white font-bold rounded-2xl transition-all duration-300 shadow-md">
                {{ app()->getLocale() === 'ar' ? 'اكتشف قصتنا' : 'Discover Our Story' }}
                <svg class="w-4.5 h-4.5 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

    </div>
</section>
@endif


{{-- 6. WHATSAPP CTA --}}
@if(!empty($settings->whatsapp))
<section class="py-16 bg-white border-t border-neutral-100">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
            <div>
                <h3 class="text-2xl font-black text-neutral-900">{{ __('messages.whatsapp_cta_title') }}</h3>
                <p class="mt-1 text-sm text-neutral-400 font-light">{{ __('messages.whatsapp_cta_subtitle') }}</p>
            </div>
            <a href="https://wa.me/{{ $settings->whatsapp }}?text={{ urlencode(app()->getLocale() === 'ar' ? 'السلام عليكم، أود الحصول على نسخة من دليل المنتجات.' : 'Hello, I would like to get the latest Mesk products catalog.') }}"
               target="_blank"
               class="shrink-0 inline-flex items-center gap-2.5 px-8 py-4 bg-neutral-900 hover:bg-neutral-800 text-white font-bold rounded-xl transition-all duration-200 text-sm">
                <svg class="w-4.5 h-4.5 fill-current text-emerald-400" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                {{ __('messages.whatsapp_cta_button') }}
            </a>
        </div>
    </div>
</section>
@endif

@endsection
