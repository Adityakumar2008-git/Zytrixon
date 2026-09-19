@php
    $slugVal = $service['slug'] instanceof \BackedEnum ? $service['slug']->value : $service['slug'];
@endphp

<x-layouts.app
    :title="$service['title'] . ' — Zytrixon Tech'"
    :description="$service['description']">

    {{-- Service Hero --}}
    {{-- Service Hero --}}
    <section class="pt-16 pb-12 sm:pt-24 sm:pb-16 px-4 sm:px-6 lg:px-8 border-b border-neutral-200/80 dark:border-neutral-800/80 bg-white dark:bg-[#0A0A0B]">
        <div class="mx-auto max-w-[1400px]">
            {{-- Breadcrumb --}}
            <nav class="mb-6 flex items-center gap-2 font-mono text-xs text-neutral-400" aria-label="Breadcrumb">
                <a href="/" class="hover:text-neutral-900 dark:hover:text-white transition-colors">Home</a>
                <span>/</span>
                <a href="/services" class="hover:text-neutral-900 dark:hover:text-white transition-colors">Services</a>
                <span>/</span>
                <span class="text-neutral-900 dark:text-white font-semibold">{{ $service['title'] }}</span>
            </nav>

            <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">ENGINEERING PRACTICE</p>
            <h1 class="mt-4 text-4xl sm:text-6xl font-bold tracking-tight text-neutral-900 dark:text-white leading-[1.1]">
                {{ $service['title'] }}
            </h1>

            <p class="mt-6 max-w-2xl text-base sm:text-lg text-neutral-600 dark:text-neutral-400 leading-relaxed">
                {{ $service['description'] }}
            </p>

            <div class="mt-8 flex flex-wrap gap-4">
                <a href="/contact?service={{ $slugVal }}"
                   class="inline-flex items-center gap-2 rounded-full bg-neutral-900 dark:bg-[#18191E] dark:border dark:border-neutral-700 dark:hover:bg-[#22242B] px-7 py-3.5 text-sm font-semibold text-white transition-all hover:bg-black hover:shadow-lg">
                    <span>Inquire About {{ $service['title'] }}</span>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
                <a href="#capabilities"
                   class="inline-flex items-center gap-2 rounded-full border border-neutral-300 dark:border-neutral-700 bg-white dark:bg-[#141519] px-6 py-3.5 text-sm font-semibold text-neutral-800 dark:text-neutral-200 transition-colors hover:border-neutral-900 dark:hover:border-white hover:text-neutral-900 dark:hover:text-white">
                    <span>Explore Capabilities</span>
                </a>
            </div>
        </div>
    </section>

    {{-- Capabilities & Deliverables --}}
    <x-section :border="false" id="capabilities">
        <div>
            <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">CORE DELIVERABLES</p>
            <h2 class="mt-3 text-3xl sm:text-4xl font-bold tracking-tight text-neutral-900 dark:text-white">
                What We Deliver
            </h2>
            <p class="mt-2 max-w-2xl text-sm sm:text-base text-neutral-600 dark:text-neutral-400">
                Our team provides full-spectrum technical execution with zero outsourcing or unverified dependencies.
            </p>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($service['capabilities'] as $cap)
                <div class="flex flex-col justify-between rounded-2xl border border-neutral-200/80 dark:border-neutral-800/80 bg-[#F7F7F8] dark:bg-[#141519] p-8 transition-all duration-300 hover:bg-white dark:hover:bg-[#181920] hover:shadow-lg">
                    <div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white dark:bg-[#1D1E24] border border-neutral-200/80 dark:border-neutral-700 text-neutral-900 dark:text-white shadow-xs">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        </div>
                        <h3 class="mt-5 text-lg font-bold text-neutral-900 dark:text-white">{{ $cap }}</h3>
                    </div>
                    <p class="mt-4 border-t border-neutral-200/60 dark:border-neutral-800/80 pt-4 text-xs font-mono text-neutral-500 dark:text-neutral-400">
                        Rigorous code review &bull; 100% automated test coverage
                    </p>
                </div>
            @endforeach
        </div>
    </x-section>

    {{-- Related Work --}}
    @if (!empty($relatedWork))
        <x-section id="proof" class="bg-[#F7F7F8] dark:bg-[#0E0F12]">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                <div>
                    <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">VERIFIED CASE STUDIES</p>
                    <h2 class="mt-3 text-3xl sm:text-4xl font-bold tracking-tight text-neutral-900 dark:text-white">
                        Demonstrated Work
                    </h2>
                </div>
                <a href="/work" class="inline-flex items-center gap-2 text-sm font-semibold text-neutral-900 dark:text-white hover:text-neutral-600 dark:hover:text-neutral-300">
                    <span>View All Work</span>
                    <span>&rarr;</span>
                </a>
            </div>

            <div class="mt-12 grid gap-8 lg:grid-cols-3">
                @foreach (array_slice($relatedWork, 0, 3) as $project)
                    <x-case-study-card :project="$project" />
                @endforeach
            </div>
        </x-section>
    @endif

    {{-- Methodology --}}
    <x-section id="process">
        <div>
            <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">DELIVERY METHODOLOGY</p>
            <h2 class="mt-3 text-3xl sm:text-4xl font-bold tracking-tight text-neutral-900 dark:text-white">
                Engineering Delivery Lifecycle
            </h2>
            <p class="mt-2 max-w-2xl text-sm sm:text-base text-neutral-600 dark:text-neutral-400">
                How we advance your project from initial discovery to high-availability production deployment.
            </p>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($process as $step)
                <x-process-step :step="$step" />
            @endforeach
        </div>
    </x-section>

    {{-- Call to Action --}}
    <section class="py-12 px-4 sm:px-6 lg:px-8 bg-white dark:bg-[#0A0A0B]">
        <div class="mx-auto max-w-[1400px]">
            <x-cta-block
                :title="'Ready to build your ' . strtolower($service['title']) . '?'"
                description="Discuss your system architecture with our engineering leadership and receive a detailed roadmap."
                buttonText="Start a Project"
                :buttonHref="'/contact?service=' . $slugVal"
            />
        </div>
    </section>

</x-layouts.app>
