@php
    use App\Content\Site;
@endphp

<x-layouts.app
    title="Zytrixon — We Engineer Digital Dominance"
    description="Enterprise-grade Web, Mobile, and IoT solutions. Zytrixon combines business intelligence, design and engineering to build what moves your business forward.">

    {{-- ============================================================
         1. HERO SECTION — Signature Editorial Composition
         Architectural typography + Sliced visual + Subtle parallax + Technical metadata
         ============================================================ --}}
    <section id="hero-section" class="reveal relative overflow-hidden bg-white dark:bg-[#0A0A0B] border-b border-neutral-200/80 dark:border-neutral-800/80 min-h-[640px] lg:min-h-[780px] xl:min-h-[840px] flex items-center">
        
        {{-- Right Visual: Exact Roof & Architectural Slice matching user line (desktop: lg and up) --}}
        <div class="hidden lg:block absolute inset-0 w-full h-full z-0 overflow-hidden clip-hero-roof select-none pointer-events-none">
            <div id="hero-visual-slice" class="absolute inset-y-0 right-0 w-[76%] xl:w-[72%] h-full bg-neutral-900 transition-transform duration-500 ease-out will-change-transform">
                <img
                    src="{{ asset('images/hero-building.png') }}"
                    alt="Zytrixon Modern Architectural Headquarters"
                    class="h-full w-full object-cover object-right pointer-events-none"
                    loading="eager"
                />
                {{-- Atmospheric overlay --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-black/10 pointer-events-none"></div>

                {{-- Bottom right "Build Scale Grow --->" per reference design --}}
                <div class="absolute bottom-12 right-12 xl:bottom-16 xl:right-16 text-left pointer-events-none select-none">
                    <div class="space-y-1 font-mono text-xs tracking-widest uppercase text-white/70">
                        <p>Build</p>
                        <p>Scale</p>
                        <p>Grow</p>
                    </div>
                    <div class="mt-2 flex items-center gap-1.5 text-white/60">
                        <span class="h-[1.5px] w-7 bg-white/60"></span>
                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Left Content Container --}}
        <div class="relative z-10 mx-auto w-full max-w-[1400px] px-6 lg:px-12 py-16 lg:py-24">
            <div class="max-w-2xl lg:max-w-[56%]">
                {{-- Editorial Eyebrow --}}
                <div class="flex items-center gap-3">
                    <span class="font-mono text-xs uppercase tracking-[0.25em] text-neutral-400">
                        01 / TECHNOLOGY • BUSINESS • ENGINEERING
                    </span>
                </div>

                {{-- Architectural Display Headline with Masked Line Reveals --}}
                <h1 class="mt-6 text-4xl sm:text-6xl lg:text-[74px] xl:text-[88px] font-black tracking-tight leading-[0.96] text-neutral-950 dark:text-white uppercase">
                    <span class="reveal-line-wrap">
                        <span class="reveal-line">We Engineer</span>
                    </span>
                    <span class="reveal-line-wrap">
                        <span class="hero-title-glass reveal-line reveal-line-delay-1">Digital</span>
                    </span>
                    <span class="reveal-line-wrap">
                        <span class="text-neutral-950 dark:text-white font-black reveal-line reveal-line-delay-2">Dominance.</span>
                    </span>
                </h1>

                {{-- Subtitle / Mission Statement --}}
                <p class="reveal-fade-up mt-6 max-w-lg text-base sm:text-lg text-neutral-600 dark:text-neutral-400 leading-relaxed font-normal">
                    Build What moves your Business Forward. Custom software, enterprise digital products, and scalable systems engineered for real-world impact.
                </p>

                {{-- Action Buttons --}}
                <div class="reveal-fade-up mt-10 flex flex-wrap items-center gap-6">
                    <a href="/contact"
                       class="btn-magnetic btn-magnetic-primary inline-flex items-center gap-3 rounded-full bg-[#0F1012] dark:bg-[#18191E] dark:border dark:border-neutral-700 dark:hover:bg-[#22242B] px-8 py-4 text-sm font-semibold text-white shadow-xl transition-all duration-200 hover:bg-black hover:shadow-2xl active:scale-[0.97]">
                        <span>Start a Project</span>
                        <svg class="btn-magnetic-icon h-4 w-4 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>

                    <a href="/work"
                       class="btn-magnetic inline-flex items-center gap-2 text-sm sm:text-base font-semibold text-neutral-800 dark:text-neutral-300 transition-colors duration-200 hover:text-neutral-950 dark:hover:text-white py-3 group">
                        <span>Explore Our Work</span>
                        <span class="transition-transform duration-200 group-hover:translate-x-1">&rarr;</span>
                    </a>
                </div>

                {{-- Mobile Visual (< lg only) --}}
                <div class="lg:hidden relative w-full h-[320px] sm:h-[400px] mt-10 overflow-hidden rounded-2xl bg-neutral-900 shadow-xl">
                    <img
                        src="{{ asset('images/hero-building.png') }}"
                        alt="Zytrixon Modern Architectural Headquarters"
                        class="h-full w-full object-cover object-center"
                        loading="eager"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-black/20 pointer-events-none"></div>

                    <div class="absolute bottom-6 right-6 text-right text-white">
                        <p class="text-xs font-mono uppercase tracking-widest text-white/80 leading-relaxed">
                            Build<br>Scale<br>Grow
                        </p>
                        <span class="text-white text-sm">&rarr;</span>
                    </div>
                </div>

                {{-- Editorial Scroll Indicator --}}
                <div class="mt-12 lg:mt-16 flex items-center gap-3 font-mono text-xs text-neutral-500 uppercase tracking-widest">
                    <span class="font-bold text-neutral-900 dark:text-white">01</span>
                    <span>/</span>
                    <span>SCROLL TO EXPLORE</span>
                    <span class="inline-block animate-bounce">&darr;</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         2. KINETIC CAPABILITY MARQUEE
         Full-width seamless kinetic typography band
         ============================================================ --}}
    <section class="marquee-wrap border-y border-neutral-200/80 dark:border-neutral-800/80 bg-neutral-950 text-white py-4 sm:py-5 select-none" aria-hidden="true">
        <div class="marquee-track flex items-center gap-8 font-mono text-xs sm:text-sm tracking-[0.25em] uppercase font-semibold">
            <span>WEB DEVELOPMENT</span> <span class="text-neutral-600">—</span>
            <span>AI & AUTOMATION</span> <span class="text-neutral-600">—</span>
            <span>MOBILE APP DEVELOPMENT</span> <span class="text-neutral-600">—</span>
            <span>IoT SOLUTIONS</span> <span class="text-neutral-600">—</span>
            <span>CUSTOM SOFTWARE</span> <span class="text-neutral-600">—</span>
            <span>DIGITAL MARKETING</span> <span class="text-neutral-600">—</span>
            <span>ENTERPRISE ARCHITECTURE</span> <span class="text-neutral-600">—</span>
            <span>WEB DEVELOPMENT</span> <span class="text-neutral-600">—</span>
            <span>AI & AUTOMATION</span> <span class="text-neutral-600">—</span>
            <span>MOBILE APP DEVELOPMENT</span> <span class="text-neutral-600">—</span>
            <span>IoT SOLUTIONS</span> <span class="text-neutral-600">—</span>
            <span>CUSTOM SOFTWARE</span> <span class="text-neutral-600">—</span>
            <span>DIGITAL MARKETING</span> <span class="text-neutral-600">—</span>
            <span>ENTERPRISE ARCHITECTURE</span> <span class="text-neutral-600">—</span>
        </div>
    </section>

    {{-- ============================================================
         3. TRUSTED BY AMBITIOUS BUSINESSES — Clean Editorial Bar
         ============================================================ --}}
    <section class="border-b border-neutral-200/80 dark:border-neutral-800/80 bg-white dark:bg-[#0A0A0B] py-12 px-6 lg:px-12">
        <div class="mx-auto max-w-[1400px]">
            <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400 text-center lg:text-left">
                TRUSTED BY AMBITIOUS BUSINESSES
            </p>

            <div class="mt-8 flex flex-wrap items-center justify-between gap-8 opacity-75 grayscale transition-opacity hover:opacity-100">
                <div class="flex items-center gap-2">
                    <span class="font-bold tracking-tight text-xl text-neutral-800 dark:text-neutral-300">indiamart</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="font-bold tracking-[0.25em] text-xl text-neutral-800 dark:text-neutral-300">TATA</span>
                </div>
                <div class="flex items-center gap-2.5">
                    <div class="grid grid-cols-2 gap-0.5 w-4 h-4">
                        <div class="bg-neutral-800 dark:bg-neutral-300"></div>
                        <div class="bg-neutral-800 dark:bg-neutral-300"></div>
                        <div class="bg-neutral-800 dark:bg-neutral-300"></div>
                        <div class="bg-neutral-800 dark:bg-neutral-300"></div>
                    </div>
                    <span class="font-semibold text-lg text-neutral-800 dark:text-neutral-300">Microsoft</span>
                </div>
                <div class="flex items-center">
                    <span class="font-medium tracking-tight text-xl text-neutral-800 dark:text-neutral-300">Google</span>
                </div>
                <div class="flex items-center">
                    <span class="font-bold tracking-tight text-xl text-neutral-800 dark:text-neutral-300">amazon</span>
                </div>
                <div class="flex items-center">
                    <span class="font-extrabold tracking-wider text-xl text-neutral-800 dark:text-neutral-300">HCL</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         4. ABOUT / POSITIONING — Large Editorial Statement (No Cards)
         Oversized Typography + Horizontal Metric Rules
         ============================================================ --}}
    <section class="reveal border-b border-neutral-200/80 dark:border-neutral-800/80 bg-white dark:bg-[#0A0A0B] py-20 px-6 lg:px-12 lg:py-28" id="about">
        <div class="mx-auto max-w-[1400px]">
            {{-- Top label row --}}
            <div class="flex items-center justify-between border-b border-neutral-200/80 dark:border-neutral-800/80 pb-4">
                <span class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">02 / POSITIONING</span>
                <span class="font-mono text-xs text-neutral-400">02</span>
            </div>

            <div class="mt-12 grid gap-16 lg:grid-cols-12 items-start">
                {{-- Left column: Dominant Statement --}}
                <div class="lg:col-span-7">
                    <h2 class="text-3xl sm:text-5xl lg:text-[60px] font-black tracking-tight text-neutral-950 dark:text-white leading-[1.02] uppercase">
                        <span class="reveal-line-wrap"><span class="reveal-line">We don't just</span></span>
                        <span class="reveal-line-wrap"><span class="reveal-line reveal-line-delay-1">build software.</span></span>
                        <span class="reveal-line-wrap"><span class="reveal-line reveal-line-delay-2 text-neutral-400 dark:text-neutral-500">We solve business</span></span>
                        <span class="reveal-line-wrap"><span class="reveal-line reveal-line-delay-3">problems.</span></span>
                    </h2>

                    <p class="reveal-fade-up mt-8 max-w-xl text-base sm:text-lg text-neutral-600 dark:text-neutral-400 leading-relaxed font-normal">
                        We help organizations build, scale and stay ahead with modern technology solutions. From strategic conception to resilient production engineering, we deliver deterministic digital impact.
                    </p>

                    <div class="reveal-fade-up mt-10">
                        <a href="/about" class="btn-magnetic group inline-flex items-center gap-3 text-sm font-semibold text-neutral-900 dark:text-white hover:text-neutral-600 dark:hover:text-neutral-300">
                            <span class="flex h-11 w-11 items-center justify-center rounded-full border border-neutral-300 dark:border-neutral-700 text-neutral-900 dark:text-white transition-colors group-hover:border-neutral-900 dark:group-hover:border-white group-hover:bg-neutral-900 dark:group-hover:bg-white group-hover:text-white dark:group-hover:text-neutral-950">
                                <svg class="btn-magnetic-icon h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                                </svg>
                            </span>
                            <span>Learn More About Us</span>
                        </a>
                    </div>
                </div>

                {{-- Right column: Editorial Metric Rules (Cards eliminated) --}}
                <div class="lg:col-span-5 space-y-6">
                    <div class="border-t border-neutral-200/80 dark:border-neutral-800/80 pt-6 flex items-baseline justify-between">
                        <div>
                            <span class="font-mono text-xs uppercase tracking-widest text-neutral-400 block">01 / CLIENT COMMITMENT</span>
                            <p class="text-sm text-neutral-600 dark:text-neutral-400 mt-1">Satisfaction rate across all delivered systems</p>
                        </div>
                        <span class="text-4xl sm:text-5xl font-black tracking-tight text-neutral-900 dark:text-white font-mono">100%</span>
                    </div>

                    <div class="border-t border-neutral-200/80 dark:border-neutral-800/80 pt-6 flex items-baseline justify-between">
                        <div>
                            <span class="font-mono text-xs uppercase tracking-widest text-neutral-400 block">02 / PROVEN TRACK RECORD</span>
                            <p class="text-sm text-neutral-600 dark:text-neutral-400 mt-1">Production solutions engineered & deployed</p>
                        </div>
                        <span class="text-4xl sm:text-5xl font-black tracking-tight text-neutral-900 dark:text-white font-mono">15+</span>
                    </div>

                    <div class="border-t border-neutral-200/80 dark:border-neutral-800/80 pt-6 flex items-baseline justify-between">
                        <div>
                            <span class="font-mono text-xs uppercase tracking-widest text-neutral-400 block">03 / GLOBAL REACH</span>
                            <p class="text-sm text-neutral-600 dark:text-neutral-400 mt-1">Cross-border market presence & clients</p>
                        </div>
                        <span class="text-4xl sm:text-5xl font-black tracking-tight text-neutral-900 dark:text-white font-mono">5+</span>
                    </div>

                    <div class="border-t border-neutral-200/80 dark:border-neutral-800/80 pt-6 flex items-baseline justify-between">
                        <div>
                            <span class="font-mono text-xs uppercase tracking-widest text-neutral-400 block">04 / TIMELINE PRECISION</span>
                            <p class="text-sm text-neutral-600 dark:text-neutral-400 mt-1">Milestone on-time delivery metric</p>
                        </div>
                        <span class="text-4xl sm:text-5xl font-black tracking-tight text-neutral-900 dark:text-white font-mono">98%</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         5. ARCHITECTURAL TYPOGRAPHIC DIVIDER
         Giant horizontal rhythm break
         ============================================================ --}}
    <section class="py-12 sm:py-20 overflow-hidden bg-[#FAFAFA] dark:bg-[#0E0F12] border-b border-neutral-200/80 dark:border-neutral-800/80 select-none">
        <div class="mx-auto max-w-[1400px] px-6 lg:px-12">
            <p class="text-architectural text-neutral-200 dark:text-neutral-800/60 font-black tracking-tighter leading-none whitespace-nowrap overflow-hidden">
                IDEAS • SYSTEMS • IMPACT
            </p>
        </div>
    </section>

    {{-- ============================================================
         6. CAPABILITIES & SERVICES — Interactive Split Stage
         Editorial Row List on Left + Dynamic Visual Stage on Right
         ============================================================ --}}
    <section class="reveal border-b border-neutral-200/80 dark:border-neutral-800/80 bg-white dark:bg-[#0A0A0B] py-20 px-6 lg:px-12 lg:py-28" id="services">
        <div class="mx-auto max-w-[1400px]">
            {{-- Header line --}}
            <div class="flex items-center justify-between border-b border-neutral-200/80 dark:border-neutral-800/80 pb-4">
                <span class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">03 / OUR SERVICES</span>
                <span class="font-mono text-xs text-neutral-400">03</span>
            </div>

            <div id="services-split-showcase" class="mt-12 grid gap-12 lg:grid-cols-12 items-start">
                {{-- Left Column: Interactive Editorial Service Rows --}}
                <div class="lg:col-span-7 divide-y divide-neutral-200/80 dark:divide-neutral-800/80 border-t border-neutral-200/80 dark:border-neutral-800/80">
                    
                    {{-- 01 Web Development --}}
                    <div class="service-split-row py-6 cursor-pointer group" data-service-index="0" data-service-tag="Next.js / React / Laravel">
                        <div class="flex items-center justify-between">
                            <div class="flex items-baseline gap-6">
                                <span class="font-mono text-xs text-neutral-400 group-hover:text-neutral-900 dark:group-hover:text-white transition-colors">01</span>
                                <h3 class="text-2xl sm:text-3xl font-bold tracking-tight text-neutral-900 dark:text-white group-hover:text-black dark:group-hover:text-neutral-200 transition-colors">
                                    Web Development
                                </h3>
                            </div>
                            <span class="service-arrow text-neutral-400 dark:text-neutral-500 group-hover:text-neutral-900 dark:group-hover:text-white text-xl font-mono">&rarr;</span>
                        </div>
                        <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400 pl-10 max-w-xl">
                            Full-stack web applications using React, Next.js, and Laravel. Built for speed, resilience, and horizontal scaling.
                        </p>
                    </div>

                    {{-- 02 App Development --}}
                    <div class="service-split-row py-6 cursor-pointer group" data-service-index="1" data-service-tag="React Native / Flutter / iOS / Android">
                        <div class="flex items-center justify-between">
                            <div class="flex items-baseline gap-6">
                                <span class="font-mono text-xs text-neutral-400 group-hover:text-neutral-900 dark:group-hover:text-white transition-colors">02</span>
                                <h3 class="text-2xl sm:text-3xl font-bold tracking-tight text-neutral-900 dark:text-white group-hover:text-black dark:group-hover:text-neutral-200 transition-colors">
                                    Mobile App Development
                                </h3>
                            </div>
                            <span class="service-arrow text-neutral-400 dark:text-neutral-500 group-hover:text-neutral-900 dark:group-hover:text-white text-xl font-mono">&rarr;</span>
                        </div>
                        <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400 pl-10 max-w-xl">
                            Native and cross-platform mobile experiences for iOS and Android, featuring offline sync and multi-currency transactions.
                        </p>
                    </div>

                    {{-- 03 IoT Solutions --}}
                    <div class="service-split-row py-6 cursor-pointer group" data-service-index="2" data-service-tag="Sensors / MQTT / Real-Time Telemetry">
                        <div class="flex items-center justify-between">
                            <div class="flex items-baseline gap-6">
                                <span class="font-mono text-xs text-neutral-400 group-hover:text-neutral-900 dark:group-hover:text-white transition-colors">03</span>
                                <h3 class="text-2xl sm:text-3xl font-bold tracking-tight text-neutral-900 dark:text-white group-hover:text-black dark:group-hover:text-neutral-200 transition-colors">
                                    IoT Solutions
                                </h3>
                            </div>
                            <span class="service-arrow text-neutral-400 dark:text-neutral-500 group-hover:text-neutral-900 dark:group-hover:text-white text-xl font-mono">&rarr;</span>
                        </div>
                        <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400 pl-10 max-w-xl">
                            Smart device integration, sensor networks, and real-time operational telemetry dashboards connecting physical and digital realms.
                        </p>
                    </div>

                    {{-- 04 AI & Automation --}}
                    <div class="service-split-row py-6 cursor-pointer group" data-service-index="3" data-service-tag="LLM Orchestration / Workflows / Analytics">
                        <div class="flex items-center justify-between">
                            <div class="flex items-baseline gap-6">
                                <span class="font-mono text-xs text-neutral-400 group-hover:text-neutral-900 dark:group-hover:text-white transition-colors">04</span>
                                <h3 class="text-2xl sm:text-3xl font-bold tracking-tight text-neutral-900 dark:text-white group-hover:text-black dark:group-hover:text-neutral-200 transition-colors">
                                    AI & Automation
                                </h3>
                            </div>
                            <span class="service-arrow text-neutral-400 dark:text-neutral-500 group-hover:text-neutral-900 dark:group-hover:text-white text-xl font-mono">&rarr;</span>
                        </div>
                        <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400 pl-10 max-w-xl">
                            Deterministic AI workflows, document intelligence, predictive analytics, and automated multi-step business process engines.
                        </p>
                    </div>

                    {{-- 05 Custom Software --}}
                    <div class="service-split-row py-6 cursor-pointer group" data-service-index="4" data-service-tag="Enterprise ERP / CRM / Cloud Architecture">
                        <div class="flex items-center justify-between">
                            <div class="flex items-baseline gap-6">
                                <span class="font-mono text-xs text-neutral-400 group-hover:text-neutral-900 dark:group-hover:text-white transition-colors">05</span>
                                <h3 class="text-2xl sm:text-3xl font-bold tracking-tight text-neutral-900 dark:text-white group-hover:text-black dark:group-hover:text-neutral-200 transition-colors">
                                    Custom Software
                                </h3>
                            </div>
                            <span class="service-arrow text-neutral-400 dark:text-neutral-500 group-hover:text-neutral-900 dark:group-hover:text-white text-xl font-mono">&rarr;</span>
                        </div>
                        <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400 pl-10 max-w-xl">
                            Tailor-made enterprise software, mission-critical ERP, and CRM platforms architected specifically around client operations.
                        </p>
                    </div>

                    {{-- 06 Digital Marketing --}}
                    <div class="service-split-row py-6 cursor-pointer group" data-service-index="5" data-service-tag="Technical SEO / PPC / Conversion Growth">
                        <div class="flex items-center justify-between">
                            <div class="flex items-baseline gap-6">
                                <span class="font-mono text-xs text-neutral-400 group-hover:text-neutral-900 dark:group-hover:text-white transition-colors">06</span>
                                <h3 class="text-2xl sm:text-3xl font-bold tracking-tight text-neutral-900 dark:text-white group-hover:text-black dark:group-hover:text-neutral-200 transition-colors">
                                    Digital Marketing
                                </h3>
                            </div>
                            <span class="service-arrow text-neutral-400 dark:text-neutral-500 group-hover:text-neutral-900 dark:group-hover:text-white text-xl font-mono">&rarr;</span>
                        </div>
                        <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400 pl-10 max-w-xl">
                            Data-driven performance campaigns, technical SEO audits, social strategy, and analytics architecture designed for measurable revenue.
                        </p>
                    </div>

                </div>

                {{-- Right Column: Split Dynamic Visual Stage (Desktop Sticky) --}}
                <div class="hidden lg:block lg:col-span-5 sticky top-28">
                    <div class="relative aspect-[4/3] rounded-3xl overflow-hidden bg-neutral-950 border border-neutral-200/80 dark:border-neutral-800/80 shadow-2xl">
                        <img src="{{ asset('images/work-laptop.png') }}" alt="Web Development Showcase" class="service-stage-visual is-active" data-index="0" />
                        <img src="{{ asset('images/dashboard-devices.png') }}" alt="Mobile Development Showcase" class="service-stage-visual" data-index="1" />
                        <img src="{{ asset('images/office-boardroom.png') }}" alt="IoT Solutions Showcase" class="service-stage-visual" data-index="2" />
                        <img src="{{ asset('images/insight-ai-mountain.jpg') }}" alt="AI & Automation Showcase" class="service-stage-visual" data-index="3" />
                        <img src="{{ asset('images/insight-custom-software.jpg') }}" alt="Custom Software Showcase" class="service-stage-visual" data-index="4" />
                        <img src="{{ asset('images/insight-scalable-architecture.jpg') }}" alt="Digital Marketing Showcase" class="service-stage-visual" data-index="5" />

                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent pointer-events-none"></div>

                        {{-- Dynamic Tag Indicator --}}
                        <div class="absolute bottom-5 left-5 right-5 flex items-center justify-between text-white">
                            <span id="active-service-category" class="font-mono text-xs px-3 py-1 rounded-full bg-white/20 backdrop-blur-md border border-white/30">
                                Next.js / React / Laravel
                            </span>
                            <a href="/services" class="font-mono text-xs text-white/80 hover:text-white uppercase tracking-wider flex items-center gap-1">
                                <span>VIEW ALL</span> &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         7. FEATURED WORK — Signature Obsidian Pinned Storytelling
         Continuous composition + Custom Project Cursor + Multi-Project Switcher
         ============================================================ --}}
    <section class="reveal py-16 px-4 sm:px-6 lg:px-8 bg-white dark:bg-[#0A0A0B]" id="work">
        <div class="mx-auto max-w-[1400px]">
            <div id="work-story-showcase" tabindex="0" class="rounded-3xl bg-[#0E0F12] text-white p-8 sm:p-12 lg:p-16 relative overflow-hidden shadow-2xl focus:outline-none">

                {{-- Header line --}}
                <div class="flex items-center justify-between border-b border-white/10 pb-6">
                    <span class="font-mono text-xs uppercase tracking-[0.2em] text-white/50">04 / FEATURED WORK</span>
                    <span class="font-mono text-xs text-white/50">04</span>
                </div>

                <div class="mt-12 grid gap-12 lg:grid-cols-12 items-center">
                    {{-- Left column: Headline & project info --}}
                    <div class="lg:col-span-5 flex flex-col justify-between">
                        <div>
                            <h2 class="text-3xl sm:text-5xl lg:text-[54px] font-black tracking-tight text-white leading-[1.08] uppercase">
                                <span class="reveal-line-wrap"><span class="reveal-line">Real businesses.</span></span>
                                <span class="reveal-line-wrap"><span class="reveal-line reveal-line-delay-1">Real results.</span></span>
                            </h2>

                            <div class="reveal-fade-up mt-8">
                                <a href="/work" class="btn-magnetic group inline-flex items-center gap-3 text-sm font-medium text-white/80 hover:text-white">
                                    <span class="flex h-10 w-10 items-center justify-center rounded-full border border-white/30 transition-colors group-hover:border-white group-hover:bg-white group-hover:text-black">
                                        <span class="btn-magnetic-icon">&rarr;</span>
                                    </span>
                                    <span>View All Case Studies</span>
                                </a>
                            </div>
                        </div>

                        {{-- Dynamic Story Panels Container --}}
                        <div class="mt-14 border-t border-white/10 pt-6 relative min-h-[150px]">
                            @foreach($caseStudies as $index => $cs)
                                <div class="work-story-panel {{ $loop->first ? 'is-active' : '' }}" data-project-index="{{ $loop->index }}">
                                    <div class="flex items-center gap-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-mono bg-white/10 text-white/90 border border-white/10">
                                            {{ $cs['technology'] }}
                                        </span>
                                        <span class="font-mono text-xs text-white/50">
                                            {{ $cs['type'] }}
                                        </span>
                                    </div>
                                    <h3 class="text-xl sm:text-2xl font-bold text-white mt-3">{{ $cs['title'] }}</h3>
                                    <p class="text-sm text-white/60 mt-1 line-clamp-2">{{ $cs['description'] }}</p>
                                    <div class="mt-4">
                                        <a href="/work/{{ $cs['slug'] }}" class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-white/90 hover:text-white group">
                                            <span>Read Case Study</span>
                                            <span class="transition-transform group-hover:translate-x-1">&rarr;</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Right column: Visual Showcase with Cursor Trigger & Slide Switcher --}}
                    <div class="lg:col-span-7">
                        <div class="relative overflow-hidden rounded-2xl border border-white/10 bg-black/40 shadow-inner group aspect-[16/10]" data-project-cursor="true" data-project-cursor-text="VIEW CASE">
                            @php
                                $projectImages = [
                                    'school-management-system' => 'images/work-laptop.png',
                                    'affiliate-marketing-app' => 'images/dashboard-devices.png',
                                    'iot-smart-factory-dashboard' => 'images/office-boardroom.png',
                                ];
                            @endphp
                            @foreach($caseStudies as $index => $cs)
                                @php
                                    $img = $projectImages[$cs['slug']] ?? 'images/work-laptop.png';
                                @endphp
                                <a href="/work/{{ $cs['slug'] }}" 
                                   class="work-visual-item absolute inset-0 block {{ $loop->first ? 'is-active' : 'hidden' }}" 
                                   data-project-index="{{ $loop->index }}">
                                    <img
                                        src="{{ asset($img) }}"
                                        alt="{{ $cs['title'] }}"
                                        class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                                        loading="lazy"
                                    />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                </a>
                            @endforeach
                        </div>

                        {{-- Pagination and arrows --}}
                        <div class="mt-6 flex items-center justify-between">
                            <span id="work-slide-indicator" class="font-mono text-xs text-white/60 tracking-wider">01 / 03</span>
                            <div class="flex items-center gap-2">
                                <button id="work-prev-btn" class="btn-magnetic flex h-9 w-9 items-center justify-center rounded-full border border-white/20 text-white/70 hover:border-white hover:text-white transition-colors" aria-label="Previous project">
                                    <span class="btn-magnetic-icon">&larr;</span>
                                </button>
                                <button id="work-next-btn" class="btn-magnetic flex h-9 w-9 items-center justify-center rounded-full border border-white/20 text-white/70 hover:border-white hover:text-white transition-colors" aria-label="Next project">
                                    <span class="btn-magnetic-icon">&rarr;</span>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    {{-- ============================================================
         8. OUR PROCESS — 6-Stage Horizontal Sequence
         Matching verified docs/23-business-data.md §7
         ============================================================ --}}
    <section class="border-b border-neutral-200/80 dark:border-neutral-800/80 bg-white dark:bg-[#0A0A0B] py-20 px-6 lg:px-12 lg:py-28" id="process">
        <div class="mx-auto max-w-[1400px]">
            <div class="flex items-center justify-between border-b border-neutral-200/80 dark:border-neutral-800/80 pb-4">
                <span class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">05 / METHODOLOGY & PROCESS</span>
                <span class="font-mono text-xs text-neutral-400">05</span>
            </div>

            <div id="process-timeline" class="mt-12">
                {{-- Progress Bar --}}
                <div class="w-full bg-neutral-200 dark:bg-neutral-800 h-0.5 relative overflow-hidden mb-10">
                    <div class="process-progress-line bg-neutral-900 dark:bg-white h-full w-[16.6%]"></div>
                </div>

                {{-- Step Triggers Horizontal Track --}}
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6">
                    {{-- Step 1 --}}
                    <div class="process-step-trigger is-active border-t-2 border-transparent pt-4" data-step="0">
                        <span class="font-mono text-xs text-neutral-400 block">01</span>
                        <h4 class="font-bold text-base text-neutral-900 dark:text-white mt-1">Discovery</h4>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 mt-1">Workshops & research</p>
                    </div>

                    {{-- Step 2 --}}
                    <div class="process-step-trigger border-t-2 border-transparent pt-4" data-step="1">
                        <span class="font-mono text-xs text-neutral-400 block">02</span>
                        <h4 class="font-bold text-base text-neutral-900 dark:text-white mt-1">Design</h4>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 mt-1">Prototypes & UX</p>
                    </div>

                    {{-- Step 3 --}}
                    <div class="process-step-trigger border-t-2 border-transparent pt-4" data-step="2">
                        <span class="font-mono text-xs text-neutral-400 block">03</span>
                        <h4 class="font-bold text-base text-neutral-900 dark:text-white mt-1">Architecture</h4>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 mt-1">Schemas & stacks</p>
                    </div>

                    {{-- Step 4 --}}
                    <div class="process-step-trigger border-t-2 border-transparent pt-4" data-step="3">
                        <span class="font-mono text-xs text-neutral-400 block">04</span>
                        <h4 class="font-bold text-base text-neutral-900 dark:text-white mt-1">Develop</h4>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 mt-1">Agile sprints</p>
                    </div>

                    {{-- Step 5 --}}
                    <div class="process-step-trigger border-t-2 border-transparent pt-4" data-step="4">
                        <span class="font-mono text-xs text-neutral-400 block">05</span>
                        <h4 class="font-bold text-base text-neutral-900 dark:text-white mt-1">QA</h4>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 mt-1">Testing & auditing</p>
                    </div>

                    {{-- Step 6 --}}
                    <div class="process-step-trigger border-t-2 border-transparent pt-4" data-step="5">
                        <span class="font-mono text-xs text-neutral-400 block">06</span>
                        <h4 class="font-bold text-base text-neutral-900 dark:text-white mt-1">Deploy</h4>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400 mt-1">Release & scale</p>
                    </div>
                </div>

                {{-- Detail Panes --}}
                <div class="mt-10 p-8 rounded-3xl bg-[#F7F7F8] dark:bg-[#141519] border border-neutral-200/80 dark:border-neutral-800/80">
                    <div class="process-detail-panel is-active" data-step="0">
                        <h5 class="text-xl font-bold text-neutral-900 dark:text-white">01 — Discovery & Requirements Alignment</h5>
                        <p class="text-sm sm:text-base text-neutral-600 dark:text-neutral-400 mt-2 max-w-2xl leading-relaxed">
                            We dive into your business model, operational workflows, and stakeholder goals through targeted workshops and technical research to map the solution landscape.
                        </p>
                    </div>

                    <div class="process-detail-panel hidden" data-step="1">
                        <h5 class="text-xl font-bold text-neutral-900 dark:text-white">02 — User Interface & System Experience Design</h5>
                        <p class="text-sm sm:text-base text-neutral-600 dark:text-neutral-400 mt-2 max-w-2xl leading-relaxed">
                            Wireframes are evolved into high-fidelity design systems with deep emphasis on intuitive interaction, information hierarchy, and conversion metrics.
                        </p>
                    </div>

                    <div class="process-detail-panel hidden" data-step="2">
                        <h5 class="text-xl font-bold text-neutral-900 dark:text-white">03 — Robust Engineering Architecture</h5>
                        <p class="text-sm sm:text-base text-neutral-600 dark:text-neutral-400 mt-2 max-w-2xl leading-relaxed">
                            Comprehensive system architecture, normalized database schemas, asynchronous event streams, and verified technology stack choices designed before writing code.
                        </p>
                    </div>

                    <div class="process-detail-panel hidden" data-step="3">
                        <h5 class="text-xl font-bold text-neutral-900 dark:text-white">04 — Full-Stack Agile Development</h5>
                        <p class="text-sm sm:text-base text-neutral-600 dark:text-neutral-400 mt-2 max-w-2xl leading-relaxed">
                            Sprint-based engineering with continuous integration, deterministic code reviews, and transparent demo milestones delivered on strict timelines.
                        </p>
                    </div>

                    <div class="process-detail-panel hidden" data-step="4">
                        <h5 class="text-xl font-bold text-neutral-900 dark:text-white">05 — Rigorous Quality Assurance & Security</h5>
                        <p class="text-sm sm:text-base text-neutral-600 dark:text-neutral-400 mt-2 max-w-2xl leading-relaxed">
                            Automated testing suites, cross-platform validation, load and stress testing, and defensive vulnerability scanning prior to production sign-off.
                        </p>
                    </div>

                    <div class="process-detail-panel hidden" data-step="5">
                        <h5 class="text-xl font-bold text-neutral-900 dark:text-white">06 — Zero-Downtime Deployment & Scaled Monitoring</h5>
                        <p class="text-sm sm:text-base text-neutral-600 dark:text-neutral-400 mt-2 max-w-2xl leading-relaxed">
                            Seamless zero-downtime production deployment, real-time observability pipelines, and ongoing operational maintenance for sustained growth.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         9. WHAT OUR CLIENTS SAY — Verified Testimonial
         Single source of truth: docs/23-business-data.md §26
         ============================================================ --}}
    <section class="py-12 px-4 sm:px-6 lg:px-8 bg-white dark:bg-[#0A0A0B]" id="testimonials">
        <div class="mx-auto max-w-[1400px]">
            <div class="rounded-3xl bg-[#0A0A0B] dark:bg-[#141519] dark:border dark:border-neutral-800/80 text-white p-8 sm:p-12 lg:p-16 relative overflow-hidden">
                <div class="flex items-center justify-between border-b border-white/10 pb-6">
                    <span class="font-mono text-xs uppercase tracking-[0.2em] text-white/50">06 / VERIFIED IMPACT</span>
                    <span class="font-mono text-xs text-white/50">06</span>
                </div>

                <div class="mt-12 max-w-3xl">
                    <blockquote class="text-2xl sm:text-3xl lg:text-4xl font-normal leading-snug tracking-tight text-white/95">
                        &ldquo;Zytrixon understood the business logic and delivered the School Management System ahead of schedule.&rdquo;
                    </blockquote>

                    <div class="mt-8 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <img
                                src="{{ asset('images/testimonial-rahul.jpg') }}"
                                alt="Rahul Kumar — CEO, TechEdu"
                                class="h-12 w-12 rounded-full object-cover border border-white/20"
                                loading="lazy"
                            />
                            <div>
                                <p class="text-base font-semibold text-white">Rahul Kumar</p>
                                <p class="text-xs text-white/60 font-mono">CEO, TechEdu</p>
                            </div>
                        </div>

                        <div class="hidden sm:flex items-center gap-2 text-xs font-mono text-white/40">
                            <span>VERIFIED CLIENT</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         10. INSIGHTS & PERSPECTIVES
         3 Editorial Articles with 16:9 Photography
         ============================================================ --}}
    <section class="border-b border-neutral-200/80 dark:border-neutral-800/80 bg-white dark:bg-[#0A0A0B] py-20 px-6 lg:px-12 lg:py-28" id="insights">
        <div class="mx-auto max-w-[1400px]">
            <div class="flex items-center justify-between border-b border-neutral-200/80 dark:border-neutral-800/80 pb-4">
                <span class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">07 / INSIGHTS & PERSPECTIVES</span>
                <span class="font-mono text-xs text-neutral-400">07</span>
            </div>

            <div class="mt-8 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                <h2 class="text-3xl sm:text-4xl font-black tracking-tight text-neutral-900 dark:text-white uppercase">
                    Ideas, strategies and<br>engineering perspectives.
                </h2>
                <a href="/about" class="inline-flex items-center gap-2 text-sm font-semibold text-neutral-900 dark:text-white hover:text-neutral-600 dark:hover:text-neutral-300">
                    <span>View Perspectives</span>
                    <span>&rarr;</span>
                </a>
            </div>

            <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                {{-- Article 1 --}}
                <article class="reveal hover-lift group flex flex-col justify-between rounded-3xl frosted-glass-card p-5">
                    <div>
                        <div class="overflow-hidden rounded-2xl bg-neutral-100 aspect-[16/10] relative">
                            <img
                                src="{{ asset('images/insight-ai-mountain.jpg') }}"
                                alt="The Future of AI in Business"
                                class="h-full w-full object-cover transition-transform duration-500 ease-out group-hover:scale-105"
                                loading="lazy"
                            />
                            <div class="absolute top-3 left-3">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-mono bg-white/90 dark:bg-black/70 backdrop-blur-md text-neutral-800 dark:text-neutral-200 border border-white/60 dark:border-white/20 shadow-xs">
                                    AI Strategy
                                </span>
                            </div>
                        </div>
                        <div class="mt-5 px-1">
                            <h3 class="text-lg font-bold text-neutral-900 dark:text-white group-hover:text-neutral-600 dark:group-hover:text-neutral-300 transition-colors">
                                The Future of AI in Business
                            </h3>
                            <p class="mt-2 text-sm leading-relaxed text-neutral-600 dark:text-neutral-400 line-clamp-2">
                                How enterprise organizations are orchestrating deterministic workflows with modern LLMs.
                            </p>
                        </div>
                    </div>
                    <div class="mt-4 px-1 flex items-center justify-between text-xs text-neutral-500 dark:text-neutral-400 font-mono pt-3 border-t border-neutral-100 dark:border-neutral-800/80">
                        <span>Sep 12, 2024</span>
                        <span class="group-hover:translate-x-1.5 transition-transform duration-200 text-neutral-900 dark:text-white font-bold">&rarr;</span>
                    </div>
                </article>

                {{-- Article 2 --}}
                <article class="reveal hover-lift group flex flex-col justify-between rounded-3xl frosted-glass-card p-5">
                    <div>
                        <div class="overflow-hidden rounded-2xl bg-neutral-100 aspect-[16/10] relative">
                            <img
                                src="{{ asset('images/insight-custom-software.jpg') }}"
                                alt="Why Custom Software Wins"
                                class="h-full w-full object-cover transition-transform duration-500 ease-out group-hover:scale-105"
                                loading="lazy"
                            />
                            <div class="absolute top-3 left-3">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-mono bg-white/90 dark:bg-black/70 backdrop-blur-md text-neutral-800 dark:text-neutral-200 border border-white/60 dark:border-white/20 shadow-xs">
                                    Architecture
                                </span>
                            </div>
                        </div>
                        <div class="mt-5 px-1">
                            <h3 class="text-lg font-bold text-neutral-900 dark:text-white group-hover:text-neutral-600 dark:group-hover:text-neutral-300 transition-colors">
                                Why Custom Software Wins
                            </h3>
                            <p class="mt-2 text-sm leading-relaxed text-neutral-600 dark:text-neutral-400 line-clamp-2">
                                Moving beyond generic SaaS limitations with dedicated, resilient product architecture.
                            </p>
                        </div>
                    </div>
                    <div class="mt-4 px-1 flex items-center justify-between text-xs text-neutral-500 dark:text-neutral-400 font-mono pt-3 border-t border-neutral-100 dark:border-neutral-800/80">
                        <span>Aug 28, 2024</span>
                        <span class="group-hover:translate-x-1.5 transition-transform duration-200 text-neutral-900 dark:text-white font-bold">&rarr;</span>
                    </div>
                </article>

                {{-- Article 3 --}}
                <article class="reveal hover-lift group flex flex-col justify-between rounded-3xl frosted-glass-card p-5">
                    <div>
                        <div class="overflow-hidden rounded-2xl bg-neutral-100 aspect-[16/10] relative">
                            <img
                                src="{{ asset('images/insight-scalable-architecture.jpg') }}"
                                alt="How to Build Scalable Products"
                                class="h-full w-full object-cover transition-transform duration-500 ease-out group-hover:scale-105"
                                loading="lazy"
                            />
                            <div class="absolute top-3 left-3">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-mono bg-white/90 dark:bg-black/70 backdrop-blur-md text-neutral-800 dark:text-neutral-200 border border-white/60 dark:border-white/20 shadow-xs">
                                    Engineering
                                </span>
                            </div>
                        </div>
                        <div class="mt-5 px-1">
                            <h3 class="text-lg font-bold text-neutral-900 dark:text-white group-hover:text-neutral-600 dark:group-hover:text-neutral-300 transition-colors">
                                How to Build Scalable Products
                            </h3>
                            <p class="mt-2 text-sm leading-relaxed text-neutral-600 dark:text-neutral-400 line-clamp-2">
                                Architectural blueprints for high availability, low latency, and zero vendor lock-in.
                            </p>
                        </div>
                    </div>
                    <div class="mt-4 px-1 flex items-center justify-between text-xs text-neutral-500 dark:text-neutral-400 font-mono pt-3 border-t border-neutral-100 dark:border-neutral-800/80">
                        <span>Aug 10, 2024</span>
                        <span class="group-hover:translate-x-1.5 transition-transform duration-200 text-neutral-900 dark:text-white font-bold">&rarr;</span>
                    </div>
                </article>
            </div>
        </div>
    </section>

    {{-- ============================================================
         11. FINAL STATEMENT & CTA BLOCK
         Dramatic architectural closure
         ============================================================ --}}
    <section class="py-16 sm:py-24 px-4 sm:px-6 lg:px-8 bg-white dark:bg-[#0A0A0B]">
        <div class="mx-auto max-w-[1400px]">
            <x-cta-block />
        </div>
    </section>

</x-layouts.app>
