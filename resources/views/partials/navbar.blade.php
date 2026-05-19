<nav class="fixed top-0 inset-x-0 z-40 bg-white/95 backdrop-blur-sm border-b border-neutral-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                @if(!empty($settings->logo))
                    <img src="{{ asset('storage/' . $settings->logo) }}" alt="{{ $settings->company_name }}" class="h-10 w-auto">
                @else
                    <div class="flex items-center gap-2">
                        <div class="w-9 h-9 rounded-lg bg-primary-600 flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        </div>
                        <span class="font-bold text-primary-800 text-lg" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
                            {{ $settings->company_name ?? 'مسك' }}
                        </span>
                    </div>
                @endif
            </a>

            <!-- Desktop Nav Links -->
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}" class="text-sm font-medium text-neutral-600 hover:text-primary-600 transition-colors {{ request()->routeIs('home') ? 'text-primary-600 font-semibold' : '' }}">
                    {{ __('messages.home') }}
                </a>
                <a href="{{ route('categories.index') }}" class="text-sm font-medium text-neutral-600 hover:text-primary-600 transition-colors {{ request()->routeIs('categories.*') ? 'text-primary-600 font-semibold' : '' }}">
                    {{ __('messages.categories') }}
                </a>
                <a href="{{ route('products.index') }}" class="text-sm font-medium text-neutral-600 hover:text-primary-600 transition-colors {{ request()->routeIs('products.*') ? 'text-primary-600 font-semibold' : '' }}">
                    {{ __('messages.products') }}
                </a>
                <a href="{{ route('about') }}" class="text-sm font-medium text-neutral-600 hover:text-primary-600 transition-colors {{ request()->routeIs('about') ? 'text-primary-600 font-semibold' : '' }}">
                    {{ __('messages.about') }}
                </a>
                <a href="{{ route('contact') }}" class="text-sm font-medium text-neutral-600 hover:text-primary-600 transition-colors {{ request()->routeIs('contact') ? 'text-primary-600 font-semibold' : '' }}">
                    {{ __('messages.contact') }}
                </a>
            </div>

            <!-- Right side actions -->
            <div class="flex items-center gap-3">
                <!-- Language switcher -->
                <div class="flex items-center rounded-lg border border-neutral-200 overflow-hidden text-xs font-medium">
                    <a href="{{ route('locale.switch', 'ar') }}"
                       class="px-3 py-1.5 {{ app()->getLocale() === 'ar' ? 'bg-primary-600 text-white' : 'text-neutral-600 hover:bg-neutral-50' }} transition-colors">
                        ع
                    </a>
                    <a href="{{ route('locale.switch', 'en') }}"
                       class="px-3 py-1.5 {{ app()->getLocale() === 'en' ? 'bg-primary-600 text-white' : 'text-neutral-600 hover:bg-neutral-50' }} transition-colors">
                        EN
                    </a>
                </div>

                @if(!empty($settings->whatsapp))
                <a href="https://wa.me/{{ $settings->whatsapp }}" target="_blank"
                   class="hidden sm:flex items-center gap-2 px-4 py-2 bg-green-500 hover:bg-green-600 text-white text-sm font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    واتساب
                </a>
                @endif

                <!-- Mobile menu button -->
                <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg text-neutral-600 hover:bg-neutral-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden border-t border-neutral-100 bg-white">
        <div class="px-4 py-3 space-y-1">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-sm font-medium text-neutral-700 hover:bg-primary-50 hover:text-primary-700">{{ __('messages.home') }}</a>
            <a href="{{ route('categories.index') }}" class="block px-3 py-2 rounded-lg text-sm font-medium text-neutral-700 hover:bg-primary-50 hover:text-primary-700">{{ __('messages.categories') }}</a>
            <a href="{{ route('products.index') }}" class="block px-3 py-2 rounded-lg text-sm font-medium text-neutral-700 hover:bg-primary-50 hover:text-primary-700">{{ __('messages.products') }}</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-lg text-sm font-medium text-neutral-700 hover:bg-primary-50 hover:text-primary-700">{{ __('messages.about') }}</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-lg text-sm font-medium text-neutral-700 hover:bg-primary-50 hover:text-primary-700">{{ __('messages.contact') }}</a>
        </div>
    </div>
</nav>

<!-- Spacer for fixed nav -->
<div class="h-16"></div>

<script>
    document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
