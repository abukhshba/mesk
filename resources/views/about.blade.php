@extends('layouts.app')

@section('title', __('messages.about') . ' | ' . ($settings->company_name ?? ''))

@section('content')
<!-- Hero Header -->
<div class="hero-gradient py-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" viewBox="0 0 100 100"><circle cx="85" cy="15" r="35" fill="white" opacity="0.3"/><circle cx="15" cy="85" r="25" fill="white" opacity="0.2"/></svg>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl sm:text-5xl font-bold text-white">{{ __('messages.about') }}</h1>
        @if($about)
        <p class="mt-4 text-white/70 text-lg max-w-2xl mx-auto">{{ $about->getTranslation('title', app()->getLocale()) }}</p>
        @endif
    </div>
</div>

@if($about)
<!-- Company Story -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-primary-600 font-semibold text-sm uppercase tracking-widest">{{ __('messages.about') }}</span>
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
<section class="py-16 bg-neutral-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            @foreach([
                ['number' => '15+', 'label' => __('messages.years_experience'), 'icon' => '🏆'],
                ['number' => '200+', 'label' => __('messages.products_count'), 'icon' => '🧪'],
                ['number' => '5000+', 'label' => __('messages.clients_count'), 'icon' => '🤝'],
                ['number' => '10+', 'label' => __('messages.countries_count'), 'icon' => '🌍'],
            ] as $stat)
            <div class="p-6">
                <div class="text-4xl mb-2">{{ $stat['icon'] }}</div>
                <div class="text-4xl font-bold text-primary-400">{{ $stat['number'] }}</div>
                <div class="mt-1 text-neutral-400 text-sm">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-neutral-900">{{ app()->getLocale() === 'ar' ? 'مهمتنا ورؤيتنا' : 'Mission & Vision' }}</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @if($about->getTranslation('mission', app()->getLocale()))
            <div class="bg-primary-50 rounded-3xl p-8 border border-primary-100">
                <div class="w-14 h-14 bg-primary-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-primary-900 mb-4">{{ __('messages.our_mission') }}</h3>
                <div class="text-primary-800/80 leading-relaxed prose max-w-none">
                    {!! $about->getTranslation('mission', app()->getLocale()) !!}
                </div>
            </div>
            @endif
            @if($about->getTranslation('vision', app()->getLocale()))
            <div class="bg-neutral-900 rounded-3xl p-8">
                <div class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">{{ __('messages.our_vision') }}</h3>
                <div class="text-neutral-300 leading-relaxed prose prose-invert max-w-none">
                    {!! $about->getTranslation('vision', app()->getLocale()) !!}
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif
@endsection
