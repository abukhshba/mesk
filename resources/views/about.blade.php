@extends('layouts.app')

@section('title', __('app.about') . ' | ' . ($settings->company_name ?? ''))

@section('content')
<!-- Page Header -->
<div class="page-header py-4 sm:py-10 rounded-b-2xl sm:rounded-b-[2.5rem] shadow-sm mb-4 sm:mb-10">
    <div class="page-header-grid"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-primary-600/60 text-xs font-bold uppercase tracking-wider mb-3">
            <a href="{{ route('home') }}" class="hover:text-primary-600 transition-colors">{{ __('app.home') }}</a>
        </nav>
        <div class="accent-line mb-3"></div>
        <h1 class="text-3xl sm:text-4xl font-black text-primary-950 leading-tight">{{ __('app.about') }}</h1>
       
    </div>
</div>

@if($about)
<!-- Company Story -->
<section class="py-6 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-neutral-900">{{ $about->getTranslation('title', app()->getLocale()) }}</h2>
                <div class="mt-5 text-neutral-600 leading-relaxed prose max-w-none text-base sm:text-lg">
                    {!! $about->getTranslation('description', app()->getLocale()) !!}
                </div>
            </div>
            <div class="relative">
                @if($about->hasMedia('image'))
                    <img src="{{ $about->getFirstMediaUrl('image') }}" alt="{{ $about->getTranslation('title', app()->getLocale()) }}"
                         class="w-full rounded-3xl shadow-2xl object-cover aspect-[4/3]">
                @else
                    <div class="w-full rounded-3xl bg-gradient-to-br from-primary-100 to-primary-200 aspect-[4/3] flex items-center justify-center">
                        <svg class="w-32 h-32 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                        </svg>
                    </div>
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
