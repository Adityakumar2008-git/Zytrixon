@php
    use App\Content\Site;
@endphp

<x-layouts.app
    title="Zytrixon — Build What Moves Your Business Forward"
    description="Custom software, digital products and scalable solutions for ambitious businesses. We combine strategy, design and engineering to create real business impact.">

    {{-- ============================================================
         1. HERO SECTION — Exact UI Match
         Split layout: Left content + Right architectural building photo
         ============================================================ --}}
    <section class="relative overflow-hidden bg-[#FAFAFA] border-b border-neutral-200/80">
        <div class="mx-auto max-w-[1400px]">
            <div class="grid items-stretch lg:grid-cols-12 min-h-[640px] lg:min-h-[720px]">

                {{-- Left Content Column (7 cols) --}}
                <div class="flex flex-col justify-between px-6 py-12 lg:col-span-7 lg:py-20 lg:pl-12 lg:pr-8">
                    <div>
                        {{-- Eyebrow --}}
                        <p class="font-mono text-xs uppercase tracking-[0.25em] text-neutral-400">
                            TECHNOLOGY / PEOPLE / IMPACT
                        </p>

                        {{-- Display Headline --}}
                        <h1 class="mt-6 text-4xl sm:text-6xl lg:text-[72px] font-bold tracking-tight text-neutral-900 leading-[1.06]">
                            Build What<br>
                            Moves Your<br>
                            <span class="font-bold text-neutral-900">Business Forward.</span>
                        </h1>

                        {{-- Subtitle --}}
                        <p class="mt-6 max-w-lg text-base sm:text-lg text-neutral-600 leading-relaxed">
                            Custom software, digital products and scalable solutions for ambitious businesses.
                        </p>

                        {{-- Action Buttons --}}
                        <div class="mt-10 flex flex-wrap items-center gap-4">
                            <a href="/contact"
                               class="inline-flex items-center gap-2 rounded-full bg-neutral-900 px-7 py-3.5 text-sm font-semibold text-white transition-all duration-200 hover:bg-black hover:shadow-lg">
                                <span>Start a Project</span>
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </a>

                            <a href="/work"
                               class="inline-flex items-center rounded-full border border-neutral-300 bg-transparent px-7 py-3.5 text-sm font-medium text-neutral-800 transition-all duration-200 hover:border-neutral-900 hover:text-neutral-900">
                                Explore Our Work
                            </a>
                        </div>
                    </div>

                    {{-- Scroll Indicator --}}
                    <div class="mt-12 lg:mt-16 flex items-center gap-2.5">
                        <span class="h-2.5 w-2.5 rounded-full bg-[#E05338] animate-pulse"></span>
                        <span class="text-xs font-medium text-neutral-500">Scroll to explore</span>
                    </div>
                </div>

                {{-- Right Visual Column (5 cols) --}}
                <div class="relative min-h-[420px] lg:col-span-5 lg:min-h-full overflow-hidden lg:rounded-bl-[60px] bg-neutral-900">
                    <img
                        src="{{ asset('images/hero-building.png') }}"
                        alt="Zytrixon Modern Architectural Headquarters — Ideas Systems Impact"
                        class="absolute inset-0 h-full w-full object-cover object-center"
                        loading="eager"
                    />
                    {{-- Dark atmospheric gradient --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20 pointer-events-none"></div>

                    {{-- Bottom right text anchor per UI design --}}
                    <div class="absolute bottom-8 right-8 text-right text-white drop-shadow-md">
                        <p class="text-xs font-mono uppercase tracking-widest text-white/70 leading-relaxed">
                            Build<br>
                            Scale<br>
                            Grow
                        </p>
                        <span class="mt-1 inline-block text-white text-base">&rarr;</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ============================================================
         2. TRUSTED BY AMBITIOUS BUSINESSES — Logos Bar
         ============================================================ --}}
    <section class="border-b border-neutral-200/80 bg-white py-12 px-6 lg:px-12">
        <div class="mx-auto max-w-[1400px]">
            <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400 text-center lg:text-left">
                TRUSTED BY AMBITIOUS BUSINESSES
            </p>

            <div class="mt-8 flex flex-wrap items-center justify-between gap-8 opacity-75 grayscale transition-opacity hover:opacity-100">
                {{-- IndiaMART --}}
                <div class="flex items-center gap-2">
                    <span class="font-bold tracking-tight text-xl text-neutral-800">indiamart</span>
                </div>

                {{-- TATA --}}
                <div class="flex items-center gap-2">
                    <span class="font-bold tracking-[0.25em] text-xl text-neutral-800">TATA</span>
                </div>

                {{-- Microsoft --}}
                <div class="flex items-center gap-2.5">
                    <div class="grid grid-cols-2 gap-0.5 w-4 h-4">
                        <div class="bg-neutral-800"></div>
                        <div class="bg-neutral-800"></div>
                        <div class="bg-neutral-800"></div>
                        <div class="bg-neutral-800"></div>
                    </div>
                    <span class="font-semibold text-lg text-neutral-800">Microsoft</span>
                </div>

                {{-- Google --}}
                <div class="flex items-center">
                    <span class="font-medium tracking-tight text-xl text-neutral-800">Google</span>
                </div>

                {{-- Amazon --}}
                <div class="flex items-center">
                    <span class="font-bold tracking-tight text-xl text-neutral-800">amazon</span>
                </div>

                {{-- HCL --}}
                <div class="flex items-center">
                    <span class="font-extrabold tracking-wider text-xl text-neutral-800">HCL</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         3. ABOUT ZYTRIXON (Top Right block in design)
         Headline + Narrative + 4 Big Key Stats
         ============================================================ --}}
    <section class="border-b border-neutral-200/80 bg-white py-20 px-6 lg:px-12 lg:py-28" id="about">
        <div class="mx-auto max-w-[1400px]">
            {{-- Top label row --}}
            <div class="flex items-center justify-between border-b border-neutral-200/80 pb-4">
                <span class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">ABOUT ZYTRIXON</span>
                <span class="font-mono text-xs text-neutral-400">01</span>
            </div>

            <div class="mt-12 grid gap-16 lg:grid-cols-12 items-start">
                {{-- Left column: Headline & description --}}
                <div class="lg:col-span-7">
                    <h2 class="text-3xl sm:text-5xl lg:text-[52px] font-bold tracking-tight text-neutral-900 leading-[1.15]">
                        A technology partner<br>
                        for what's next.
                    </h2>

                    <p class="mt-6 max-w-xl text-base sm:text-lg text-neutral-600 leading-relaxed">
                        We help businesses build, scale and stay ahead with modern technology solutions. From idea to execution, we combine strategy, design and engineering to create real business impact.
                    </p>

                    <div class="mt-10">
                        <a href="/about" class="group inline-flex items-center gap-3 text-sm font-semibold text-neutral-900 hover:text-neutral-600">
                            <span class="flex h-10 w-10 items-center justify-center rounded-full border border-neutral-300 text-neutral-900 transition-colors group-hover:border-neutral-900 group-hover:bg-neutral-900 group-hover:text-white">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                                </svg>
                            </span>
                            <span>Learn More About Us</span>
                        </a>
                    </div>
                </div>

                {{-- Right column: 4 Key Metrics --}}
                <div class="lg:col-span-5 grid grid-cols-2 gap-x-8 gap-y-12">
                    <div>
                        <span class="block text-4xl sm:text-5xl font-bold tracking-tight text-neutral-900">100%</span>
                        <p class="mt-2 text-xs font-medium text-neutral-500">Client Satisfaction</p>
                    </div>

                    <div>
                        <span class="block text-4xl sm:text-5xl font-bold tracking-tight text-neutral-900">15+</span>
                        <p class="mt-2 text-xs font-medium text-neutral-500">Projects Delivered</p>
                    </div>

                    <div>
                        <span class="block text-4xl sm:text-5xl font-bold tracking-tight text-neutral-900">5+</span>
                        <p class="mt-2 text-xs font-medium text-neutral-500">Countries</p>
                    </div>

                    <div>
                        <span class="block text-4xl sm:text-5xl font-bold tracking-tight text-neutral-900">98%</span>
                        <p class="mt-2 text-xs font-medium text-neutral-500">On-Time Delivery</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         4. OUR SERVICES — 2x3 Grid with icons
         ============================================================ --}}
    <section class="border-b border-neutral-200/80 bg-white py-20 px-6 lg:px-12 lg:py-28" id="services">
        <div class="mx-auto max-w-[1400px]">
            <div class="grid gap-12 lg:grid-cols-12 items-start">

                {{-- Left column: Headline & Explore link --}}
                <div class="lg:col-span-4">
                    <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">OUR SERVICES</p>
                    <h2 class="mt-4 text-3xl sm:text-4xl lg:text-[44px] font-bold tracking-tight text-neutral-900 leading-[1.15]">
                        Technology solutions, built for real business needs.
                    </h2>

                    <div class="mt-10">
                        <a href="/services" class="group inline-flex items-center gap-3 text-sm font-semibold text-neutral-900 hover:text-neutral-600">
                            <span class="flex h-10 w-10 items-center justify-center rounded-full border border-neutral-300 text-neutral-900 transition-colors group-hover:border-neutral-900 group-hover:bg-neutral-900 group-hover:text-white">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </span>
                            <span>Explore All Services</span>
                        </a>
                    </div>
                </div>

                {{-- Right column: 2x3 Services Grid --}}
                <div class="lg:col-span-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

                    {{-- 1. Custom Software Development --}}
                    <a href="/services/custom-software"
                       class="group rounded-2xl border border-neutral-200/80 bg-[#F7F7F8] p-6 transition-all duration-200 hover:bg-white hover:border-neutral-400 hover:shadow-sm">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white border border-neutral-200 text-neutral-800">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                            </svg>
                        </div>
                        <div class="mt-8 flex items-center justify-between">
                            <h3 class="text-base font-semibold text-neutral-900">Custom Software Development</h3>
                            <span class="text-neutral-400 transition-transform group-hover:translate-x-1 group-hover:text-neutral-900">&rarr;</span>
                        </div>
                    </a>

                    {{-- 2. Web Development --}}
                    <a href="/services/web-development"
                       class="group rounded-2xl border border-neutral-200/80 bg-[#F7F7F8] p-6 transition-all duration-200 hover:bg-white hover:border-neutral-400 hover:shadow-sm">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white border border-neutral-200 text-neutral-800">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0H3" />
                            </svg>
                        </div>
                        <div class="mt-8 flex items-center justify-between">
                            <h3 class="text-base font-semibold text-neutral-900">Web Development</h3>
                            <span class="text-neutral-400 transition-transform group-hover:translate-x-1 group-hover:text-neutral-900">&rarr;</span>
                        </div>
                    </a>

                    {{-- 3. Mobile App Development --}}
                    <a href="/services/app-development"
                       class="group rounded-2xl border border-neutral-200/80 bg-[#F7F7F8] p-6 transition-all duration-200 hover:bg-white hover:border-neutral-400 hover:shadow-sm">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white border border-neutral-200 text-neutral-800">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                            </svg>
                        </div>
                        <div class="mt-8 flex items-center justify-between">
                            <h3 class="text-base font-semibold text-neutral-900">Mobile App Development</h3>
                            <span class="text-neutral-400 transition-transform group-hover:translate-x-1 group-hover:text-neutral-900">&rarr;</span>
                        </div>
                    </a>

                    {{-- 4. AI & Automation --}}
                    <a href="/services/ai-automation"
                       class="group rounded-2xl border border-neutral-200/80 bg-[#F7F7F8] p-6 transition-all duration-200 hover:bg-white hover:border-neutral-400 hover:shadow-sm">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white border border-neutral-200 text-neutral-800">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456Z" />
                            </svg>
                        </div>
                        <div class="mt-8 flex items-center justify-between">
                            <h3 class="text-base font-semibold text-neutral-900">AI & Automation</h3>
                            <span class="text-neutral-400 transition-transform group-hover:translate-x-1 group-hover:text-neutral-900">&rarr;</span>
                        </div>
                    </a>

                    {{-- 5. UI/UX Design --}}
                    <a href="/services/web-development"
                       class="group rounded-2xl border border-neutral-200/80 bg-[#F7F7F8] p-6 transition-all duration-200 hover:bg-white hover:border-neutral-400 hover:shadow-sm">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white border border-neutral-200 text-neutral-800">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </div>
                        <div class="mt-8 flex items-center justify-between">
                            <h3 class="text-base font-semibold text-neutral-900">UI/UX Design</h3>
                            <span class="text-neutral-400 transition-transform group-hover:translate-x-1 group-hover:text-neutral-900">&rarr;</span>
                        </div>
                    </a>

                    {{-- 6. Digital Consultancy --}}
                    <a href="/services/iot-solutions"
                       class="group rounded-2xl border border-neutral-200/80 bg-[#F7F7F8] p-6 transition-all duration-200 hover:bg-white hover:border-neutral-400 hover:shadow-sm">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white border border-neutral-200 text-neutral-800">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                            </svg>
                        </div>
                        <div class="mt-8 flex items-center justify-between">
                            <h3 class="text-base font-semibold text-neutral-900">Digital Consultancy</h3>
                            <span class="text-neutral-400 transition-transform group-hover:translate-x-1 group-hover:text-neutral-900">&rarr;</span>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         5. FEATURED WORK — Dark Obsidian Showcase (Exact UI Match)
         Laptop mockup + Project Info + 01/03 carousel
         ============================================================ --}}
    <section class="py-12 px-4 sm:px-6 lg:px-8 bg-white" id="work">
        <div class="mx-auto max-w-[1400px]">
            <div class="rounded-3xl bg-[#0E0F12] text-white p-8 sm:p-12 lg:p-16 relative overflow-hidden shadow-2xl">

                {{-- Header line --}}
                <div class="flex items-center justify-between border-b border-white/10 pb-6">
                    <span class="font-mono text-xs uppercase tracking-[0.2em] text-white/50">FEATURED WORK</span>
                    <span class="font-mono text-xs text-white/50">02</span>
                </div>

                <div class="mt-12 grid gap-12 lg:grid-cols-12 items-center">
                    {{-- Left column: Headline & project info --}}
                    <div class="lg:col-span-5 flex flex-col justify-between">
                        <div>
                            <h2 class="text-3xl sm:text-5xl lg:text-[52px] font-bold tracking-tight text-white leading-[1.12]">
                                Real businesses.<br>
                                Real results.
                            </h2>

                            <div class="mt-8">
                                <a href="/work" class="group inline-flex items-center gap-3 text-sm font-medium text-white/80 hover:text-white">
                                    <span class="flex h-9 w-9 items-center justify-center rounded-full border border-white/30 transition-colors group-hover:border-white group-hover:bg-white group-hover:text-black">
                                        &rarr;
                                    </span>
                                    <span>View All Projects</span>
                                </a>
                            </div>
                        </div>

                        {{-- Project tag card --}}
                        <div class="mt-16 border-t border-white/10 pt-8">
                            <p class="text-lg font-semibold text-white">E-Commerce Platform</p>
                            <p class="text-sm text-white/60 mt-1">Scalable marketplace solution</p>
                        </div>
                    </div>

                    {{-- Right column: Laptop Mockup on Rocks + Pagination --}}
                    <div class="lg:col-span-7">
                        <div class="relative overflow-hidden rounded-2xl border border-white/10 bg-black/40 shadow-inner">
                            <img
                                src="{{ asset('images/work-laptop.png') }}"
                                alt="Zytrixon E-Commerce Platform on modern laptop display"
                                class="w-full h-auto object-cover rounded-2xl"
                                loading="lazy"
                            />
                        </div>

                        {{-- Pagination and arrows --}}
                        <div class="mt-6 flex items-center justify-between">
                            <span class="font-mono text-xs text-white/60 tracking-wider">01 / 03</span>
                            <div class="flex items-center gap-2">
                                <button class="flex h-9 w-9 items-center justify-center rounded-full border border-white/20 text-white/70 hover:border-white hover:text-white transition-colors" aria-label="Previous project">
                                    &larr;
                                </button>
                                <button class="flex h-9 w-9 items-center justify-center rounded-full border border-white/20 text-white/70 hover:border-white hover:text-white transition-colors" aria-label="Next project">
                                    &rarr;
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    {{-- ============================================================
         6. OUR PROCESS — 4-Stage Horizontal Timeline
         ============================================================ --}}
    <section class="border-b border-neutral-200/80 bg-white py-20 px-6 lg:px-12 lg:py-24" id="process">
        <div class="mx-auto max-w-[1400px]">
            <div class="flex items-center justify-between border-b border-neutral-200/80 pb-4">
                <span class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">OUR PROCESS</span>
                <span class="text-neutral-400">&rarr;</span>
            </div>

            <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                {{-- 01 Understand --}}
                <div class="space-y-3">
                    <span class="font-mono text-xs text-neutral-400">01</span>
                    <h3 class="text-xl font-bold text-neutral-900">Understand</h3>
                    <p class="text-sm text-neutral-600 leading-relaxed">
                        Your goals, users and business context.
                    </p>
                </div>

                {{-- 02 Plan --}}
                <div class="space-y-3">
                    <span class="font-mono text-xs text-neutral-400">02</span>
                    <h3 class="text-xl font-bold text-neutral-900">Plan</h3>
                    <p class="text-sm text-neutral-600 leading-relaxed">
                        Strategy, roadmap and technology selection.
                    </p>
                </div>

                {{-- 03 Build --}}
                <div class="space-y-3">
                    <span class="font-mono text-xs text-neutral-400">03</span>
                    <h3 class="text-xl font-bold text-neutral-900">Build</h3>
                    <p class="text-sm text-neutral-600 leading-relaxed">
                        Agile development with transparent updates.
                    </p>
                </div>

                {{-- 04 Scale --}}
                <div class="space-y-3">
                    <span class="font-mono text-xs text-neutral-400">04</span>
                    <h3 class="text-xl font-bold text-neutral-900">Scale</h3>
                    <p class="text-sm text-neutral-600 leading-relaxed">
                        Ongoing support and continuous improvement.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         7. WHAT OUR CLIENTS SAY — Dark Testimonial Banner
         ============================================================ --}}
    <section class="py-10 px-4 sm:px-6 lg:px-8 bg-white" id="testimonials">
        <div class="mx-auto max-w-[1400px]">
            <div class="rounded-3xl bg-[#0A0A0B] text-white p-8 sm:p-12 lg:p-16 relative overflow-hidden">

                {{-- Label & Controls row --}}
                <div class="flex items-center justify-between border-b border-white/10 pb-6">
                    <span class="font-mono text-xs uppercase tracking-[0.2em] text-white/50">WHAT OUR CLIENTS SAY</span>
                    <div class="flex items-center gap-2">
                        <button class="flex h-8 w-8 items-center justify-center rounded-full border border-white/20 text-white/70 hover:border-white hover:text-white transition-colors" aria-label="Previous testimonial">
                            &larr;
                        </button>
                        <button class="flex h-8 w-8 items-center justify-center rounded-full border border-white/20 text-white/70 hover:border-white hover:text-white transition-colors" aria-label="Next testimonial">
                            &rarr;
                        </button>
                    </div>
                </div>

                {{-- Testimonial Content --}}
                <div class="mt-12 max-w-3xl">
                    <blockquote class="text-2xl sm:text-3xl lg:text-4xl font-normal leading-snug tracking-tight text-white/95">
                        &ldquo;Zytrixon delivered exactly what we needed with great professionalism. Highly recommended!&rdquo;
                    </blockquote>

                    <div class="mt-8 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <img
                                src="{{ asset('images/testimonial-rahul.jpg') }}"
                                alt="Rahul Mehta — Business Owner"
                                class="h-11 w-11 rounded-full object-cover border border-white/20"
                                loading="lazy"
                            />
                            <div>
                                <p class="text-sm font-semibold text-white">Rahul Mehta</p>
                                <p class="text-xs text-white/60">Business Owner</p>
                            </div>
                        </div>

                        {{-- Minimal slide indicator line --}}
                        <div class="hidden sm:flex items-center gap-1.5">
                            <span class="h-0.5 w-10 bg-white"></span>
                            <span class="h-0.5 w-6 bg-white/30"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ============================================================
         8. INSIGHTS — 3 Editorial Articles with 16:9 Photography
         ============================================================ --}}
    <section class="border-b border-neutral-200/80 bg-white py-20 px-6 lg:px-12 lg:py-28" id="insights">
        <div class="mx-auto max-w-[1400px]">
            {{-- Header row --}}
            <div class="flex items-center justify-between border-b border-neutral-200/80 pb-4">
                <span class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">INSIGHTS</span>
                <span class="font-mono text-xs text-neutral-400">03</span>
            </div>

            <div class="mt-8 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-neutral-900">
                    Ideas, strategies and<br>technology for what's next.
                </h2>
                <a href="#insights" class="inline-flex items-center gap-2 text-sm font-semibold text-neutral-900 hover:text-neutral-600">
                    <span>View All Articles</span>
                    <span>&rarr;</span>
                </a>
            </div>

            {{-- 3 Article Cards --}}
            <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">

                {{-- Article 1 --}}
                <article class="group">
                    <div class="overflow-hidden rounded-2xl bg-neutral-100 aspect-[16/10]">
                        <img
                            src="{{ asset('images/insight-ai-mountain.jpg') }}"
                            alt="The Future of AI in Business"
                            class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                            loading="lazy"
                        />
                    </div>
                    <div class="mt-5">
                        <h3 class="text-lg font-bold text-neutral-900 group-hover:text-neutral-600 transition-colors">
                            The Future of AI in Business
                        </h3>
                        <div class="mt-3 flex items-center justify-between text-xs text-neutral-500 font-mono">
                            <span>Sep 12, 2024</span>
                            <span class="group-hover:translate-x-1 transition-transform text-neutral-900">&rarr;</span>
                        </div>
                    </div>
                </article>

                {{-- Article 2 --}}
                <article class="group">
                    <div class="overflow-hidden rounded-2xl bg-neutral-100 aspect-[16/10]">
                        <img
                            src="{{ asset('images/insight-custom-software.jpg') }}"
                            alt="Why Custom Software Wins"
                            class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                            loading="lazy"
                        />
                    </div>
                    <div class="mt-5">
                        <h3 class="text-lg font-bold text-neutral-900 group-hover:text-neutral-600 transition-colors">
                            Why Custom Software Wins
                        </h3>
                        <div class="mt-3 flex items-center justify-between text-xs text-neutral-500 font-mono">
                            <span>Aug 28, 2024</span>
                            <span class="group-hover:translate-x-1 transition-transform text-neutral-900">&rarr;</span>
                        </div>
                    </div>
                </article>

                {{-- Article 3 --}}
                <article class="group">
                    <div class="overflow-hidden rounded-2xl bg-neutral-100 aspect-[16/10]">
                        <img
                            src="{{ asset('images/insight-scalable-architecture.jpg') }}"
                            alt="How to Build Scalable Products"
                            class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                            loading="lazy"
                        />
                    </div>
                    <div class="mt-5">
                        <h3 class="text-lg font-bold text-neutral-900 group-hover:text-neutral-600 transition-colors">
                            How to Build Scalable Products
                        </h3>
                        <div class="mt-3 flex items-center justify-between text-xs text-neutral-500 font-mono">
                            <span>Aug 10, 2024</span>
                            <span class="group-hover:translate-x-1 transition-transform text-neutral-900">&rarr;</span>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>

    {{-- ============================================================
         9. READY TO BUILD? — Diagonal Split CTA Banner
         ============================================================ --}}
    <section class="py-12 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="mx-auto max-w-[1400px]">
            <div class="relative overflow-hidden rounded-3xl border border-neutral-200/80 bg-[#F7F7F8] grid lg:grid-cols-12 items-stretch shadow-sm">

                {{-- Left Content Area (8 cols) --}}
                <div class="p-8 sm:p-12 lg:p-16 lg:col-span-8 flex flex-col justify-between">
                    <div>
                        <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">READY TO BUILD?</p>
                        <h2 class="mt-4 text-3xl sm:text-5xl font-bold tracking-tight text-neutral-900 leading-[1.12]">
                            Let's turn your idea<br>into real impact.
                        </h2>
                    </div>

                    <div class="mt-10">
                        <a href="/contact"
                           class="inline-flex items-center gap-2 rounded-full bg-neutral-900 px-7 py-3.5 text-sm font-semibold text-white transition-all duration-200 hover:bg-black hover:shadow-lg">
                            <span>Start a Conversation</span>
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Right Dark Angled Wing (4 cols) --}}
                <div class="relative hidden lg:flex lg:col-span-4 bg-[#111113] text-white p-12 flex-col justify-center items-start overflow-hidden">
                    {{-- Diagonal architectural lines --}}
                    <div class="absolute inset-0 opacity-20 bg-[linear-gradient(135deg,rgba(255,255,255,0.15)_1px,transparent_1px)] bg-[size:40px_40px] pointer-events-none"></div>

                    {{-- Vertical Typography matching UI design --}}
                    <div class="relative z-10 space-y-2 font-mono text-xs uppercase tracking-[0.3em] text-white/70">
                        <p class="font-semibold text-white">IDEAS</p>
                        <p>TECHNOLOGY</p>
                        <p>PEOPLE</p>
                        <p>IMPACT</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

</x-layouts.app>
