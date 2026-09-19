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

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'Zytrixon Tech — We Engineer Digital Dominance' }}">
    <meta name="twitter:description" content="{{ $description ?? 'Enterprise-grade Web, Mobile, and IoT solutions.' }}">

    {{-- Preconnect for fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-[#0A0A0B] text-neutral-900 dark:text-neutral-100 antialiased selection:bg-neutral-900 selection:text-white dark:selection:bg-white dark:selection:text-neutral-950">

    {{-- Top Kinetic Scroll Progress Bar --}}
    <div id="scroll-progress" style="width: 0%;"></div>

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

    {{-- Floating Soft Popup Live Status Badge --}}
    <div id="live-status-pill" class="soft-popup group inline-flex items-center gap-3 rounded-full border border-neutral-200/90 dark:border-neutral-700/80 bg-white/95 dark:bg-[#141519]/95 backdrop-blur-xl px-4 py-2.5 shadow-2xl transition-all duration-300 select-none">
        <span class="relative flex h-2.5 w-2.5">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
        </span>
        <a href="/contact" class="flex items-center gap-2 text-xs font-mono text-neutral-800 dark:text-neutral-200 hover:text-neutral-950 dark:hover:text-white">
            <span class="font-bold">SYSTEM ACTIVE</span>
            <span class="text-neutral-400 dark:text-neutral-500">•</span>
            <span>Q3 Inquiries Open</span>
            <span class="transition-transform group-hover:translate-x-0.5">&rarr;</span>
        </a>
        <button id="dismiss-status-pill" class="ml-1 text-neutral-400 hover:text-neutral-700 dark:hover:text-neutral-200 p-0.5 transition-colors" aria-label="Dismiss notification">
            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    {{-- Mobile Navigation Overlay --}}
    <div id="mobile-nav-overlay"
         class="fixed inset-0 bg-black/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300 ease-in-out"
         style="z-index: var(--z-overlay);"
         aria-hidden="true">
    </div>

    {{-- Mobile Navigation Drawer --}}
    <x-mobile-nav />

</body>
</html>
