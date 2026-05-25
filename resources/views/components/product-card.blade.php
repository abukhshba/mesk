@props(['product'])
<a href="{{ route('products.show', $product->slug) }}"
   class="product-card group block bg-white rounded-2xl overflow-hidden border border-neutral-100 hover:border-primary-200 shadow-sm hover:shadow-lg transition-all duration-300">

    <!-- Image -->
    <div class="relative aspect-square overflow-hidden bg-neutral-50">
        @if($product->hasMedia('main_image'))
            <img src="{{ $product->getFirstMediaUrl('main_image') }}"
                 alt="{{ $product->getTranslation('name', app()->getLocale()) }}"
                 class="product-card-img w-full h-full object-cover transition-transform duration-500">
        @else
            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-50 to-primary-100">
                <svg class="w-16 h-16 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                </svg>
            </div>
        @endif

        @if($product->is_featured)
        <div class="absolute top-3 {{ app()->getLocale() === 'ar' ? 'right-3' : 'left-3' }}">
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-black bg-neutral-900 text-white uppercase tracking-wide">
                <svg class="w-2.5 h-2.5 text-accent-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                {{ app()->getLocale() === 'ar' ? 'مميز' : 'Featured' }}
            </span>
        </div>
        @endif
    </div>

    <!-- Info -->
    <div class="p-4">
        @if($product->category)
        <span class="text-xs font-medium text-primary-600 uppercase tracking-wide">
            {{ $product->category->getTranslation('name', app()->getLocale()) }}
        </span>
        @endif

        <h3 class="mt-1 font-semibold text-neutral-900 group-hover:text-primary-700 transition-colors line-clamp-2">
            {{ $product->getTranslation('name', app()->getLocale()) }}
        </h3>

        @if($product->getTranslation('short_description', app()->getLocale()))
        <p class="mt-1 text-sm text-neutral-500 line-clamp-2">
            {{ $product->getTranslation('short_description', app()->getLocale()) }}
        </p>
        @endif

        @if($product->active_ingredient)
        <div class="mt-3 flex items-center gap-1.5">
            <svg class="w-3.5 h-3.5 text-primary-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
            </svg>
            <span class="text-xs text-neutral-500">{{ $product->active_ingredient }}</span>
        </div>
        @endif

        <div class="mt-4 pt-3 border-t border-neutral-100 flex items-center justify-between">
            <span class="text-xs text-primary-600 font-bold inline-flex items-center gap-1 group-hover:gap-2 transition-all">
                {{ __('messages.product_details') }}
                <svg class="w-3 h-3 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </span>
        </div>
    </div>
</a>
