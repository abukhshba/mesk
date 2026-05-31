@extends('layouts.app')

@section('title', __('app.about') . ' | ' . ($settings->company_name ?? ''))

@section('content')
<!-- Page Header -->
<div class="page-header py-6 sm:py-10 rounded-b-2xl sm:rounded-b-[2.5rem] shadow-sm mb-6 sm:mb-10">
    <div class="page-header-grid"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-primary-600/60 text-xs font-bold uppercase tracking-wider mb-3">
            <a href="{{ route('home') }}" class="hover:text-primary-600 transition-colors">{{ __('app.home') }}</a>
            <span class="text-primary-600/40">/</span>
            <span class="text-primary-600">{{ __('app.about') }}</span>
        </nav>
        <div class="accent-line mb-3"></div>
        <h1 class="text-3xl sm:text-4xl font-black text-primary-950 leading-tight">{{ __('app.about') }}</h1>
        @if($about)
        <p class="mt-4 text-primary-800/70 text-base max-w-xl font-light">{{ $about->getTranslation('title', app()->getLocale()) }}</p>
        @endif
    </div>
</div>

@if($about)
<!-- Company Story -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-primary-600 font-semibold text-sm uppercase tracking-widest">{{ __('app.about') }}</span>
                <h2 class="mt-2 text-3xl font-bold text-neutral-900">{{ $about->getTranslation('title', app()->getLocale()) }}</h2>
                <div class="mt-5 text-neutral-600 leading-relaxed prose max-w-none">
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

<!-- Stats -->
<section class="py-20 bg-neutral-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-px bg-white/5 rounded-2xl overflow-hidden">
            @foreach([
                ['number' => '15+', 'label' => __('app.years_experience'), 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>'],
                ['number' => '200+', 'label' => __('app.products_count'), 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>'],
                ['number' => '5000+', 'label' => __('app.clients_count'), 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>'],
                ['number' => '10+', 'label' => __('app.countries_count'), 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>'],
            ] as $stat)
            <div class="p-10 bg-neutral-900 text-center flex flex-col items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center">
                    <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $stat['icon'] !!}</svg>
                </div>
                <div class="text-4xl font-black text-white">{{ $stat['number'] }}</div>
                <div class="text-xs text-neutral-500 font-medium">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-14">
            <div class="accent-line mb-4"></div>
            <h2 class="text-3xl font-black text-neutral-900">{{ app()->getLocale() === 'ar' ? 'مهمتنا ورؤيتنا' : 'Mission & Vision' }}</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @if($about->getTranslation('mission', app()->getLocale()))
            <div class="bg-neutral-50 rounded-3xl p-10 border border-neutral-100">
                <div class="w-12 h-12 bg-primary-600 rounded-2xl flex items-center justify-center mb-8">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-xl font-black text-neutral-900 mb-4">{{ __('app.our_mission') }}</h3>
                <div class="text-neutral-600 leading-relaxed prose max-w-none text-sm">
                    {!! $about->getTranslation('mission', app()->getLocale()) !!}
                </div>
            </div>
            @endif
            @if($about->getTranslation('vision', app()->getLocale()))
            <div class="bg-neutral-950 rounded-3xl p-10">
                <div class="w-12 h-12 bg-white/8 border border-white/10 rounded-2xl flex items-center justify-center mb-8">
                    <svg class="w-6 h-6 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 class="text-xl font-black text-white mb-4">{{ __('app.our_vision') }}</h3>
                <div class="text-neutral-400 leading-relaxed prose prose-invert max-w-none text-sm">
                    {!! $about->getTranslation('vision', app()->getLocale()) !!}
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif
@endsection
