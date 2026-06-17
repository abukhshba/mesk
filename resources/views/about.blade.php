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

<!-- Mission & Vision -->
<section class="py-10 md:py-20 bg-white">
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
                    {{ app()->getLocale() === 'ar' ? 'شركة سعودية حاصلة على شهادة ISO 9001:2015 وتحمل علامة صنع في السعودية.' : 'A Saudi company certified to ISO 9001:2015 and proudly carrying the Saudi Made mark.' }}
                </p>
            </div>

        </div>
        
    </div>
</section>
@endif
@endsection
