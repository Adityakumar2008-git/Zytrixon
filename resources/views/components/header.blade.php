@php
    use App\Content\Navigation;
    use App\Content\Site;
@endphp

{{-- Header — docs/17-component-inventory.md §10
     Responsibilities: brand, primary nav, mobile trigger, CTA
     Must support: keyboard navigation, focus management, responsive behavior --}}
<header class="fixed top-0 left-0 right-0 border-b border-border bg-bg/80 backdrop-blur-md"
        style="z-index: var(--z-sticky);"
        role="banner">
    <div class="mx-auto flex h-16 max-w-[var(--container-max)] items-center justify-between px-6 lg:h-20 lg:px-8">

        {{-- Brand --}}
        <a href="/" class="flex items-center gap-2 text-fg transition-opacity duration-150 hover:opacity-80" aria-label="{{ Site::BRAND }} — Home">
            <span class="text-label text-lg tracking-[0.15em]">{{ Site::BRAND }}</span>
        </a>

        {{-- Desktop Navigation --}}
        <nav class="hidden items-center gap-8 lg:flex" aria-label="Primary navigation">
            @foreach (Navigation::primary() as $item)
                <a href="{{ $item['href'] }}"
                   class="text-body-sm text-fg-secondary transition-colors duration-150 hover:text-fg {{ request()->is(ltrim($item['href'], '/') . '*') ? '!text-fg font-medium' : '' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        {{-- Desktop CTA + Mobile Trigger --}}
        <div class="flex items-center gap-4">
            {{-- Desktop CTA --}}
            <a href="/contact"
               class="hidden rounded-lg bg-accent px-5 py-2.5 text-sm font-semibold text-white transition-all duration-150 hover:bg-accent-hover lg:inline-flex">
                Start a Project
            </a>

            {{-- Mobile Menu Trigger --}}
            <button id="mobile-nav-trigger"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-lg text-fg-secondary transition-colors duration-150 hover:bg-bg-surface hover:text-fg lg:hidden"
                    aria-expanded="false"
                    aria-controls="mobile-nav"
                    aria-label="Toggle navigation menu">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>

    </div>
</header>

{{-- Spacer to offset fixed header --}}
<div class="h-16 lg:h-20" aria-hidden="true"></div>
