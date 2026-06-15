@extends('layouts.app')

@section('title', __('app.contact') . ' | ' . ($settings->company_name ?? ''))

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
                    {{ __('app.contact') }}
                </span>
            </li>
        </ol>
    </nav>

    <!-- Header Title -->
    <div class="mb-10">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-neutral-900">
            @if(app()->getLocale() === 'ar')
                تواصل معنا
            @else
                Get in Touch
            @endif
        </h1>
        <p class="mt-4 text-lg text-neutral-500 max-w-2xl">
            {{ __('app.contact_subtitle') }}
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16 lg:pb-24">
    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden grid grid-cols-1 lg:grid-cols-2 border border-neutral-100">
        <!-- Left: Contact Details -->
        <div class="bg-[#759469] text-white p-8 sm:p-12 lg:p-16 relative overflow-hidden">
            <!-- Decorative Background Element -->
            <div class="absolute -top-24 -right-24 w-64 h-64 rounded-full bg-primary-800 opacity-50 blur-3xl"></div>
            <div class="absolute -bottom-24 -left-24 w-64 h-64 rounded-full bg-primary-800 opacity-50 blur-3xl"></div>

            <div class="relative z-10">
                <h2 class="text-2xl font-bold mb-10 flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#d7b43e] rounded-full"></span>
                    {{ app()->getLocale() === 'ar' ? 'بيانات التواصل' : 'Contact Details' }}
                </h2>

                <div class="space-y-8">
                    @if(!empty($settings->phone))
                    <div class="flex items-start gap-5 group">
                        <div class="w-12 h-12 bg-primary-800/80 rounded-2xl flex items-center justify-center shrink-0 group-hover:bg-[#d7b43e] group-hover:scale-110 transition-all duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-primary-700 text-xs font-bold mb-1 uppercase tracking-widest">{{ __('app.call_us') }}</p>
                            <a href="tel:{{ $settings->phone }}" class="text-lg font-semibold hover:text-[#d7b43e] transition-colors inline-block" style="direction: ltr; unicode-bidi: isolate;">{{ $settings->phone }}</a>
                        </div>
                    </div>
                    @endif

                    @if(!empty($settings->email))
                    <div class="flex items-start gap-5 group">
                        <div class="w-12 h-12 bg-primary-800/80 rounded-2xl flex items-center justify-center shrink-0 group-hover:bg-[#d7b43e] group-hover:scale-110 transition-all duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-primary-800 text-xs font-bold mb-1 uppercase tracking-widest">{{ __('app.email_us') }}</p>
                            <a href="mailto:{{ $settings->email }}" class="text-lg font-semibold hover:text-[#d7b43e] transition-colors" style="word-break:break-all;">{{ $settings->email }}</a>
                        </div>
                    </div>
                    @endif

                    @if(!empty($settings->address))
                    <div class="flex items-start gap-5 group">
                        <div class="w-12 h-12 bg-primary-800/80 rounded-2xl flex items-center justify-center shrink-0 group-hover:bg-[#d7b43e] group-hover:scale-110 transition-all duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-primary-800 text-xs font-bold mb-1 uppercase tracking-widest">{{ __('app.our_location') }}</p>
                            <a href="{{ !empty($settings->google_maps_link) ? $settings->google_maps_link : 'https://maps.google.com/?q='.urlencode($settings->address) }}" target="_blank" class="text-lg font-medium hover:text-[#d7b43e] transition-colors leading-relaxed">
                                {{ $settings->address }}
                            </a>
                        </div>
                    </div>
                    @endif
                </div>

                @if(!empty($settings->whatsapp))
                <div class="mt-6 pt-6 sm:pt-8 border-t border-primary-800/50 flex justify-center">
                    <a href="https://wa.me/{{ $settings->whatsapp }}" target="_blank" class="inline-flex items-center gap-3 bg-[#25D366] text-white px-8 py-3.5 rounded-2xl font-bold text-lg hover:bg-[#20b858] hover:-translate-y-1 transition-all duration-300 shadow-lg shadow-[#25D366]/30 w-full sm:w-auto justify-center">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        {{ __('app.whatsapp_cta_button') }}
                    </a>
                </div>
                @endif

                @php
                    $pdfUrl = !empty($settings->contact_info_pdf) ? asset('storage/' . $settings->contact_info_pdf) : asset('images/files/almisk.com.sa.pdf');
                @endphp
                <div class="mt-8 flex justify-center items-center flex-col bg-white/10 rounded-2xl p-6 shadow-inner">
                    <a href="{{ $pdfUrl }}" target="_blank" class="block bg-white p-3 rounded-2xl shadow-xl hover:scale-105 transition-transform duration-300">
                        {!! QrCode::format('svg')->size(160)->color(19, 117, 71)->margin(0)->generate($pdfUrl) !!}
                    </a>
                    <p class="mt-4 text-sm font-bold tracking-widest text-white">
                        {{ app()->getLocale() === 'ar' ? 'امسح للحصول على معلومات التواصل' : 'Scan for contact info' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Right: Form -->
        <div class="p-8 sm:p-12 lg:p-16 bg-white">
            @if(session('success'))
            <div class="mb-8 flex items-center gap-3 p-4 bg-green-50 text-green-700 border border-green-200 rounded-xl">
                <svg class="w-6 h-6 text-green-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
            @endif

            <h2 class="text-3xl font-black text-neutral-900 mb-3">
                @if(app()->getLocale() === 'ar')
                    أرسل <span class="text-primary-600">رسالتك</span>
                @else
                    Send us <span class="text-primary-600">a message</span>
                @endif
            </h2>
            <p class="text-neutral-500 mb-10 text-lg">
                {{ app()->getLocale() === 'ar'
                    ? 'نسعد بتواصلكم معنا، سنرد خلال 24 ساعة عمل.'
                    : "We'd like to hear from you. We'll get back within 24 business hours." }}
            </p>

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-bold text-neutral-700 mb-2">
                        {{ __('app.your_name') }} <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           class="w-full bg-neutral-50 border {{ $errors->has('name') ? 'border-red-500' : 'border-neutral-200 focus:border-primary-500' }} rounded-xl px-5 py-4 outline-none focus:ring-2 focus:ring-primary-500/20 transition-all font-medium text-lg"
                           placeholder="{{ app()->getLocale() === 'ar' ? 'الاسم الكامل' : 'Full name' }}">
                    @error('name')
                        <p class="mt-2 text-sm text-red-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-neutral-700 mb-2">
                        {{ __('app.your_phone') }}
                    </label>
                    <input type="tel" name="phone" value="{{ old('phone') }}"
                           class="w-full bg-neutral-50 border border-neutral-200 focus:border-primary-500 rounded-xl px-5 py-4 outline-none focus:ring-2 focus:ring-primary-500/20 transition-all font-medium text-lg"
                           placeholder="{{ app()->getLocale() === 'ar' ? 'رقم الجوال' : 'Phone number' }}" dir="ltr">
                </div>

                <div>
                    <label class="block text-sm font-bold text-neutral-700 mb-2">
                        {{ __('app.your_message') }} <span class="text-red-500">*</span>
                    </label>
                    <textarea name="message" rows="5" required
                              class="w-full bg-neutral-50 border {{ $errors->has('message') ? 'border-red-500' : 'border-neutral-200 focus:border-primary-500' }} rounded-xl px-5 py-4 outline-none focus:ring-2 focus:ring-primary-500/20 transition-all font-medium text-lg resize-none"
                              placeholder="{{ app()->getLocale() === 'ar' ? 'اكتب رسالتك هنا…' : 'Write your message here…' }}">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="mt-2 text-sm text-red-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-bold text-xl py-4 rounded-xl shadow-lg shadow-primary-600/30 hover:shadow-primary-600/50 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-3 mt-4">
                    {{ __('app.send_message') }}
                    <svg class="w-6 h-6 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>

{{-- ══════ VISION 2030 ══════ --}}
<section class="pt-8 sm:pt-16 bg-neutral-50 border-t border-neutral-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white shadow-sm mb-6">
            <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <h3 class="text-2xl font-black text-neutral-900 mb-4">
            {{ app()->getLocale() === 'ar' ? 'نفخر بخدمة القطاع الزراعي في المملكة' : 'Proud to Serve the Agricultural Sector in the Kingdom' }}
        </h3>
        <p class="text-neutral-500 font-medium max-w-2xl mx-auto mb-10">
            {{ app()->getLocale() === 'ar'
                ? 'نعمل بشغف والتزام لتقديم أفضل الحلول الزراعية التي تواكب رؤية المملكة 2030، مساهمين في تحقيق الأمن الغذائي والتنمية المستدامة.'
                : "We work with passion and commitment to provide the best agricultural solutions that align with the Kingdom's Vision 2030, contributing to food security and sustainable development." }}
        </p>
        <div class="flex flex-wrap justify-center items-center gap-8 sm:gap-16 lg:gap-20 mb-6 sm:mb-12">
            <img src="{{ asset('images/Saudi_Vision_2030_logo.svg') }}" alt="Saudi Vision 2030"
                 class="h-20 sm:h-32 lg:h-40 w-auto object-contain drop-shadow-sm">
            <img src="{{ asset('images/saudi-made.png') }}" alt="Saudi Made"
                 class="h-20 sm:h-32 lg:h-40 w-auto object-contain drop-shadow-sm">
            <img src="{{ asset('images/iso-logo.png') }}" alt="ISO Certified"
                 class="h-20 sm:h-32 lg:h-40 w-auto object-contain drop-shadow-sm">
        </div>
    </div>
</section>

@endsection
