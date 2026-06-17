@extends('layouts.app')

@section('title', __('app.products') . ' | ' . ($settings->company_name ?? ''))

@section('content')
<!-- Page Header -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 sm:pt-10 mb-2 sm:mb-4">
    <!-- Breadcrumb -->
    <nav class="mb-4" aria-label="Breadcrumb">
        <ol class="flex items-center gap-1.5 sm:gap-2 text-sm flex-wrap">
            <li class="flex items-center gap-1.5 sm:gap-2">
                <a href="{{ route('home') }}" class="flex items-center gap-1.5 text-neutral-400 hover:text-primary-600 transition-colors duration-200 group">
                    <svg class="w-4 h-4 shrink-0 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="hidden sm:inline">{{ __('app.home') }}</span>
                </a>
                <svg class="w-3.5 h-3.5 text-neutral-300 shrink-0 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </li>
            <li>
                <span class="text-neutral-700 font-semibold">
                    {{ __('app.products') }}
                </span>
            </li>
        </ol>
    </nav>

    <!-- Center Content (Category Header & Navigation) -->
    <div class="text-center flex flex-col items-center">
        <h1 class="text-3xl sm:text-5xl font-black text-neutral-900 mb-8">
            {{ app()->getLocale() === 'ar' ? 'الأسمدة' : 'Fertilizers' }}
        </h1>
        
        <!-- Category Pills -->
        <div class="flex flex-wrap justify-center gap-2 sm:gap-3">
            <!-- All -->
            <a href="{{ route('products.index', ['search' => request('search')]) }}" 
               class="px-4 py-2 sm:px-6 sm:py-2.5 rounded-full font-bold text-xs sm:text-sm transition-all duration-300 border-2 {{ !$categoryId ? 'bg-primary-600 text-white border-primary-600 shadow-md' : 'bg-white text-neutral-600 border-neutral-200 hover:border-primary-300 hover:text-primary-600' }}">
                {{ app()->getLocale() === 'ar' ? 'الكل' : 'All' }}
            </a>
            
            <!-- Sub categories -->
            @foreach($categories as $cat)
            <a href="{{ route('products.index', ['category' => $cat->id, 'search' => request('search')]) }}" 
               class="px-4 py-2 sm:px-6 sm:py-2.5 rounded-full font-bold text-xs sm:text-sm transition-all duration-300 border-2 {{ $categoryId == $cat->id ? 'bg-primary-600 text-white border-primary-600 shadow-md' : 'bg-white text-neutral-600 border-neutral-200 hover:border-primary-300 hover:text-primary-600' }}">
                {{ $cat->getTranslation('name', app()->getLocale()) }}
            </a>
            @endforeach
        </div>
    </div>
</div>

<section class="py-4 sm:py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Search Bar -->
        <form method="GET" action="{{ route('products.index') }}" class="flex flex-col sm:flex-row gap-3 mb-4 sm:mb-6 bg-white p-3 rounded-2xl border border-neutral-100 shadow-sm max-w-4xl mx-auto relative z-30">
            @if($categoryId)
                <input type="hidden" name="category" value="{{ $categoryId }}">
            @endif
            <div class="flex-1 relative" id="search-container">
                <svg class="absolute {{ app()->getLocale() === 'ar' ? 'right-3.5' : 'left-3.5' }} top-1/2 -translate-y-1/2 w-5 h-5 text-neutral-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" name="search" id="search-input" value="{{ $search }}" placeholder="{{ __('app.search_placeholder') }}" autocomplete="off"
                       class="w-full {{ app()->getLocale() === 'ar' ? 'pr-11 pl-4' : 'pl-11 pr-4' }} py-3 text-sm sm:text-base border-0 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-300 bg-neutral-50 transition-shadow">
                
                <!-- Autocomplete Dropdown -->
                <div id="search-suggestions" class="absolute top-full {{ app()->getLocale() === 'ar' ? 'right-0' : 'left-0' }} w-full mt-2 bg-white rounded-xl shadow-xl border border-neutral-100 overflow-hidden hidden z-50">
                    <ul id="search-results-list" class="divide-y divide-neutral-50"></ul>
                </div>
            </div>
        </form>

        <!-- Results count -->
        @if($products->total())
        <p class="text-sm text-neutral-500 mb-6">
            {{ $products->total() }} {{ app()->getLocale() === 'ar' ? 'منتج' : 'products' }}
        </p>
        @endif

        <!-- Products Grid -->
        @if($products->count())
            <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-6">
                @foreach($products as $product)
                    <x-product-card :product="$product"/>
                @endforeach
            </div>
            <div class="mt-12">{{ $products->links('vendor.pagination.tailwind') }}</div>
        @else
            <div class="text-center py-20">
                <svg class="w-20 h-20 text-neutral-200 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-neutral-500 text-lg">{{ __('app.no_products') }}</p>
                <a href="{{ route('products.index') }}" class="mt-4 inline-block text-primary-600 hover:underline text-sm">
                    {{ app()->getLocale() === 'ar' ? 'عرض جميع المنتجات' : 'View all products' }}
                </a>
            </div>
        @endif
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('search-input');
        const suggestionsContainer = document.getElementById('search-suggestions');
        const resultsList = document.getElementById('search-results-list');
        
        let debounceTimer;

        searchInput.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            const query = this.value.trim();

            if (query.length === 0) {
                suggestionsContainer.classList.add('hidden');
                return;
            }

            debounceTimer = setTimeout(() => {
                fetch(`/api/products/search?q=${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(data => {
                        resultsList.innerHTML = '';
                        
                        if (data.length > 0) {
                            data.forEach(product => {
                                const li = document.createElement('li');
                                li.innerHTML = `
                                    <a href="${product.url}" class="flex items-center gap-3 p-3 hover:bg-neutral-50 transition-colors">
                                        <img src="${product.image}" alt="${product.name}" class="w-10 h-10 object-contain bg-white rounded border border-neutral-100">
                                        <div class="flex-1 min-w-0">
                                            <div class="text-sm font-bold text-neutral-800 truncate">${product.name}</div>
                                            ${product.subtitle ? `<div class="text-[10px] sm:text-xs font-semibold text-primary-600 truncate mt-0.5" style="direction: ltr; unicode-bidi: isolate; text-align: ${document.documentElement.lang === 'ar' ? 'right' : 'left'};">${product.subtitle}</div>` : ''}
                                        </div>
                                    </a>
                                `;
                                resultsList.appendChild(li);
                            });
                            suggestionsContainer.classList.remove('hidden');
                        } else {
                            const li = document.createElement('li');
                            const noResultsText = document.documentElement.lang === 'ar' ? 'لا توجد نتائج' : 'No results found';
                            li.innerHTML = `<div class="p-4 text-center text-sm text-neutral-500">${noResultsText}</div>`;
                            resultsList.appendChild(li);
                            suggestionsContainer.classList.remove('hidden');
                        }
                    })
                    .catch(err => console.error(err));
            }, 300); // 300ms debounce
        });

        // Hide dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !suggestionsContainer.contains(e.target)) {
                suggestionsContainer.classList.add('hidden');
            }
        });
        
        // Show dropdown again if input is focused and has text
        searchInput.addEventListener('focus', function() {
            if (this.value.trim().length > 0 && resultsList.children.length > 0) {
                suggestionsContainer.classList.remove('hidden');
            }
        });
    });
</script>
@endpush
@endsection
