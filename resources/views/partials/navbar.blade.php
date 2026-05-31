<header class="fixed top-0 left-0 right-0 z-50 bg-white shadow-sm transition-all duration-300" id="main-header">
    <!-- Top Bar -->
    <div class="bg-primary-950 text-white/80 py-1.5 text-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <div class="flex items-center gap-4">
                @if(!empty($settings->email))
                    <a href="mailto:{{ $settings->email }}" class="flex items-center gap-1.5 hover:text-white transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span class="hidden sm:inline">{{ $settings->email }}</span>
                    </a>
                @endif
                @if(!empty($settings->phone))
                    <a href="tel:{{ $settings->phone }}" class="flex items-center gap-1.5 hover:text-white transition-colors" dir="ltr">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span class="hidden sm:inline">{{ $settings->phone }}</span>
                    </a>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2 font-medium">
                    <a href="{{ route('locale.switch', 'ar') }}" class="hover:text-white transition-colors {{ app()->getLocale() === 'ar' ? 'text-white font-bold' : '' }}">عربي</a>
                    <span class="text-white/20">|</span>
                    <a href="{{ route('locale.switch', 'en') }}" class="hover:text-white transition-colors {{ app()->getLocale() === 'en' ? 'text-white font-bold' : '' }}">EN</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-6 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-20 transition-all duration-300" id="nav-container">
                <!-- Brand -->
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 group">
                    @if(!empty($settings->logo))
                        <img src="{{ asset('storage/' . $settings->logo) }}" alt="{{ $settings->company_name }}" class="h-14 sm:h-18 w-auto transition-transform group-hover:scale-105">
                    @else
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-primary-600 flex items-center justify-center shadow-sm group-hover:scale-105 transition-transform">
                                <span class="text-white text-sm sm:text-base">🌿</span>
                            </div>
                            <span class="font-black text-primary-950 text-lg sm:text-xl tracking-tight flex items-center gap-1.5 transition-colors duration-300" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
                                {{ $settings->company_name ?? 'AlMisk' }}
                            </span>
                        </div>
                    @endif
                </a>

                <!-- Desktop Menu -->
                <nav class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-sm font-bold uppercase tracking-wider transition-colors duration-300 {{ request()->routeIs('home') ? 'text-primary-600' : 'text-neutral-600 hover:text-primary-600' }}">{{ __('app.home') }}</a>
                    <a href="{{ route('categories.index') }}" class="text-sm font-bold uppercase tracking-wider transition-colors duration-300 {{ request()->routeIs('categories.*') ? 'text-primary-600' : 'text-neutral-600 hover:text-primary-600' }}">{{ __('app.categories') }}</a>
                    <a href="{{ route('products.index') }}" class="text-sm font-bold uppercase tracking-wider transition-colors duration-300 {{ request()->routeIs('products.*') ? 'text-primary-600' : 'text-neutral-600 hover:text-primary-600' }}">{{ __('app.products') }}</a>
                    <a href="{{ route('about') }}" class="text-sm font-bold uppercase tracking-wider transition-colors duration-300 {{ request()->routeIs('about') ? 'text-primary-600' : 'text-neutral-600 hover:text-primary-600' }}">{{ __('app.about') }}</a>
                    <a href="{{ route('contact') }}" class="text-sm font-bold uppercase tracking-wider transition-colors duration-300 {{ request()->routeIs('contact') ? 'text-primary-600' : 'text-neutral-600 hover:text-primary-600' }}">{{ __('app.contact') }}</a>
                </nav>

                <!-- Actions -->
                <div class="flex items-center gap-4">
                    @if(!empty($settings->whatsapp))
                    <!-- Desktop/Tablet WhatsApp Button -->
                    <a href="https://wa.me/{{ $settings->whatsapp }}" target="_blank"
                       class="hidden sm:flex items-center gap-2 px-5 py-2.5 bg-primary-600 hover:bg-primary-700 text-white text-xs sm:text-sm font-bold uppercase tracking-wider rounded-full shadow-sm hover:shadow-md transition-all">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                        {{ app()->getLocale() === 'ar' ? 'واتساب' : 'WhatsApp' }}
                    </a>

                    <!-- Mobile WhatsApp Button -->
                    <a href="https://wa.me/{{ $settings->whatsapp }}" target="_blank"
                       class="sm:hidden p-2 rounded-lg bg-[#25D366] hover:bg-green-600 text-white shadow-sm transition-all duration-300">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    </a>
                    @endif

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="md:hidden p-2 rounded-full text-neutral-600 hover:bg-primary-50 hover:text-primary-600 transition-all duration-300">
                        <svg id="icon-menu" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Dropdown -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-neutral-100 bg-white">
            <div class="px-4 py-3 space-y-1 shadow-inner">
                <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl text-base font-bold transition-all {{ request()->routeIs('home') ? 'bg-primary-50 text-primary-600' : 'text-neutral-700 hover:bg-neutral-50 hover:text-primary-600' }}">{{ __('app.home') }}</a>
                <a href="{{ route('categories.index') }}" class="block px-4 py-3 rounded-xl text-base font-bold transition-all {{ request()->routeIs('categories.*') ? 'bg-primary-50 text-primary-600' : 'text-neutral-700 hover:bg-neutral-50 hover:text-primary-600' }}">{{ __('app.categories') }}</a>
                <a href="{{ route('products.index') }}" class="block px-4 py-3 rounded-xl text-base font-bold transition-all {{ request()->routeIs('products.*') ? 'bg-primary-50 text-primary-600' : 'text-neutral-700 hover:bg-neutral-50 hover:text-primary-600' }}">{{ __('app.products') }}</a>
                <a href="{{ route('about') }}" class="block px-4 py-3 rounded-xl text-base font-bold transition-all {{ request()->routeIs('about') ? 'bg-primary-50 text-primary-600' : 'text-neutral-700 hover:bg-neutral-50 hover:text-primary-600' }}">{{ __('app.about') }}</a>
                <a href="{{ route('contact') }}" class="block px-4 py-3 rounded-xl text-base font-bold transition-all {{ request()->routeIs('contact') ? 'bg-primary-50 text-primary-600' : 'text-neutral-700 hover:bg-neutral-50 hover:text-primary-600' }}">{{ __('app.contact') }}</a>
            </div>
        </div>
    </div>
</header>

<!-- Spacer -->
<div class="h-[94px] sm:h-[102px]"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const header = document.getElementById('main-header');
        const navContainer = document.getElementById('nav-container');
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
