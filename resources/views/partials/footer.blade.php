<footer class="bg-primary-950 text-primary-100 pt-16 pb-8 mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">

            <!-- Brand -->
            <div class="lg:col-span-2">
                <a href="{{ route('home') }}" class="flex items-center gap-3 mb-4 group">
                    @if(!empty($settings->logo))
                        <img src="{{ asset('storage/' . $settings->logo) }}" alt="{{ $settings->company_name }}" class="h-20 w-auto brightness-0 invert">
                    @else
                        <div class="w-12 h-12 rounded-xl bg-primary-600 flex items-center justify-center">
                            <span class="text-white text-xl">🌿</span>
                        </div>
                    @endif
                    <span class="text-lg mt-1 sm:text-xl font-bold text-white tracking-tight max-w-[200px] sm:max-w-xs leading-tight" style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo' : 'Inter' }}, sans-serif;">
                        {{ $settings->company_name ?? 'AlMisk' }}
                    </span>
                </a>
                <p class="text-neutral-400 mx-2 text-sm leading-relaxed max-w-xs">{{ __('app.footer_about') }}</p>

                <div class="flex items-center gap-3 mt-6">
                    @if(!empty($settings->facebook))
                    <a href="{{ $settings->facebook }}" target="_blank" class="w-9 h-9 rounded-lg bg-primary-900 hover:bg-primary-600 flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    @endif
                    @if(!empty($settings->instagram))
                    <a href="{{ $settings->instagram }}" target="_blank" class="w-9 h-9 rounded-lg bg-primary-900 hover:bg-primary-600 flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                    @endif
                    @if(!empty($settings->twitter))
                    <a href="{{ $settings->twitter }}" target="_blank" class="w-9 h-9 rounded-lg bg-primary-900 hover:bg-primary-600 flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    @endif
                    @if(!empty($settings->linkedin))
                    <a href="{{ $settings->linkedin }}" target="_blank" class="w-9 h-9 rounded-lg bg-primary-900 hover:bg-primary-600 flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                    @endif
                </div>
            </div>

            <div class="lg:col-span-2 grid grid-cols-2 gap-8 sm:gap-10">
                <!-- Quick Links -->
                <div>
                    <h4 class="text-white font-semibold mb-5">{{ __('app.quick_links') }}</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="text-sm text-neutral-400 hover:text-primary-400 transition-colors">{{ __('app.home') }}</a></li>
                        <li><a href="{{ route('categories.index') }}" class="text-sm text-neutral-400 hover:text-primary-400 transition-colors">{{ __('app.categories') }}</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-sm text-neutral-400 hover:text-primary-400 transition-colors">{{ __('app.products') }}</a></li>
                        <li><a href="{{ route('about') }}" class="text-sm text-neutral-400 hover:text-primary-400 transition-colors">{{ __('app.about') }}</a></li>
                        <li><a href="{{ route('contact') }}" class="text-sm text-neutral-400 hover:text-primary-400 transition-colors">{{ __('app.contact') }}</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-white font-semibold mb-5">{{ __('app.contact') }}</h4>
                    <ul class="space-y-3">
                        @if(!empty($settings->phone))
                        <li class="flex items-center gap-2 text-sm text-neutral-400">
                            <svg class="w-4 h-4 text-primary-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <a href="tel:{{ $settings->phone }}" class="hover:text-primary-400 transition-colors" dir="ltr">{{ $settings->phone }}</a>
                        </li>
                        @endif
                        @if(!empty($settings->email))
                        <li class="flex items-center gap-2 text-sm text-neutral-400">
                            <svg class="w-4 h-4 text-primary-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <a href="mailto:{{ $settings->email }}" class="hover:text-primary-400 transition-colors">{{ $settings->email }}</a>
                        </li>
                        @endif
                        @if(!empty($settings->address))
                        <li class="flex items-start gap-2 text-sm text-neutral-400">
                            <svg class="w-4 h-4 text-primary-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>{{ $settings->address }}</span>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="border-t border-neutral-800 pt-8 text-center text-sm text-neutral-500">
            © {{ date('Y') }} {{ $settings->company_name ?? 'مسك' }}. {{ __('app.rights_reserved') }}.
        </div>
    </div>
</footer>
