@props(['category', 'showDescription' => true, 'href' => null])
<a href="{{ $href ?? route('categories.show', $category->slug) }}"
   class="group relative block rounded-xl sm:rounded-2xl overflow-hidden aspect-[4/3] bg-neutral-100 hover:shadow-xl transition-all duration-500">

    <!-- Background image or gradient -->
    @if($category->hasMedia('image'))
        <img src="{{ $category->getFirstMediaUrl('image') }}"
             alt="{{ $category->getTranslation('name', app()->getLocale()) }}"
             class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
    @else
        <div class="absolute inset-0 bg-gradient-to-br from-primary-600 via-primary-700 to-primary-900"></div>
        <div class="absolute inset-0 opacity-20">
            <svg class="w-full h-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <circle cx="80" cy="20" r="30" fill="white" opacity="0.3"/>
                <circle cx="20" cy="80" r="20" fill="white" opacity="0.2"/>
            </svg>
        </div>
    @endif

    <!-- Overlay -->
    <div class="absolute inset-0 bg-neutral-900/40 group-hover:bg-neutral-900/50 transition-colors duration-500"></div>

    <!-- Content -->
    <div class="absolute inset-0 flex flex-col items-center justify-center p-3 sm:p-5 text-center">
        <h3 class="text-white font-bold text-base sm:text-lg lg:text-xl leading-tight group-hover:text-primary-300 transition-colors">
            {{ $category->getTranslation('name', app()->getLocale()) }}
        </h3>
        @if($showDescription && $category->getTranslation('description', app()->getLocale()))
        <p class="mt-1.5 text-white/80 text-xs sm:text-sm line-clamp-2 max-w-[220px]">
            {{ $category->getTranslation('description', app()->getLocale()) }}
        </p>
        @endif
    </div>
</a>
