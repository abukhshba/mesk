@extends('layouts.app')

@section('title', ($settings->company_name ?? 'شركة مسك للأسمدة الزراعية') . ' | المسك للزراعة - الشركة الرائدة في السعودية')
@section('description', "شركة مسك للأسمدة الزراعية في المملكة العربية السعودية - نوفر أفضل الأسمدة الزراعية والمبيدات لتحقيق أعلى إنتاجية. Mesk Agricultural Fertilizers - Saudi Arabia's leading fertilizer company aligned with Vision 2030.")
@section('keywords', 'مسك, المسك, شركة المسك, شركة المسك للأسمدة, شركة المسك للاسمدة الزراعية, المسك للزراعة, مسك للأسمدة, المسك للمبيدات والأسمدة, أسمدة زراعية السعودية, مبيدات زراعية, أسمدة NPK, Mesk, Mesk Agri, Mesk Saudi Arabia, Mesk Agricultural Fertilizers, mesk fertilizers, agricultural company Saudi Arabia, اسمدة المسك, مسك اسمدة')
@section('og_title', ($settings->company_name ?? 'شركة مسك للأسمدة الزراعية') . ' | الشركة الرائدة في السعودية')
@section('og_description', "شركة مسك للأسمدة الزراعية - نوفر أفضل الأسمدة الزراعية والمبيدات في المملكة العربية السعودية. Mesk - Saudi Arabia's leading agricultural fertilizer company.")


@section('schema')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@graph": [
        {
            "@type": "WebSite",
            "url": "{{ url('/') }}",
            "name": "{{ $settings->company_name ?? 'شركة مسك للأسمدة الزراعية' }}",
            "alternateName": ["مسك", "المسك", "Mesk Agri", "شركة المسك", "المسك للزراعة"],
            "description": "شركة مسك للأسمدة الزراعية - الشركة الرائدة في المملكة العربية السعودية",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "{{ url('/products') }}?search={search_term_string}",
                "query-input": "required name=search_term_string"
            }
        },
        {
            "@type": "LocalBusiness",
            "@id": "{{ url('/') }}#business",
            "name": "{{ $settings->company_name ?? 'شركة مسك للأسمدة الزراعية' }}",
            "alternateName": ["مسك", "المسك", "شركة المسك", "Mesk Agricultural Fertilizers", "Mesk Agri", "المسك للزراعة", "مسك للأسمدة", "شركة المسك للاسمدة الزراعية"],
            "image": "{{ asset('images/logo.png') }}",
            "logo": "{{ asset('images/logo.png') }}",
            "url": "{{ url('/') }}",
            "telephone": "{{ $settings->phone ?? '' }}",
            "priceRange": "$$",
            "address": {
                "@type": "PostalAddress",
                "addressCountry": "SA",
                "addressRegion": "المملكة العربية السعودية"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": "24.7136",
                "longitude": "46.6753"
            },
            "areaServed": {
                "@type": "Country",
                "name": "Saudi Arabia"
            },
            "description": "شركة مسك للأسمدة الزراعية - الشركة الرائدة في المملكة العربية السعودية لتوريد الأسمدة والمبيدات الزراعية. Mesk Agricultural Fertilizers is Saudi Arabia's premier agricultural fertilizer supplier, supporting Vision 2030 food security goals.",
            "knowsAbout": ["أسمدة زراعية", "مبيدات زراعية", "NPK fertilizers", "agricultural solutions", "الأمن الغذائي", "رؤية 2030"]
        }
    ]
}
</script>
@endsection


@section('content')

{{-- SECTION 1: HERO & OVERLAPPING STATS PANELS --}}
<section class="relative bg-white pt-4 pb-6 sm:pb-8 overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-12 text-center">
        <!-- Hero Text -->
        <!-- <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black text-neutral-900 leading-tight tracking-tight mb-6 sm:mb-8" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
            {{ app()->getLocale() === 'ar' ? 'تغذية عالم متزايد' : 'Feeding a growing world' }}
        </h1> -->

        <!-- Hero Image Frame -->
        <div class="relative rounded-[2rem] overflow-hidden shadow-2xl border-[6px] sm:border-[8px] border-white w-full sm:max-w-6xl mx-auto z-10 h-auto sm:h-[560px]">
            <video class="w-full h-auto sm:h-full sm:object-cover block" autoplay loop muted playsinline preload="none" poster="{{ asset('images/hero2.jpg') }}">
                <source src="{{ asset('images/vidnew.mp4') }}" type="video/mp4">
            </video>
        </div>

        <!-- Overlapping Stats Cards Grid -->
        <div class="relative z-20 max-w-4xl mx-auto mt-6 sm:mt-2 px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 sm:gap-4">
                <!-- Panel 1: Agent (Green) -->
                <div class="bg-[#137547] text-white rounded-2xl sm:rounded-3xl py-2.5 sm:py-3 lg:py-3.5 px-3 sm:px-5 lg:px-6 flex items-center gap-2 sm:gap-4 shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 shrink-0 rounded-full bg-white flex items-center justify-center text-primary-600 shadow-md">
                        <!-- Saudi Map / Leaf SVG -->
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 lg:w-7 lg:h-7 text-[#137547]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-11.314l.707.707m11.314 11.314l.707-.707M12 5a7 7 0 100 14 7 7 0 000-14z" />
                        </svg>
                    </div>
                    <div class="text-left rtl:text-right">
                        <p class="text-[11px] sm:text-xs lg:text-[14px] font-bold leading-snug">
                            {{ app()->getLocale() === 'ar' ? 'المصنع وكيل لكبرى الشركات العالمية لتصنيع خامات الاسمدة فى العالم.' : 'The factory is an agent for major international companies manufacturing raw materials for fertilizers worldwide.' }}
                        </p>
                    </div>
                </div>

                <!-- Panel 2: Products (Navy) -->
                <div class="bg-[#0b3c5d] text-white rounded-2xl sm:rounded-3xl py-2.5 sm:py-3 lg:py-3.5 px-3 sm:px-5 lg:px-6 flex items-center gap-2 sm:gap-4 shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 shrink-0 rounded-full bg-white flex items-center justify-center text-primary-600 shadow-md">
                        <!-- Flask / Beaker SVG -->
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 lg:w-7 lg:h-7 text-[#0b3c5d]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <div class="text-left rtl:text-right">
                        <p class="text-lg sm:text-2xl lg:text-3xl font-black leading-tight">{{ app()->getLocale() === 'ar' ? '+٨٠ منتجاً' : '+80 Products' }}</p>
                        <p class="text-[10px] sm:text-[11px] lg:text-sm font-semibold opacity-90 mt-0.5 sm:mt-1">{{ app()->getLocale() === 'ar' ? 'مبتكر وفعال' : 'Innovative & effective' }}</p>
                    </div>
                </div>

                <!-- Panel 3: Agents (Yellow) -->
                <div class="bg-[#F4B400] text-white rounded-2xl sm:rounded-3xl py-2.5 sm:py-3 lg:py-3.5 px-3 sm:px-5 lg:px-6 flex items-center gap-2 sm:gap-4 shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 shrink-0 rounded-full bg-white flex items-center justify-center text-primary-600 shadow-md">
                        <!-- Users SVG -->
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 lg:w-7 lg:h-7 text-[#F4B400]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div class="text-left rtl:text-right">
                        <p class="text-lg sm:text-2xl lg:text-3xl font-black leading-tight">{{ app()->getLocale() === 'ar' ? '+٦٠ وكيلاً' : '+60 Agents' }}</p>
                        <p class="text-[10px] sm:text-[11px] lg:text-sm font-semibold opacity-90 mt-0.5 sm:mt-1">{{ app()->getLocale() === 'ar' ? 'داخل المملكة وحول العالم' : 'within the Kingdom and worldwide' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SECTION 2: PARALLAX DRONE SPRAYING BANNER --}}
<style>
    .section-parallax { min-height: 300px; }
    @verbatim @media (min-width: 768px) { .section-parallax { min-height: 600px; } } @endverbatim
</style>
<section class="relative flex items-center justify-center overflow-hidden bg-neutral-900 section-parallax">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/img221.jpg') }}" alt="Drone Crop Spraying" class="w-full h-full object-cover brightness-80">
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
<section class="py-6 sm:py-12 bg-white">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-12">
        <!-- Section Header -->
        <div class="text-center mb-8 sm:mb-10">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-neutral-900 mb-4 tracking-tight" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
                {{ app()->getLocale() === 'ar' ? 'تصفح الاقسام' : 'Explore Categories' }}
            </h2>
            <div class="w-24 h-1.5 bg-[#137547] mx-auto rounded-full"></div>
        </div>

        <!-- Premium Grid of Dynamic Categories -->
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-8 mb-10">
            @foreach($categories as $category)
                @php
                    $cardHref = ($categoriesDisplayMode === 'children' && $singleParent)
                        ? route('categories.subcategory', [$singleParent->slug, $category->slug])
                        : route('categories.show', $category->slug);
                @endphp
                <a href="{{ $cardHref }}" class="group relative block w-full bg-white rounded-[1.5rem] sm:rounded-[2rem] p-4 sm:p-10 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-neutral-100 transition-all duration-500 hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)] hover:-translate-y-2 overflow-hidden flex flex-col h-full">

                    <!-- Decorative background gradient (hidden by default, fades in on hover) -->
                    <div class="absolute inset-0 bg-gradient-to-br from-[#137547]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <div class="relative z-10 flex flex-col items-center h-full">
                        <!-- Image Container -->
                        <div class="w-full h-24 sm:h-60 mb-4 sm:mb-8 relative flex items-center justify-center transition-transform duration-500 group-hover:scale-110">
                            @if($category->hasMedia('image'))
                                <img src="{{ $category->getFirstMediaUrl('image') }}" alt="{{ $category->getTranslation('name', app()->getLocale()) }}" loading="lazy" class="relative z-10 w-full h-full object-contain transition-transform duration-500">
                            @else
                                <img src="{{ asset('images/categories/'.$category->id.'.png')}}" 
            alt="{{ $category->getTranslation('name', app()->getLocale()) }}" loading="lazy" class="relative z-10 w-full h-full object-contain transition-transform duration-500">
        
                            @endif
                        </div>

                        <!-- Text & Icon -->
                        <div class="w-full flex items-center justify-center sm:justify-between mt-auto">
                            <span class="text-xs sm:text-2xl font-black text-neutral-900 group-hover:text-[#137547] transition-colors duration-300 text-center sm:text-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }}" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
                                {{ $category->getTranslation('name', app()->getLocale()) }}
                            </span>

                            <!-- Arrow Icon Container (Hidden on mobile) -->
                            <div class="hidden sm:flex w-10 h-10 shrink-0 rounded-full bg-neutral-50 items-center justify-center text-neutral-400 group-hover:bg-[#137547] group-hover:text-white transition-all duration-300 {{ app()->getLocale() === 'ar' ? 'rotate-180 group-hover:-translate-x-1' : 'group-hover:translate-x-1' }}">
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
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-6 max-w-6xl mx-auto mt-10">
            <!-- Feature 1: Expert Technical Support (Navy) -->
            <div class="bg-[#0b3c5d] text-white rounded-2xl sm:rounded-3xl p-4 sm:p-8 flex items-center gap-4 sm:gap-6 shadow-lg transition-all hover:-translate-y-0.5">
                <div class="w-14 h-14 sm:w-16 sm:h-16 shrink-0 rounded-full bg-white flex items-center justify-center shadow-md">
                    <svg class="w-8 h-8 text-[#0b3c5d]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <div class="text-left rtl:text-right">
                    <p class="text-xl sm:text-2xl font-black leading-tight">{{ app()->getLocale() === 'ar' ? 'دعم فني متخصص' : 'Expert Technical Support' }}</p>
                </div>
            </div>

            <!-- Feature 2: Local with High Quality (Green) -->
            <div class="bg-[#137547] text-white rounded-2xl sm:rounded-3xl p-4 sm:p-8 flex items-center gap-4 sm:gap-6 shadow-lg transition-all hover:-translate-y-0.5">
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

            <!-- Feature 3: Certified Saudi Product (Yellow) -->
            <div class="bg-[#F4B400] text-white rounded-2xl sm:rounded-3xl p-4 sm:p-8 flex items-center gap-4 sm:gap-6 shadow-lg transition-all hover:-translate-y-0.5">
                <div class="w-14 h-14 sm:w-16 sm:h-16 shrink-0 rounded-full bg-white flex items-center justify-center shadow-md">
                    <svg class="w-8 h-8 text-[#F4B400]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                    </svg>
                </div>
                <div class="text-left rtl:text-right">
                    <p class="text-xl sm:text-2xl font-black leading-tight">{{ app()->getLocale() === 'ar' ? 'منتج سعودي معتمد' : 'Certified Saudi Product' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- SECTION 4: REAL DYNAMIC PRODUCTS --}}
@if($featuredProducts->count())
<section class="py-6 sm:py-12 bg-neutral-50 border-t border-neutral-100">
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
<section class="relative w-full bg-[#ededed] overflow-hidden border-t border-b border-neutral-200">

    <!-- Faint Background Logo (Watermark) -->
    <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
        <img src="{{ asset('images/water_mark-removebg-preview.svg') }}" alt="Watermark" loading="lazy" class="w-full h-full object-cover" style="object-position: center 25%;">
    </div>

    <!-- Soil Background & Logos Container -->
    <div class="relative w-full z-20 pt-[60px] sm:pt-[100px] lg:pt-[150px]">

        <!-- Wrapper to tie Logos strictly to the Soil Image aspect ratio -->
        <div class="relative w-full">

            <!-- The Vision Logos (Overlapping the soil) -->
            <div class="absolute bottom-[48%] sm:bottom-[54%] lg:bottom-[60%] left-0 w-full z-30 pointer-events-none -translate-y-[23px]">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-start items-end gap-1.5 sm:gap-5 lg:gap-8">
                    <img src="{{ asset('images/Saudi_Vision_2030_logo.svg') }}" alt="Saudi Vision 2030" loading="lazy" class="h-10 sm:h-26 lg:h-36 w-auto object-contain drop-shadow-md">
                    <img src="{{ asset('images/iso-logo.png') }}" alt="ISO Certified" loading="lazy" class="h-10 sm:h-26 lg:h-36 w-auto object-contain drop-shadow-md">
                    <img src="{{ asset('images/saudi-made.png') }}" alt="Saudi Made" loading="lazy" class="h-10 sm:h-26 lg:h-36 w-auto object-contain drop-shadow-md">
                </div>
            </div>

            <!-- The Soil Image (Switches on Language) -->
            <div class="w-full">
                @if(app()->getLocale() === 'ar')
                    <img src="{{ asset('images/soil-right-removebg-preview.png') }}" alt="Soil" loading="lazy" class="w-full h-auto block">
                @else
                    <img src="{{ asset('images/soil-left-removebg-preview.png') }}" alt="Soil" loading="lazy" class="w-full h-auto block">
                @endif
            </div>

            <!-- Certification Text Over Soil -->
            <div class="absolute bottom-4 sm:bottom-8 lg:bottom-12 left-0 w-full z-30 pointer-events-none text-center px-4">
                <p class="text-white/90 text-[7px] sm:text-base lg:text-lg font-medium drop-shadow-md tracking-wide" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
                    {{ app()->getLocale() === 'ar' ? 'شركة سعودية حاصلة على شهادة ISO 9001:2015 وتحمل علامة صنع في السعودية.' : 'A Saudi company certified to ISO 9001:2015 and proudly carrying the Saudi Made mark.' }}
                </p>
            </div>

        </div>

    </div>
</section>

@endsection
