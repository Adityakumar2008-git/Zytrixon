@php
    use App\Content\Navigation;
    use App\Content\Site;
@endphp

{{-- Mobile Navigation Drawer
     Per docs/09-accessibility.md: keyboard navigation, focus management, aria-expanded
     Focus trapping and escape handling via resources/js/app.js --}}
<nav id="mobile-nav"
     class="fixed top-0 right-0 h-full w-80 max-w-[85vw] translate-x-full bg-bg-elevated border-l border-border transition-transform duration-300 ease-in-out lg:hidden"
     style="z-index: var(--z-modal);"
     aria-label="Mobile navigation"
     aria-hidden="true">

    <div class="flex h-full flex-col">

        {{-- Header --}}
        <div class="flex h-16 items-center justify-between border-b border-border px-6">
            <span class="text-label tracking-[0.15em] text-fg">{{ Site::BRAND }}</span>
            <button class="inline-flex h-10 w-10 items-center justify-center rounded-lg text-fg-secondary transition-colors duration-150 hover:bg-bg-surface hover:text-fg"
                    aria-label="Close navigation"
                    onclick="document.getElementById('mobile-nav-trigger').click()">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Navigation Links --}}
        <div class="flex-1 overflow-y-auto px-6 py-8">
            <ul class="space-y-1" role="list">
                @foreach (Navigation::primary() as $item)
                    <li>
                        <a href="{{ $item['href'] }}"
                           class="flex items-center rounded-lg px-4 py-3 text-base text-fg-secondary transition-colors duration-150 hover:bg-bg-surface hover:text-fg {{ request()->is(ltrim($item['href'], '/') . '*') ? 'bg-bg-surface !text-fg font-medium' : '' }}">
                            {{ $item['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- CTA --}}
        <div class="border-t border-border p-6">
            <a href="/contact"
               class="flex w-full items-center justify-center rounded-lg bg-accent px-5 py-3 text-sm font-semibold text-white transition-all duration-150 hover:bg-accent-hover">
                Start a Project
            </a>
            <div class="mt-4 space-y-2 text-center">
                <a href="mailto:{{ Site::EMAIL }}" class="block text-caption text-fg-muted transition-colors duration-150 hover:text-fg-secondary">
                    {{ Site::EMAIL }}
                </a>
                <a href="tel:{{ str_replace(' ', '', Site::PHONE_PRIMARY) }}" class="block text-caption text-fg-muted transition-colors duration-150 hover:text-fg-secondary">
                    {{ Site::PHONE_PRIMARY }}
                </a>
            </div>
        </div>

    </div>
</nav>

<style>
    #mobile-nav.is-open {
        transform: translateX(0);
    }
    #mobile-nav-overlay.is-visible {
        opacity: 1;
        pointer-events: auto;
    }
</style>
