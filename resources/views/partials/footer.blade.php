<footer class="bg-[#0b2942] text-neutral-200 pt-16 pb-8 border-t border-neutral-800">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-12">

            <!-- Column 1: Brand & Socials -->
            <div class="space-y-6">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    @if(!empty($settings->logo))
                        <img src="{{ asset('storage/' . $settings->logo) }}" alt="{{ $settings->company_name }}" class="h-16 w-auto brightness-0 invert">
                    @else
                        <img src="{{ asset('images/main-logo-removebg-preview.png') }}" alt="AlMisk" class="h-16 w-auto brightness-0 invert">
                    @endif
                </a>
                <p class="text-neutral-400 text-sm leading-relaxed max-w-sm">
                    {{ app()->getLocale() === 'ar' 
                        ? 'نقدم منتجات زراعية سعودية عالية الجودة كالمبيدات والأسمدة المبتكرة لدعم قطاع الزراعة وتحقيق التنمية المستدامة.' 
                        : 'We provide premium Saudi-made agricultural products, including advanced pesticides and fertilizers, supporting sustainable agricultural growth.' }}
                </p>

                <!-- Social Icons -->
                <div class="flex items-center gap-3 pt-2">
                    @if(!empty($settings->facebook))
                    <a href="{{ $settings->facebook }}" target="_blank" class="w-10 h-10 rounded-full bg-white/10 hover:bg-primary-600 flex items-center justify-center transition-colors">
                        <svg class="w-5 h-5 fill-current text-white" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    @endif
                    @if(!empty($settings->instagram))
                    <a href="{{ $settings->instagram }}" target="_blank" class="w-10 h-10 rounded-full bg-white/10 hover:bg-primary-600 flex items-center justify-center transition-colors">
                        <svg class="w-5 h-5 fill-current text-white" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                    @endif
                    @if(!empty($settings->twitter))
                    <a href="{{ $settings->twitter }}" target="_blank" class="w-10 h-10 rounded-full bg-white/10 hover:bg-primary-600 flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4 fill-current text-white" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    @endif
                </div>
            </div>

            <!-- Column 2: Useful Links -->
            <div class="md:pl-8 rtl:md:pr-8">
                <h4 class="text-white font-bold text-lg mb-6 border-b border-white/10 pb-3" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
                    {{ app()->getLocale() === 'ar' ? 'روابط مفيدة' : 'Useful Links' }}
                </h4>
                <ul class="space-y-4 text-sm font-semibold text-neutral-400">
                    
                    @foreach(\App\Models\Category::active()->parents()->orderBy('sort_order')->get() as $parentCat)
                    <li>
                        <a href="{{ route('categories.show', $parentCat->slug) }}" class="hover:text-primary-400 transition-colors flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary-500"></span>
                            {{ $parentCat->getTranslation('name', app()->getLocale()) }}
                        </a>
                    </li>
                    @endforeach

                    <li>
                        <a href="{{ route('about') }}" class="hover:text-primary-400 transition-colors flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary-500"></span>
                            {{ app()->getLocale() === 'ar' ? 'من نحن' : 'About Us' }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="hover:text-primary-400 transition-colors flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary-500"></span>
                            {{ app()->getLocale() === 'ar' ? 'اتصل بنا' : 'Contact Us' }}
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Column 3: Contact Us & App Badges -->
            <div class="space-y-6">
                <h4 class="text-white font-bold text-lg mb-6 border-b border-white/10 pb-3" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
                    {{ app()->getLocale() === 'ar' ? 'اتصل بنا' : 'Contact Us' }}
                </h4>
                <ul class="space-y-4 text-sm text-neutral-400">
                    

                    <!-- Phone -->
                    @if(!empty($settings->phone))
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-primary-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <a href="tel:{{ $settings->phone }}" class="hover:text-primary-400 transition-colors font-semibold" dir="ltr">{{ $settings->phone }}</a>
                    </li>
                    @endif

                    <!-- Email -->
                    @if(!empty($settings->email))
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-primary-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <a href="mailto:{{ $settings->email }}" class="hover:text-primary-400 transition-colors font-semibold">{{ $settings->email }}</a>
                    </li>
                    @endif

                    <!-- Address -->
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-primary-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="leading-relaxed">
                            {{ !empty($settings->address) ? $settings->address : (app()->getLocale() === 'ar' ? 'المدينة الصناعية الثانية، الدمام ٣٤٣٢٦، المملكة العربية السعودية' : '2nd Industrial City, Dammam 34326, Saudi Arabia') }}
                        </span>
                    </li>
                </ul>

            </div>

        </div>

        <!-- Divider -->
        <div class="border-t border-white/10 my-8"></div>

        <!-- Footer Bottom: copyright & payments -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-6 text-sm text-neutral-400">
            <!-- Left: Copyright and VAT -->
            <div class="space-y-2 text-center md:text-left rtl:md:text-right">
                <p class="font-semibold text-neutral-300">
                    © {{ date('Y') }} {{ $settings->company_name ?? 'AlMisk' }}. {{ app()->getLocale() === 'ar' ? 'جميع الحقوق محفوظة' : 'All Rights Reserved' }}.
                </p>
                <div class="flex items-center justify-center md:justify-start gap-2 text-xs">
                    <span>{{ app()->getLocale() === 'ar' ? 'الرقم الضريبي: ٣٠٠٠٥٢٨٠١٦١٠٠٠٣' : 'VAT registration number: 300052801610003' }}</span>
                    <!-- VAT Green Badge -->
                    <span class="bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-1.5 py-0.5 rounded text-[10px] font-black">VAT</span>
                </div>
            </div>
        </div>
    </div>
</footer>
