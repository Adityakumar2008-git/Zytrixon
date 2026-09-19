@php
    $slug = $project['slug'] ?? '';
    $imageMap = [
        'smart-campus-erp' => 'images/work-laptop.png',
        'affiliate-growth-app' => 'images/dashboard-devices.png',
        'iot-smart-meter' => 'images/office-boardroom.png',
    ];
    $heroImage = $project['image'] ?? ($imageMap[$slug] ?? 'images/work-laptop.png');
@endphp

<x-layouts.app
    :title="$project['title'] . ' — Zytrixon Tech Case Study'"
    :description="$project['description']">

    {{-- Case Study Hero --}}
    <section class="pt-16 pb-12 sm:pt-24 sm:pb-16 px-4 sm:px-6 lg:px-8 border-b border-neutral-200/80 bg-white">
        <div class="mx-auto max-w-[1400px]">
            {{-- Breadcrumb --}}
            <nav class="mb-6 flex items-center gap-2 font-mono text-xs text-neutral-400" aria-label="Breadcrumb">
                <a href="/" class="hover:text-neutral-900 transition-colors">Home</a>
                <span>/</span>
                <a href="/work" class="hover:text-neutral-900 transition-colors">Work</a>
                <span>/</span>
                <span class="text-neutral-900 font-semibold">{{ $project['title'] }}</span>
            </nav>

            <div class="flex flex-wrap items-center gap-3">
                <x-badge variant="accent">{{ $project['type'] }}</x-badge>
                <x-badge variant="neutral">{{ $project['technology'] }}</x-badge>
            </div>

            <h1 class="mt-6 text-4xl sm:text-6xl font-bold tracking-tight text-neutral-900 leading-[1.1]">
                {{ $project['title'] }}
            </h1>

            <p class="mt-6 max-w-2xl text-base sm:text-lg text-neutral-600 leading-relaxed">
                {{ $project['description'] }}
            </p>

            <div class="mt-8 flex flex-wrap gap-4">
                <a href="/contact"
                   class="inline-flex items-center gap-2 rounded-full bg-neutral-900 px-7 py-3.5 text-sm font-semibold text-white transition-all hover:bg-black hover:shadow-lg">
                    <span>Request Similar Build</span>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
                <a href="/work"
                   class="inline-flex items-center gap-2 rounded-full border border-neutral-300 bg-white px-6 py-3.5 text-sm font-semibold text-neutral-800 transition-colors hover:border-neutral-900 hover:text-neutral-900">
                    <span>&larr; Back to All Work</span>
                </a>
            </div>
        </div>
    </section>

    {{-- Showcase Visual Banner --}}
    <div class="bg-neutral-900 py-12 px-4 sm:px-6 lg:px-8 border-b border-neutral-200/80">
        <div class="mx-auto max-w-[1200px] overflow-hidden rounded-3xl border border-white/10 shadow-2xl">
            <img
                src="{{ asset($heroImage) }}"
                alt="{{ $project['title'] }} System Preview"
                class="w-full h-auto object-cover max-h-[550px]"
            />
        </div>
    </div>

    {{-- Technical Capabilities & Architecture --}}
    <x-section :border="false" id="capabilities">
        <div class="grid gap-12 lg:grid-cols-3">
            <div class="lg:col-span-2">
                <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">SYSTEM ARCHITECTURE</p>
                <h2 class="mt-3 text-3xl sm:text-4xl font-bold tracking-tight text-neutral-900">
                    Engineering Implementation
                </h2>
                <p class="mt-4 text-base leading-relaxed text-neutral-600">
                    Designed from the ground up to support high availability and low latency. The platform integrates modular backend services with an intuitive, responsive frontend interface.
                </p>

                <h3 class="mt-10 text-xl font-bold text-neutral-900">Key Capabilities Built</h3>
                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    @foreach ($project['features'] as $feature)
                        <div class="flex items-start gap-3 rounded-2xl border border-neutral-200/80 bg-[#F7F7F8] p-5">
                            <div class="flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full bg-neutral-900 text-white">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-neutral-800">{{ $feature }}</span>
                        </div>
                    @endforeach
                </div>

                {{-- Testimonial if present --}}
                @if (!empty($project['testimonial']))
                    <div class="mt-12 rounded-3xl border border-neutral-200/80 bg-[#0E0F12] text-white p-8 sm:p-10 shadow-xl">
                        <svg class="h-8 w-8 text-neutral-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                        </svg>
                        <blockquote class="mt-4 text-base sm:text-lg italic text-neutral-200 leading-relaxed">
                            &ldquo;{{ $project['testimonial']['quote'] }}&rdquo;
                        </blockquote>
                        <div class="mt-6 border-t border-white/10 pt-4 flex items-center justify-between text-sm">
                            <div>
                                <p class="font-bold text-white">{{ $project['testimonial']['name'] }}</p>
                                <p class="text-xs text-neutral-400">{{ $project['testimonial']['title'] }}, {{ $project['testimonial']['company'] }}</p>
                            </div>
                            <span class="font-mono text-xs text-neutral-500 uppercase tracking-wider">Verified Client</span>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Metadata Sidebar --}}
            <div>
                <div class="rounded-3xl border border-neutral-200/80 bg-white p-8 shadow-sm space-y-6">
                    <div>
                        <span class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">PROJECT DOMAIN</span>
                        <p class="mt-1 text-base font-bold text-neutral-900">{{ $project['type'] }}</p>
                    </div>

                    <div class="border-t border-neutral-100 pt-5">
                        <span class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">PRIMARY STACK</span>
                        <p class="mt-1 text-base font-bold text-neutral-900">{{ $project['technology'] }}</p>
                    </div>

                    <div class="border-t border-neutral-100 pt-5">
                        <span class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">EXECUTION MODEL</span>
                        <p class="mt-1 text-sm font-semibold text-neutral-800">100% In-House Delivery</p>
                    </div>

                    <div class="border-t border-neutral-100 pt-5">
                        <span class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">SUPPORT WINDOW</span>
                        <p class="mt-1 text-sm font-semibold text-neutral-800">30-Day Post-Launch Warranty</p>
                    </div>

                    <div class="border-t border-neutral-100 pt-6">
                        <a href="/contact"
                           class="w-full flex items-center justify-center rounded-full bg-neutral-900 py-3 text-xs font-semibold text-white transition-all hover:bg-black">
                            Discuss Similar System &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-section>

    {{-- Call to Action --}}
    <section class="py-12 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="mx-auto max-w-[1400px]">
            <x-cta-block
                title="Ready to engineer your product?"
                description="Our engineering team is ready to evaluate your requirements and deliver a production-grade roadmap."
                buttonText="Start a Project"
                buttonHref="/contact"
            />
        </div>
    </section>

</x-layouts.app>
