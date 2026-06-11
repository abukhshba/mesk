@extends('layouts.app')

@section('title', __('app.contact') . ' | ' . ($settings->company_name ?? ''))

@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500;600;700&display=swap');

:root {
    --gold:        #c8a95c;
    --gold-light:  #e8cc8a;
    --dark:        #1c2329;
    --slate:       #5c666f;
    --cream:       #f8f6f2;
    --text:        #1a1a18;
    --text-muted:  #7a7570;
    --white:       #ffffff;
}

.cp * { font-family: 'Jost', sans-serif; }

/* ── Reveal ── */
.rv {
    opacity: 0;
    transform: translateY(28px);
    transition: opacity 0.9s cubic-bezier(0.16,1,0.3,1),
                transform 0.9s cubic-bezier(0.16,1,0.3,1);
}
.rv.in { opacity: 1; transform: translateY(0); }
.rv.d1 { transition-delay: 0.07s; }
.rv.d2 { transition-delay: 0.14s; }
.rv.d3 { transition-delay: 0.21s; }
.rv.d4 { transition-delay: 0.28s; }
.rv.d5 { transition-delay: 0.35s; }

/* ── Hero ── */
.cp-hero {
    background: var(--cream);
    position: relative;
    padding: 6rem 0 5.5rem;
    overflow: hidden;
}
.cp-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg width='48' height='48' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='1' cy='1' r='1' fill='%23c8a95c' fill-opacity='0.07'/%3E%3C/svg%3E");
    background-size: 48px 48px;
    pointer-events: none;
}
.cp-hero-inner {
    position: relative;
    z-index: 1;
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 2rem;
}
.hero-bc {
    font-size: 0.72rem;
    font-weight: 600;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--text-muted);
    margin-bottom: 3rem;
    display: flex;
    align-items: center;
    gap: 0.6rem;
}
.hero-bc a {
    color: inherit;
    text-decoration: none;
    transition: color 0.2s;
}
.hero-bc a:hover { color: var(--gold); }
.hero-bc span { opacity: 0.3; }
.hero-tag {
    font-size: 0.72rem;
    font-weight: 600;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: var(--gold);
    display: flex;
    align-items: center;
    gap: 0.8rem;
    margin-bottom: 1.5rem;
}
.hero-tag::before {
    content: '';
    display: inline-block;
    width: 2rem;
    height: 1px;
    background: var(--gold);
    flex-shrink: 0;
}
[dir="rtl"] .hero-tag::before { order: 1; }
.hero-h1 {
    font-family: 'Cormorant Garamond', serif;
    font-size: clamp(4rem, 9vw, 8.5rem);
    font-weight: 300;
    line-height: 0.92;
    color: var(--text);
    letter-spacing: -0.02em;
    margin-bottom: 2rem;
}
.hero-h1 em {
    font-style: italic;
    color: var(--slate);
}
.hero-rule {
    width: 2.5rem;
    height: 2px;
    background: var(--gold);
    border: none;
    margin-bottom: 1.5rem;
}
.hero-sub {
    font-size: 1.08rem;
    font-weight: 300;
    color: var(--slate);
    line-height: 1.85;
    max-width: 32rem;
    letter-spacing: 0.01em;
}

/* ── Split Layout ── */
.cp-split {
    display: grid;
    grid-template-columns: 1fr 1fr;
}
@media (max-width: 900px) {
    .cp-split { grid-template-columns: 1fr; }
    .cp-form-panel { order: -1; }
}

/* ── Info Panel (light gray) ── */
.cp-info-panel {
    background: #eceae6;
    padding: 5rem 4rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    overflow: hidden;
}
.cp-info-panel::before {
    content: '';
    position: absolute;
    bottom: -5rem;
    right: -5rem;
    width: 20rem;
    height: 20rem;
    border: 1px solid rgba(200,169,92,0.13);
    border-radius: 50%;
    pointer-events: none;
}
.cp-info-panel::after {
    content: '';
    position: absolute;
    top: -7rem;
    left: -7rem;
    width: 26rem;
    height: 26rem;
    border: 1px solid rgba(200,169,92,0.08);
    border-radius: 50%;
    pointer-events: none;
}
@media (max-width: 900px) {
    .cp-hero       { padding: 3rem 0 2.75rem; }
    .cp-info-panel { padding: 3.5rem 1.75rem; }
    .cp-form-panel { padding: 1.5rem 1.75rem 3.5rem !important; }
}
.panel-tag {
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 2.75rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}
.panel-tag::after {
    content: '';
    flex: 1;
    max-width: 2.5rem;
    height: 1px;
    background: rgba(200,169,92,0.25);
}
[dir="rtl"] .panel-tag::after { order: -1; }

.ic {
    display: flex;
    align-items: flex-start;
    gap: 1.25rem;
    padding: 1.35rem 0;
    border-bottom: 1px solid rgba(0,0,0,0.07);
    text-decoration: none;
    position: relative;
    z-index: 1;
    transition: all 0.3s ease;
}
.ic:first-of-type { border-top: 1px solid rgba(0,0,0,0.07); }
.ic:hover .ic-icon { background: var(--gold); color: #fff; border-color: var(--gold); }
.ic:hover .ic-val  { color: var(--gold); }
.ic-icon {
    width: 2.25rem;
    height: 2.25rem;
    flex-shrink: 0;
    border: 1px solid rgba(200,169,92,0.35);
    border-radius: 0.4rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--gold);
    transition: all 0.3s ease;
}
.ic-icon svg { width: 0.9rem; height: 0.9rem; }
.ic-lbl {
    font-size: 0.68rem;
    font-weight: 600;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: rgba(0,0,0,0.38);
    margin-bottom: 0.28rem;
}
.ic-val {
    font-size: 1.02rem;
    font-weight: 500;
    color: var(--text);
    line-height: 1.5;
    word-break: break-word;
    transition: color 0.3s ease;
}

/* WhatsApp */
.wa-card {
    margin-top: 2.25rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    background: rgba(37,211,102,0.07);
    border: 1px solid rgba(37,211,102,0.18);
    border-radius: 0.5rem;
    padding: 1.1rem 1.35rem;
    text-decoration: none;
    position: relative;
    z-index: 1;
    transition: all 0.3s ease;
}
.wa-card:hover { background: rgba(37,211,102,0.14); transform: translateY(-2px); }
.wa-card svg { width: 1.75rem; height: 1.75rem; color: #25D366; flex-shrink: 0; }
.wa-lbl {
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: #25D366;
    display: block;
    margin-bottom: 0.2rem;
}
.wa-val {
    font-size: 0.97rem;
    font-weight: 400;
    color: var(--text);
}

/* QR */
.qr-wrap {
    margin-top: 2.5rem;
    position: relative;
    z-index: 1;
    display: flex;
    justify-content: center;
}
.qr-wrap a { display: inline-block; transition: transform 0.3s ease; }
.qr-wrap a:hover { transform: scale(1.05); }
.qr-wrap svg, .qr-wrap img { width: 180px; height: 180px; }
.qr-wrap svg rect { fill: rgb(10,100,40); }
.qr-wrap svg > rect:first-child { fill: transparent; }

/* ── Form Panel ── */
.cp-form-panel {
    background: var(--cream);
    padding: 5rem 4rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.fhdr { margin-bottom: 3rem; }
.fhdr-h2 {
    font-family: 'Cormorant Garamond', serif;
    font-size: clamp(2.25rem, 3.5vw, 3.2rem);
    font-weight: 300;
    color: var(--text);
    line-height: 1.18;
    margin-bottom: 0.75rem;
    letter-spacing: -0.01em;
}
.fhdr-h2 strong { font-weight: 600; }
.fhdr-sub {
    font-size: 0.95rem;
    font-weight: 300;
    color: var(--text-muted);
    line-height: 1.75;
}

/* Luxury line inputs */
.lf { margin-bottom: 2.25rem; }
.ll {
    display: block;
    font-size: 0.68rem;
    font-weight: 600;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--text-muted);
    margin-bottom: 0.65rem;
    transition: color 0.2s;
}
.lf:focus-within .ll { color: var(--gold); }
.li {
    display: block;
    width: 100%;
    background: transparent;
    border: none;
    border-bottom: 1.5px solid rgba(26,26,24,0.14);
    padding: 0.72rem 0;
    font-family: 'Jost', sans-serif;
    font-size: 1.08rem;
    font-weight: 400;
    color: var(--text);
    outline: none;
    border-radius: 0;
    -webkit-appearance: none;
    transition: border-color 0.25s ease;
}
.li::placeholder { color: rgba(26,26,24,0.22); font-weight: 300; }
.li:focus { border-color: var(--gold); }
.li.err { border-color: #dc2626; }
textarea.li { resize: none; min-height: 6rem; line-height: 1.75; }
.lerr {
    margin-top: 0.38rem;
    font-size: 0.8rem;
    font-weight: 500;
    color: #dc2626;
    letter-spacing: 0.03em;
}

/* Submit */
.lbtn {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    width: 100%;
    padding: 1.15rem 2.5rem;
    background: var(--dark);
    color: var(--white);
    font-family: 'Jost', sans-serif;
    font-size: 0.8rem;
    font-weight: 600;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    border: none;
    cursor: pointer;
    overflow: hidden;
    transition: color 0.35s ease;
}
.lbtn::before {
    content: '';
    position: absolute;
    inset: 0;
    background: var(--gold);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.45s cubic-bezier(0.16,1,0.3,1);
}
[dir="rtl"] .lbtn::before { transform-origin: right; }
.lbtn:hover::before { transform: scaleX(1); }
.lbtn-inner {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    transition: color 0.35s ease;
}
.lbtn:hover .lbtn-inner { color: var(--dark); }

/* Success */
.suc {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.25rem 1.5rem;
    background: rgba(34,197,94,0.05);
    border: 1px solid rgba(34,197,94,0.18);
    margin-bottom: 2.25rem;
    border-radius: 0.25rem;
}
.suc-icon {
    width: 1.75rem;
    height: 1.75rem;
    border-radius: 50%;
    background: rgba(34,197,94,0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    color: #16a34a;
}
.suc-txt { font-size: 0.85rem; font-weight: 500; color: #15803d; }

@keyframes goldPulse {
    0%, 100% { opacity: 0.6; }
    50%       { opacity: 1;   }
}

/* ── Desktop font scaling ── */
@media (min-width: 901px) {
    .hero-bc   { font-size: 0.88rem; }
    .hero-tag  { font-size: 0.88rem; }
    .hero-sub  { font-size: 1.28rem; }
    .panel-tag { font-size: 1.75rem; }
    .ic-lbl    { font-size: 0.82rem; }
    .ic-val    { font-size: 1.22rem; }
    .wa-lbl    { font-size: 0.82rem; }
    .wa-val    { font-size: 1.12rem; }
    .fhdr-sub  { font-size: 1.12rem; }
    .ll        { font-size: 1.05rem; }
    .li        { font-size: 1.45rem; }
    .lerr      { font-size: 0.9rem;  }
    .lbtn      { font-size: 1.1rem;  }
}

/* ── Mobile font scaling (declared last so it wins) ── */
@media (max-width: 900px) {
    .ll        { font-size: 1.1rem; }
    .li        { font-size: 1.3rem; }
    .lbtn      { font-size: 1.1rem; }
    .panel-tag { font-size: 1.3rem; }
    .ic-icon   { width: 3rem; height: 3rem; }
    .ic-icon svg { width: 1.3rem; height: 1.3rem; }
    .ic-lbl    { font-size: 0.85rem; }
    .ic-val    { font-size: 1.3rem; }
    .wa-lbl    { font-size: 0.85rem; }
    .wa-val    { font-size: 1.2rem; }
    .wa-card svg { width: 2.25rem; height: 2.25rem; }
}
</style>

<div class="cp">

{{-- ══════ HERO ══════ --}}
<section class="cp-hero">
    <div class="cp-hero-inner">

        <nav class="hero-bc rv">
            <a href="{{ route('home') }}">{{ __('app.home') }}</a>
            <span>—</span>
            <span style="color: var(--text);">{{ __('app.contact') }}</span>
        </nav>

{{--        <div class="hero-tag rv d1">{{ __('app.contact') }}</div>--}}

        <h1 class="hero-h1 rv d2">
            @if(app()->getLocale() === 'ar')
                تواصل<br><em>معنا</em>
            @else
                Get in<br><em>Touch</em>
            @endif
        </h1>

        <hr class="hero-rule rv d3">

        <p class="hero-sub rv d4">{{ __('app.contact_subtitle') }}</p>

    </div>
</section>

{{-- ══════ SPLIT ══════ --}}
<div class="cp-split">

    {{-- ── LEFT: Dark Info ── --}}
    <div class="cp-info-panel">

        <div class="panel-tag rv">
            {{ app()->getLocale() === 'ar' ? 'بياناتنا' : 'Contact Details' }}
        </div>

        @if(!empty($settings->phone))
        <a href="tel:{{ $settings->phone }}" class="ic rv d1">
            <div class="ic-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
            </div>
            <div>
                <div class="ic-lbl">{{ __('app.call_us') }}</div>
                <div class="ic-val" dir="ltr">{{ $settings->phone }}</div>
            </div>
        </a>
        @endif

        @if(!empty($settings->email))
        <a href="mailto:{{ $settings->email }}" class="ic rv d2">
            <div class="ic-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
            <div style="min-width:0;">
                <div class="ic-lbl">{{ __('app.email_us') }}</div>
                <div class="ic-val" style="word-break:break-all;">{{ $settings->email }}</div>
            </div>
        </a>
        @endif

        @if(!empty($settings->address))
        <a href="{{ !empty($settings->google_maps_link) ? $settings->google_maps_link : 'https://maps.google.com/?q='.urlencode($settings->address) }}"
           target="_blank" class="ic rv d3">
            <div class="ic-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
            <div>
                <div class="ic-lbl">{{ __('app.our_location') }}</div>
                <div class="ic-val">{{ $settings->address }}</div>
            </div>
        </a>
        @endif

        @if(!empty($settings->whatsapp))
        <a href="https://wa.me/{{ $settings->whatsapp }}" target="_blank" class="wa-card rv d4">
            <svg fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
            </svg>
            <div>
                <span class="wa-lbl">WhatsApp</span>
                <span class="wa-val">{{ __('app.whatsapp_cta_button') }}</span>
            </div>
        </a>
        @endif

        @if(!empty($settings->contact_info_pdf))
        <div class="qr-wrap rv d5">
            <div style="text-align: center;">
                <a href="{{ asset('storage/' . $settings->contact_info_pdf) }}" target="_blank">
                    {!! QrCode::format('svg')->size(240)->color(0,100,0)->margin(0)->generate(asset('storage/' . $settings->contact_info_pdf)) !!}
                </a>
                <p style="margin-top: 0.6rem; font-size: 0.72rem; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; color: rgba(0,0,0,0.38);">
                    {{ app()->getLocale() === 'ar' ? 'امسح للحصول على معلومات التواصل' : 'Scan for contact info' }}
                </p>
            </div>
        </div>
        @endif

    </div>

    {{-- ── RIGHT: Form ── --}}
    <div class="cp-form-panel">

        @if(session('success'))
        <div class="suc rv">
            <div class="suc-icon">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <span class="suc-txt">{{ session('success') }}</span>
        </div>
        @endif

        <div class="fhdr rv">
            <h2 class="fhdr-h2">
                @if(app()->getLocale() === 'ar')
                    أرسل <strong>رسالتك</strong>
                @else
                    Send us <strong>a message</strong>
                @endif
            </h2>
            <p class="fhdr-sub">
                {{ app()->getLocale() === 'ar'
                    ? 'نسعد بتواصلكم معنا، سنرد خلال 24 ساعة عمل.'
                    : "We'd love to hear from you. We'll get back within 24 business hours." }}
            </p>
        </div>

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf

            <div class="lf rv d1">
                <label class="ll">
                    {{ __('app.your_name') }}
                    <span style="color: var(--gold); margin-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }}: 0.2rem;">*</span>
                </label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="li {{ $errors->has('name') ? 'err' : '' }}"
                       placeholder="{{ app()->getLocale() === 'ar' ? 'الاسم الكامل' : 'Full name' }}">
                @error('name')
                <p class="lerr">{{ $message }}</p>
                @enderror
            </div>

            <div class="lf rv d2">
                <label class="ll">{{ __('app.your_phone') }}</label>
                <input type="tel" name="phone" value="{{ old('phone') }}"
                       class="li"
                       placeholder="{{ app()->getLocale() === 'ar' ? 'رقم الجوال' : 'Phone number' }}"
                       dir="ltr">
            </div>

            <div class="lf rv d3">
                <label class="ll">
                    {{ __('app.your_message') }}
                    <span style="color: var(--gold); margin-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }}: 0.2rem;">*</span>
                </label>
                <textarea name="message" rows="5" required
                          class="li {{ $errors->has('message') ? 'err' : '' }}"
                          placeholder="{{ app()->getLocale() === 'ar' ? 'اكتب رسالتك هنا…' : 'Write your message here…' }}">{{ old('message') }}</textarea>
                @error('message')
                <p class="lerr">{{ $message }}</p>
                @enderror
            </div>

            <div class="rv d4">
                <button type="submit" class="lbtn">
                    <span class="lbtn-inner">
                        <span>{{ __('app.send_message') }}</span>
                        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24"
                             style="{{ app()->getLocale() === 'ar' ? 'transform:rotate(180deg);' : '' }}">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </span>
                </button>
            </div>

        </form>
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

</div>

<script>
(function () {
    var els = document.querySelectorAll('.rv');
    if (!els.length || !window.IntersectionObserver) {
        els.forEach(function (el) { el.classList.add('in'); });
        return;
    }
    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
            if (e.isIntersecting) {
                e.target.classList.add('in');
                io.unobserve(e.target);
            }
        });
    }, { threshold: 0.08, rootMargin: '0px 0px -30px 0px' });
    els.forEach(function (el) { io.observe(el); });
})();
</script>

@endsection
