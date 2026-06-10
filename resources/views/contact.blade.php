@extends('layouts.app')

@section('title', __('app.contact') . ' | ' . ($settings->company_name ?? ''))

@section('content')

<style>
/* ══════════════════════════════════════════
   CONTACT PAGE — DESERT STEEL AESTHETIC
   Saudi luxury, gold + slate, geometric
══════════════════════════════════════════ */

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(28px); }
    to   { opacity: 1; transform: translateY(0);    }
}
@keyframes fadeIn {
    from { opacity: 0; } to { opacity: 1; }
}
@keyframes goldPulse {
    0%, 100% { opacity: 0.6; }
    50%       { opacity: 1;   }
}
@keyframes rotateOrb {
    from { transform: rotate(0deg); }
    to   { transform: rotate(360deg); }
}

/* Islamic 8-pointed star tile */
.geo-tile {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='64' height='64'%3E%3Cpath d='M32 6 L36.8 18.4 L50 12 L43.6 25.2 L56 32 L43.6 38.8 L50 52 L36.8 45.6 L32 58 L27.2 45.6 L14 52 L20.4 38.8 L8 32 L20.4 25.2 L14 12 L27.2 18.4 Z' fill='none' stroke='%23c8a95c' stroke-width='0.7' opacity='0.55'/%3E%3Ccircle cx='32' cy='32' r='5' fill='none' stroke='%23c8a95c' stroke-width='0.4' opacity='0.35'/%3E%3C/svg%3E");
}

.fade-up-1 { animation: fadeUp 0.75s cubic-bezier(0.16, 1, 0.3, 1) 0.05s both; }
.fade-up-2 { animation: fadeUp 0.75s cubic-bezier(0.16, 1, 0.3, 1) 0.18s both; }
.fade-up-3 { animation: fadeUp 0.75s cubic-bezier(0.16, 1, 0.3, 1) 0.30s both; }
.fade-up-4 { animation: fadeUp 0.75s cubic-bezier(0.16, 1, 0.3, 1) 0.42s both; }
.fade-up-5 { animation: fadeUp 0.75s cubic-bezier(0.16, 1, 0.3, 1) 0.54s both; }
.fade-up-6 { animation: fadeUp 0.75s cubic-bezier(0.16, 1, 0.3, 1) 0.66s both; }

.gold-rule {
    background: linear-gradient(90deg, transparent 0%, #c8a95c 30%, #e8cc8a 50%, #c8a95c 70%, transparent 100%);
    height: 1px;
    border: none;
}

.ccard {
    transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.35s cubic-bezier(0.16, 1, 0.3, 1),
                border-color 0.25s ease;
}
.ccard:hover {
    transform: translateY(-5px);
    box-shadow: 0 28px 56px -10px rgba(0, 0, 0, 0.13);
    border-color: rgba(200, 169, 92, 0.25) !important;
}

.ccard-icon {
    transition: background 0.3s ease, transform 0.35s cubic-bezier(0.16, 1, 0.3, 1);
}
.ccard:hover .ccard-icon {
    background: #c8a95c !important;
    transform: scale(1.1) rotate(-6deg);
}

.ccard-arrow {
    transition: opacity 0.25s ease, transform 0.3s ease, color 0.25s ease;
    opacity: 0.3;
}
.ccard:hover .ccard-arrow {
    opacity: 1;
    transform: translateX(3px);
    color: #c8a95c;
}
[dir="rtl"] .ccard:hover .ccard-arrow {
    transform: translateX(-3px);
}

.gold-shimmer-btn {
    background: linear-gradient(135deg, #c8a95c 0%, #e8cc8a 40%, #d4af6e 60%, #c8a95c 100%);
    background-size: 200% auto;
    transition: background-position 0.5s ease,
                transform 0.2s ease,
                box-shadow 0.3s ease;
    color: #0d0f10;
}
.gold-shimmer-btn:hover {
    background-position: right center;
    transform: translateY(-2px);
    box-shadow: 0 14px 36px rgba(200, 169, 92, 0.38);
}

.pinput {
    background: #f5f3f0;
    border: 2px solid transparent;
    transition: background 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
    outline: none;
}
.pinput:hover { background: #eeece9; }
.pinput:focus {
    background: #fff;
    border-color: #c8a95c;
    box-shadow: 0 0 0 4px rgba(200, 169, 92, 0.12);
}
.pinput::placeholder { color: #b0a99e; font-weight: 500; }

.label-tag {
    display: block;
    font-size: 0.67rem;
    font-weight: 700;
    letter-spacing: 0.13em;
    text-transform: uppercase;
    color: #9ca3af;
    margin-bottom: 0.45rem;
}
</style>

{{-- ══════════════════════════════════════
     HERO SECTION
══════════════════════════════════════ --}}
<div class="relative overflow-hidden" style="background: #a5aaae; padding-top: 5rem; padding-bottom: 13rem;">

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Breadcrumb --}}
        <nav class="fade-up-1 flex items-center gap-2 mb-10"
             style="font-size: 0.68rem; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;">
            <a href="{{ route('home') }}"
               style="color: rgba(255,255,255,0.65); text-decoration: none; transition: color 0.2s;"
               onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.65)'">
                {{ __('app.home') }}
            </a>
            <span style="color: rgba(255,255,255,0.35);">·</span>
            <span style="color: #fff;">{{ __('app.contact') }}</span>
        </nav>

        <div class="max-w-3xl">
            <h1 class="fade-up-2 font-black text-white"
                style="font-size: clamp(2.4rem, 5.5vw, 4.8rem); line-height: 1.08; letter-spacing: -0.02em; margin-bottom: 1.2rem;">
                {{ __('app.contact_title') }}
            </h1>

            <p class="fade-up-3 font-medium" style="color: rgba(255,255,255,0.8); font-size: 1.05rem; line-height: 1.75; max-width: 34rem;">
                {{ __('app.contact_subtitle') }}<br>
                {{ app()->getLocale() === 'ar'
                    ? 'نسعد بتواصلكم معنا، فنحن شركاؤكم في نجاحكم الزراعي.'
                    : 'We are your dedicated partners in agricultural success.' }}
            </p>
        </div>
    </div>

    {{-- Wave separator --}}
    <div class="absolute bottom-0 left-0 right-0" style="line-height: 0;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 88" preserveAspectRatio="none"
             style="width: 100%; height: 88px; display: block;">
            <path d="M0,44 C180,88 360,0 540,44 C720,88 900,0 1080,44 C1260,88 1380,22 1440,44 L1440,88 L0,88 Z"
                  fill="#f5f2ee"/>
        </svg>
    </div>
</div>

{{-- ══════════════════════════════════════
     MAIN CONTENT — CARDS + FORM
══════════════════════════════════════ --}}
<section style="background: #f5f2ee; margin-top: -2px; padding-bottom: 5rem;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start" style="margin-top: -5.5rem;">

            {{-- ─── LEFT: Contact Info Cards ─── --}}
            <div class="lg:col-span-5 flex flex-col gap-4">

                @if(!empty($settings->phone))
                <a href="tel:{{ $settings->phone }}"
                   class="ccard fade-up-2 flex items-center gap-5 bg-white rounded-[1.75rem] p-6 sm:p-7"
                   style="border: 1.5px solid rgba(0,0,0,0.07); box-shadow: 0 4px 20px rgba(0,0,0,0.04); text-decoration: none;">
                    <div class="ccard-icon w-14 h-14 rounded-2xl flex items-center justify-center shrink-0"
                         style="background: #a5aaae;">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="label-tag">{{ __('app.call_us') }}</div>
                        <div style="font-size: 1.15rem; font-weight: 900; color: #0d0f11;" dir="ltr">{{ $settings->phone }}</div>
                    </div>
                    <svg class="ccard-arrow w-5 h-5 shrink-0 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
                @endif

                @if(!empty($settings->email))
                <a href="mailto:{{ $settings->email }}"
                   class="ccard fade-up-3 flex items-center gap-5 bg-white rounded-[1.75rem] p-6 sm:p-7"
                   style="border: 1.5px solid rgba(0,0,0,0.07); box-shadow: 0 4px 20px rgba(0,0,0,0.04); text-decoration: none;">
                    <div class="ccard-icon w-14 h-14 rounded-2xl flex items-center justify-center shrink-0"
                         style="background: #a5aaae;">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="label-tag">{{ __('app.email_us') }}</div>
                        <div class="break-all" style="font-size: 1.05rem; font-weight: 900; color: #0d0f11;">{{ $settings->email }}</div>
                    </div>
                    <svg class="ccard-arrow w-5 h-5 shrink-0 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
                @endif

                @if(!empty($settings->address))
                <a href="{{ !empty($settings->google_maps_link) ? $settings->google_maps_link : 'https://maps.google.com/?q='.urlencode($settings->address) }}"
                   target="_blank"
                   class="ccard fade-up-4 flex items-start gap-5 bg-white rounded-[1.75rem] p-6 sm:p-7"
                   style="border: 1.5px solid rgba(0,0,0,0.07); box-shadow: 0 4px 20px rgba(0,0,0,0.04); text-decoration: none;">
                    <div class="ccard-icon w-14 h-14 rounded-2xl flex items-center justify-center shrink-0 mt-0.5"
                         style="background: #a5aaae;">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="label-tag">{{ __('app.our_location') }}</div>
                        <div style="font-size: 0.98rem; font-weight: 700; color: #0d0f11; line-height: 1.55;">{{ $settings->address }}</div>
                    </div>
                    <svg class="ccard-arrow w-5 h-5 shrink-0 mt-0.5 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
                @endif

                @if(!empty($settings->whatsapp))
                <a href="https://wa.me/{{ $settings->whatsapp }}" target="_blank"
                   class="ccard fade-up-5 flex items-center gap-5 rounded-[1.75rem] p-6 sm:p-7"
                   style="background: #25D366; box-shadow: 0 12px 36px rgba(37,211,102,0.25); text-decoration: none; border: 1.5px solid #25D366;">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center shrink-0"
                         style="background: rgba(255,255,255,0.18); transition: background 0.3s ease;">
                        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div style="font-size: 0.67rem; font-weight: 700; letter-spacing: 0.13em; text-transform: uppercase; color: rgba(255,255,255,0.6); margin-bottom: 0.25rem;">WhatsApp</div>
                        <div style="font-size: 1.15rem; font-weight: 900; color: white;">{{ __('app.whatsapp_cta_button') }}</div>
                    </div>
                    <svg class="w-5 h-5 shrink-0 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}"
                         style="color: rgba(255,255,255,0.7);"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
                @endif

                {{-- Response time badge --}}
                <div class="fade-up-6 flex items-center gap-3 px-5 py-3.5 rounded-2xl"
                     style="background: rgba(200,169,92,0.08); border: 1px solid rgba(200,169,92,0.2);">
                    <div class="w-2 h-2 rounded-full shrink-0" style="background: #c8a95c; animation: goldPulse 2s ease-in-out infinite;"></div>
                    <span style="font-size: 0.8rem; font-weight: 700; color: #9b8a60;">
                        {{ app()->getLocale() === 'ar'
                            ? 'نرد على استفساراتكم خلال 24 ساعة عمل'
                            : 'We respond within 24 business hours' }}
                    </span>
                </div>
            </div>

            {{-- ─── RIGHT: Premium Form ─── --}}
            <div class="lg:col-span-7 fade-up-2">

                @if(session('success'))
                <div class="mb-6 flex items-center gap-4 p-5 rounded-[1.5rem]"
                     style="background: #f0fdf4; border: 1.5px solid #bbf7d0; color: #166534; font-weight: 700; box-shadow: 0 4px 16px rgba(34,197,94,0.08);">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0" style="background: #dcfce7;">
                        <svg class="w-5 h-5" style="color: #16a34a;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    {{ session('success') }}
                </div>
                @endif

                <div class="bg-white rounded-[2rem] overflow-hidden"
                     style="box-shadow: 0 24px 64px -12px rgba(0,0,0,0.09); border: 1px solid rgba(0,0,0,0.06);">

                    {{-- Form header: deep dark with gold geo tile --}}
                    <div class="geo-tile relative overflow-hidden px-8 sm:px-10 py-7"
                         style="background: #5a656b;">
                        {{-- subtle darkening overlay on the tile --}}
                        <div class="absolute inset-0" style="background: rgba(13,15,17,0.55);"></div>
                        <div class="relative z-10 flex items-center gap-4">
                            <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0"
                                 style="background: rgba(200,169,92,0.12); border: 1px solid rgba(200,169,92,0.28);">
                                <svg class="w-5 h-5" style="color: #c8a95c;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            <div>
                                <div style="font-size: 0.62rem; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: rgba(200,169,92,0.6); margin-bottom: 0.2rem;">
                                    {{ app()->getLocale() === 'ar' ? 'راسلنا مباشرة' : 'DIRECT MESSAGE' }}
                                </div>
                                <h2 class="font-black text-white" style="font-size: 1.35rem; letter-spacing: -0.01em;">
                                    {{ __('app.send_message') }}
                                </h2>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('contact.store') }}" method="POST" class="p-7 sm:p-10 space-y-5">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="label-tag">{{ __('app.your_name') }} <span style="color: #ef4444;">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                       class="pinput w-full rounded-xl px-4 py-3.5 font-bold text-neutral-900 {{ $errors->has('name') ? 'border-red-400!' : '' }}"
                                       style="font-size: 0.95rem;">
                                @error('name')
                                <p style="margin-top: 0.35rem; color: #ef4444; font-size: 0.73rem; font-weight: 700;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="label-tag">{{ __('app.your_phone') }}</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}"
                                       class="pinput w-full rounded-xl px-4 py-3.5 font-bold text-neutral-900"
                                       style="font-size: 0.95rem;">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="label-tag">{{ __('app.your_email') }}</label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                       class="pinput w-full rounded-xl px-4 py-3.5 font-bold text-neutral-900"
                                       style="font-size: 0.95rem;">
                            </div>
                            <div>
                                <label class="label-tag">{{ __('app.subject') }}</label>
                                <input type="text" name="subject" value="{{ old('subject') }}"
                                       class="pinput w-full rounded-xl px-4 py-3.5 font-bold text-neutral-900"
                                       style="font-size: 0.95rem;">
                            </div>
                        </div>

                        <div>
                            <label class="label-tag">{{ __('app.your_message') }} <span style="color: #ef4444;">*</span></label>
                            <textarea name="message" rows="5" required
                                      class="pinput w-full rounded-xl px-4 py-3.5 font-bold text-neutral-900 resize-none {{ $errors->has('message') ? 'border-red-400!' : '' }}"
                                      style="font-size: 0.95rem; line-height: 1.65;">{{ old('message') }}</textarea>
                            @error('message')
                            <p style="margin-top: 0.35rem; color: #ef4444; font-size: 0.73rem; font-weight: 700;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pt-1">
                            <button type="submit"
                                    class="gold-shimmer-btn group w-full flex items-center justify-center gap-3 py-4 font-black rounded-xl"
                                    style="font-size: 0.88rem; letter-spacing: 0.09em; text-transform: uppercase;">
                                <span>{{ __('app.send_message') }}</span>
                                <svg class="w-5 h-5 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }} group-hover:translate-x-1 transition-transform"
                                     fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════
     VISION 2030 BAND
══════════════════════════════════════ --}}
<section class="geo-tile relative overflow-hidden" style="background: #0d0f11; padding: 4.5rem 0 5rem;">
    <div class="absolute inset-0" style="background: linear-gradient(to bottom, rgba(13,15,17,0.85) 0%, rgba(13,15,17,0.5) 50%, rgba(13,15,17,0.85) 100%);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

        {{-- Gold ornament top --}}
        <div class="flex items-center justify-center gap-4 mb-8">
            <div class="gold-rule" style="width: 4rem;"></div>
            <svg class="w-5 h-5" style="color: #c8a95c;" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17 5.8 21.3l2.4-7.4L2 9.4h7.6z"/>
            </svg>
            <div class="gold-rule" style="width: 4rem;"></div>
        </div>

        <h3 class="font-black text-white mb-3" style="font-size: clamp(1.25rem, 2.8vw, 1.75rem); letter-spacing: -0.01em;">
            {{ app()->getLocale() === 'ar'
                ? 'نفخر بخدمة القطاع الزراعي في المملكة'
                : 'Proud to Serve the Agricultural Sector in the Kingdom' }}
        </h3>
        <p class="mx-auto mb-10" style="color: rgba(165,170,174,0.55); max-width: 38rem; font-size: 0.92rem; line-height: 1.75; font-weight: 500;">
            {{ app()->getLocale() === 'ar'
                ? 'نعمل بشغف والتزام لتقديم أفضل الحلول الزراعية التي تواكب رؤية المملكة 2030، مساهمين في تحقيق الأمن الغذائي والتنمية المستدامة.'
                : 'We work with passion and commitment to provide the best agricultural solutions that align with the Kingdom\'s Vision 2030, contributing to food security and sustainable development.' }}
        </p>

        <div class="flex flex-wrap justify-center items-center gap-10 sm:gap-16 lg:gap-20 mb-10">
            <img src="{{ asset('images/Saudi_Vision_2030_logo.svg') }}" alt="Saudi Vision 2030"
                 style="height: 5rem; width: auto; object-fit: contain; filter: brightness(0) invert(1); opacity: 0.8;">
            <img src="{{ asset('images/saudi-made.png') }}" alt="Saudi Made"
                 style="height: 5rem; width: auto; object-fit: contain; filter: brightness(0) invert(1); opacity: 0.8;">
            <img src="{{ asset('images/iso-logo.png') }}" alt="ISO Certified"
                 style="height: 5rem; width: auto; object-fit: contain; filter: brightness(0) invert(1); opacity: 0.8;">
        </div>

        {{-- Gold ornament bottom --}}
        <div class="flex items-center justify-center gap-4">
            <div class="gold-rule" style="width: 4rem;"></div>
            <div class="w-2 h-2 rounded-full" style="background: #c8a95c;"></div>
            <div class="gold-rule" style="width: 4rem;"></div>
        </div>
    </div>
</section>

@endsection
