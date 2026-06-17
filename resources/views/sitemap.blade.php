<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">

    {{-- Homepage --}}
    <url>
        <loc>{{ url('/') }}</loc>
        <xhtml:link rel="alternate" hreflang="ar" href="{{ url('/') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/') }}"/>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>

    {{-- Static pages --}}
    @foreach([['about', 0.8], ['contact', 0.7], ['products', 0.9]] as [$routeName, $priority])
    <url>
        <loc>{{ route($routeName) }}</loc>
        <changefreq>monthly</changefreq>
        <priority>{{ $priority }}</priority>
    </url>
    @endforeach

    {{-- Categories --}}
    @foreach($categories as $category)
    <url>
        <loc>{{ route('categories.show', $category->slug) }}</loc>
        <lastmod>{{ $category->updated_at->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
        @foreach($category->subCategories as $sub)
        <url>
            <loc>{{ route('categories.subcategory', [$category->slug, $sub->slug]) }}</loc>
            <lastmod>{{ $sub->updated_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.7</priority>
        </url>
        @endforeach
    @endforeach

    {{-- Products --}}
    @foreach($products as $product)
    <url>
        <loc>{{ route('products.show', $product->slug) }}</loc>
        <lastmod>{{ $product->updated_at->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

</urlset>
