@php
    $navCategories = \App\Models\Category::active()->parents()->orderBy('sort_order')->get();
@endphp

<style>
    @media (min-width: 1024px) {
        #main-header {
            position: relative !important;
            box-shadow: none !important;
        }
    }
</style>
<header class="sticky top-0 z-50 w-full bg-white shadow-sm transition-all duration-300" id="main-header">
    <!-- Main Navigation Bar -->
    <div class="bg-white border-b border-neutral-100">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-12">
            <div class="flex items-center justify-between h-32 sm:h-36 xl:h-36 transition-all duration-300 w-full relative" id="nav-container">
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="xl:hidden p-2 rounded-full text-neutral-600 hover:bg-primary-50 hover:text-primary-600 transition-all duration-300 z-10 order-1 xl:order-none">
                    <svg id="icon-menu" class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="icon-close" class="w-7 h-7 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Brand / Logo (Absolute Center on Mobile, Static Start on Desktop) -->
                <a href="{{ route('home') }}" class="absolute left-1/2 -translate-x-1/2 xl:static xl:translate-x-0 xl:left-auto flex items-center gap-2 group z-20 xl:order-1">
                    @if(!empty($settings->logo))
                        <img src="{{ asset('storage/' . $settings->logo) }}" alt="{{ $settings->company_name }}" class="h-24 sm:h-28 lg:h-32 xl:h-28 w-auto transition-transform group-hover:scale-105 drop-shadow-sm">
                    @else
                        <img src="{{ asset('images/main-logo-removebg-preview.png') }}" alt="AlMisk" class="h-24 sm:h-28 lg:h-32 xl:h-28 w-auto transition-transform group-hover:scale-105 drop-shadow-sm">
                    @endif
                </a>

                <!-- Desktop Menu -->
                <nav class="hidden xl:flex items-center gap-6 xl:gap-8 mx-auto font-medium text-neutral-700 text-sm z-10 xl:order-2">
                    <!-- Homepage -->
                    <a href="{{ route('home') }}" class="py-2 hover:text-primary-600 transition-colors {{ request()->routeIs('home') ? 'text-primary-600 font-bold' : '' }}">
                        {{ app()->getLocale() === 'ar' ? 'الرئيسية' : 'Home' }}
                    </a>

                    <!-- All Products -->
                    <a href="{{ route('products.index') }}" class="py-2 hover:text-primary-600 transition-colors {{ request()->routeIs('products.index') && !request()->has('category') ? 'text-primary-600 font-bold' : '' }}">
                        {{ app()->getLocale() === 'ar' ? 'المنتجات' : 'Products' }}
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

                    <!-- About Us -->
                    <a href="{{ route('about') }}" class="py-2 hover:text-primary-600 transition-colors {{ request()->routeIs('about') ? 'text-primary-600 font-bold' : '' }}">
                        {{ app()->getLocale() === 'ar' ? 'من نحن' : 'About Us' }}
                    </a>

                    <!-- Contact Us -->
                    <a href="{{ route('contact') }}" class="py-2 hover:text-primary-600 transition-colors {{ request()->routeIs('contact') ? 'text-primary-600 font-bold' : '' }}">
                        {{ app()->getLocale() === 'ar' ? 'اتصل بنا' : 'Contact Us' }}
                    </a>
                </nav>

                <!-- End Group: Actions (Locale, Search) -->
                <div class="flex items-center gap-2 sm:gap-4 shrink-0 z-10 order-2 xl:order-3">
                    <!-- Locale Switcher -->
                    @if(app()->getLocale() === 'ar')
                        <a href="{{ route('locale.switch', 'en') }}" class="px-2.5 py-1 text-sm font-bold text-neutral-600 hover:text-primary-600 hover:bg-neutral-50 rounded-lg transition-colors">EN</a>
                    @else
                        <a href="{{ route('locale.switch', 'ar') }}" class="px-2.5 py-1 text-sm font-bold text-neutral-600 hover:text-primary-600 hover:bg-neutral-50 rounded-lg transition-colors">AR</a>
                    @endif

                    <!-- Search Icon -->
                    <a href="{{ route('products.index') }}" class="p-2 text-neutral-600 hover:text-primary-600 hover:bg-neutral-50 rounded-full transition-colors" title="{{ app()->getLocale() === 'ar' ? 'بحث' : 'Search' }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Dropdown (Full Screen Drawer) -->
        <div id="mobile-menu" class="hidden xl:hidden fixed top-28 sm:top-32 left-0 right-0 bottom-0 bg-white z-50 overflow-y-auto flex flex-col justify-between">
            <!-- Navigation Links -->
            <div class="px-6 py-6 space-y-2 text-neutral-800 font-bold text-lg">
                <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl transition-all hover:bg-neutral-50 hover:text-primary-600">{{ app()->getLocale() === 'ar' ? 'الرئيسية' : 'Home' }}</a>
                <a href="{{ route('products.index') }}" class="block px-4 py-3 rounded-xl transition-all hover:bg-neutral-50 hover:text-primary-600">{{ app()->getLocale() === 'ar' ? 'المنتجات' : 'Products' }}</a>
                @foreach($navCategories as $parentCat)
                    <a href="{{ route('categories.show', $parentCat->slug) }}" class="block px-4 py-3 rounded-xl transition-all hover:bg-neutral-50 hover:text-primary-600">{{ $parentCat->getTranslation('name', app()->getLocale()) }}</a>
                @endforeach
                <a href="{{ route('about') }}" class="block px-4 py-3 rounded-xl transition-all hover:bg-neutral-50 hover:text-primary-600">{{ app()->getLocale() === 'ar' ? 'من نحن' : 'About Us' }}</a>
                <a href="{{ route('contact') }}" class="block px-4 py-3 rounded-xl transition-all hover:bg-neutral-50 hover:text-primary-600">{{ app()->getLocale() === 'ar' ? 'اتصل بنا' : 'Contact Us' }}</a>
            </div>

            <!-- Contact & Social Info at the bottom -->
            <div class="border-t border-neutral-100 bg-neutral-50 p-6 space-y-6">
                <!-- Action Buttons: WhatsApp & Call Us -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- WhatsApp -->
                    @if(!empty($settings->whatsapp))
                    <a href="{{ str_starts_with($settings->whatsapp, 'http') ? $settings->whatsapp : 'https://wa.me/' . preg_replace('/\D/', '', $settings->whatsapp) }}" target="_blank" class="flex items-center justify-center gap-2 py-3.5 px-4 rounded-xl bg-[#25D366] text-white font-bold shadow-sm hover:bg-[#20ba59] transition-all">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.746.953 3.71 1.456 5.705 1.457h.004c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
                        </svg>
                        <span>{{ app()->getLocale() === 'ar' ? 'واتساب' : 'WhatsApp' }}</span>
                    </a>
                    @endif

                    <!-- Call Us -->
                    @if(!empty($settings->phone))
                    <a href="tel:{{ $settings->phone }}" style="background-color: #5b656f;" class="flex items-center justify-center gap-2 py-3.5 px-4 rounded-xl text-white font-bold shadow-sm hover:opacity-90 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span>{{ app()->getLocale() === 'ar' ? 'اتصل بنا' : 'Call Us' }}</span>
                    </a>
                    @endif
                </div>

                <!-- Address -->
                @php
                    $address = !empty($settings->address) 
                        ? $settings->address 
                        : (app()->getLocale() === 'ar' ? 'المدينة الصناعية الثانية، الدمام ٣٤٣٢٦، المملكة العربية السعودية' : '2nd Industrial City, Dammam 34326, Saudi Arabia');
                    $mapUrl = !empty($settings->google_maps_link)
                        ? $settings->google_maps_link
                        : "https://www.google.com/maps/search/?api=1&query=" . urlencode($address);
                @endphp
                <a href="{{ $mapUrl }}" target="_blank" class="flex items-start gap-3 p-4 rounded-xl bg-white border border-neutral-100 hover:border-primary-300 transition-all group">
                    <svg class="w-5 h-5 text-primary-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <div class="text-sm">
                        <div class="font-bold text-neutral-800 group-hover:text-primary-600 transition-colors">{{ app()->getLocale() === 'ar' ? 'موقعنا' : 'Our Location' }}</div>
                        <div class="text-neutral-500 mt-1 leading-relaxed">{{ $address }}</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</header>



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
            document.body.classList.toggle('overflow-hidden');
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
