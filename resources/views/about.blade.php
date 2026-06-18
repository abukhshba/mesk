@extends('layouts.app')

@section('title', __('app.about') . ' | ' . ($settings->company_name ?? ''))

@section('content')
<!-- Page Header -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 sm:pt-10 mb-8">
    <!-- Breadcrumb -->
    <nav class="mb-6" aria-label="Breadcrumb">
        <ol class="flex items-center gap-1.5 sm:gap-2 text-lg flex-wrap">
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
                    {{ __('app.about') }}
                </span>
            </li>
        </ol>
    </nav>
</div>

@if($about)
<!-- Company Story -->
<section class="py-6 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h1 class="mt-2 text-3xl sm:text-4xl font-bold text-neutral-900">{{ $about->getTranslation('title', app()->getLocale()) }}</h1>
                <div class="mt-5 text-neutral-600 leading-relaxed prose max-w-none text-base sm:text-lg">
                    {!! $about->getTranslation('description', app()->getLocale()) !!}
                </div>
            </div>
            <div class="relative">
                @if($about->hasMedia('image'))
                    <img src="{{ $about->getFirstMediaUrl('image') }}" alt="{{ $about->getTranslation('title', app()->getLocale()) }}"
                         class="w-full rounded-3xl shadow-2xl object-cover aspect-[4/3]">
                @else
                     <img src="{{ asset('images/herbicides.png') }}" alt="{{ $about->getTranslation('title', app()->getLocale()) }}"
                         class="w-full rounded-3xl shadow-2xl object-cover aspect-[4/3]">
                @endif
                <div class="absolute -top-4 -{{ app()->getLocale() === 'ar' ? 'right' : 'left' }}-4 w-24 h-24 bg-primary-600 rounded-2xl opacity-10 -z-10"></div>
            </div>
        </div>
    </div>
</section>


{{-- Brand Features Marquee --}}
@push('styles')
    <style>
        @keyframes featMarqueeLtr { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
        @keyframes featMarqueeRtl { 0% { transform: translateX(0); } 100% { transform: translateX(50%); } }
        .feat-track-ltr { animation: featMarqueeLtr 18s linear infinite; }
        .feat-track-rtl { animation: featMarqueeRtl 18s linear infinite; }
    </style>
@endpush

<section class="py-8 sm:py-12 bg-white overflow-hidden">
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

    <div class="relative w-full overflow-hidden">
        <div class="absolute inset-y-0 left-0 w-16 sm:w-28 z-10 pointer-events-none" style="background: linear-gradient(to right, white, transparent);"></div>
        <div class="absolute inset-y-0 right-0 w-16 sm:w-28 z-10 pointer-events-none" style="background: linear-gradient(to left, white, transparent);"></div>

        <div class="{{ app()->getLocale() === 'ar' ? 'feat-track-rtl' : 'feat-track-ltr' }} flex gap-3 sm:gap-4 w-max">
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
</section>

<!-- Mission & Vision -->
<section class="py-8 md:py-14 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-14">
            <div class="accent-line mb-4"></div>
            <h2 class="text-3xl font-black text-neutral-900">{{ app()->getLocale() === 'ar' ? 'مهمتنا ورؤيتنا' : 'Mission & Vision' }}</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @if($about->getTranslation('mission', app()->getLocale()))
            <div class="bg-neutral-50 rounded-3xl p-10 border border-neutral-100">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 bg-primary-600 rounded-2xl flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="text-2xl font-black text-neutral-900">{{ __('app.our_mission') }}</h3>
                </div>
                <div class="text-neutral-600 leading-relaxed prose max-w-none text-base">
                    {!! $about->getTranslation('mission', app()->getLocale()) !!}
                </div>
            </div>
            @endif
            @if($about->getTranslation('vision', app()->getLocale()))
            <div class="bg-[#5c666f] rounded-3xl p-10">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 bg-white/10 border border-white/20 rounded-2xl flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h3 class="text-2xl font-black text-white">{{ __('app.our_vision') }}</h3>
                </div>
                <div class="text-white/90 leading-relaxed prose prose-invert max-w-none text-base">
                    {!! $about->getTranslation('vision', app()->getLocale()) !!}
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<section class="relative w-full bg-[#ededed] overflow-hidden border-t border-b border-neutral-200">

    <!-- Faint Background Logo (Watermark) -->
    <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
        <img src="{{ asset('images/water_mark-removebg-preview.png') }}" alt="Watermark" class="w-full h-full object-cover" style="object-position: center 25%;">
    </div>

    <!-- Soil Background & Logos Container -->
    <div class="relative w-full z-20 pt-[60px] sm:pt-[100px] lg:pt-[150px]">

        <!-- Wrapper to tie Logos strictly to the Soil Image aspect ratio -->
        <div class="relative w-full">

            <!-- The Vision Logos (Overlapping the soil) -->
            <div class="absolute bottom-[48%] sm:bottom-[54%] lg:bottom-[60%] left-0 w-full z-30 pointer-events-none -translate-y-[23px]">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-start items-end gap-1.5 sm:gap-5 lg:gap-8">
                    <img src="{{ asset('images/Saudi_Vision_2030_logo.svg') }}" alt="Saudi Vision 2030" class="h-10 sm:h-26 lg:h-36 w-auto object-contain drop-shadow-md">
                    <img src="{{ asset('images/iso-logo.png') }}" alt="ISO Certified" class="h-10 sm:h-26 lg:h-36 w-auto object-contain drop-shadow-md">
                    <img src="{{ asset('images/saudi-made.png') }}" alt="Saudi Made" class="h-10 sm:h-26 lg:h-36 w-auto object-contain drop-shadow-md">
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
                <p class="text-white/90 text-[7px] sm:text-base lg:text-lg font-medium drop-shadow-md tracking-wide" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
                    {{ app()->getLocale() === 'ar' ? 'شركة سعودية حاصلة على شهادة ISO 9001:2015 وتحمل علامة صنع في السعودية' : 'A Saudi company certified to ISO 9001:2015 and proudly carrying the Saudi Made mark' }}
                </p>
            </div>

        </div>

    </div>
</section>
@endif

@endsection
