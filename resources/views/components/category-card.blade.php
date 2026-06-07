@props(['category', 'showDescription' => false, 'href' => null])
@php
    $cardHref = $href ?? route('categories.show', $category->slug);
@endphp
<a href="{{ $cardHref }}" class="group relative block w-full bg-white rounded-[2rem] p-6 sm:p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-neutral-100 transition-all duration-500 hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)] hover:-translate-y-2 overflow-hidden">
    
    <!-- Decorative background gradient (hidden by default, fades in on hover) -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#137547]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
    
    <div class="relative z-10 flex flex-col items-center">
        <!-- Image Container -->
        <div class="w-full h-36 sm:h-48 mb-4 sm:mb-6 relative flex items-center justify-center transition-transform duration-500 group-hover:scale-110">
            @if($category->hasMedia('image'))
                <img src="{{ $category->getFirstMediaUrl('image') }}" alt="{{ $category->getTranslation('name', app()->getLocale()) }}" class="relative z-10 w-full h-full object-contain transition-transform duration-500">
            @else
                <div class="relative z-10 w-28 h-28 bg-gradient-to-br from-neutral-100 to-neutral-200 flex items-center justify-center rounded-full shadow-inner">
                    <span class="text-neutral-400 text-3xl font-black">{{ mb_substr($category->getTranslation('name', app()->getLocale()), 0, 1) }}</span>
                </div>
            @endif
        </div>

        <!-- Text & Icon -->
        <div class="w-full flex items-center justify-between mt-auto">
            <span class="text-lg sm:text-xl font-black text-neutral-900 group-hover:text-[#137547] transition-colors duration-300" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
                {{ $category->getTranslation('name', app()->getLocale()) }}
            </span>
            
            <!-- Arrow Icon Container -->
            <div class="w-8 h-8 sm:w-10 sm:h-10 shrink-0 rounded-full bg-neutral-50 flex items-center justify-center text-neutral-400 group-hover:bg-[#137547] group-hover:text-white transition-all duration-300 {{ app()->getLocale() === 'ar' ? 'rotate-180 group-hover:-translate-x-1' : 'group-hover:translate-x-1' }}">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </div>
        </div>
    </div>
</a>
