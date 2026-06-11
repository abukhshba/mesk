@extends('layouts.app')

@section('title', $product->getTranslation('name', app()->getLocale()) . ' | ' . ($settings->company_name ?? 'مسك للأسمدة') . ' - المسك للزراعة')
@section('description', Str::limit(strip_tags($product->getTranslation('short_description', app()->getLocale()) ?: $product->getTranslation('name', app()->getLocale()) . ' - ' . ($settings->company_name ?? 'شركة مسك للأسمدة الزراعية') . ' - المملكة العربية السعودية'), 160))
@section('keywords', $product->getTranslation('name', 'ar') . ', ' . $product->getTranslation('name', 'en') . ', مسك, شركة المسك, المسك للأسمدة, أسمدة زراعية, Mesk, Mesk Agricultural Fertilizers, Saudi Arabia fertilizers')
@section('og_type', 'product')
@section('og_title', $product->getTranslation('name', app()->getLocale()) . ' | ' . ($settings->company_name ?? 'مسك'))
@section('og_description', Str::limit(strip_tags($product->getTranslation('short_description', app()->getLocale()) ?: $product->getTranslation('name', app()->getLocale())), 160))

{{-- @section('schema')
@php $productImage = $product->getFirstMediaUrl('gallery') ?: asset('images/og-default.png'); @endphp
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Product",
    "name": "{{ $product->getTranslation('name', app()->getLocale()) }}",
    "description": "{{ Str::limit(strip_tags($product->getTranslation('short_description', app()->getLocale()) ?: $product->getTranslation('name', app()->getLocale())), 200) }}",
    "image": "{{ $productImage }}",
    "url": "{{ url()->current() }}",
    "brand": {
        "@type": "Brand",
        "name": "{{ $settings->company_name ?? 'مسك للأسمدة الزراعية' }}",
        "alternateName": ["مسك", "المسك", "Mesk Agri", "شركة المسك", "المسك للزراعة"]
    },
    "manufacturer": {
        "@type": "Organization",
        "name": "{{ $settings->company_name ?? 'شركة مسك للأسمدة الزراعية' }}",
        "url": "{{ url('/') }}",
        "areaServed": "SA"
    },
    "offers": {
        "@type": "Offer",
        "availability": "https://schema.org/InStock",
        "priceCurrency": "SAR",
        "seller": {
            "@type": "Organization",
            "name": "{{ $settings->company_name ?? 'مسك للأسمدة الزراعية' }}"
        }
    }
}
</script>
@endsection --}}

@section('content')
<div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 py-6 sm:py-10">

    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-sm text-neutral-500 mb-8 flex-wrap">
        <a href="{{ route('home') }}" class="hover:text-primary-600 transition-colors">{{ __('app.home') }}</a>
        <span>/</span>
        <a href="{{ route('products.index') }}" class="hover:text-primary-600 transition-colors">{{ __('app.products') }}</a>
        @if($product->category)
        <span>/</span>
        <a href="{{ route('categories.subcategory', [$product->category->parent->slug, $product->category->slug]) }}" class="hover:text-primary-600 transition-colors">
            {{ $product->category->getTranslation('name', app()->getLocale()) }}
        </a>
        @endif
        <span>/</span>
        <span class="text-neutral-900 font-medium">{{ $product->getTranslation('name', app()->getLocale()) }}</span>
    </nav>


    @php
        $locale = app()->getLocale();
        $propertiesText = $product->getTranslation('properties', $locale);
        $hasProperties = !empty($propertiesText) && !empty(trim(strip_tags($propertiesText)));

        $descText = $product->getTranslation('description', $locale);
        $hasDescription = !empty($descText) && !empty(trim(strip_tags($descText)));

        $appRatesText = $product->getTranslation('application_rates_text', $locale);
        $hasApplicationRates = $product->application_rates_type === 'table'
            ? !empty($product->application_rates_rows)
            : (!empty($appRatesText) && !empty(trim(strip_tags($appRatesText))));

        $hasUsageInstructions = !empty($product->usage_instructions) && !empty(trim(strip_tags($product->usage_instructions)));
        $hasSafetyPrecautions = !empty($product->safety_precautions) && !empty(trim(strip_tags($product->safety_precautions)));
    @endphp

    <!-- Product Top Section -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 mb-16">

        <!-- Gallery -->
        <div class="lg:col-span-7 flex flex-row gap-4 sm:gap-6 items-center">
            @php
                $packageSizes = $locale === 'ar'
                    ? ($product->package_sizes_ar ?: $product->package_sizes_en)
                    : ($product->package_sizes_en ?: $product->package_sizes_ar);
            @endphp
            @if($packageSizes)
            <div class="flex flex-col gap-2 sm:gap-3 shrink-0">
                @php
                    $sizesArray = array_filter(array_map('trim', explode(',', $packageSizes)));
                    $totalSizes = count($sizesArray);
                @endphp
                @foreach($sizesArray as $index => $size)
                    @php
                        $opacityPct = 40 + round(($index / max(1, $totalSizes - 1)) * 60);
                    @endphp
                    <div class="w-10 h-10 sm:w-14 sm:h-14 rounded-full flex items-center justify-center text-[10px] sm:text-sm font-black text-white shadow-sm transition-transform duration-300 hover:scale-105"
                         style="background-color: rgba(19, 117, 71, {{ $opacityPct / 100 }}); font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
                        {{ $size }}
                    </div>
                @endforeach
            </div>
            @endif

            <div class="flex-1 min-w-0">
                @php
                    $gallery = $product->getMedia('gallery') ?? asset('images/products/' . $product->id . '.png');
                    $allImages = collect();
                    foreach ($gallery as $media) { $allImages->push($media->getUrl()); }
                @endphp

                @if($allImages->count() > 0)
                <!-- Main Swiper -->
                <div class="swiper product-main-swiper rounded-2xl overflow-hidden bg-neutral-50 aspect-[4/3]">
                    <div class="swiper-wrapper">
                        @foreach($allImages as $imgUrl)
                        <div class="swiper-slide flex items-center justify-center">
                            <img src="{{ $imgUrl }}" alt="{{ $product->getTranslation('name', app()->getLocale()) }}"
                                 class="max-w-full max-h-full object-contain">
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>

                @if($allImages->count() > 1)
                <!-- Thumbs Swiper -->
                <div class="swiper product-thumb-swiper mt-3">
                    <div class="swiper-wrapper">
                        @foreach($allImages as $imgUrl)
                        <div class="swiper-slide cursor-pointer rounded-xl overflow-hidden aspect-square bg-neutral-50 border-2 border-transparent hover:border-primary-400 transition-colors flex items-center justify-center p-2">
                            <img src="{{ $imgUrl }}" class="max-w-full max-h-full object-contain">
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @else
                <div class="swiper product-main-swiper rounded-2xl overflow-hidden bg-neutral-50 aspect-[4/3]">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide flex items-center justify-center">
                            <img src="{{ asset('images/products/new/' .$product->id. '.png') }}"
                                 alt="{{ $product->getTranslation('name', app()->getLocale()) }}"
                                 class="max-w-full max-h-full object-contain">
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Product Info -->
        <div class="lg:col-span-5 flex flex-col">
            @if($product->category)
            <span class="inline-flex items-center text-xs lg:text-sm font-semibold text-primary-700 bg-primary-50 px-3 lg:px-4 py-1 lg:py-1.5 rounded-full w-fit">
                @if($product->category->parent)
                    {{ $product->category->parent->getTranslation('name', app()->getLocale()) }}
                    <span class="mx-1 text-primary-400">·</span>
                @endif
                {{ $product->category->getTranslation('name', app()->getLocale()) }}
            </span>
            @endif

            <h1 class="mt-3 text-3xl sm:text-4xl lg:text-5xl font-black text-neutral-900 leading-tight tracking-tight">
                {{ $product->getTranslation('name', app()->getLocale()) }}
            </h1>

            @php $subTitle = $product->getTranslation('sub_title', $locale) ?: ($locale === 'ar' ? $product->sub_title_en : $product->sub_title_ar); @endphp
            @if($subTitle)
            <p class="mt-1 text-lg lg:text-2xl font-extrabold text-primary-600 tracking-wide" dir="ltr">
                {{ $subTitle }}
            </p>
            @endif

            <!-- Quick Specs -->
            @if($product->application_rate)
            <div class="mt-6 grid grid-cols-1 gap-4">
                <div class="bg-neutral-50 rounded-xl p-4 border border-neutral-100">
                    <div class="text-xs text-neutral-400 font-medium uppercase tracking-wide">{{ __('app.application_rate') }}</div>
                    <div class="mt-1 font-semibold text-neutral-800 text-sm">{{ $product->application_rate }}</div>
                </div>
            </div>
            @endif


            {{-- ─── SECTION 1: Properties & Benefits ─── --}}
            @if($hasProperties)
            <div class="my-4 mt-2 sm:mt-4">
                <div class="relative bg-gradient-to-br from-primary-50 via-white to-accent-50/30 rounded-3xl overflow-hidden border border-primary-100/60">
                    {{-- Decorative corner shapes --}}
                    <div class="absolute top-0 {{ $locale === 'ar' ? 'left-0' : 'right-0' }} w-32 h-32 bg-primary-100/40 rounded-full -translate-y-1/2 {{ $locale === 'ar' ? '-translate-x-1/2' : 'translate-x-1/2' }}"></div>
                    <div class="absolute bottom-0 {{ $locale === 'ar' ? 'right-0' : 'left-0' }} w-20 h-20 bg-accent-100/30 rounded-full translate-y-1/2 {{ $locale === 'ar' ? 'translate-x-1/2' : '-translate-x-1/2' }}"></div>

                    <div class="relative z-10 p-3 sm:p-4 lg:p-6">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-xl bg-[#a8abb4] flex items-center justify-center shadow-sm">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                            </div>
                            <h2 class="text-xl sm:text-2xl font-black text-neutral-900">
                                {{ $locale === 'ar' ? 'الخواص والمميزات' : 'Properties & Benefits' }}
                            </h2>
                        </div>
                        <div class="text-neutral-700 leading-relaxed prose max-w-none text-sm sm:text-base">
                            {!! $propertiesText !!}
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- WhatsApp CTA -->
            @if(!empty($settings->whatsapp))
            <div class="mt-8">
                <a href="https://wa.me/{{ $settings->whatsapp }}?text={{ urlencode(app()->getLocale() === 'ar' ? 'السلام عليكم، أود الاستفسار عن منتج: ' . $product->getTranslation('name', 'ar') : 'Hello, I would like to inquire about: ' . $product->getTranslation('name', 'en')) }}"
                   target="_blank"
                   class="flex items-center justify-center gap-3 w-full py-4 bg-green-500 hover:bg-green-600 text-white font-bold rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 text-lg">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    {{ __('app.whatsapp_inquiry') }}
                </a>
            </div>
            @endif
        </div>
    </div>

    {{-- ═══════════════════════════════════════════════════════════════════════
         CREATIVE PRODUCT DETAILS SECTIONS
         Each section uses a unique visual treatment to avoid monotony
    ═══════════════════════════════════════════════════════════════════════ --}}


    {{-- ─── SECTION 2: Directions & Application Rates ─── --}}
    @if($hasApplicationRates)
    <div class="mb-10">
        <div class="bg-white rounded-3xl border border-neutral-200/80 shadow-sm overflow-hidden">
            {{-- Section header with accent stripe --}}
            <div class="bg-[#b5b8c0] px-6 sm:px-8 lg:px-10 py-3.5 flex items-center gap-3">

                <h2 class="text-lg sm:text-xl font-black text-white">
                    {{ $locale === 'ar' ? 'طرق ومعدلات الاستخدام' : 'Directions & Application Rates' }}
                </h2>
            </div>

            <div class="pt-1">
                @if($product->application_rates_type === 'table' && !empty($product->application_rates_rows))
                    {{-- ═══ TABLE MODE ═══ --}}
                    <div class="overflow-x-auto -mx-2">
                        <table class="w-full text-sm lg:text-base border-collapse text-center">
                            <thead>
                                <tr class="bg-[#8e8e90]">
                                    <th class="border border-neutral-300 text-center py-2.5 px-4 font-bold text-white text-xs sm:text-sm lg:text-base uppercase tracking-wider">
                                        {{ $locale === 'ar' ? 'المحاصيل' : 'Crops' }}
                                    </th>
                                    <th class="border border-neutral-300 text-center py-2.5 px-4 font-bold text-white text-xs sm:text-sm lg:text-base uppercase tracking-wider">
                                        {{ $locale === 'ar' ? 'معدل الاستخدام مع مياه الري' : 'Application Rate with Irrigation Water' }}
                                    </th>
                                    @if($product->application_rates_has_notes)
                                    <th class="border border-neutral-300 text-center py-2.5 px-4 font-bold text-white text-xs sm:text-sm lg:text-base uppercase tracking-wider">
                                        {{ $locale === 'ar' ? 'ملاحظات' : 'Notes' }}
                                    </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product->application_rates_rows as $i => $row)
                                <tr class="bg-[#f9f8f9] hover:bg-[#efedee] transition-colors">
                                    <td class="border border-neutral-300 text-center py-3 lg:py-4 px-2 sm:px-4 font-semibold text-[#373936] text-sm lg:text-lg">
                                        {{ $row['crop_' . $locale] ?? $row['crop_ar'] ?? '' }}
                                    </td>
                                    <td class="border border-neutral-300 text-center py-3 lg:py-4 px-3 text-[#373936] text-sm lg:text-lg">
                                        {{ $row['rate_' . $locale] ?? $row['rate_ar'] ?? '' }}
                                    </td>
                                    @if($product->application_rates_has_notes)
                                    <td class="border border-neutral-300 text-center py-3 lg:py-4 px-2 sm:px-4 text-[#373936] text-xs sm:text-sm lg:text-base leading-relaxed">
                                        {{ $row['notes_' . $locale] ?? $row['notes_ar'] ?? '' }}
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                            @if($product->getTranslation('application_rates_footer', $locale))
                            <tfoot>
                                <tr>
                                    <td colspan="{{ $product->application_rates_has_notes ? 3 : 2 }}" class="border border-neutral-300 bg-[#8e8e90] text-white text-center py-3 lg:py-4 px-4 font-semibold text-sm lg:text-base">
                                        <div class="flex items-center justify-center gap-2">
                                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            <span>{{ $product->getTranslation('application_rates_footer', $locale) }}</span>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                            @endif
                        </table>
                    </div>



                @else
                    {{-- ═══ TEXT MODE ═══ --}}
                    <div class="text-neutral-700 leading-relaxed text-sm sm:text-base whitespace-pre-line">
                        {{ $product->getTranslation('application_rates_text', $locale) }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endif

    {{-- ─── SECTION 3: Product Details & Usage ─── --}}
    @if($hasDescription || $hasUsageInstructions || $hasSafetyPrecautions)
    <div class="mb-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Description Card --}}
            @if($hasDescription)
            <div class="bg-white rounded-3xl border border-neutral-100 shadow-sm p-6 sm:p-8">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-9 h-9 rounded-lg bg-blue-100 flex items-center justify-center">
                        <svg class="w-4.5 h-4.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-neutral-900">{{ __('app.product_details') }}</h3>
                </div>
                <div class="text-neutral-600 text-sm leading-relaxed prose max-w-none">
                    {!! $product->getTranslation('description', $locale) !!}
                </div>
            </div>
            @endif

            <div class="space-y-6">
                {{-- Usage Instructions --}}
                @if($hasUsageInstructions)
                <div class="bg-white rounded-3xl border border-neutral-100 shadow-sm p-6 sm:p-8">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 rounded-lg bg-emerald-100 flex items-center justify-center">
                            <svg class="w-4.5 h-4.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                        </div>
                        <h3 class="text-lg font-bold text-neutral-900">{{ __('app.usage_instructions') }}</h3>
                    </div>
                    <p class="text-neutral-600 text-sm leading-relaxed whitespace-pre-line">{{ $product->usage_instructions }}</p>
                </div>
                @endif

                {{-- Safety Precautions --}}
                @if($hasSafetyPrecautions)
                <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-3xl border border-amber-200/60 p-6 sm:p-8">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 rounded-lg bg-amber-200 flex items-center justify-center">
                            <svg class="w-4.5 h-4.5 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                        </div>
                        <h3 class="text-lg font-bold text-amber-900">{{ __('app.safety_precautions') }}</h3>
                    </div>
                    <p class="text-amber-800 text-sm leading-relaxed whitespace-pre-line">{{ $product->safety_precautions }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endif

    <!-- Related Products -->
    @if($relatedProducts->count())
    <div>
        <h2 class="text-2xl font-bold text-neutral-900 mb-8">{{ __('app.related_products') }}</h2>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6">
            @foreach($relatedProducts as $related)
                <x-product-card :product="$related"/>
            @endforeach
        </div>
    </div>
    @endif
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    @if($allImages->count() > 1)
    const thumbSwiper = new Swiper('.product-thumb-swiper', {
        slidesPerView: 4,
        spaceBetween: 8,
        watchSlidesProgress: true,
    });
    @endif

    const mainSwiper = new Swiper('.product-main-swiper', {
        loop: {{ $allImages->count() > 1 ? 'true' : 'false' }},
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
        pagination: { el: '.swiper-pagination', clickable: true },
        @if($allImages->count() > 1)
        thumbs: { swiper: thumbSwiper },
        @endif
    });
});
</script>
@endpush
@endsection
