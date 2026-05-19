@props(['category'])
<a href="{{ route('categories.show', $category->slug) }}"
   class="group relative block rounded-2xl overflow-hidden aspect-[4/3] bg-neutral-100 hover:shadow-xl transition-all duration-500">

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
    <div class="absolute inset-0 bg-gradient-to-t from-neutral-900/80 via-neutral-900/30 to-transparent"></div>

    <!-- Content -->
    <div class="absolute inset-0 flex flex-col justify-end p-5">
        <h3 class="text-white font-bold text-lg leading-tight group-hover:text-primary-300 transition-colors">
            {{ $category->getTranslation('name', app()->getLocale()) }}
        </h3>
        @if($category->getTranslation('description', app()->getLocale()))
        <p class="mt-1 text-white/70 text-sm line-clamp-2">
            {{ $category->getTranslation('description', app()->getLocale()) }}
        </p>
        @endif
        <div class="mt-3 flex items-center gap-1.5 text-primary-300 text-sm font-medium">
            <span>{{ __('messages.view_all') }}</span>
            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1 {{ app()->getLocale() === 'ar' ? 'rotate-180 group-hover:-translate-x-1' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </div>
    </div>
</a>
