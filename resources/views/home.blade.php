@extends('layouts.app')

@section('title', $settings->company_name ?? __('app.hero_title'))

@section('content')

{{-- SECTION 1: HERO & OVERLAPPING STATS PANELS --}}
<section class="relative bg-white pt-4 pb-6 sm:pb-8 overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-12 text-center">
        <!-- Hero Text -->
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-neutral-900 leading-tight tracking-tight mb-6 sm:mb-8" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
            {{ app()->getLocale() === 'ar' ? 'تغذية عالم متزايد' : 'Feeding a growing world' }}
        </h1>

        <!-- Hero Image Frame -->
        <div class="relative w-full aspect-[4/3] sm:aspect-[21/9] lg:aspect-[24/9] rounded-[2rem] overflow-hidden shadow-2xl border-[6px] sm:border-[8px] border-white max-w-6xl mx-auto z-10">
            <video class="w-full h-full object-cover" autoplay loop muted playsinline>
                <source src="{{ asset('images/vid1.mp4') }}" type="video/mp4">
            </video>
        </div>

        <!-- Overlapping Stats Cards Grid -->
        <div class="relative z-20 max-w-6xl mx-auto -mt-12 sm:-mt-16 lg:-mt-20 px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 sm:gap-6">
                <!-- Panel 1: Saudi Branches (Green) -->
                <div class="bg-[#137547] text-white rounded-2xl sm:rounded-3xl p-4 sm:p-8 flex items-center gap-3 sm:gap-6 shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 shrink-0 rounded-full bg-white flex items-center justify-center text-primary-600 shadow-md">
                        <!-- Saudi Map / Leaf SVG -->
                        <svg class="w-6 h-6 sm:w-8 sm:h-8 text-[#137547]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-11.314l.707.707m11.314 11.314l.707-.707M12 5a7 7 0 100 14 7 7 0 000-14z" />
                        </svg>
                    </div>
                    <div class="text-left rtl:text-right">
                        <p class="text-xl sm:text-3xl font-black leading-tight">{{ app()->getLocale() === 'ar' ? '١٦ فرعاً' : '16 Branches' }}</p>
                        <p class="text-[11px] sm:text-sm font-semibold opacity-90 mt-0.5 sm:mt-1">{{ app()->getLocale() === 'ar' ? 'في المملكة العربية السعودية' : 'In the Kingdom of Saudi Arabia' }}</p>
                    </div>
                </div>

                <!-- Panel 2: Worldwide (Navy) -->
                <div class="bg-[#0b3c5d] text-white rounded-2xl sm:rounded-3xl p-4 sm:p-8 flex items-center gap-3 sm:gap-6 shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 shrink-0 rounded-full bg-white flex items-center justify-center text-primary-600 shadow-md">
                        <!-- Globe SVG -->
                        <svg class="w-6 h-6 sm:w-8 sm:h-8 text-[#0b3c5d]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="text-left rtl:text-right">
                        <p class="text-xl sm:text-3xl font-black leading-tight">{{ app()->getLocale() === 'ar' ? '٢٥+ فرعاً' : '25+ Branches' }}</p>
                        <p class="text-[11px] sm:text-sm font-semibold opacity-90 mt-0.5 sm:mt-1">{{ app()->getLocale() === 'ar' ? 'حول العالم' : 'Worldwide' }}</p>
                    </div>
                </div>

                <!-- Panel 3: Factories (Yellow) -->
                <div class="bg-[#F4B400] text-white rounded-2xl sm:rounded-3xl p-4 sm:p-8 flex items-center gap-3 sm:gap-6 shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 shrink-0 rounded-full bg-white flex items-center justify-center text-primary-600 shadow-md">
                        <!-- Factory SVG -->
                        <svg class="w-6 h-6 sm:w-8 sm:h-8 text-[#F4B400]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div class="text-left rtl:text-right">
                        <p class="text-lg sm:text-2xl font-black leading-tight">{{ app()->getLocale() === 'ar' ? '٦ مصانع دولية' : '6 International Factories' }}</p>
                        <p class="text-[11px] sm:text-sm font-semibold opacity-90 mt-0.5 sm:mt-1">{{ app()->getLocale() === 'ar' ? 'في الشرق الأوسط وأوروبا' : 'In MENA & Europe' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SECTION 2: PARALLAX DRONE SPRAYING BANNER --}}
<style>
    .section-parallax { min-height: 300px; }
    @media (min-width: 768px) { .section-parallax { min-height: 600px; } }
</style>
<section class="relative flex items-center justify-center overflow-hidden bg-neutral-900 section-parallax">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/tractor-working-green-field.jpg') }}" alt="Drone Crop Spraying" class="w-full h-full object-cover brightness-50">
        <div class="absolute inset-0 bg-emerald-950/20 mix-blend-overlay"></div>
    </div>

    <!-- Centered Text -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center text-white">
        <h2 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-wide mb-4" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
            {{ app()->getLocale() === 'ar' ? 'عالم من الابتكار' : 'A world of innovation' }}
        </h2>
        <p class="text-lg sm:text-xl md:text-2xl font-medium opacity-90 max-w-2xl mx-auto">
            {{ app()->getLocale() === 'ar' ? 'نعمل اليوم من أجل مستقبل الزراعة' : 'We work today for the future of agriculture' }}
        </p>
    </div>
</section>

{{-- SECTION 3: DYNAMIC ILLUSTRATED CATEGORIES --}}
@if($categories->count())
<section class="py-10 sm:py-12 bg-white">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-12">
        <!-- Section Header -->
        <div class="text-center mb-8 sm:mb-10">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-neutral-900 mb-4 tracking-tight" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
                {{ app()->getLocale() === 'ar' ? 'تصفح الاصناف' : 'Explore Categories' }}
            </h2>
            <div class="w-24 h-1.5 bg-[#137547] mx-auto rounded-full"></div>
        </div>

        <!-- Premium Grid of Dynamic Categories -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 mb-10">
            @foreach($categories as $category)
                @php
                    $cardHref = ($categoriesDisplayMode === 'children' && $singleParent)
                        ? route('categories.subcategory', [$singleParent->slug, $category->slug])
                        : route('categories.show', $category->slug);
                @endphp
                <a href="{{ $cardHref }}" class="group relative block w-full bg-white rounded-[2rem] p-8 sm:p-10 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-neutral-100 transition-all duration-500 hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)] hover:-translate-y-2 overflow-hidden">
                    
                    <!-- Decorative background gradient (hidden by default, fades in on hover) -->
                    <div class="absolute inset-0 bg-gradient-to-br from-[#137547]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <div class="relative z-10 flex flex-col items-center">
                        <!-- Image Container -->
                        <div class="w-full h-48 sm:h-60 mb-6 sm:mb-8 relative flex items-center justify-center transition-transform duration-500 group-hover:scale-110">
                            @if($category->hasMedia('image'))
                                <img src="{{ $category->getFirstMediaUrl('image') }}" alt="{{ $category->getTranslation('name', app()->getLocale()) }}" class="relative z-10 w-full h-full object-contain transition-transform duration-500">
                            @else
                                <div class="relative z-10 w-40 h-40 bg-gradient-to-br from-neutral-100 to-neutral-200 flex items-center justify-center rounded-full shadow-inner">
                                    <span class="text-neutral-400 text-5xl font-black">{{ mb_substr($category->getTranslation('name', app()->getLocale()), 0, 1) }}</span>
                                </div>
                            @endif
                        </div>

                        <!-- Text & Icon -->
                        <div class="w-full flex items-center justify-between mt-auto">
                            <span class="text-xl sm:text-2xl font-black text-neutral-900 group-hover:text-[#137547] transition-colors duration-300" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
                                {{ $category->getTranslation('name', app()->getLocale()) }}
                            </span>
                            
                            <!-- Arrow Icon Container -->
                            <div class="w-10 h-10 shrink-0 rounded-full bg-neutral-50 flex items-center justify-center text-neutral-400 group-hover:bg-[#137547] group-hover:text-white transition-all duration-300 {{ app()->getLocale() === 'ar' ? 'rotate-180 group-hover:-translate-x-1' : 'group-hover:translate-x-1' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Overlapping Brand Features Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto mt-10">
            <!-- Feature 1: Fast Delivery (Navy) -->
            <div class="bg-[#0b3c5d] text-white rounded-2xl sm:rounded-3xl p-6 sm:p-8 flex items-center gap-5 sm:gap-6 shadow-lg transition-all hover:-translate-y-0.5">
                <div class="w-14 h-14 sm:w-16 sm:h-16 shrink-0 rounded-full bg-white flex items-center justify-center shadow-md">
                    <!-- Delivery Truck SVG -->
                    <svg class="w-8 h-8 text-[#0b3c5d]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10M13 16h4M17 16h2.586a1 1 0 00.707-.293l2.414-2.414a1 1 0 00.293-.707V11.5a1.5 1.5 0 00-1.5-1.5H17m0 6v-6" />
                    </svg>
                </div>
                <div class="text-left rtl:text-right">
                    <p class="text-xl sm:text-2xl font-black leading-tight">{{ app()->getLocale() === 'ar' ? 'توصيل سريع' : 'Fast Delivery' }}</p>
                </div>
            </div>

            <!-- Feature 2: Local with High Quality (Green) -->
            <div class="bg-[#137547] text-white rounded-2xl sm:rounded-3xl p-6 sm:p-8 flex items-center gap-5 sm:gap-6 shadow-lg transition-all hover:-translate-y-0.5">
                <div class="w-14 h-14 sm:w-16 sm:h-16 shrink-0 rounded-full bg-white flex items-center justify-center shadow-md">
                    <!-- Leaf / Badge check SVG -->
                    <svg class="w-8 h-8 text-[#137547]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <div class="text-left rtl:text-right">
                    <p class="text-xl sm:text-2xl font-black leading-tight">{{ app()->getLocale() === 'ar' ? 'إنتاج محلي بجودة عالية' : 'Local with High Quality' }}</p>
                </div>
            </div>

            <!-- Feature 3: Secured Payment Methods (Yellow) -->
            <div class="bg-[#F4B400] text-white rounded-2xl sm:rounded-3xl p-6 sm:p-8 flex items-center gap-5 sm:gap-6 shadow-lg transition-all hover:-translate-y-0.5">
                <div class="w-14 h-14 sm:w-16 sm:h-16 shrink-0 rounded-full bg-white flex items-center justify-center shadow-md">
                    <!-- Secured Card SVG -->
                    <svg class="w-8 h-8 text-[#F4B400]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5-4v2M9 8h6M5 16h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="text-left rtl:text-right">
                    <p class="text-xl sm:text-2xl font-black leading-tight">{{ app()->getLocale() === 'ar' ? 'طرق دفع آمنة' : 'Secured Payment Methods' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- SECTION 4: REAL DYNAMIC PRODUCTS --}}
@if($featuredProducts->count())
<section class="py-10 sm:py-12 bg-neutral-50 border-t border-neutral-100">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-12">
        
        <!-- Header -->
        <div class="flex items-end justify-between mb-8">
            <div>
                <div class="w-12 h-1 bg-[#137547] rounded-full mb-3"></div>
                <h2 class="text-3xl sm:text-4xl font-black text-neutral-900" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
                    {{ __('app.featured_products') }}
                </h2>
            </div>
            <a href="{{ route('products.index') }}"
               class="inline-flex items-center gap-1.5 text-sm font-bold text-neutral-500 hover:text-neutral-900 transition-colors">
                {{ app()->getLocale() === 'ar' ? 'عرض الكل' : 'View all' }}
                <svg class="w-4 h-4 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-5">
            @foreach($featuredProducts as $product)
                <x-product-card :product="$product"/>
            @endforeach
        </div>

    </div>
</section>
@endif

{{-- SECTION 5: CERTIFICATIONS & PARTNERSHIPS (SOIL & VISION LOGOS) --}}
<section class="relative w-full bg-white overflow-hidden border-t border-b border-neutral-200">
    
    <!-- Faint Background Logo (Watermark) -->
    <div class="absolute inset-0 z-0 flex items-center justify-end pointer-events-none">
        <img src="{{ asset('images/favicon-removebg-preview.png') }}" alt="Watermark" class="w-[150%] sm:w-[120%] lg:w-[100%] max-w-[1800px] object-contain grayscale opacity-[0.10] ltr:translate-x-[15%] rtl:-translate-x-[15%]">
    </div>

    <!-- Soil Background & Logos Container -->
    <div class="relative w-full z-20 pt-[60px] sm:pt-[100px] lg:pt-[150px]">
        
        <!-- Wrapper to tie Logos strictly to the Soil Image aspect ratio -->
        <div class="relative w-full">
            
            <!-- The Vision Logos (Overlapping the soil) -->
            <div class="absolute bottom-[38%] sm:bottom-[42%] lg:bottom-[48%] left-0 w-full z-30 pointer-events-none -translate-y-[10px]">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-start items-end gap-2 sm:gap-8 lg:gap-12">
                    <img src="{{ asset('images/Saudi_Vision_2030_logo.svg') }}" alt="Saudi Vision 2030" class="h-16 sm:h-32 lg:h-44 w-auto object-contain drop-shadow-md">
                    <img src="{{ asset('images/iso-logo.png') }}" alt="ISO Certified" class="h-16 sm:h-32 lg:h-44 w-auto object-contain drop-shadow-md">
                    <img src="{{ asset('images/saudi-made.png') }}" alt="Saudi Made" class="h-16 sm:h-32 lg:h-44 w-auto object-contain drop-shadow-md">
                </div>
            </div>

            <!-- The Soil Image (Switches on Language) -->
            <div class="w-full">
                @if(app()->getLocale() === 'ar')
                    <img src="{{ asset('images/soil-right-removebg-preview.png') }}" alt="Soil" class="w-full h-auto block">
                @else
                    <img src="{{ asset('images/soil-left-removebg-preview.png') }}" alt="Soil" class="w-full h-auto block">
                @endif
            </div>

            <!-- Certification Text Over Soil -->
            <div class="absolute bottom-4 sm:bottom-8 lg:bottom-12 left-0 w-full z-30 pointer-events-none text-center px-4">
                <p class="text-white/90 text-[10px] sm:text-base lg:text-lg font-medium drop-shadow-md tracking-wide" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
                    {{ app()->getLocale() === 'ar' ? 'شركة سعودية حاصلة على شهادة ISO 9001:2015 وتحمل علامة صنع في السعودية.' : 'A Saudi company certified to ISO 9001:2015 and proudly carrying the Saudi Made mark.' }}
                </p>
            </div>

        </div>
        
    </div>
</section>

@endsection
