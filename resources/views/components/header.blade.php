@php
    use App\Content\Navigation;
    use App\Content\Site;
@endphp

<header id="site-header" class="is-top fixed top-0 left-0 right-0 z-50 border-b border-white/80 bg-white/75 backdrop-blur-xl shadow-[inset_0_-1px_0_0_rgba(0,0,0,0.03),0_8px_32px_-4px_rgba(0,0,0,0.03)] transition-all duration-300" role="banner">
    <div class="mx-auto flex h-20 max-w-[1400px] items-center justify-between px-6 lg:px-12 transition-all duration-300">

        {{-- Brand --}}
        <a href="/" class="flex items-center text-neutral-900 transition-transform duration-200 hover:scale-[1.02] active:scale-[0.98]" aria-label="{{ Site::BRAND }} — Home">
            <span class="font-bold text-xl tracking-[0.18em] uppercase">{{ Site::BRAND }}</span>
        </a>

        {{-- Desktop Navigation (md and above only) — Clean unboxed links per reference design --}}
        <nav class="hidden items-center gap-8 md:flex" aria-label="Primary navigation">
            @foreach (Navigation::primary() as $item)
                <a href="{{ $item['href'] }}"
                   class="nav-link-indicator text-sm font-medium text-neutral-600 transition-colors duration-150 hover:text-neutral-950 {{ request()->is(ltrim($item['href'], '/') . '*') ? 'font-bold !text-neutral-950 is-active' : '' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        {{-- Actions --}}
        <div class="flex items-center gap-3">
            {{-- "Let's Build ->" CTA Button per reference design --}}
            <a href="/contact"
               class="btn-magnetic btn-magnetic-primary inline-flex items-center gap-2 rounded-xl bg-[#0F1012] border border-neutral-800 px-5 py-2.5 text-xs sm:text-sm font-semibold text-white shadow-sm transition-all duration-150 hover:bg-black hover:shadow-md active:scale-[0.97]">
                <span>Let's Build</span>
                <svg class="btn-magnetic-icon h-3.5 w-3.5 transition-transform duration-150" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </a>

            {{-- Mobile Hamburger Button — ONLY shown on mobile screens (< md: 768px), strictly hidden on PC per user instructions --}}
            <button id="mobile-menu-btn"
                    type="button"
                    class="md:hidden inline-flex h-10 w-10 items-center justify-center rounded-full bg-[#0F1012] border border-neutral-800 text-white transition-all duration-150 hover:bg-black active:scale-95 shadow-sm"
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
         class="hidden md:hidden border-t border-neutral-200/80 bg-white/95 backdrop-blur-2xl shadow-2xl transition-all duration-200">
        <div class="px-6 py-6 space-y-4 max-w-md mx-auto">
            <nav class="space-y-1" aria-label="Mobile primary navigation">
                @foreach (Navigation::primary() as $item)
                    <a href="{{ $item['href'] }}"
                       class="flex items-center justify-between px-4 py-3 rounded-2xl text-base font-semibold text-neutral-800 transition-colors hover:bg-neutral-100 active:bg-neutral-200 {{ request()->is(ltrim($item['href'], '/') . '*') ? 'bg-neutral-100 !text-neutral-900 font-bold' : '' }}">
                        <span>{{ $item['label'] }}</span>
                        <span class="text-neutral-400">&rarr;</span>
                    </a>
                @endforeach
            </nav>

            <div class="pt-4 border-t border-neutral-200/80 space-y-3">
                <a href="/contact"
                   class="w-full flex items-center justify-center gap-2 rounded-full bg-neutral-900 py-3.5 text-sm font-semibold text-white shadow-md hover:bg-black active:scale-[0.98] transition-all">
                    <span>Start a Project</span>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
                <div class="flex items-center justify-center gap-4 pt-1 font-mono text-xs text-neutral-500">
                    <a href="mailto:{{ Site::EMAIL }}" class="hover:text-neutral-900">{{ Site::EMAIL }}</a>
                    <span>&bull;</span>
                    <a href="tel:{{ str_replace(' ', '', Site::PHONE_PRIMARY) }}" class="hover:text-neutral-900">{{ Site::PHONE_PRIMARY }}</a>
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
