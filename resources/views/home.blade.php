@extends('layouts.app')

@section('title', $settings->company_name ?? __('messages.hero_title'))

@section('content')

{{-- 1. FULL-BLEED LUXE HERO SECTION --}}
<section class="relative min-h-[85vh] sm:min-h-[90vh] flex items-center justify-center overflow-hidden bg-neutral-950 text-white pt-36 pb-24">
    
    <!-- Full-Bleed Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/hero2.jpg') }}" class="w-full h-full object-cover object-center scale-105 animate-pulse" style="animation-duration: 8s;" alt="Mesk Agrotech Field Showcase">
        <!-- Elite Dark Overlay for Perfect Typography Contrast -->
        <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-neutral-950/60 to-neutral-950/35"></div>
        <div class="absolute inset-0 bg-black/20 backdrop-blur-[1px]"></div>
    </div>

    <!-- Soft ambient glows -->
    <div class="absolute top-1/4 left-1/4 w-[400px] h-[400px] bg-glow-green rounded-full opacity-25 pointer-events-none z-10"></div>
    <div class="absolute bottom-1/4 right-1/4 w-[400px] h-[400px] bg-glow-gold rounded-full opacity-15 pointer-events-none z-10"></div>

    <!-- Hero Content Container -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-8 lg:px-10 w-full text-center lg:text-start">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Hero Text Block -->
            <div class="lg:col-span-8 lg:max-w-3xl">
                
                <!-- Understated Agricultural Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/10 text-accent-500 text-xs font-black tracking-widest uppercase mb-6 hover:bg-white/20 transition-all pointer-events-none">
                    <span class="w-1.5 h-1.5 rounded-full bg-accent-500 animate-pulse"></span>
                    {{ app()->getLocale() === 'ar' ? 'التقنية الزراعية النقية والأكثر فاعلية' : 'Pure Efficacy Agrochemical Science' }}
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-[4rem] font-black leading-[1.12]">
                    @if(app()->getLocale() === 'ar')
                        نقاء التقنية الزراعية، <br>
                        <span class="text-accent-500 font-black">بأعلى معايير الدقة.</span>
                    @else
                        Pure Agronomy. <br>
                        <span class="text-accent-500 font-black">Perfected.</span>
                    @endif
                </h1>

                <p class="mt-6 text-base sm:text-lg text-white/80 leading-relaxed font-light max-w-2xl mx-auto lg:mx-0">
                    {{ __('messages.hero_subtitle') }}
                </p>

                <!-- High-End Editorial Checklists -->
                <div class="mt-8 space-y-3 max-w-xl mx-auto lg:mx-0">
                    <div class="flex items-start gap-3 justify-center lg:justify-start text-start">
                        <div class="w-5 h-5 rounded-full bg-accent-500/20 text-accent-400 flex items-center justify-center font-bold text-xs shrink-0 border border-accent-500/20 mt-0.5">✓</div>
                        <span class="text-sm text-white/90 font-medium">{{ app()->getLocale() === 'ar' ? 'مبيدات وحلول مكافحة مرخصة ومطابقة لمعايير SFDA' : 'Pesticides fully compliant under rigorous SFDA registry' }}</span>
                    </div>
                    <div class="flex items-start gap-3 justify-center lg:justify-start text-start">
                        <div class="w-5 h-5 rounded-full bg-accent-500/20 text-accent-400 flex items-center justify-center font-bold text-xs shrink-0 border border-accent-500/20 mt-0.5">✓</div>
                        <span class="text-sm text-white/90 font-medium">{{ app()->getLocale() === 'ar' ? 'أسمدة ومغذيات مركزة لنمو متوازن وزيادة عقد ونظافة الثمار' : 'Concentrated plant nutrition engineered for bumper crops' }}</span>
                    </div>
                    <div class="flex items-start gap-3 justify-center lg:justify-start text-start">
                        <div class="w-5 h-5 rounded-full bg-accent-500/20 text-accent-400 flex items-center justify-center font-bold text-xs shrink-0 border border-accent-500/20 mt-0.5">✓</div>
                        <span class="text-sm text-white/90 font-medium">{{ app()->getLocale() === 'ar' ? 'استشارات ودعم فني متواصل طوال الموسم لضمان النجاح' : '15+ Years of continuous technical diagnostic assistance' }}</span>
                    </div>
                </div>

                <!-- Sleek Actions -->
                <div class="mt-10 flex flex-wrap justify-center lg:justify-start gap-4">
                    <a href="{{ route('products.index') }}"
                       class="inline-flex items-center gap-2.5 px-8 py-3.5 bg-white text-neutral-900 font-extrabold rounded-full hover:bg-neutral-100 shadow-lg transition-all duration-300">
                        {{ __('messages.hero_cta') }}
                        <svg class="w-4 h-4 shrink-0 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                    
                    <a href="https://wa.me/{{ $settings->whatsapp }}?text={{ urlencode(app()->getLocale() === 'ar' ? 'السلام عليكم، أود الحصول على تفاصيل أكثر حول برامج المكافحة والتغذية لمزرعتي.' : 'Hello Mesk, I would like to learn more about your protective formulas.') }}"
                       target="_blank"
                       class="inline-flex items-center gap-2 px-8 py-3.5 bg-white/10 backdrop-blur-md text-white font-extrabold rounded-full border border-white/20 hover:bg-white/20 transition-all duration-300">
                        <svg class="w-4.5 h-4.5 text-emerald-400 fill-current" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        {{ app()->getLocale() === 'ar' ? 'طلب استشارة زراعية' : 'Consult an Agronomist' }}
                    </a>
                </div>

            </div>

            <!-- Right Column: Subtle floating stats tag -->
            <div class="lg:col-span-4 hidden lg:flex justify-end relative">
                <div class="bg-white/10 backdrop-blur-md border border-white/10 p-6 rounded-3xl shadow-2xl max-w-[280px]">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">🌱</span>
                        <div>
                            <div class="text-[9px] text-accent-400 font-extrabold uppercase tracking-wider">{{ app()->getLocale() === 'ar' ? 'معتمد رسمياً' : 'Official Cert' }}</div>
                            <div class="text-xs font-black text-white">{{ app()->getLocale() === 'ar' ? 'مبيدات مطابقة للوائح الكلية' : '100% SFDA Registered' }}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- 2. SUSTAINABLE PARTNERSHIP VISION --}}
<section class="py-10 bg-white">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
        <div class="bg-neutral-50 border border-neutral-100 rounded-3xl p-8 flex flex-col md:flex-row items-center justify-between gap-8 hover-grow">
            
            <div class="flex items-center gap-5">
                <div class="w-16 h-16 rounded-2xl bg-white border border-neutral-200/50 flex items-center justify-center text-neutral-800 text-3xl shrink-0 shadow-sm">
                    🌴
                </div>
                <div>
                    <h3 class="text-lg font-bold text-neutral-900">
                        {{ app()->getLocale() === 'ar' ? 'ملتزمون بدعم الأمن الغذائي تماشياً مع رؤية المملكة ٢٠٣٠' : 'Committed to Saudi Arabia Food Security 2030' }}
                    </h3>
                    <p class="text-xs text-neutral-500 mt-1 max-w-xl font-light">
                        {{ app()->getLocale() === 'ar' ? 'نوفر أحدث باقات الحماية والمغذيات عالية النقاوة التي ترفع الإنتاجية الزراعية وتحمي سلامة التربة وتوفر استهلاك الموارد المائية.' : 'Partnering with growers under Vision 2030 to supply high-efficacy formulas designed for optimal yield and organic security.' }}
                    </p>
                </div>
            </div>

            <div class="shrink-0 flex items-center gap-3 bg-white border border-neutral-200/40 px-5 py-3 rounded-2xl">
                <span class="text-2xl">🇸🇦</span>
                <div>
                    <div class="text-[9px] text-neutral-400 font-bold uppercase tracking-wider">{{ app()->getLocale() === 'ar' ? 'رؤية المملكة' : 'SAUDI VISION' }}</div>
                    <div class="text-sm font-black text-neutral-900">2030</div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- 3. THE 4 SOLUTIONS OF AGRONOMY EXCELLENCE --}}
<section class="py-24 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-primary-600 font-bold text-xs uppercase tracking-widest bg-primary-50 px-4 py-1.5 rounded-full inline-block">
                {{ app()->getLocale() === 'ar' ? 'حلول معتمدة ومجربة' : 'Corporate Divisions' }}
            </span>
            <h2 class="mt-5 text-3xl sm:text-4xl font-extrabold text-neutral-900 leading-tight">
                {{ app()->getLocale() === 'ar' ? 'أربعة ركائز لضمان سلامة ونمو محصولك' : 'Core Protective and Growth Pillars' }}
            </h2>
            <p class="mt-3.5 text-neutral-500 font-light max-w-xl mx-auto">
                {{ app()->getLocale() === 'ar' ? 'نقدم حلولاً زراعية مدروسة وفعالة لمرافقة مراحل نمو النبات وحمايتها بأعلى مستويات الجودة والأمان.' : 'We provide highly synchronized chemical and biological formulations covering all agricultural growth cycles.' }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <!-- Solution Card 1 -->
            <div class="bg-white p-8 rounded-3xl border border-neutral-100 shadow-sm hover-grow flex flex-col justify-between h-[340px]">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl mb-6 border border-emerald-100">
                        🛡️
                    </div>
                    <h3 class="text-lg font-bold text-neutral-900">
                        {{ app()->getLocale() === 'ar' ? 'الوقاية الفائقة والمكافحة' : 'Crop Protection' }}
                    </h3>
                    <p class="text-xs text-neutral-500 mt-2.5 leading-relaxed">
                        {{ app()->getLocale() === 'ar' ? 'باقة شاملة من مبيدات الحشرات، الفطريات، والأعشاب ذات الكفاءة العالية لحماية أوراق وثمار نباتك.' : 'Complete line of insecticides, fungicides, and herbicides securing foliage.' }}
                    </p>
                </div>
                <a href="{{ route('products.index') }}?category=1" class="text-xs font-bold text-primary-500 hover:text-primary-700 inline-flex items-center gap-1.5 mt-6">
                    {{ __('messages.view_all') }} →
                </a>
            </div>

            <!-- Solution Card 2 -->
            <div class="bg-white p-8 rounded-3xl border border-neutral-100 shadow-sm hover-grow flex flex-col justify-between h-[340px]">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl mb-6 border border-amber-100">
                        🌾
                    </div>
                    <h3 class="text-lg font-bold text-neutral-900">
                        {{ app()->getLocale() === 'ar' ? 'التغذية النباتية المتكاملة' : 'Plant Nutrition' }}
                    </h3>
                    <p class="text-xs text-neutral-500 mt-2.5 leading-relaxed">
                        {{ app()->getLocale() === 'ar' ? 'أسمدة NPK عالية الذوبان وعناصر صغرى تمد الجذور بالأوراق بالغذاء النقي لنمو متوازن وقوي.' : 'Highly soluble complexes and trace minerals assisting root nourishment.' }}
                    </p>
                </div>
                <a href="{{ route('products.index') }}?category=4" class="text-xs font-bold text-primary-500 hover:text-primary-700 inline-flex items-center gap-1.5 mt-6">
                    {{ __('messages.view_all') }} →
                </a>
            </div>

            <!-- Solution Card 3 -->
            <div class="bg-white p-8 rounded-3xl border border-neutral-100 shadow-sm hover-grow flex flex-col justify-between h-[340px]">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl mb-6 border border-blue-100">
                        🧪
                    </div>
                    <h3 class="text-lg font-bold text-neutral-900">
                        {{ app()->getLocale() === 'ar' ? 'منظمات ومحفزات النمو' : 'Growth Regulators' }}
                    </h3>
                    <p class="text-xs text-neutral-500 mt-2.5 leading-relaxed">
                        {{ app()->getLocale() === 'ar' ? 'تركيبات هرمونية ومحفزات حيوية لتنشيط البناء الخلوي وحماية الثمار من درجات الحرارة القاسية.' : 'Systemic stimulants formulated for heat and osmotic defense.' }}
                    </p>
                </div>
                <a href="{{ route('products.index') }}?category=5" class="text-xs font-bold text-primary-500 hover:text-primary-700 inline-flex items-center gap-1.5 mt-6">
                    {{ __('messages.view_all') }} →
                </a>
            </div>

            <!-- Solution Card 4 -->
            <div class="bg-white p-8 rounded-3xl border border-neutral-100 shadow-sm hover-grow flex flex-col justify-between h-[340px]">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-2xl mb-6 border border-teal-100">
                        💧
                    </div>
                    <h3 class="text-lg font-bold text-neutral-900">
                        {{ app()->getLocale() === 'ar' ? 'محسنات الرش وتوفير المياه' : 'Spray Adjuvants' }}
                    </h3>
                    <p class="text-xs text-neutral-500 mt-2.5 leading-relaxed">
                        {{ app()->getLocale() === 'ar' ? 'لاصقات ومحسنات نشر تمنع تبخر محلول الرش أو انجرافه وتضمن الاستفادة القصوى من كل رشة.' : 'Organic wetting spreaders ensuring drop adhesion and zero waste.' }}
                    </p>
                </div>
                <a href="{{ route('products.index') }}?category=8" class="text-xs font-bold text-primary-500 hover:text-primary-700 inline-flex items-center gap-1.5 mt-6">
                    {{ __('messages.view_all') }} →
                </a>
            </div>

        </div>
    </div>
</section>


{{-- 4. MINIMALIST CORPORATE STATISTICS --}}
<section class="py-20 bg-neutral-50 border-y border-neutral-100">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center mb-12">
            <div class="lg:col-span-6 text-center lg:text-start">
                <span class="text-primary-600 font-bold text-xs uppercase tracking-widest">{{ app()->getLocale() === 'ar' ? 'ريادة وتميز' : 'Mesk at a Glance' }}</span>
                <h2 class="mt-3 text-3xl font-extrabold text-neutral-900">
                    {{ app()->getLocale() === 'ar' ? 'أرقام وحقائق تؤكد ريادتنا وجودة خدماتنا' : 'Delivering Yield Security Across KSA' }}
                </h2>
            </div>
            <div class="lg:col-span-6 text-center lg:text-start">
                <p class="text-sm text-neutral-500 leading-relaxed font-light">
                    {{ app()->getLocale() === 'ar' ? 'فخورون بكوننا الخيار الأول الموثوق لآلاف المزارعين والمستثمرين بفضل الجودة العالية والنزاهة العلمية التي نضمنها في كل منتج نوفرة.' : 'Empowering Saudi growers with tested solutions, elite imports, and zero-compromise active ingredients ensuring harvest integrity.' }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Stat -->
            <div class="bg-white p-8 rounded-2xl border border-neutral-200/50 text-center hover-grow shadow-sm">
                <div class="text-4xl font-black text-neutral-900">15+</div>
                <div class="mt-2 text-xs text-neutral-700 font-extrabold">{{ __('messages.years_experience') }}</div>
                <p class="text-[10px] text-neutral-400 mt-1 font-light">{{ app()->getLocale() === 'ar' ? 'عاماً من الشراكة الفنية والميدانية' : 'Years of agriculture leadership' }}</p>
            </div>
            <!-- Stat -->
            <div class="bg-white p-8 rounded-2xl border border-neutral-200/50 text-center hover-grow shadow-sm">
                <div class="text-4xl font-black text-neutral-900">200+</div>
                <div class="mt-2 text-xs text-neutral-700 font-extrabold">{{ __('messages.products_count') }}</div>
                <p class="text-[10px] text-neutral-400 mt-1 font-light">{{ app()->getLocale() === 'ar' ? 'مبيد معتمد ومركب مسجل' : 'Rigorously certified compounds' }}</p>
            </div>
            <!-- Stat -->
            <div class="bg-white p-8 rounded-2xl border border-neutral-200/50 text-center hover-grow shadow-sm">
                <div class="text-4xl font-black text-neutral-900">5000+</div>
                <div class="mt-2 text-xs text-neutral-700 font-extrabold">{{ __('messages.clients_count') }}</div>
                <p class="text-[10px] text-neutral-400 mt-1 font-light">{{ app()->getLocale() === 'ar' ? 'مزارع ومستثمر يثق بجودتنا' : 'Growers and partners satisfied' }}</p>
            </div>
            <!-- Stat -->
            <div class="bg-white p-8 rounded-2xl border border-neutral-200/50 text-center hover-grow shadow-sm">
                <div class="text-4xl font-black text-neutral-900">10+</div>
                <div class="mt-2 text-xs text-neutral-700 font-extrabold">{{ __('messages.countries_count') }}</div>
                <p class="text-[10px] text-neutral-400 mt-1 font-light">{{ app()->getLocale() === 'ar' ? 'بلدان نستورد منها أرقى الماركات' : 'Global premier tech import sites' }}</p>
            </div>
        </div>

    </div>
</section>


{{-- 5. FEATURED CATEGORIES CATALOG --}}
@if($categories->count())
<section class="py-24 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-primary-600 font-bold text-xs uppercase tracking-widest bg-primary-50 px-4 py-1.5 rounded-full inline-block">
                {{ __('messages.categories') }}
            </span>
            <h2 class="mt-5 text-3xl font-extrabold text-neutral-900">
                {{ __('messages.featured_categories') }}
            </h2>
            <p class="mt-3 text-neutral-500 font-light max-w-xl mx-auto">
                {{ app()->getLocale() === 'ar' ? 'تصفح أقسامنا الزراعية المنظمة للوصول بسهولة إلى المغذيات أو باقات الوقاية لثمارك.' : 'Navigate through specialized categories formulated to synchronization crop development.' }}
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($categories->take(6) as $category)
                <div class="hover-grow rounded-3xl overflow-hidden border border-neutral-100 bg-white">
                    <x-category-card :category="$category"/>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('categories.index') }}"
               class="inline-flex items-center gap-2 px-8 py-3 border border-neutral-200 hover:border-neutral-900 text-neutral-800 hover:text-neutral-950 font-extrabold rounded-full transition-all duration-300">
                {{ app()->getLocale() === 'ar' ? 'عرض الكتالوج بالكامل' : 'Explore All Categories' }}
                <svg class="w-4.5 h-4.5 shrink-0 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

    </div>
</section>
@endif


{{-- 6. FEATURED PRODUCTS CATALOG --}}
@if($featuredProducts->count())
<section class="py-24 bg-neutral-50 border-t border-neutral-100">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
        
        <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-16 gap-6">
            <div>
                <span class="text-primary-600 font-bold text-xs uppercase tracking-widest bg-primary-50 px-4 py-1.5 rounded-full inline-block">
                    {{ __('messages.products') }}
                </span>
                <h2 class="mt-4 text-3xl font-extrabold text-neutral-900">
                    {{ __('messages.featured_products') }}
                </h2>
                <p class="text-xs text-neutral-500 mt-1 font-light">
                    {{ app()->getLocale() === 'ar' ? 'الحلول والمغذيات الأكثر طلباً ونجاحاً في مزارع المملكة.' : 'Highest rated active ingredients trusted by corporate farms.' }}
                </p>
            </div>
            
            <a href="{{ route('products.index') }}" 
               class="inline-flex items-center gap-2 px-6 py-2.5 bg-white text-neutral-800 hover:text-neutral-950 font-extrabold rounded-full border border-neutral-200 transition-all duration-300">
                {{ app()->getLocale() === 'ar' ? 'عرض جميع المنتجات' : 'View Full Catalog' }}
                <svg class="w-4.5 h-4.5 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($featuredProducts as $product)
                <div class="hover-grow rounded-3xl overflow-hidden border border-neutral-100 bg-white">
                    <x-product-card :product="$product"/>
                </div>
            @endforeach
        </div>

    </div>
</section>
@endif


{{-- 7. MINIMALIST ABOUT US --}}
@if($about)
<section class="py-24 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
            
            <!-- Visual Frame -->
            <div class="lg:col-span-5 relative">
                @if($about->hasMedia('image'))
                    <img src="{{ $about->getFirstMediaUrl('image') }}" alt="{{ $about->getTranslation('title', app()->getLocale()) }}"
                         class="w-full rounded-[2rem] border border-neutral-100 shadow-sm object-cover aspect-[4/5]">
                @else
                    <div class="w-full rounded-[2rem] bg-neutral-50 border border-neutral-100 aspect-[4/5] flex items-center justify-center shadow-sm">
                        <span class="text-6xl">🌾</span>
                    </div>
                @endif
            </div>

            <!-- Content -->
            <div class="lg:col-span-7">
                <span class="text-primary-600 font-bold text-xs uppercase tracking-widest bg-primary-50 px-4 py-1.5 rounded-full inline-block">
                    {{ __('messages.about_preview_title') }}
                </span>
                
                <h2 class="mt-5 text-3xl font-extrabold text-neutral-900 leading-tight">
                    {{ $about->getTranslation('title', app()->getLocale()) }}
                </h2>

                <p class="mt-6 text-neutral-600 leading-relaxed font-light text-base">
                    {!! Str::limit(strip_tags($about->getTranslation('description', app()->getLocale())), 450) !!}
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-8">
                    <div class="bg-neutral-50 p-6 rounded-2xl border border-neutral-100/50">
                        <div class="text-xl mb-1.5">🎯</div>
                        <h4 class="font-extrabold text-neutral-900 text-sm">{{ app()->getLocale() === 'ar' ? 'رسالتنا' : 'Our Mission' }}</h4>
                        <p class="text-xs text-neutral-500 mt-2 leading-relaxed">
                            {{ app()->getLocale() === 'ar' ? 'توفير أحدث التقنيات والحلول الفعالة والآمنة التي تضمن زيادة المردود الاقتصادي للمزارعين بالمملكة.' : 'Providing optimized, clean active solutions directly enhancing yield margins.' }}
                        </p>
                    </div>

                    <div class="bg-neutral-50 p-6 rounded-2xl border border-neutral-100/50">
                        <div class="text-xl mb-1.5">👁️</div>
                        <h4 class="font-extrabold text-neutral-900 text-sm">{{ app()->getLocale() === 'ar' ? 'رؤيتنا' : 'Our Vision' }}</h4>
                        <p class="text-xs text-neutral-500 mt-2 leading-relaxed">
                            {{ app()->getLocale() === 'ar' ? 'أن نكون الاسم الأول الأكثر موثوقية وجودة في توفير مدخلات الإنتاج الزراعي المستدام.' : 'To stand as the absolute elite partner for organic and safe crop formulas.' }}
                        </p>
                    </div>
                </div>

                <a href="{{ route('about') }}"
                   class="mt-10 inline-flex items-center gap-2 px-8 py-3.5 bg-neutral-900 hover:bg-neutral-950 text-white font-extrabold rounded-full shadow-sm transition-all duration-300">
                    {{ app()->getLocale() === 'ar' ? 'قصتنا وتاريخنا' : 'Learn More About Us' }}
                    <svg class="w-4.5 h-4.5 shrink-0 {{ app()->getLocale() === 'ar' ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

        </div>
    </div>
</section>
@endif


{{-- 8. LUXURY WHATSAPP CALL OUT --}}
@if(!empty($settings->whatsapp))
<section class="py-24 bg-neutral-900 text-white relative overflow-hidden">
    <div class="relative z-10 max-w-4xl mx-auto px-6 sm:px-8 lg:px-10 text-center">
        
        <div class="w-16 h-16 bg-white/5 border border-white/10 rounded-2xl flex items-center justify-center mx-auto mb-8">
            <svg class="w-8 h-8 text-emerald-400 fill-current" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
            </svg>
        </div>

        <h2 class="text-3xl font-extrabold text-white leading-tight">
            {{ __('messages.whatsapp_cta_title') }}
        </h2>
        
        <p class="mt-4 text-white/60 text-base font-light max-w-xl mx-auto leading-relaxed">
            {{ __('messages.whatsapp_cta_subtitle') }}
        </p>

        <div class="mt-10">
            <a href="https://wa.me/{{ $settings->whatsapp }}?text={{ urlencode(app()->getLocale() === 'ar' ? 'السلام عليكم، أود الحصول على نسخة من دليل المنتجات.' : 'Hello, I would like to get the latest Mesk products catalog.') }}" 
               target="_blank"
               class="inline-flex items-center gap-2.5 px-9 py-4 bg-white text-neutral-900 font-extrabold rounded-full hover:bg-neutral-50 shadow-md transition-all duration-300">
                <svg class="w-5 h-5 text-emerald-600 fill-current" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                {{ __('messages.whatsapp_cta_button') }}
            </a>
        </div>

    </div>
</section>
@endif

@endsection
