@props(['product'])
<a href="{{ route('products.show', $product->slug) }}"
   class="product-card group block bg-white rounded-2xl overflow-hidden border border-neutral-100 hover:border-primary-200 shadow-sm hover:shadow-lg transition-all duration-300">

    <!-- Image -->
    <div class="relative aspect-square overflow-hidden bg-neutral-50">
        @if($product->hasMedia('main_image'))
            <img src="{{ $product->getFirstMediaUrl('main_image') }}"
                 alt="{{ $product->getTranslation('name', app()->getLocale()) }}"
                 loading="lazy"
                 class="product-card-img w-full h-full object-cover transition-transform duration-500">
        @else
            <img src="{{ asset('images/products/main/' .$product->id. '.png')}}"
                 alt="{{ $product->getTranslation('name', app()->getLocale()) }}"
                 loading="lazy"
                 class="product-card-img w-full h-full object-cover transition-transform duration-500">
        @endif

        <!-- @if($product->is_featured)
        <div class="absolute top-3 {{ app()->getLocale() === 'ar' ? 'right-3' : 'left-3' }}">
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-black bg-[#d7b43e] text-white uppercase tracking-wide">
                <svg class="w-2.5 h-2.5 text-white fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                {{ app()->getLocale() === 'ar' ? 'مميز' : 'Featured' }}
            </span>
        </div>
        @endif -->
    </div>

    <!-- Info -->
    <div class="p-3 sm:p-4">
        @if($product->category)
        <span class="text-[9px] sm:text-[12px] font-medium text-primary-600 uppercase tracking-wide block leading-none">
            {{ $product->category->getTranslation('name', app()->getLocale()) }}
        </span>
        @endif

        <h3 class="mt-1 font-bold text-sm sm:text-lg text-neutral-900 group-hover:text-primary-700 transition-colors line-clamp-2">
            {{ $product->getTranslation('name', app()->getLocale()) }}
        </h3>

        @if($product->getTranslation('sub_title', app()->getLocale()))
        <p class="mt-0.5 text-[10px] sm:text-sm font-semibold text-primary-600 line-clamp-1" style="direction: ltr; unicode-bidi: isolate; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
            {{ $product->getTranslation('sub_title', app()->getLocale()) }}
        </p>
        @endif

        @if($product->getTranslation('short_description', app()->getLocale()))
        <p class="hidden sm:block mt-1 text-xs sm:text-sm text-neutral-500 line-clamp-2">
            {{ $product->getTranslation('short_description', app()->getLocale()) }}
        </p>
        @endif

        <div class="mt-3 sm:mt-4 pt-3 border-t border-neutral-100 flex items-center justify-between">
            <span class="text-[10px] sm:text-xs text-primary-600 font-bold inline-flex items-center gap-1 group-hover:gap-2 transition-all">
                {{ __('app.product_details') }}
                <svg class="w-3 h-3 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </span>
        </div>
    </div>
</a>
