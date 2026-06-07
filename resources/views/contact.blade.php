@extends('layouts.app')

@section('title', __('app.contact') . ' | ' . ($settings->company_name ?? ''))

@section('content')

<!-- Premium Hero Section -->
<div class="relative bg-primary-950 overflow-hidden pt-8 sm:pt-16 pb-56 lg:pt-32 lg:pb-[22rem] border-b border-primary-900/50">
    <!-- Geometric Pattern Overlay -->
    <div class="absolute inset-0 opacity-5">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="sadu-pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M20 0L40 20L20 40L0 20Z" fill="none" stroke="currentColor" stroke-width="1.5"/>
                    <rect x="15" y="15" width="10" height="10" fill="currentColor" opacity="0.5"/>
                </pattern>
            </defs>
            <rect x="0" y="0" width="100%" height="100%" fill="url(#sadu-pattern)"/>
        </svg>
    </div>

    <!-- Soft Glows -->
    <div class="absolute top-0 {{ app()->getLocale() === 'ar' ? 'right-0' : 'left-0' }} w-[30rem] h-[30rem] bg-primary-600/20 rounded-full blur-[120px] mix-blend-screen pointer-events-none -translate-y-1/2"></div>
    <div class="absolute bottom-0 {{ app()->getLocale() === 'ar' ? 'left-0' : 'right-0' }} w-[30rem] h-[30rem] bg-accent-500/10 rounded-full blur-[120px] mix-blend-screen pointer-events-none translate-y-1/2"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-primary-200/60 text-xs font-bold uppercase tracking-widest mb-8">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">{{ __('app.home') }}</a>
            <span class="text-primary-500/40">/</span>
            <span class="text-accent-400">{{ __('app.contact') }}</span>
        </nav>

        <div class="max-w-3xl">
            
            <h1 class="text-4xl sm:text-5xl lg:text-7xl font-black text-white leading-[1.1] tracking-tight mb-6">
                {{ __('app.contact_title') }}
            </h1>
            <p class="text-lg sm:text-xl text-primary-100/70 font-medium leading-relaxed max-w-2xl">
                {{ __('app.contact_subtitle') }}<br>
                {{ app()->getLocale() === 'ar' ? 'نسعد بتواصلكم معنا، فنحن شركاؤكم في نجاحكم الزراعي.' : 'We are happy to connect with you, as we are your partners in agricultural success.' }}
            </p>
        </div>
    </div>
</div>

<!-- Main Content Area -->
<section class="relative z-20 -mt-40 lg:-mt-[15rem] pb-12 sm:pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            
            <!-- Contact Info Cards -->
            <div class="lg:col-span-5 flex flex-col gap-4 sm:gap-6">
                @if(!empty($settings->phone))
                <a href="tel:{{ $settings->phone }}" class="group relative bg-white/80 backdrop-blur-xl rounded-[2rem] p-6 sm:p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white hover:border-primary-200 transition-all duration-500 overflow-hidden flex items-center gap-6">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative w-16 h-16 rounded-2xl bg-neutral-900 group-hover:bg-primary-600 flex items-center justify-center shrink-0 transition-all duration-500 shadow-sm">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div class="relative flex-1">
                        <div class="text-xs font-bold text-neutral-400 uppercase tracking-widest mb-1">{{ __('app.call_us') }}</div>
                        <div class="text-lg font-black text-neutral-900 group-hover:text-primary-700 transition-colors" dir="ltr">{{ $settings->phone }}</div>
                    </div>
                </a>
                @endif

                @if(!empty($settings->email))
                <a href="mailto:{{ $settings->email }}" class="group relative bg-white/80 backdrop-blur-xl rounded-[2rem] p-6 sm:p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white hover:border-primary-200 transition-all duration-500 overflow-hidden flex items-center gap-6">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative w-16 h-16 rounded-2xl bg-neutral-900 group-hover:bg-primary-600 flex items-center justify-center shrink-0 transition-all duration-500 shadow-sm">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div class="relative flex-1">
                        <div class="text-xs font-bold text-neutral-400 uppercase tracking-widest mb-1">{{ __('app.email_us') }}</div>
                        <div class="text-lg font-black text-neutral-900 group-hover:text-primary-700 transition-colors break-all">{{ $settings->email }}</div>
                    </div>
                </a>
                @endif

                @if(!empty($settings->address))
                <a href="{{ !empty($settings->google_maps_link) ? $settings->google_maps_link : 'https://maps.google.com/?q='.urlencode($settings->address) }}" target="_blank" class="group relative bg-white/80 backdrop-blur-xl rounded-[2rem] p-6 sm:p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white hover:border-primary-200 transition-all duration-500 overflow-hidden flex items-start gap-6">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative w-16 h-16 rounded-2xl bg-neutral-900 group-hover:bg-primary-600 flex items-center justify-center shrink-0 transition-all duration-500 shadow-sm mt-1">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div class="relative flex-1">
                        <div class="text-xs font-bold text-neutral-400 uppercase tracking-widest mb-1">{{ __('app.our_location') }}</div>
                        <div class="text-base font-bold text-neutral-900 group-hover:text-primary-700 transition-colors leading-relaxed">{{ $settings->address }}</div>
                    </div>
                </a>
                @endif

                @if(!empty($settings->whatsapp))
                <a href="https://wa.me/{{ $settings->whatsapp }}" target="_blank" class="group relative bg-[#25D366] rounded-[2rem] p-6 sm:p-8 shadow-[0_8px_30px_rgba(37,211,102,0.2)] border border-[#25D366] hover:bg-[#20bd5a] hover:border-[#20bd5a] transition-all duration-500 overflow-hidden flex items-center gap-6 mt-2">
                    <div class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative w-16 h-16 rounded-2xl bg-white flex items-center justify-center shrink-0 shadow-sm">
                        <svg class="w-8 h-8 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    </div>
                    <div class="relative flex-1">
                        <div class="text-xs font-bold text-white/70 uppercase tracking-widest mb-1">WhatsApp</div>
                        <div class="text-xl font-black text-white">{{ __('app.whatsapp_cta_button') }}</div>
                    </div>
                </a>
                @endif
            </div>

            <!-- Premium Form -->
            <div class="lg:col-span-7">
                @if(session('success'))
                <div class="mb-6 p-5 bg-green-50 border border-green-200 rounded-[2rem] text-green-800 font-bold flex items-center gap-4 shadow-sm animate-fade-in-up">
                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    {{ session('success') }}
                </div>
                @endif

                <div class="bg-white rounded-[2.5rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.05)] border border-neutral-100 p-8 sm:p-12 relative overflow-hidden">
                    <!-- Subtle Corner Decor -->
                    <div class="absolute top-0 {{ app()->getLocale() === 'ar' ? 'left-0' : 'right-0' }} w-40 h-40 bg-gradient-to-br from-primary-50 to-transparent opacity-70 rounded-full blur-2xl pointer-events-none -translate-x-1/2 -translate-y-1/2"></div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center gap-3 mb-8">
                            <div class="w-1.5 h-8 bg-accent-400 rounded-full"></div>
                            <h2 class="text-2xl sm:text-3xl font-black text-neutral-900 tracking-tight">{{ __('app.send_message') }}</h2>
                        </div>

                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-[11px] font-bold text-neutral-500 uppercase tracking-widest mb-2">{{ __('app.your_name') }} <span class="text-red-500">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}" required
                                           class="w-full bg-neutral-50 hover:bg-neutral-100 border-2 border-transparent focus:bg-white focus:border-primary-400 focus:ring-4 focus:ring-primary-400/10 rounded-2xl px-5 py-4 text-neutral-900 font-bold transition-all outline-none @error('name') border-red-400 @enderror">
                                    @error('name')<p class="mt-2 text-red-500 text-xs font-bold">{{ $message }}</p>@enderror
                                </div>
                                <div>
                                    <label class="block text-[11px] font-bold text-neutral-500 uppercase tracking-widest mb-2">{{ __('app.your_phone') }}</label>
                                    <input type="tel" name="phone" value="{{ old('phone') }}"
                                           class="w-full bg-neutral-50 hover:bg-neutral-100 border-2 border-transparent focus:bg-white focus:border-primary-400 focus:ring-4 focus:ring-primary-400/10 rounded-2xl px-5 py-4 text-neutral-900 font-bold transition-all outline-none">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-[11px] font-bold text-neutral-500 uppercase tracking-widest mb-2">{{ __('app.your_email') }}</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                           class="w-full bg-neutral-50 hover:bg-neutral-100 border-2 border-transparent focus:bg-white focus:border-primary-400 focus:ring-4 focus:ring-primary-400/10 rounded-2xl px-5 py-4 text-neutral-900 font-bold transition-all outline-none">
                                </div>
                                <div>
                                    <label class="block text-[11px] font-bold text-neutral-500 uppercase tracking-widest mb-2">{{ __('app.subject') }}</label>
                                    <input type="text" name="subject" value="{{ old('subject') }}"
                                           class="w-full bg-neutral-50 hover:bg-neutral-100 border-2 border-transparent focus:bg-white focus:border-primary-400 focus:ring-4 focus:ring-primary-400/10 rounded-2xl px-5 py-4 text-neutral-900 font-bold transition-all outline-none">
                                </div>
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold text-neutral-500 uppercase tracking-widest mb-2">{{ __('app.your_message') }} <span class="text-red-500">*</span></label>
                                <textarea name="message" rows="5" required
                                          class="w-full bg-neutral-50 hover:bg-neutral-100 border-2 border-transparent focus:bg-white focus:border-primary-400 focus:ring-4 focus:ring-primary-400/10 rounded-2xl px-5 py-4 text-neutral-900 font-bold transition-all outline-none resize-none @error('message') border-red-400 @enderror">{{ old('message') }}</textarea>
                                @error('message')<p class="mt-2 text-red-500 text-xs font-bold">{{ $message }}</p>@enderror
                            </div>
                            <div class="pt-2">
                                <button type="submit"
                                        class="group w-full relative flex items-center justify-center gap-3 py-5 bg-neutral-900 hover:bg-primary-600 text-white font-black rounded-2xl transition-all duration-300 overflow-hidden shadow-lg hover:shadow-primary-600/30">
                                    <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                                    <span class="relative text-base tracking-wider uppercase">{{ __('app.send_message') }}</span>
                                    <svg class="relative w-5 h-5 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }} group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Saudi Touch / Vision 2030 Banner -->
<section class="pt-8 sm:pt-16 bg-neutral-50 border-t border-neutral-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white shadow-sm mb-6">
            <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <h3 class="text-2xl font-black text-neutral-900 mb-4">
            {{ app()->getLocale() === 'ar' ? 'نفخر بخدمة القطاع الزراعي في المملكة' : 'Proud to Serve the Agricultural Sector in the Kingdom' }}
        </h3>
        <p class="text-neutral-500 font-medium max-w-2xl mx-auto mb-10">
            {{ app()->getLocale() === 'ar' ? 'نعمل بشغف والتزام لتقديم أفضل الحلول الزراعية التي تواكب رؤية المملكة 2030، مساهمين في تحقيق الأمن الغذائي والتنمية المستدامة.' : 'We work with passion and commitment to provide the best agricultural solutions that align with the Kingdom’s Vision 2030, contributing to food security and sustainable development.' }}
        </p>

        <div class="flex flex-wrap justify-center items-center gap-8 sm:gap-12 opacity-80 grayscale hover:grayscale-0 transition-all duration-500 mb-6 sm:mb-12">
            <img src="{{ asset('images/Saudi_Vision_2030_logo.svg') }}" alt="Saudi Vision 2030" class="h-12 sm:h-16 w-auto object-contain">
            <img src="{{ asset('images/saudi-made.png') }}" alt="Saudi Made" class="h-12 sm:h-16 w-auto object-contain">
            <img src="{{ asset('images/iso-logo.png') }}" alt="ISO Certified" class="h-12 sm:h-16 w-auto object-contain">
        </div>
    </div>
</section>

@endsection
