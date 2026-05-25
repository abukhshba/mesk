@extends('layouts.app')

@section('title', $product->getTranslation('name', app()->getLocale()) . ' | ' . ($settings->company_name ?? ''))
@section('description', Str::limit(strip_tags($product->getTranslation('short_description', app()->getLocale())), 160))

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-sm text-neutral-500 mb-8 flex-wrap">
        <a href="{{ route('home') }}" class="hover:text-primary-600 transition-colors">{{ __('messages.home') }}</a>
        <span>/</span>
        <a href="{{ route('products.index') }}" class="hover:text-primary-600 transition-colors">{{ __('messages.products') }}</a>
        @if($product->category)
        <span>/</span>
        <a href="{{ route('categories.show', $product->category->slug) }}" class="hover:text-primary-600 transition-colors">
            {{ $product->category->getTranslation('name', app()->getLocale()) }}
        </a>
        @endif
        <span>/</span>
        <span class="text-neutral-900 font-medium">{{ $product->getTranslation('name', app()->getLocale()) }}</span>
    </nav>

    <!-- Product Top Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">

        <!-- Gallery -->
        <div>
            @php
                $mainImage = $product->getFirstMediaUrl('main_image');
                $gallery = $product->getMedia('gallery');
                $allImages = collect();
                if ($mainImage) $allImages->push($mainImage);
                foreach ($gallery as $media) { $allImages->push($media->getUrl()); }
            @endphp

            @if($allImages->count() > 0)
            <!-- Main Swiper -->
            <div class="swiper product-main-swiper rounded-2xl overflow-hidden bg-neutral-50 aspect-square">
                <div class="swiper-wrapper">
                    @foreach($allImages as $imgUrl)
                    <div class="swiper-slide">
                        <img src="{{ $imgUrl }}" alt="{{ $product->getTranslation('name', app()->getLocale()) }}"
                             class="w-full h-full object-cover">
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
                    <div class="swiper-slide cursor-pointer rounded-xl overflow-hidden aspect-square bg-neutral-100 border-2 border-transparent hover:border-primary-400 transition-colors">
                        <img src="{{ $imgUrl }}" class="w-full h-full object-cover">
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            @else
            <div class="aspect-square rounded-2xl bg-gradient-to-br from-primary-50 to-primary-100 flex items-center justify-center">
                <svg class="w-24 h-24 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                </svg>
            </div>
            @endif
        </div>

        <!-- Product Info -->
        <div class="flex flex-col">
            @if($product->category)
            <span class="inline-flex items-center text-xs font-semibold text-primary-700 bg-primary-50 px-3 py-1 rounded-full w-fit">
                @if($product->category->parent)
                    {{ $product->category->parent->getTranslation('name', app()->getLocale()) }}
                    <span class="mx-1 text-primary-400">·</span>
                @endif
                {{ $product->category->getTranslation('name', app()->getLocale()) }}
            </span>
            @endif

            <h1 class="mt-3 text-3xl sm:text-4xl font-bold text-neutral-900 leading-tight">
                {{ $product->getTranslation('name', app()->getLocale()) }}
            </h1>

            @if($product->getTranslation('short_description', app()->getLocale()))
            <p class="mt-4 text-neutral-600 leading-relaxed text-lg">
                {{ $product->getTranslation('short_description', app()->getLocale()) }}
            </p>
            @endif

            <!-- Quick Specs -->
            @if($product->active_ingredient || $product->package_sizes || $product->application_rate)
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                @if($product->active_ingredient)
                <div class="bg-neutral-50 rounded-xl p-4">
                    <div class="text-xs text-neutral-400 font-medium uppercase tracking-wide">{{ __('messages.active_ingredient') }}</div>
                    <div class="mt-1 font-semibold text-neutral-800 text-sm">{{ $product->active_ingredient }}</div>
                </div>
                @endif
                @if($product->application_rate)
                <div class="bg-neutral-50 rounded-xl p-4">
                    <div class="text-xs text-neutral-400 font-medium uppercase tracking-wide">{{ __('messages.application_rate') }}</div>
                    <div class="mt-1 font-semibold text-neutral-800 text-sm">{{ $product->application_rate }}</div>
                </div>
                @endif
                @if($product->package_sizes)
                <div class="bg-neutral-50 rounded-xl p-4 sm:col-span-2">
                    <div class="text-xs text-neutral-400 font-medium uppercase tracking-wide">{{ __('messages.package_sizes') }}</div>
                    <div class="mt-1 font-semibold text-neutral-800 text-sm">{{ $product->package_sizes }}</div>
                </div>
                @endif
            </div>
            @endif

            <!-- WhatsApp CTA -->
            @if(!empty($settings->whatsapp))
            <div class="mt-8">
                <a href="https://wa.me/{{ $settings->whatsapp }}?text={{ urlencode(app()->getLocale() === 'ar' ? 'السلام عليكم، أود الاستفسار عن منتج: ' . $product->getTranslation('name', 'ar') : 'Hello, I would like to inquire about: ' . $product->getTranslation('name', 'en')) }}"
                   target="_blank"
                   class="flex items-center justify-center gap-3 w-full py-4 bg-green-500 hover:bg-green-600 text-white font-bold rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 text-lg">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    {{ __('messages.whatsapp_inquiry') }}
                </a>
            </div>
            @endif
        </div>
    </div>

    <!-- Product Details Tabs -->
    <div class="bg-white rounded-2xl border border-neutral-100 shadow-sm overflow-hidden mb-16">
        <div class="p-8">
            <h2 class="text-2xl font-bold text-neutral-900 mb-6">{{ __('messages.product_specs') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @if($product->getTranslation('description', app()->getLocale()))
                <div>
                    <h3 class="font-semibold text-neutral-700 mb-3 flex items-center gap-2">
                        <span class="w-5 h-5 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center text-xs">📋</span>
                        {{ __('messages.product_details') }}
                    </h3>
                    <div class="text-neutral-600 text-sm leading-relaxed prose max-w-none">
                        {!! $product->getTranslation('description', app()->getLocale()) !!}
                    </div>
                </div>
                @endif

                <div class="space-y-4">
                    @if($product->usage_instructions)
                    <div>
                        <h3 class="font-semibold text-neutral-700 mb-2">{{ __('messages.usage_instructions') }}</h3>
                        <p class="text-neutral-600 text-sm leading-relaxed">{{ $product->usage_instructions }}</p>
                    </div>
                    @endif

                    @if($product->safety_precautions)
                    <div class="bg-amber-50 border border-amber-200 rounded-xl p-4">
                        <h3 class="font-semibold text-amber-800 mb-2 flex items-center gap-2">
                            ⚠️ {{ __('messages.safety_precautions') }}
                        </h3>
                        <p class="text-amber-700 text-sm leading-relaxed">{{ $product->safety_precautions }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    @if($relatedProducts->count())
    <div>
        <h2 class="text-2xl font-bold text-neutral-900 mb-8">{{ __('messages.related_products') }}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
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
