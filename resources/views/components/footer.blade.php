@php
    use App\Content\Navigation;
    use App\Content\Site;
@endphp

<footer class="border-t border-neutral-200/80 dark:border-neutral-800/80 bg-white dark:bg-[#0A0A0B]" role="contentinfo">
    <div class="mx-auto max-w-[1400px] px-6 py-16 lg:px-12 lg:py-20">

        {{-- Final Statement Banner --}}
        <div class="border-b border-neutral-200/80 dark:border-neutral-800/80 pb-12 mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <span class="font-mono text-xs uppercase tracking-[0.25em] text-neutral-400 block mb-3">08 / INITIATE</span>
                <h2 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-neutral-950 dark:text-white uppercase leading-[0.98]">
                    Let's build<br>what's next.
                </h2>
            </div>
            <a href="/contact" class="btn-magnetic btn-magnetic-primary inline-flex items-center gap-3 rounded-full bg-neutral-950 dark:bg-[#18191E] dark:border dark:border-neutral-700 dark:hover:bg-[#22242B] px-8 py-4 text-sm font-semibold text-white shadow-xl hover:bg-black transition-all">
                <span>Start a Conversation</span>
                <span class="btn-magnetic-icon">&rarr;</span>
            </a>
        </div>

        <div class="grid gap-12 lg:grid-cols-12">

            {{-- Brand Column (3 cols) --}}
            <div class="lg:col-span-3 space-y-4">
                <a href="/" class="text-xl font-bold tracking-[0.18em] text-neutral-900 dark:text-white uppercase" aria-label="{{ Site::BRAND }} — Home">
                    {{ Site::BRAND }}
                </a>
                <p class="text-sm text-neutral-500 dark:text-neutral-400 max-w-xs">
                    Technology for a better tomorrow.
                </p>

                {{-- Social Icons --}}
                <div class="flex items-center gap-3 pt-2">
                    {{-- LinkedIn --}}
                    <a href="#" class="flex h-9 w-9 items-center justify-center rounded-full border border-neutral-200 dark:border-neutral-800 bg-white dark:bg-[#141519] text-neutral-600 dark:text-neutral-400 transition-colors hover:border-neutral-900 dark:hover:border-white hover:text-neutral-900 dark:hover:text-white" aria-label="LinkedIn">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 8.76a1.64 1.64 0 1 0 0-3.28 1.64 1.64 0 0 0 0 3.28m1.39 9.74v-8.37H5.07v8.37h2.78Z"/></svg>
                    </a>
                    {{-- Twitter / X --}}
                    <a href="#" class="flex h-9 w-9 items-center justify-center rounded-full border border-neutral-200 dark:border-neutral-800 bg-white dark:bg-[#141519] text-neutral-600 dark:text-neutral-400 transition-colors hover:border-neutral-900 dark:hover:border-white hover:text-neutral-900 dark:hover:text-white" aria-label="X / Twitter">
                        <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    {{-- Instagram --}}
                    <a href="#" class="flex h-9 w-9 items-center justify-center rounded-full border border-neutral-200 dark:border-neutral-800 bg-white dark:bg-[#141519] text-neutral-600 dark:text-neutral-400 transition-colors hover:border-neutral-900 dark:hover:border-white hover:text-neutral-900 dark:hover:text-white" aria-label="Instagram">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    {{-- YouTube --}}
                    <a href="#" class="flex h-9 w-9 items-center justify-center rounded-full border border-neutral-200 dark:border-neutral-800 bg-white dark:bg-[#141519] text-neutral-600 dark:text-neutral-400 transition-colors hover:border-neutral-900 dark:hover:border-white hover:text-neutral-900 dark:hover:text-white" aria-label="YouTube">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                </div>
            </div>

            {{-- Nav Columns (5 cols) --}}
            <div class="lg:col-span-5 grid grid-cols-3 gap-8">
                {{-- Services --}}
                <div>
                    <h3 class="text-sm font-semibold text-neutral-900 dark:text-white">Services</h3>
                    <ul class="mt-4 space-y-2.5 text-sm text-neutral-600 dark:text-neutral-400" role="list">
                        <li><a href="/services/custom-software" class="hover:text-neutral-900 dark:hover:text-white transition-colors">Custom Software</a></li>
                        <li><a href="/services/web-development" class="hover:text-neutral-900 dark:hover:text-white transition-colors">Web Development</a></li>
                        <li><a href="/services/app-development" class="hover:text-neutral-900 dark:hover:text-white transition-colors">Mobile Apps</a></li>
                        <li><a href="/services/ai-automation" class="hover:text-neutral-900 dark:hover:text-white transition-colors">AI & Automation</a></li>
                        <li><a href="/services/web-development" class="hover:text-neutral-900 dark:hover:text-white transition-colors">UI/UX Design</a></li>
                        <li><a href="/services/iot-solutions" class="hover:text-neutral-900 dark:hover:text-white transition-colors">Digital Consultancy</a></li>
                    </ul>
                </div>

                {{-- Company --}}
                <div>
                    <h3 class="text-sm font-semibold text-neutral-900 dark:text-white">Company</h3>
                    <ul class="mt-4 space-y-2.5 text-sm text-neutral-600 dark:text-neutral-400" role="list">
                        <li><a href="/about" class="hover:text-neutral-900 dark:hover:text-white transition-colors">About Us</a></li>
                        <li><a href="/work" class="hover:text-neutral-900 dark:hover:text-white transition-colors">Our Work</a></li>
                        <li><a href="/#insights" class="hover:text-neutral-900 dark:hover:text-white transition-colors">Insights</a></li>
                        <li><a href="/about#careers" class="hover:text-neutral-900 dark:hover:text-white transition-colors">Careers</a></li>
                        <li><a href="/contact" class="hover:text-neutral-900 dark:hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>

                {{-- Legal --}}
                <div>
                    <h3 class="text-sm font-semibold text-neutral-900 dark:text-white">Legal</h3>
                    <ul class="mt-4 space-y-2.5 text-sm text-neutral-600 dark:text-neutral-400" role="list">
                        <li><a href="#" class="hover:text-neutral-900 dark:hover:text-white transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-neutral-900 dark:hover:text-white transition-colors">Terms of Service</a></li>
                    </ul>
                </div>
            </div>

            {{-- Newsletter / Stay in touch (4 cols) --}}
            <div class="lg:col-span-4 space-y-3">
                <h3 class="text-sm font-semibold text-neutral-900 dark:text-white">Stay in touch</h3>
                <p class="text-sm text-neutral-500 dark:text-neutral-400">
                    Get the latest insights and updates.
                </p>

                <form action="/contact" method="GET" class="relative mt-4 flex items-center">
                    <input
                        type="email"
                        placeholder="Enter your email"
                        class="w-full rounded-full border border-neutral-300 dark:border-neutral-700/80 bg-white dark:bg-[#16171B] px-5 py-3 pr-12 text-sm text-neutral-900 dark:text-white placeholder:text-neutral-400 dark:placeholder:text-neutral-500 focus:border-neutral-900 dark:focus:border-white focus:outline-none focus:ring-1 focus:ring-neutral-900 dark:focus:ring-white"
                    />
                    <button type="submit" class="absolute right-1.5 flex h-9 w-9 items-center justify-center rounded-full bg-neutral-900 dark:bg-[#22242B] dark:border dark:border-neutral-700 text-white transition-colors hover:bg-black dark:hover:bg-[#2C2E38]" aria-label="Subscribe">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </button>
                </form>
            </div>

        </div>

        {{-- Bottom Bar --}}
        <div class="mt-16 flex flex-col items-center justify-between gap-4 border-t border-neutral-200/80 dark:border-neutral-800/80 pt-8 text-xs text-neutral-500 dark:text-neutral-400 sm:flex-row">
            <p>
                &copy; {{ date('Y') }} Zytrixon. All rights reserved.
            </p>
            <p class="flex items-center gap-1">
                Built with purpose in India <span class="text-red-500">❤️</span>
            </p>
        </div>

    </div>
</footer>
