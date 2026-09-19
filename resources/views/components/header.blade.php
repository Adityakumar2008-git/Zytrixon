@php
    use App\Content\Navigation;
    use App\Content\Site;
@endphp

<header id="site-header" class="is-top fixed top-0 left-0 right-0 z-50 border-b border-white/80 dark:border-neutral-800/80 bg-white/75 dark:bg-[#0A0A0B]/80 backdrop-blur-xl shadow-[inset_0_-1px_0_0_rgba(0,0,0,0.03),0_8px_32px_-4px_rgba(0,0,0,0.03)] dark:shadow-[inset_0_-1px_0_0_rgba(255,255,255,0.05),0_8px_32px_-4px_rgba(0,0,0,0.4)] transition-all duration-300" role="banner">
    <div class="mx-auto flex h-20 max-w-[1400px] items-center justify-between px-6 lg:px-12 transition-all duration-300">

        {{-- Brand --}}
        <a href="/" class="flex items-center text-neutral-900 dark:text-white transition-transform duration-200 hover:scale-[1.02] active:scale-[0.98]" aria-label="{{ Site::BRAND }} — Home">
            <span class="font-bold text-xl tracking-[0.18em] uppercase">{{ Site::BRAND }}</span>
        </a>

        {{-- Desktop Navigation (md and above only) — Clean unboxed links per reference design --}}
        <nav class="hidden items-center gap-8 md:flex" aria-label="Primary navigation">
            @foreach (Navigation::primary() as $item)
                <a href="{{ $item['href'] }}"
                   class="nav-link-indicator text-sm font-medium text-neutral-600 dark:text-neutral-400 transition-colors duration-150 hover:text-neutral-950 dark:hover:text-white {{ request()->is(ltrim($item['href'], '/') . '*') ? 'font-bold text-neutral-950 dark:text-white is-active' : '' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        {{-- Actions --}}
        <div class="flex items-center gap-3">
            {{-- Dark / Light Theme Toggle Button --}}
            <button id="theme-toggle-btn"
                    type="button"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-neutral-200 dark:border-neutral-800 bg-white/80 dark:bg-[#18191E] text-neutral-700 dark:text-neutral-200 shadow-sm transition-all duration-200 hover:scale-105 active:scale-95 hover:border-neutral-300 dark:hover:border-neutral-700 focus:outline-none"
                    aria-label="Toggle dark mode">
                {{-- Sun icon (visible in dark mode) --}}
                <svg id="theme-sun-icon" class="h-4 w-4 text-amber-400 transition-transform duration-300 hover:rotate-45" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                </svg>
                {{-- Moon icon (visible in light mode) --}}
                <svg id="theme-moon-icon" class="h-4 w-4 text-neutral-700 transition-transform duration-300 hover:-rotate-12" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                </svg>
            </button>

            {{-- "Let's Build ->" CTA Button per reference design --}}
            <a href="/contact"
               class="btn-magnetic btn-magnetic-primary inline-flex items-center gap-2 rounded-xl bg-[#0F1012] dark:bg-[#18191E] border border-neutral-800 dark:border-neutral-700 px-5 py-2.5 text-xs sm:text-sm font-semibold text-white dark:text-white shadow-sm transition-all duration-150 hover:bg-black dark:hover:bg-[#25272F] hover:shadow-md active:scale-[0.97]">
                <span>Let's Build</span>
                <svg class="btn-magnetic-icon h-3.5 w-3.5 transition-transform duration-150" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </a>

            {{-- Mobile Hamburger Button — ONLY shown on mobile screens (< md: 768px), strictly hidden on PC per user instructions --}}
            <button id="mobile-menu-btn"
                    type="button"
                    class="md:hidden inline-flex h-10 w-10 items-center justify-center rounded-xl bg-[#0F1012] dark:bg-neutral-800 border border-neutral-800 dark:border-neutral-700 text-white transition-all duration-150 hover:bg-black active:scale-95 shadow-sm"
                    aria-expanded="false"
                    aria-label="Toggle Navigation Menu">
                {{-- 3-bar Hamburger Icon (visible when closed) --}}
                <svg id="hamburger-bars-icon" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                {{-- Close X Icon (visible when open) --}}
                <svg id="hamburger-close-icon" class="hidden h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>


    </div>

    {{-- Mobile Navigation Dropdown Sheet — ONLY for mobile screens (< md), strictly hidden on PC --}}
    <div id="mobile-menu-sheet"
         class="hidden md:hidden border-t border-neutral-200/80 dark:border-neutral-800/80 bg-white/95 dark:bg-[#0A0A0B]/95 backdrop-blur-2xl shadow-2xl transition-all duration-200">
        <div class="px-6 py-6 space-y-4 max-w-md mx-auto">
            <nav class="space-y-1" aria-label="Mobile primary navigation">
                @foreach (Navigation::primary() as $item)
                    <a href="{{ $item['href'] }}"
                       class="flex items-center justify-between px-4 py-3 rounded-2xl text-base font-semibold text-neutral-800 dark:text-neutral-200 transition-colors hover:bg-neutral-100 dark:hover:bg-neutral-800/60 active:bg-neutral-200 dark:active:bg-neutral-800 {{ request()->is(ltrim($item['href'], '/') . '*') ? 'bg-neutral-100 dark:bg-neutral-800 !text-neutral-900 dark:!text-white font-bold' : '' }}">
                        <span>{{ $item['label'] }}</span>
                        <span class="text-neutral-400">&rarr;</span>
                    </a>
                @endforeach
            </nav>

            <div class="pt-4 border-t border-neutral-200/80 dark:border-neutral-800/80 space-y-3">
                <a href="/contact"
                   class="w-full flex items-center justify-center gap-2 rounded-full bg-neutral-900 dark:bg-[#18191E] border border-transparent dark:border-neutral-700 py-3.5 text-sm font-semibold text-white dark:text-white shadow-md hover:bg-black dark:hover:bg-[#25272F] active:scale-[0.98] transition-all">
                    <span>Start a Project</span>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
                <div class="flex items-center justify-center gap-4 pt-1 font-mono text-xs text-neutral-500 dark:text-neutral-400">
                    <a href="mailto:{{ Site::EMAIL }}" class="hover:text-neutral-900 dark:hover:text-white">{{ Site::EMAIL }}</a>
                    <span>&bull;</span>
                    <a href="tel:{{ str_replace(' ', '', Site::PHONE_PRIMARY) }}" class="hover:text-neutral-900 dark:hover:text-white">{{ Site::PHONE_PRIMARY }}</a>
                </div>
            </div>
        </div>
    </div>
</header>

{{-- Spacer to offset fixed header --}}
<div class="h-20" aria-hidden="true"></div>

{{-- Self-contained bulletproof script for mobile menu toggle --}}
<script>
(function() {
    function initMobileToggle() {
        var btn = document.getElementById('mobile-menu-btn');
        var sheet = document.getElementById('mobile-menu-sheet');
        var bars = document.getElementById('hamburger-bars-icon');
        var close = document.getElementById('hamburger-close-icon');

        if (!btn || !sheet) return;

        function closeMenu() {
            sheet.classList.add('hidden');
            btn.setAttribute('aria-expanded', 'false');
            if (bars) bars.classList.remove('hidden');
            if (close) close.classList.add('hidden');
        }

        function openMenu() {
            sheet.classList.remove('hidden');
            btn.setAttribute('aria-expanded', 'true');
            if (bars) bars.classList.add('hidden');
            if (close) close.classList.remove('hidden');
        }

        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            var isOpen = btn.getAttribute('aria-expanded') === 'true';
            if (isOpen) {
                closeMenu();
            } else {
                openMenu();
            }
        });

        // Close on navigation link click
        var navLinks = sheet.querySelectorAll('a');
        for (var i = 0; i < navLinks.length; i++) {
            navLinks[i].addEventListener('click', function() {
                closeMenu();
            });
        }

        // Close on outside click
        document.addEventListener('click', function(e) {
            if (!sheet.contains(e.target) && !btn.contains(e.target)) {
                closeMenu();
            }
        });

        // Close on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeMenu();
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initMobileToggle);
    } else {
        initMobileToggle();
    }
})();
</script>
