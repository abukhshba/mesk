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
                <source src="{{ asset('images/vidnew_1 2.mp4') }}" type="video/mp4">
            </video>
        </div>

        <!-- Overlapping Stats Cards — Infinite Marquee -->
        <style>
            @keyframes statsMarqueeLtr {
                0%   { transform: translateX(0); }
                100% { transform: translateX(-50%); }
            }
            @keyframes statsMarqueeRtl {
                0%   { transform: translateX(0); }
                100% { transform: translateX(50%); }
            }
            .stats-track-ltr { animation: statsMarqueeLtr 18s linear infinite; }
            .stats-track-rtl { animation: statsMarqueeRtl 18s linear infinite; }
        </style>
        <div class="relative z-20 w-full mt-6 sm:mt-8 overflow-hidden">
            <!-- Fade edges -->
            <div class="absolute inset-y-0 left-0 w-16 sm:w-28 z-10 pointer-events-none" style="background: linear-gradient(to right, white, transparent);"></div>
            <div class="absolute inset-y-0 right-0 w-16 sm:w-28 z-10 pointer-events-none" style="background: linear-gradient(to left, white, transparent);"></div>

            <div class="{{ app()->getLocale() === 'ar' ? 'stats-track-rtl' : 'stats-track-ltr' }} flex gap-3 sm:gap-4 w-max">
                @php
                    $statsCards = [
                        [
                            'bg' => '#137547',
                            'icon_color' => '#137547',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-11.314l.707.707m11.314 11.314l.707-.707M12 5a7 7 0 100 14 7 7 0 000-14z" />',
                            'title_ar' => null,
                            'title_en' => null,
                            'text_ar' => 'المصنع وكيل لكبرى الشركات العالمية لتصنيع خامات الاسمدة فى العالم.',
                            'text_en' => 'Agent for major global fertilizer raw material manufacturers.',
                        ],
                        [
                            'bg' => '#0b3c5d',
                            'icon_color' => '#0b3c5d',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />',
                            'title_ar' => $productsCountAr . '+ منتجاً',
                            'title_en' => '+' . $productsCount . ' Products',
                            'text_ar' => 'مبتكر وفعال',
                            'text_en' => 'Innovative & effective',
                        ],
                        [
                            'bg' => '#F4B400',
                            'icon_color' => '#F4B400',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />',
                            'title_ar' => '٦٠+ وكيلاً',
                            'title_en' => '+60 Agents',
                            'text_ar' => 'داخل المملكة وحول العالم',
                            'text_en' => 'Within the Kingdom and worldwide',
                        ],
                    ];
                    $locale = app()->getLocale();
                    // Duplicate 4× for seamless infinite loop
                    $allCards = array_merge($statsCards, $statsCards, $statsCards, $statsCards);
                @endphp

                @foreach($allCards as $card)
                <div class="shrink-0 w-52 sm:w-80 text-white rounded-xl sm:rounded-3xl py-2 px-3 sm:py-3 sm:px-5 lg:px-6 flex items-center justify-center gap-2 sm:gap-4 shadow-xl"
                     style="background-color: {{ $card['bg'] }};">
                    <div class="w-8 h-8 sm:w-12 sm:h-12 lg:w-14 lg:h-14 shrink-0 rounded-full bg-white flex items-center justify-center shadow-md">
                        <svg class="w-4 h-4 sm:w-6 sm:h-6 lg:w-7 lg:h-7" fill="none" stroke="{{ $card['icon_color'] }}" stroke-width="2" viewBox="0 0 24 24">{!! $card['icon'] !!}</svg>
                    </div>
                    <div class="text-center min-w-0">
                        @if($card['title_' . $locale])
                        <p class="text-sm sm:text-2xl lg:text-3xl font-black leading-tight">{{ $card['title_' . $locale] }}</p>
                        @endif
                        <p class="text-[9px] sm:text-[11px] lg:text-sm font-semibold {{ $card['title_' . $locale] ? 'opacity-90 mt-0.5 sm:mt-1' : 'leading-snug' }}">{{ $card['text_' . $locale] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- SECTION 2: PARALLAX DRONE SPRAYING BANNER --}}
<style>
@keyframes kenBurns {
    0%   { transform: scale(1)    translateX(0);      }
    50%  { transform: scale(1.08) translateX(-1%);    }
    100% { transform: scale(1)    translateX(0);      }
}
@keyframes bannerReveal {
    0%   { opacity: 0; transform: translateY(30px); }
    100% { opacity: 1; transform: translateY(0);    }
}
@keyframes lineExpand {
    0%   { width: 0;    opacity: 0; }
    100% { width: 80px; opacity: 1; }
}
@keyframes floatBadge {
    0%, 100% { transform: translateY(0);    }
    50%       { transform: translateY(-8px); }
}
@keyframes pulseRing {
    0%   { transform: scale(1);    opacity: .6; }
    100% { transform: scale(1.55); opacity: 0;  }
}
@keyframes diagonalSlide {
    0%   { transform: translateX(-100%) skewX(-15deg); }
    100% { transform: translateX(200%)  skewX(-15deg); }
}
.banner-bg    { animation: kenBurns 20s ease-in-out infinite; }
.banner-line  { animation: lineExpand .8s .6s cubic-bezier(.22,.68,0,1.2) both; }
.banner-h2    { animation: bannerReveal .8s .3s both; }
.banner-p     { animation: bannerReveal .8s .55s both; }
.banner-cta   { animation: bannerReveal .8s .75s both; }
.badge-left   { animation: floatBadge 4s 0s   ease-in-out infinite, bannerReveal .7s .9s  both; }
.badge-right  { animation: floatBadge 4s 1.5s ease-in-out infinite, bannerReveal .7s 1.1s both; }
.pulse-ring   { animation: pulseRing 2s ease-out infinite; }
.shine-sweep  { animation: diagonalSlide 5s 2s linear infinite; }
</style>

<section class="relative overflow-hidden bg-neutral-950" style="min-height: 220px; height: 45vh; max-height: 780px;">

    {{-- Background with Ken Burns --}}
    <div class="absolute inset-0 z-0 overflow-hidden">
        <img src="{{ asset('images/img221.jpg') }}" alt="Drone Crop Spraying"
             class="banner-bg w-full h-full object-cover origin-center">
        {{-- Dark gradient overlay --}}
        <div class="absolute inset-0" style="background: linear-gradient(160deg, rgba(0,0,0,.55) 0%, rgba(3,30,15,.80) 100%);"></div>
        {{-- Green bottom glow --}}
        <div class="absolute bottom-0 left-0 right-0 h-40" style="background: linear-gradient(to top, rgba(19,117,71,.35), transparent);"></div>
        {{-- Diagonal shine sweep --}}
        <div class="shine-sweep absolute inset-0 w-24 sm:w-40 opacity-10" style="background: linear-gradient(90deg, transparent, rgba(255,255,255,.6), transparent);"></div>
    </div>

    {{-- Floating badge — left --}}
    <div class="badge-left absolute top-2 sm:top-8 {{ app()->getLocale() === 'ar' ? 'right-3 sm:right-16' : 'left-3 sm:left-16' }} z-20">
        <div class="relative bg-white/10 backdrop-blur-md border border-white/20 rounded-xl sm:rounded-2xl px-2.5 py-2 sm:px-4 sm:py-3 text-white shadow-xl">
            <div class="pulse-ring absolute inset-0 rounded-xl sm:rounded-2xl border-2 border-[#16a34a]"></div>
            <p class="text-base sm:text-2xl font-black text-[#4ade80]">{{ app()->getLocale() === 'ar' ? $productsCountAr . '+' : '+' . $productsCount }}</p>
            <p class="text-[10px] sm:text-xs font-semibold opacity-80 mt-0.5">{{ app()->getLocale() === 'ar' ? 'منتج زراعي' : 'Products' }}</p>
        </div>
    </div>

    {{-- Floating badge — right --}}
    <div class="badge-right absolute top-2 sm:top-8 {{ app()->getLocale() === 'ar' ? 'left-3 sm:left-16' : 'right-3 sm:right-16' }} z-20">
        <div class="relative bg-white/10 backdrop-blur-md border border-white/20 rounded-xl sm:rounded-2xl px-2.5 py-2 sm:px-4 sm:py-3 text-white shadow-xl">
            <div class="pulse-ring absolute inset-0 rounded-xl sm:rounded-2xl border-2 border-[#F4B400]" style="animation-delay:.5s"></div>
            <p class="text-base sm:text-2xl font-black text-[#fbbf24]">{{ app()->getLocale() === 'ar' ? '٦٠+' : '+60' }}</p>
            <p class="text-[10px] sm:text-xs font-semibold opacity-80 mt-0.5">{{ app()->getLocale() === 'ar' ? 'وكيل معتمد' : 'Agents' }}</p>
        </div>
    </div>

    {{-- Main content --}}
    <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-6">

        {{-- Eyebrow --}}
        <div class="banner-h2 mb-4 inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-4 py-1.5 mt-4">
            <span class="w-2 h-2 rounded-full bg-[#4ade80] inline-block"></span>
            <span class="{{ app()->getLocale() === 'ar' ? 'text-xs sm:text-sm' : 'text-[10px] sm:text-sm' }} font-semibold tracking-widest uppercase text-white">
                {{ app()->getLocale() === 'ar' ? 'مسك للأسمدة الزراعية' : 'Mesk Agricultural Fertilizers' }}
            </span>
        </div>

        {{-- Heading --}}
        <h2 class="banner-h2 {{ app()->getLocale() === 'ar' ? 'text-4xl sm:text-5xl lg:text-7xl' : 'text-2xl sm:text-5xl lg:text-7xl' }} font-black tracking-tight leading-tight mb-3"
            style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;
                   text-shadow: 0 2px 40px rgba(0,0,0,.4);">
            {{ app()->getLocale() === 'ar' ? 'عالم من الابتكار' : 'A World of Innovation' }}
        </h2>

        {{-- Animated line --}}
        <div class="banner-line h-1 rounded-full mb-4" style="background: linear-gradient(90deg, #16a34a, #4ade80);"></div>

        {{-- Subtext --}}
        <p class="banner-p text-[13px] sm:text-xl lg:text-2xl font-medium max-w-xl mx-auto text-white leading-relaxed">
            {{ app()->getLocale() === 'ar' ? 'نعمل اليوم من أجل مستقبل الزراعة' : 'We work today for the future of agriculture' }}
        </p>

        {{-- CTA --}}
        <div class="banner-cta mt-6 sm:mt-8">
            <a href="{{ route('products.index') }}"
               class="inline-flex items-center gap-2.5 bg-[#16a34a] hover:bg-[#15803d] text-white font-bold px-6 sm:px-8 py-3 sm:py-3.5 rounded-full shadow-lg shadow-green-900/40 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-xl text-sm sm:text-base">
                {{ app()->getLocale() === 'ar' ? 'استكشف منتجاتنا' : 'Explore Our Products' }}
                <svg class="w-4 h-4 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>

    {{-- Bottom wave --}}
    <div class="absolute bottom-0 left-0 right-0 z-10">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="w-full h-8 sm:h-14">
            <path d="M0,40 C360,0 1080,60 1440,20 L1440,60 L0,60 Z" fill="white"/>
        </svg>
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
                            <span class="text-xs sm:text-[20px] font-black text-neutral-900 group-hover:text-[#137547] transition-colors duration-300 text-center sm:text-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }}" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
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

        <!-- Overlapping Brand Features Cards — Infinite Marquee -->
        <div class="relative w-full mt-10 overflow-hidden">
            <div class="absolute inset-y-0 left-0 w-16 sm:w-28 z-10 pointer-events-none" style="background: linear-gradient(to right, white, transparent);"></div>
            <div class="absolute inset-y-0 right-0 w-16 sm:w-28 z-10 pointer-events-none" style="background: linear-gradient(to left, white, transparent);"></div>

            @php
                $featuresCards = [
                    [
                        'bg' => '#0b3c5d',
                        'icon_color' => '#0b3c5d',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />',
                        'text_ar' => 'دعم فني متخصص',
                        'text_en' => 'Expert Technical Support',
                    ],
                    [
                        'bg' => '#137547',
                        'icon_color' => '#137547',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />',
                        'text_ar' => 'إنتاج محلي بجودة عالية',
                        'text_en' => 'Local with High Quality',
                    ],
                    [
                        'bg' => '#F4B400',
                        'icon_color' => '#F4B400',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />',
                        'text_ar' => 'منتج سعودي معتمد',
                        'text_en' => 'Certified Saudi Product',
                    ],
                ];
                $allFeatCards = array_merge($featuresCards, $featuresCards, $featuresCards, $featuresCards);
            @endphp

            <div class="{{ app()->getLocale() === 'ar' ? 'stats-track-rtl' : 'stats-track-ltr' }} flex gap-3 sm:gap-4 w-max">
                @foreach($allFeatCards as $card)
                <div class="shrink-0 w-52 sm:w-80 text-white rounded-xl sm:rounded-3xl py-2 px-3 sm:py-4 sm:px-5 lg:px-6 flex items-center justify-center gap-2 sm:gap-4 shadow-lg"
                     style="background-color: {{ $card['bg'] }};">
                    <div class="w-8 h-8 sm:w-12 sm:h-12 lg:w-14 lg:h-14 shrink-0 rounded-full bg-white flex items-center justify-center shadow-md">
                        <svg class="w-4 h-4 sm:w-6 sm:h-6 lg:w-7 lg:h-7" fill="none" stroke="{{ $card['icon_color'] }}" stroke-width="2" viewBox="0 0 24 24">{!! $card['icon'] !!}</svg>
                    </div>
                    <div class="text-center min-w-0">
                        <p class="text-sm sm:text-lg lg:text-[23px] font-bold leading-tight">{{ $card['text_' . app()->getLocale()] }}</p>
                    </div>
                </div>
                @endforeach
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
