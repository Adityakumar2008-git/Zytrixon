@php
    use App\Content\Navigation;
    use App\Content\Site;
@endphp

{{-- Mobile Navigation Drawer --}}
<nav id="mobile-nav"
     class="fixed top-0 right-0 h-full w-80 max-w-[85vw] translate-x-full bg-white dark:bg-[#0E0F12] border-l border-neutral-200/80 dark:border-neutral-800/80 shadow-2xl transition-transform duration-300 ease-in-out lg:hidden"
     style="z-index: 100;"
     aria-label="Mobile navigation"
     aria-hidden="true">

    <div class="flex h-full flex-col">

        {{-- Header --}}
        <div class="flex h-20 items-center justify-between border-b border-neutral-200/80 dark:border-neutral-800/80 px-6">
            <span class="text-sm font-black uppercase tracking-[0.25em] text-neutral-900 dark:text-white">{{ Site::BRAND }}</span>
            <button class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-neutral-300 dark:border-neutral-700 text-neutral-700 dark:text-neutral-300 transition-colors duration-150 hover:bg-neutral-100 dark:hover:bg-neutral-800 hover:text-neutral-900 dark:hover:text-white"
                    aria-label="Close navigation"
                    onclick="document.getElementById('mobile-nav-trigger').click()">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Navigation Links --}}
        <div class="flex-1 overflow-y-auto px-6 py-8">
            <ul class="space-y-2" role="list">
                @foreach (Navigation::primary() as $item)
                    <li>
                        <a href="{{ $item['href'] }}"
                           class="flex items-center rounded-xl px-4 py-3 text-base font-medium text-neutral-700 dark:text-neutral-300 transition-colors duration-150 hover:bg-neutral-100 dark:hover:bg-neutral-800/70 hover:text-neutral-900 dark:hover:text-white {{ request()->is(ltrim($item['href'], '/') . '*') ? 'bg-neutral-100 dark:bg-neutral-800/90 !text-neutral-900 dark:!text-white font-bold' : '' }}">
                            {{ $item['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- CTA --}}
        <div class="border-t border-neutral-200/80 dark:border-neutral-800/80 p-6 space-y-4">
            <a href="/contact"
               class="flex w-full items-center justify-center rounded-full bg-neutral-900 dark:bg-[#18191E] dark:border dark:border-neutral-700 dark:hover:bg-[#22242B] px-5 py-3.5 text-sm font-semibold text-white transition-all duration-150 hover:bg-black">
                Let's Build &rarr;
            </a>
            <div class="space-y-1 text-center font-mono text-xs text-neutral-500 dark:text-neutral-400">
                <a href="mailto:{{ Site::EMAIL }}" class="block transition-colors hover:text-neutral-900 dark:hover:text-white">
                    {{ Site::EMAIL }}
                </a>
                <a href="tel:{{ str_replace(' ', '', Site::PHONE_PRIMARY) }}" class="block transition-colors hover:text-neutral-900 dark:hover:text-white">
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
