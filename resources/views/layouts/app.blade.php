<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- ═══ Primary SEO ═══ --}}
    <title>@yield('title', ($settings->company_name ?? 'شركة مسك للأسمدة الزراعية') . ' | المسك للزراعة - Mesk Agri')</title>
    <meta name="description" content="@yield('description', 'شركة مسك للأسمدة الزراعية - الشركة الرائدة في المملكة العربية السعودية لتوريد الأسمدة والمبيدات الزراعية عالية الجودة. Mesk Agricultural Fertilizers Company - Leading supplier of fertilizers and agricultural solutions in Saudi Arabia.')">
    <meta name="keywords" content="@yield('keywords', 'مسك, المسك, شركة المسك, شركة المسك للأسمدة, شركة المسك للاسمدة الزراعية, المسك للزراعة, مسك للأسمدة, أسمدة زراعية, مبيدات زراعية, أسمدة السعودية, Mesk, Mesk Agri, Mesk Agricultural, Mesk Fertilizers, Mesk Saudi Arabia, agricultural fertilizers Saudi Arabia, مسك اسمدة, اسمدة المسك')">
    <meta name="author" content="{{ $settings->company_name ?? 'شركة مسك للأسمدة الزراعية' }}">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="googlebot" content="index, follow">

    {{-- ═══ Canonical & Language Alternates ═══ --}}
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="alternate" hreflang="ar" href="{{ str_replace('/en/', '/ar/', url()->current()) }}">
    <link rel="alternate" hreflang="en" href="{{ str_replace('/ar/', '/en/', url()->current()) }}">
    <link rel="alternate" hreflang="x-default" href="{{ url('/') }}">

    {{-- ═══ Open Graph (Facebook, WhatsApp, LinkedIn) ═══ --}}
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('og_title', ($settings->company_name ?? 'شركة مسك للأسمدة الزراعية'))">
    <meta property="og:description" content="@yield('og_description', 'شركة مسك للأسمدة الزراعية - الشركة الرائدة في المملكة العربية السعودية لتوريد الأسمدة والمبيدات الزراعية عالية الجودة.')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.png'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="{{ app()->getLocale() === 'ar' ? 'ar_SA' : 'en_US' }}">
    <meta property="og:locale:alternate" content="{{ app()->getLocale() === 'ar' ? 'en_US' : 'ar_SA' }}">
    <meta property="og:site_name" content="{{ $settings->company_name ?? 'مسك للأسمدة الزراعية' }}">

    {{-- ═══ Twitter Card ═══ --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', ($settings->company_name ?? 'شركة مسك للأسمدة الزراعية'))">
    <meta name="twitter:description" content="@yield('og_description', 'شركة مسك للأسمدة الزراعية - الشركة الرائدة في المملكة العربية السعودية.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/og-default.png'))">

    {{-- ═══ Geo Tags (Saudi Arabia) ═══ --}}
    <meta name="geo.region" content="SA">
    <meta name="geo.country" content="Saudi Arabia">
    <meta name="ICBM" content="24.7136, 46.6753">
    <meta name="DC.language" content="{{ app()->getLocale() }}">

    {{-- ═══ JSON-LD Structured Data ═══ --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "Organization",
        "name": "{{ $settings->company_name ?? 'شركة مسك للأسمدة الزراعية' }}",
        "alternateName": ["مسك", "المسك", "شركة المسك", "Mesk Agri", "Mesk Agricultural Fertilizers", "المسك للزراعة", "مسك للأسمدة"],
        "url": "{{ url('/') }}",
        "logo": "{{ asset('images/logo.png') }}",
        "description": "شركة مسك للأسمدة الزراعية - الشركة الرائدة في المملكة العربية السعودية لتوريد الأسمدة والمبيدات الزراعية عالية الجودة. Mesk Agricultural Fertilizers - Saudi Arabia's leading agricultural fertilizer supplier.",
        "sameAs": [],
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "SA",
            "addressRegion": "المملكة العربية السعودية"
        },
        "contactPoint": [
            {
                "@type": "ContactPoint",
                "telephone": "{{ $settings->phone ?? '' }}",
                "contactType": "customer service",
                "availableLanguage": ["Arabic", "English"],
                "areaServed": "SA"
            }
        ],
        "knowsAbout": ["أسمدة زراعية", "مبيدات زراعية", "agricultural fertilizers", "NPK fertilizers", "الزراعة في السعودية", "رؤية 2030"],
        "foundingLocation": {
            "@type": "Place",
            "address": {
                "@type": "PostalAddress",
                "addressCountry": "SA"
            }
        }
    }
    </script>

    @yield('schema')

    {{-- ═══ Favicon ═══ --}}
    @if(!empty($settings->favicon))
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . $settings->favicon) }}">
    @endif

    {{-- ═══ DNS Prefetch & Preconnect ═══ --}}
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- ═══ Google Fonts: Non-render-blocking ═══ --}}
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&family=Inter:wght@400;500;600;700;800&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"></noscript>

    {{-- ═══ Swiper CSS (deferred) ═══ --}}
    <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" media="print" onload="this.media='all'" />
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /></noscript>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-neutral-900 antialiased">

    <!-- Navigation -->
    @include('partials.navbar')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')



    <!-- Swiper JS (deferred) -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>

    @stack('scripts')
</body>
</html>
