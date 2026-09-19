<x-layouts.app
    :title="$project['title'] . ' — Zytrixon Tech Case Study'"
    :description="$project['description']">

    {{-- Case Study Hero --}}
    <div class="relative overflow-hidden border-b border-border px-6 py-20 lg:px-8 lg:py-28">
        <div class="mx-auto max-w-[var(--container-max)]">
            {{-- Breadcrumb --}}
            <nav class="mb-6 flex items-center gap-2 font-mono text-xs text-fg-muted" aria-label="Breadcrumb">
                <a href="/" class="hover:text-fg">Home</a>
                <span>/</span>
                <a href="/work" class="hover:text-fg">Work</a>
                <span>/</span>
                <span class="text-accent">{{ $project['title'] }}</span>
            </nav>

            <div class="flex flex-wrap items-center gap-3">
                <x-badge variant="accent">{{ $project['type'] }}</x-badge>
                <x-badge variant="neutral">{{ $project['technology'] }}</x-badge>
            </div>

            <h1 class="mt-6 text-display text-fg">
                {{ $project['title'] }}
            </h1>

            <p class="mt-6 max-w-2xl text-lg text-fg-secondary">
                {{ $project['description'] }}
            </p>

            <div class="mt-8 flex flex-wrap gap-4">
                <x-button variant="primary" href="/contact">
                    Request Similar Build
                    <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </x-button>
                <x-button variant="outline" href="/work">
                    &larr; Back to All Work
                </x-button>
            </div>
        </div>
    </div>

    {{-- Technical Capabilities & Architecture --}}
    <x-section :border="false" id="capabilities">
        <div class="grid gap-12 lg:grid-cols-3">
            <div class="lg:col-span-2">
                <x-section-label number="01" label="System Architecture" />
                <h2 class="mt-4 text-h2 text-fg">Engineering Implementation</h2>
                <p class="mt-4 text-base leading-relaxed text-fg-secondary">
                    Designed from the ground up to support high availability and low latency. The platform integrates modular backend services with an intuitive, responsive frontend interface.
                </p>

                <h3 class="mt-10 text-xl font-semibold text-fg">Key Capabilities Built</h3>
                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    @foreach ($project['features'] as $feature)
                        <div class="flex items-start gap-3 rounded-lg border border-border bg-bg-elevated p-4">
                            <div class="flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full bg-accent-subtle text-accent">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                            </div>
                            <span class="text-sm text-fg">{{ $feature }}</span>
                        </div>
                    @endforeach
                </div>

                {{-- Testimonial if present --}}
                @if (!empty($project['testimonial']))
                    <div class="mt-12 rounded-xl border border-accent/20 bg-accent-subtle/20 p-8">
                        <svg class="h-8 w-8 text-accent/40" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                        </svg>
                        <blockquote class="mt-4 text-base italic text-fg sm:text-lg">
                            &ldquo;{{ $project['testimonial']['quote'] }}&rdquo;
                        </blockquote>
                        <div class="mt-4 border-t border-border/50 pt-4 text-sm font-medium text-fg-secondary">
                            <span class="text-fg font-semibold">{{ $project['testimonial']['name'] }}</span> &bull; {{ $project['testimonial']['title'] }}, {{ $project['testimonial']['company'] }}
                        </div>
                    </div>
                @endif
            </div>

            {{-- Metadata Sidebar --}}
            <div>
                <div class="rounded-xl border border-border bg-bg-elevated p-6 space-y-6">
                    <div>
                        <span class="font-mono text-xs uppercase tracking-wider text-fg-muted">Project Domain</span>
                        <p class="mt-1 text-sm font-semibold text-fg">{{ $project['type'] }}</p>
                    </div>

                    <div class="border-t border-border pt-4">
                        <span class="font-mono text-xs uppercase tracking-wider text-fg-muted">Primary Stack</span>
                        <p class="mt-1 text-sm font-semibold text-fg">{{ $project['technology'] }}</p>
                    </div>

                    <div class="border-t border-border pt-4">
                        <span class="font-mono text-xs uppercase tracking-wider text-fg-muted">Execution Model</span>
                        <p class="mt-1 text-sm font-semibold text-fg">Full-Lifecycle In-House Delivery</p>
                    </div>

                    <div class="border-t border-border pt-4">
                        <x-button variant="primary" class="w-full" href="/contact">
                            Inquire About This Build
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </x-section>

    {{-- Other Case Studies --}}
    @if (!empty($otherProjects))
        <x-section id="other-work">
            <div class="reveal">
                <x-section-label number="02" label="Portfolio" />
                <h2 class="mt-4 text-h2 text-fg">Other Featured Projects</h2>
            </div>

            <div class="reveal-stagger mt-8 grid gap-6 sm:grid-cols-2">
                @foreach ($otherProjects as $other)
                    <x-case-study-card :project="$other" />
                @endforeach
            </div>
        </x-section>
    @endif

    {{-- Call to Action --}}
    <x-section :border="false">
        <x-cta-block
            title="Ready to Build Your Platform?"
            description="Our engineers are ready to analyze your technical requirements and build a production-grade application."
            buttonText="Start a Project"
            buttonHref="/contact"
        />
    </x-section>

</x-layouts.app>
