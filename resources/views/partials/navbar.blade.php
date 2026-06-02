@php
    $navCategories = \App\Models\Category::active()->parents()->orderBy('sort_order')->get();
@endphp

<header class="fixed top-0 left-0 right-0 z-50 bg-white shadow-sm transition-all duration-300" id="main-header">
    <!-- Main Navigation Bar -->
    <div class="bg-white border-b border-neutral-100">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-12">
            <div class="flex items-center justify-between h-20 transition-all duration-300" id="nav-container">
                
                <!-- Brand / Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-2 group shrink-0">
                    @if(!empty($settings->logo))
                        <img src="{{ asset('storage/' . $settings->logo) }}" alt="{{ $settings->company_name }}" class="h-14 sm:h-16 w-auto transition-transform group-hover:scale-105">
                    @else
                        <img src="{{ asset('images/main-logo-removebg-preview.png') }}" alt="AlMisk" class="h-14 sm:h-16 w-auto transition-transform group-hover:scale-105">
                    @endif
                </a>

                <!-- Desktop Menu -->
                <nav class="hidden xl:flex items-center gap-6 xl:gap-8 mx-auto font-medium text-neutral-700 text-sm">
                    <!-- Homepage -->
                    <a href="{{ route('home') }}" class="py-2 hover:text-primary-600 transition-colors {{ request()->routeIs('home') ? 'text-primary-600 font-bold' : '' }}">
                        {{ app()->getLocale() === 'ar' ? 'الرئيسية' : 'Homepage' }}
                    </a>

                    <!-- All Products -->
                    <a href="{{ route('products.index') }}" class="py-2 hover:text-primary-600 transition-colors {{ request()->routeIs('products.index') && !request()->has('category') ? 'text-primary-600 font-bold' : '' }}">
                        {{ app()->getLocale() === 'ar' ? 'كل المنتجات' : 'All Products' }}
                    </a>

                    <!-- Dynamic Database Categories -->
                    @foreach($navCategories as $parentCat)
                        @php
                            $subs = $parentCat->subCategories()->active()->orderBy('sort_order')->get();
                        @endphp
                        @if($subs->count())
                            <!-- Show Dropdown -->
                            <div class="relative group py-2">
                                <a href="{{ route('categories.show', $parentCat->slug) }}" 
                                   class="flex items-center gap-1 hover:text-primary-600 transition-colors {{ request()->fullUrlIs('*' . $parentCat->slug . '*') ? 'text-primary-600 font-bold' : '' }}">
                                    {{ $parentCat->getTranslation('name', app()->getLocale()) }}
                                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                                </a>
                                <div class="absolute top-full {{ app()->getLocale() === 'ar' ? 'right-0' : 'left-0' }} w-56 bg-white border border-neutral-100 rounded-xl shadow-xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 font-bold">
                                    @foreach($subs as $sub)
                                        <a href="{{ route('categories.subcategory', [$parentCat->slug, $sub->slug]) }}" class="block px-4 py-2.5 text-sm hover:bg-neutral-50 hover:text-primary-600 transition-colors">
                                            {{ $sub->getTranslation('name', app()->getLocale()) }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <!-- Just Simple Link -->
                            <a href="{{ route('categories.show', $parentCat->slug) }}" class="py-2 hover:text-primary-600 transition-colors {{ request()->fullUrlIs('*' . $parentCat->slug . '*') ? 'text-primary-600 font-bold' : '' }}">
                                {{ $parentCat->getTranslation('name', app()->getLocale()) }}
                            </a>
                        @endif
                    @endforeach

                    <!-- All Categories -->
                    <a href="{{ route('categories.index') }}" class="py-2 hover:text-primary-600 transition-colors {{ request()->routeIs('categories.index') ? 'text-primary-600 font-bold' : '' }}">
                        {{ app()->getLocale() === 'ar' ? 'كل الأقسام' : 'All Categories' }}
                    </a>
                </nav>

                <!-- Actions (Locale, Search, User, Cart) -->
                <div class="flex items-center gap-2 sm:gap-4 shrink-0">
                    <!-- Locale Switcher -->
                    @if(app()->getLocale() === 'ar')
                        <a href="{{ route('locale.switch', 'en') }}" class="px-2.5 py-1 text-sm font-bold text-neutral-600 hover:text-primary-600 hover:bg-neutral-50 rounded-lg transition-colors">EN</a>
                    @else
                        <a href="{{ route('locale.switch', 'ar') }}" class="px-2.5 py-1 text-sm font-bold text-neutral-600 hover:text-primary-600 hover:bg-neutral-50 rounded-lg transition-colors">AR</a>
                    @endif

                    <!-- Search Icon -->
                    <a href="{{ route('products.index') }}" class="p-2 text-neutral-600 hover:text-primary-600 hover:bg-neutral-50 rounded-full transition-colors" title="{{ app()->getLocale() === 'ar' ? 'بحث' : 'Search' }}">
                        <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </a>

                    <!-- User Profile Icon -->
                    <a href="/admin" class="p-2 text-neutral-600 hover:text-primary-600 hover:bg-neutral-50 rounded-full transition-colors" title="{{ app()->getLocale() === 'ar' ? 'حسابي' : 'My Account' }}">
                        <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </a>

                    <!-- Shopping Cart Icon -->
                    <a href="#" class="p-2 text-neutral-600 hover:text-primary-600 hover:bg-neutral-50 rounded-full transition-colors relative" title="{{ app()->getLocale() === 'ar' ? 'السلة' : 'Cart' }}">
                        <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span class="absolute top-1 right-1 w-4 h-4 bg-primary-600 text-white text-[9px] font-black rounded-full flex items-center justify-center">0</span>
                    </a>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="xl:hidden p-2 rounded-full text-neutral-600 hover:bg-primary-50 hover:text-primary-600 transition-all duration-300">
                        <svg id="icon-menu" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Dropdown -->
        <div id="mobile-menu" class="hidden xl:hidden border-t border-neutral-100 bg-white">
            <div class="px-4 py-3 space-y-1 shadow-inner text-neutral-700 font-bold">
                <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl text-base transition-all hover:bg-neutral-50 hover:text-primary-600">{{ app()->getLocale() === 'ar' ? 'الرئيسية' : 'Homepage' }}</a>
                <a href="{{ route('products.index') }}" class="block px-4 py-3 rounded-xl text-base transition-all hover:bg-neutral-50 hover:text-primary-600">{{ app()->getLocale() === 'ar' ? 'كل المنتجات' : 'All Products' }}</a>
                @foreach($navCategories as $parentCat)
                    <a href="{{ route('categories.show', $parentCat->slug) }}" class="block px-4 py-3 rounded-xl text-base transition-all hover:bg-neutral-50 hover:text-primary-600">{{ $parentCat->getTranslation('name', app()->getLocale()) }}</a>
                @endforeach
                <a href="{{ route('categories.index') }}" class="block px-4 py-3 rounded-xl text-base transition-all hover:bg-neutral-50 hover:text-primary-600">{{ app()->getLocale() === 'ar' ? 'كل الأقسام' : 'All Categories' }}</a>
            </div>
        </div>
    </div>
</header>

<!-- Spacer -->
<div class="h-20"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const header = document.getElementById('main-header');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const iconMenu = document.getElementById('icon-menu');
        const iconClose = document.getElementById('icon-close');

        // Mobile Toggle
        mobileMenuBtn?.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            iconMenu?.classList.toggle('hidden');
            iconClose?.classList.toggle('hidden');
        });

        // Scroll Effect (Shadow toggle only)
        window.addEventListener('scroll', function() {
            if (window.scrollY > 40) {
                header.classList.add('shadow-md');
            } else {
                header.classList.remove('shadow-md');
            }
        });
    });
</script>
