<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0A0A0B">

    {{-- SEO Meta --}}
    <title>{{ $title ?? 'Zytrixon Tech — We Engineer Digital Dominance' }}</title>
    <meta name="description" content="{{ $description ?? 'Enterprise-grade Web, Mobile, and IoT solutions. Zytrixon Tech builds technology that drives business growth.' }}">
    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:title" content="{{ $title ?? 'Zytrixon Tech — We Engineer Digital Dominance' }}">
    <meta property="og:description" content="{{ $description ?? 'Enterprise-grade Web, Mobile, and IoT solutions.' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Zytrixon Tech">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'Zytrixon Tech — We Engineer Digital Dominance' }}">
    <meta name="twitter:description" content="{{ $description ?? 'Enterprise-grade Web, Mobile, and IoT solutions.' }}">
    <meta name="twitter:image" content="{{ asset('images/og-image.jpg') }}">

    {{-- Preconnect for fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    {{-- JSON-LD Structured Data --}}
    @php
        $schemaData = $jsonLd ?? \App\Services\SeoService::organizationSchema();
    @endphp
    <script type="application/ld+json">
        {!! json_encode($schemaData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FAFAFA] text-neutral-900 antialiased selection:bg-neutral-900 selection:text-white">

    {{-- Precision Custom Cursor (Desktop Only) --}}
    <div id="cursor-dot" class="custom-cursor-dot" aria-hidden="true"></div>
    <div id="cursor-ring" class="custom-cursor-ring" aria-hidden="true"></div>

    {{-- Skip Link — Accessibility per docs/09-accessibility.md §8 --}}
    <a href="#main-content" class="skip-link">
        Skip to main content
    </a>

    {{-- Header --}}
    <x-header />

    {{-- Main Content --}}
    <main id="main-content" role="main">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <x-footer />

</body>
</html>
