<nav id="pill-nav" class="floating-pill-nav {{ request()->routeIs('home') ? 'homepage-nav' : '' }}">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <!-- Elegant Minimalist Brand Mark -->
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 group">
                @if(!empty($settings->logo))
                    <img src="{{ asset('storage/' . $settings->logo) }}" alt="{{ $settings->company_name }}" class="h-8.5 w-auto">
                @else
                    <div class="flex items-center gap-2">
                        <div class="w-7.5 h-7.5 rounded-full bg-neutral-900 flex items-center justify-center shadow-sm group-hover:scale-105 transition-transform">
                            <span class="text-white text-xs">🌿</span>
                        </div>
                        <span class="font-extrabold text-neutral-900 text-sm sm:text-base tracking-wide flex items-center gap-1.5 brand-text transition-colors duration-300" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
                            {{ $settings->company_name ?? '/ALMISK' }}
                        </span>
                    </div>
                @endif
            </a>

            <!-- Editorial Minimalist Menu -->
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}" class="nav-link text-[11px] uppercase tracking-widest font-black transition-all duration-300 {{ request()->routeIs('home') ? 'text-primary-500 active-link' : 'text-neutral-600 hover:text-neutral-950' }}">
                    {{ __('messages.home') }}
                </a>
                <a href="{{ route('categories.index') }}" class="nav-link text-[11px] uppercase tracking-widest font-black transition-all duration-300 {{ request()->routeIs('categories.*') ? 'text-primary-500 active-link' : 'text-neutral-600 hover:text-neutral-950' }}">
                    {{ __('messages.categories') }}
                </a>
                <a href="{{ route('products.index') }}" class="nav-link text-[11px] uppercase tracking-widest font-black transition-all duration-300 {{ request()->routeIs('products.*') ? 'text-primary-500 active-link' : 'text-neutral-600 hover:text-neutral-950' }}">
                    {{ __('messages.products') }}
                </a>
                <a href="{{ route('about') }}" class="nav-link text-[11px] uppercase tracking-widest font-black transition-all duration-300 {{ request()->routeIs('about') ? 'text-primary-500 active-link' : 'text-neutral-600 hover:text-neutral-950' }}">
                    {{ __('messages.about') }}
                </a>
                <a href="{{ route('contact') }}" class="nav-link text-[11px] uppercase tracking-widest font-black transition-all duration-300 {{ request()->routeIs('contact') ? 'text-primary-500 active-link' : 'text-neutral-600 hover:text-neutral-950' }}">
                    {{ __('messages.contact') }}
                </a>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-4">
                <!-- Minimalist Language Swapper -->
                <div class="lang-capsule flex items-center rounded-full bg-neutral-100 border border-neutral-200/50 p-0.5 text-[10px] font-black transition-colors duration-300">
                    <a href="{{ route('locale.switch', 'ar') }}"
                       class="lang-btn px-3 py-1 rounded-full transition-all {{ app()->getLocale() === 'ar' ? 'bg-white text-neutral-900 shadow-sm border border-neutral-200/30 active' : 'text-neutral-500 hover:text-neutral-900' }}">
                        ع
                    </a>
                    <a href="{{ route('locale.switch', 'en') }}"
                       class="lang-btn px-3 py-1 rounded-full transition-all {{ app()->getLocale() === 'en' ? 'bg-white text-neutral-900 shadow-sm border border-neutral-200/30 active' : 'text-neutral-500 hover:text-neutral-900' }}">
                        EN
                    </a>
                </div>

                @if(!empty($settings->whatsapp))
                <a href="https://wa.me/{{ $settings->whatsapp }}" target="_blank"
                   class="hidden sm:flex items-center gap-1.5 px-4.5 py-2.5 bg-neutral-900 hover:bg-neutral-950 text-white text-[10px] uppercase tracking-wider font-extrabold rounded-full shadow-sm hover:shadow transition-all">
                    <svg class="w-3.5 h-3.5 fill-current text-emerald-400" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    {{ app()->getLocale() === 'ar' ? 'واتساب' : 'WhatsApp' }}
                </a>
                @endif

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden p-2 rounded-full text-neutral-600 hover:bg-neutral-100 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Dropdown -->
    <div id="mobile-menu" class="hidden md:hidden border border-neutral-100 rounded-3xl bg-white px-6 py-4 mt-2 space-y-1 shadow-xl">
        <a href="{{ route('home') }}" class="block px-4 py-2.5 rounded-xl text-sm font-bold text-neutral-700 hover:bg-neutral-50 hover:text-neutral-900 transition-all">{{ __('messages.home') }}</a>
        <a href="{{ route('categories.index') }}" class="block px-4 py-2.5 rounded-xl text-sm font-bold text-neutral-700 hover:bg-neutral-50 hover:text-neutral-900 transition-all">{{ __('messages.categories') }}</a>
        <a href="{{ route('products.index') }}" class="block px-4 py-2.5 rounded-xl text-sm font-bold text-neutral-700 hover:bg-neutral-50 hover:text-neutral-900 transition-all">{{ __('messages.products') }}</a>
        <a href="{{ route('about') }}" class="block px-4 py-2.5 rounded-xl text-sm font-bold text-neutral-700 hover:bg-neutral-50 hover:text-neutral-900 transition-all">{{ __('messages.about') }}</a>
        <a href="{{ route('contact') }}" class="block px-4 py-2.5 rounded-xl text-sm font-bold text-neutral-700 hover:bg-neutral-50 hover:text-neutral-900 transition-all">{{ __('messages.contact') }}</a>
    </div>
</nav>

<!-- Perfect Spacer - Only on Secondary Pages to Prevent Clipping under Navbar -->
@if(!request()->routeIs('home'))
<div class="h-28"></div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pillNav = document.getElementById('pill-nav');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        
        // Mobile Toggle
        mobileMenuBtn?.addEventListener('click', function() {
            const isHidden = mobileMenu.classList.toggle('hidden');
            if (!isHidden) {
                pillNav.classList.add('mobile-open');
            } else {
                pillNav.classList.remove('mobile-open');
            }
        });

        // Scroll Class
        window.addEventListener('scroll', function() {
            if (window.scrollY > 40) {
                pillNav.classList.add('scrolled');
            } else {
                pillNav.classList.remove('scrolled');
            }
        });
    });
</script>
