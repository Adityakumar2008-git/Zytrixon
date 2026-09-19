@php
    use App\Content\Navigation;
    use App\Content\Site;
@endphp

<header class="fixed top-0 left-0 right-0 z-50 border-b border-neutral-200/80 bg-white/90 backdrop-blur-md transition-colors" role="banner">
    <div class="mx-auto flex h-20 max-w-[1400px] items-center justify-between px-6 lg:px-12">

        {{-- Brand --}}
        <a href="/" class="flex items-center text-neutral-900 transition-opacity hover:opacity-80" aria-label="{{ Site::BRAND }} — Home">
            <span class="font-bold text-xl tracking-[0.18em] uppercase">{{ Site::BRAND }}</span>
        </a>

        {{-- Desktop Navigation --}}
        <nav class="hidden items-center gap-10 lg:flex" aria-label="Primary navigation">
            @foreach (Navigation::primary() as $item)
                <a href="{{ $item['href'] }}"
                   class="text-sm font-medium text-neutral-600 transition-colors duration-150 hover:text-neutral-900 {{ request()->is(ltrim($item['href'], '/') . '*') ? '!text-neutral-900 font-semibold' : '' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        {{-- Desktop CTA + Mobile Trigger --}}
        <div class="flex items-center gap-3">
            {{-- Desktop "Let's Build ->" CTA --}}
            <a href="/contact"
               class="inline-flex items-center gap-2 rounded-full bg-neutral-900 px-5 py-2.5 text-xs font-semibold text-white transition-all duration-150 hover:bg-black hover:shadow-md">
                <span>Let's Build</span>
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </a>

            {{-- Hamburger Trigger (circular border per UI design) --}}
            <button id="mobile-nav-trigger"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-neutral-300 text-neutral-700 transition-colors duration-150 hover:border-neutral-900 hover:text-neutral-900"
                    aria-expanded="false"
                    aria-controls="mobile-nav"
                    aria-label="Toggle navigation menu">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>

    </div>
</header>

{{-- Spacer to offset fixed header --}}
<div class="h-20" aria-hidden="true"></div>
