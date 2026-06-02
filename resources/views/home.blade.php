@extends('layouts.app')

@section('title', $settings->company_name ?? __('app.hero_title'))

@section('content')

{{-- SECTION 1: HERO & OVERLAPPING STATS PANELS --}}
<section class="relative bg-white pt-6 pb-12 sm:pb-16 overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-12 text-center">
        <!-- Hero Text -->
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-neutral-900 leading-tight tracking-tight mb-8" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
            {{ app()->getLocale() === 'ar' ? 'تغذية عالم متنامٍ' : 'Feeding a growing world' }}
        </h1>

        <!-- Hero Image Frame -->
        <div class="relative w-full aspect-[21/9] rounded-[2rem] overflow-hidden shadow-2xl border-[8px] border-white max-w-7xl mx-auto z-10">
            <img src="{{ asset('images/hero2.jpg') }}" alt="Feeding a growing world" class="w-full h-full object-cover">
        </div>

        <!-- Overlapping Stats Cards Grid -->
        <div class="relative z-20 max-w-6xl mx-auto -mt-8 sm:-mt-14 px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">
                <!-- Panel 1: Saudi Branches (Green) -->
                <div class="bg-[#137547] text-white rounded-2xl sm:rounded-3xl p-6 sm:p-8 flex items-center gap-4 sm:gap-6 shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 shrink-0 rounded-full bg-white flex items-center justify-center text-primary-600 shadow-md">
                        <!-- Saudi Map / Leaf SVG -->
                        <svg class="w-8 h-8 text-[#137547]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-11.314l.707.707m11.314 11.314l.707-.707M12 5a7 7 0 100 14 7 7 0 000-14z" />
                        </svg>
                    </div>
                    <div class="text-left rtl:text-right">
                        <p class="text-2xl sm:text-3xl font-black leading-tight">{{ app()->getLocale() === 'ar' ? '١٦ فرعاً' : '16 Branches' }}</p>
                        <p class="text-xs sm:text-sm font-semibold opacity-90 mt-1">{{ app()->getLocale() === 'ar' ? 'في المملكة العربية السعودية' : 'In the Kingdom of Saudi Arabia' }}</p>
                    </div>
                </div>

                <!-- Panel 2: Worldwide (Navy) -->
                <div class="bg-[#0b3c5d] text-white rounded-2xl sm:rounded-3xl p-6 sm:p-8 flex items-center gap-4 sm:gap-6 shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 shrink-0 rounded-full bg-white flex items-center justify-center text-primary-600 shadow-md">
                        <!-- Globe SVG -->
                        <svg class="w-8 h-8 text-[#0b3c5d]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="text-left rtl:text-right">
                        <p class="text-2xl sm:text-3xl font-black leading-tight">{{ app()->getLocale() === 'ar' ? '٢٥+ فرعاً' : '25+ Branches' }}</p>
                        <p class="text-xs sm:text-sm font-semibold opacity-90 mt-1">{{ app()->getLocale() === 'ar' ? 'حول العالم' : 'Worldwide' }}</p>
                    </div>
                </div>

                <!-- Panel 3: Factories (Yellow) -->
                <div class="bg-[#F4B400] text-white rounded-2xl sm:rounded-3xl p-6 sm:p-8 flex items-center gap-4 sm:gap-6 shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 shrink-0 rounded-full bg-white flex items-center justify-center text-primary-600 shadow-md">
                        <!-- Factory SVG -->
                        <svg class="w-8 h-8 text-[#F4B400]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div class="text-left rtl:text-right">
                        <p class="text-xl sm:text-2xl font-black leading-tight">{{ app()->getLocale() === 'ar' ? '٦ مصانع دولية' : '6 International Factories' }}</p>
                        <p class="text-xs sm:text-sm font-semibold opacity-90 mt-1">{{ app()->getLocale() === 'ar' ? 'في الشرق الأوسط وأوروبا' : 'In MENA & Europe' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SECTION 2: PARALLAX DRONE SPRAYING BANNER --}}
<section class="relative py-32 sm:py-48 overflow-hidden bg-neutral-900">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/hero3.jpg') }}" alt="Drone Crop Spraying" class="w-full h-full object-cover brightness-50">
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
<section class="py-20 bg-white">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-12">
        <!-- Grid of Dynamic Categories -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-8 mb-16">
            @foreach($categories as $category)
                @php
                    $cardHref = ($categoriesDisplayMode === 'children' && $singleParent)
                        ? route('categories.subcategory', [$singleParent->slug, $category->slug])
                        : route('categories.show', $category->slug);
                @endphp
                <a href="{{ $cardHref }}" class="flex flex-col items-center text-center group">
                    <div class="w-full aspect-square overflow-hidden transition-all duration-300 group-hover:-translate-y-1">
                        @if($category->hasMedia('image'))
                            <img src="{{ $category->getFirstMediaUrl('image') }}" alt="{{ $category->getTranslation('name', app()->getLocale()) }}" class="w-full h-full object-contain">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-primary-50 to-primary-100 flex items-center justify-center rounded-[2rem]">
                                <span class="text-primary-600 text-3xl font-black">{{ mb_substr($category->getTranslation('name', app()->getLocale()), 0, 1) }}</span>
                            </div>
                        @endif
                    </div>
                    <span class="mt-4 sm:mt-6 text-base sm:text-xl lg:text-2xl font-black text-neutral-900 group-hover:text-primary-600 transition-colors" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
                        {{ $category->getTranslation('name', app()->getLocale()) }}
                    </span>
                </a>
            @endforeach
        </div>

        <!-- Overlapping Brand Features Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto mt-20">
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
<section class="py-16 sm:py-24 bg-neutral-50 border-t border-neutral-100">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-12">
        
        <!-- Header -->
        <div class="flex items-end justify-between mb-12">
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

{{-- SECTION 5: PREMIUM CORPORATE BRANDS --}}
<section class="relative bg-white border-t border-b border-neutral-100 overflow-hidden py-10 logo-ticker-section">
    <style>
        @keyframes scroll-logos-ltr {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }
        @keyframes scroll-logos-rtl {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(50%);
            }
        }
        
        .logo-ticker-track {
            display: flex;
            width: max-content;
            animation: scroll-logos-ltr 28s linear infinite;
        }

        /* If Arabic/RTL, reverse scroll direction for natural text flow */
        html[dir="rtl"] .logo-ticker-track {
            animation: scroll-logos-rtl 28s linear infinite;
        }
        
        .logo-ticker-container:hover .logo-ticker-track {
            animation-play-state: paused;
        }
    </style>

    <!-- Fade Overlays for Elegant Entry/Exit -->
    <div class="absolute inset-y-0 left-0 w-12 sm:w-36 bg-gradient-to-r from-white via-white/80 to-transparent z-10 pointer-events-none"></div>
    <div class="absolute inset-y-0 right-0 w-12 sm:w-36 bg-gradient-to-l from-white via-white/80 to-transparent z-10 pointer-events-none"></div>

    <div class="logo-ticker-container max-w-[1440px] mx-auto overflow-hidden whitespace-nowrap relative">
        <div class="logo-ticker-track flex items-center gap-16 lg:gap-24">
            
            <!-- FIRST SET -->
            <div class="flex items-center gap-16 lg:gap-24 shrink-0">
                <!-- 1. LIBRO -->
                <div class="flex items-center gap-3 shrink-0 select-none">
                    <!-- Bull Logo -->
                    <svg class="w-12 h-12 text-[#AEEA00]" viewBox="0 0 100 100" fill="currentColor">
                        <path d="M70,40 C65,30 50,25 40,30 C30,35 25,50 30,65 C35,75 50,85 70,75 C75,70 80,60 80,50 C80,45 75,42 70,40 Z" fill="#C5E1A5" />
                        <path d="M35,35 L40,15 L48,32" stroke="#1B5E20" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                        <circle cx="60" cy="45" r="5" fill="#1B5E20" />
                    </svg>
                    <span class="text-3xl font-black tracking-tight text-[#1B5E20]" style="font-family: 'Outfit', sans-serif;">LIBRO</span>
                </div>

                <!-- 2. Farmer -->
                <div class="flex flex-col items-center shrink-0 select-none">
                    <div class="relative flex items-center justify-center px-6 py-2 border-[3px] border-red-500 rounded-full">
                        <span class="text-2xl font-black text-[#0D47A1]" style="font-family: 'Inter', sans-serif;">Farmer</span>
                        <div class="absolute -top-3 right-4 bg-emerald-500 text-white rounded-full px-2 py-0.5 text-[8px] font-black tracking-widest uppercase">NPK</div>
                    </div>
                    <span class="text-[9px] font-bold text-emerald-800 tracking-wider mt-1.5 uppercase">Growing Prosperity</span>
                </div>

                <!-- 3. GranSol -->
                <div class="flex items-center gap-2.5 shrink-0 select-none">
                    <!-- Sun / Wave SVG -->
                    <svg class="w-10 h-10 text-orange-500" viewBox="0 0 24 24" fill="currentColor">
                        <circle cx="12" cy="12" r="6" fill="#F57C00" />
                        <path d="M12,2 L12,4 M12,20 L12,22 M2,12 L4,12 M20,12 L22,12 M5,5 L7,7 M17,17 L19,19 M5,19 L7,17 M17,5 L19,7" stroke="#F57C00" stroke-width="2.5" stroke-linecap="round" />
                    </svg>
                    <span class="text-3xl font-black tracking-tight text-[#0D47A1]">Gran<span class="text-orange-500">Sol</span></span>
                </div>

                <!-- 4. NORUS -->
                <div class="flex items-center gap-3 shrink-0 select-none">
                    <span class="text-3xl font-black tracking-tight text-[#1565C0] italic" style="font-family: 'Outfit', sans-serif;">NORUS</span>
                    <!-- Wing / Wave SVG -->
                    <svg class="w-10 h-10 text-[#1565C0]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 12c4-8 15-8 18 0-3 8-14 8-18 0z" />
                        <path d="M3 12h18" />
                    </svg>
                </div>

                <!-- 5. Palm Secrets -->
                <div class="flex flex-col items-center shrink-0 select-none">
                    <!-- Palm Tree SVG -->
                    <svg class="w-10 h-10 text-emerald-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22V10M12 10C9 8 5 9 5 9M12 10C15 8 19 9 19 9M12 10C10 6 7 5 7 5M12 10C14 6 17 5 17 5" stroke-linecap="round" />
                    </svg>
                    <span class="text-lg font-black tracking-tight text-emerald-800 -mt-1" style="font-family: 'Cairo', cursive;">Palm Secrets</span>
                </div>

                <!-- 6. NOVAQUA -->
                <div class="flex items-center gap-2 shrink-0 select-none">
                    <!-- Droplet wave SVG -->
                    <svg class="w-10 h-10 text-cyan-600" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2 C12,2 6,10 6,14 C6,17.3 8.7,20 12,20 C15.3,20 18,17.3 18,14 C18,10 12,2 12,2 Z" />
                    </svg>
                    <span class="text-2xl font-black tracking-tight text-[#006064]" style="font-family: 'Inter', sans-serif;">NOVAQUA</span>
                </div>

                <!-- 7. OPTIMAL -->
                <div class="flex items-center gap-3 shrink-0 select-none">
                    <!-- Target Circle SVG -->
                    <svg class="w-9 h-9 text-[#2E7D32]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                        <circle cx="12" cy="12" r="9" />
                        <circle cx="12" cy="12" r="5" />
                        <circle cx="12" cy="12" r="1.5" fill="currentColor" />
                    </svg>
                    <div class="text-left rtl:text-right">
                        <span class="block text-2xl font-black text-neutral-900 tracking-tight leading-none">OPTIMAL</span>
                        <span class="text-[8px] font-bold text-orange-500 tracking-widest uppercase">Granular NPK</span>
                    </div>
                </div>
            </div>

            <!-- DUPLICATED SECOND SET FOR INFINITE LOOP TICKER -->
            <div class="flex items-center gap-16 lg:gap-24 shrink-0" aria-hidden="true">
                <!-- 1. LIBRO -->
                <div class="flex items-center gap-3 shrink-0 select-none">
                    <!-- Bull Logo -->
                    <svg class="w-12 h-12 text-[#AEEA00]" viewBox="0 0 100 100" fill="currentColor">
                        <path d="M70,40 C65,30 50,25 40,30 C30,35 25,50 30,65 C35,75 50,85 70,75 C75,70 80,60 80,50 C80,45 75,42 70,40 Z" fill="#C5E1A5" />
                        <path d="M35,35 L40,15 L48,32" stroke="#1B5E20" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                        <circle cx="60" cy="45" r="5" fill="#1B5E20" />
                    </svg>
                    <span class="text-3xl font-black tracking-tight text-[#1B5E20]" style="font-family: 'Outfit', sans-serif;">LIBRO</span>
                </div>

                <!-- 2. Farmer -->
                <div class="flex flex-col items-center shrink-0 select-none">
                    <div class="relative flex items-center justify-center px-6 py-2 border-[3px] border-red-500 rounded-full">
                        <span class="text-2xl font-black text-[#0D47A1]" style="font-family: 'Inter', sans-serif;">Farmer</span>
                        <div class="absolute -top-3 right-4 bg-emerald-500 text-white rounded-full px-2 py-0.5 text-[8px] font-black tracking-widest uppercase">NPK</div>
                    </div>
                    <span class="text-[9px] font-bold text-emerald-800 tracking-wider mt-1.5 uppercase">Growing Prosperity</span>
                </div>

                <!-- 3. GranSol -->
                <div class="flex items-center gap-2.5 shrink-0 select-none">
                    <!-- Sun / Wave SVG -->
                    <svg class="w-10 h-10 text-orange-500" viewBox="0 0 24 24" fill="currentColor">
                        <circle cx="12" cy="12" r="6" fill="#F57C00" />
                        <path d="M12,2 L12,4 M12,20 L12,22 M2,12 L4,12 M20,12 L22,12 M5,5 L7,7 M17,17 L19,19 M5,19 L7,17 M17,5 L19,7" stroke="#F57C00" stroke-width="2.5" stroke-linecap="round" />
                    </svg>
                    <span class="text-3xl font-black tracking-tight text-[#0D47A1]">Gran<span class="text-orange-500">Sol</span></span>
                </div>

                <!-- 4. NORUS -->
                <div class="flex items-center gap-3 shrink-0 select-none">
                    <span class="text-3xl font-black tracking-tight text-[#1565C0] italic" style="font-family: 'Outfit', sans-serif;">NORUS</span>
                    <!-- Wing / Wave SVG -->
                    <svg class="w-10 h-10 text-[#1565C0]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 12c4-8 15-8 18 0-3 8-14 8-18 0z" />
                        <path d="M3 12h18" />
                    </svg>
                </div>

                <!-- 5. Palm Secrets -->
                <div class="flex flex-col items-center shrink-0 select-none">
                    <!-- Palm Tree SVG -->
                    <svg class="w-10 h-10 text-emerald-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22V10M12 10C9 8 5 9 5 9M12 10C15 8 19 9 19 9M12 10C10 6 7 5 7 5M12 10C14 6 17 5 17 5" stroke-linecap="round" />
                    </svg>
                    <span class="text-lg font-black tracking-tight text-emerald-800 -mt-1" style="font-family: 'Cairo', cursive;">Palm Secrets</span>
                </div>

                <!-- 6. NOVAQUA -->
                <div class="flex items-center gap-2 shrink-0 select-none">
                    <!-- Droplet wave SVG -->
                    <svg class="w-10 h-10 text-cyan-600" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2 C12,2 6,10 6,14 C6,17.3 8.7,20 12,20 C15.3,20 18,17.3 18,14 C18,10 12,2 12,2 Z" />
                    </svg>
                    <span class="text-2xl font-black tracking-tight text-[#006064]" style="font-family: 'Inter', sans-serif;">NOVAQUA</span>
                </div>

                <!-- 7. OPTIMAL -->
                <div class="flex items-center gap-3 shrink-0 select-none">
                    <!-- Target Circle SVG -->
                    <svg class="w-9 h-9 text-[#2E7D32]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                        <circle cx="12" cy="12" r="9" />
                        <circle cx="12" cy="12" r="5" />
                        <circle cx="12" cy="12" r="1.5" fill="currentColor" />
                    </svg>
                    <div class="text-left rtl:text-right">
                        <span class="block text-2xl font-black text-neutral-900 tracking-tight leading-none">OPTIMAL</span>
                        <span class="text-[8px] font-bold text-orange-500 tracking-widest uppercase">Granular NPK</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
