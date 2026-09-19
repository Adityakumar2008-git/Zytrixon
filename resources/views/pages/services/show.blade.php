<x-layouts.app
    :title="$service['title'] . ' — Zytrixon Tech'"
    :description="$service['description']">

    {{-- Service Hero --}}
    <div class="relative overflow-hidden border-b border-border px-6 py-20 lg:px-8 lg:py-28">
        <div class="mx-auto max-w-[var(--container-max)]">
            {{-- Breadcrumb --}}
            <nav class="mb-6 flex items-center gap-2 font-mono text-xs text-fg-muted" aria-label="Breadcrumb">
                <a href="/" class="hover:text-fg">Home</a>
                <span>/</span>
                <a href="/services" class="hover:text-fg">Services</a>
                <span>/</span>
                <span class="text-accent">{{ $service['title'] }}</span>
            </nav>

            <h1 class="text-display text-fg">
                {{ $service['title'] }}
            </h1>

            <p class="mt-6 max-w-2xl text-lg text-fg-secondary">
                {{ $service['description'] }}
            </p>

            <div class="mt-8 flex flex-wrap gap-4">
                <x-button variant="primary" href="/contact?service={{ $service['slug'] instanceof \BackedEnum ? $service['slug']->value : $service['slug'] }}">
                    Inquire About {{ $service['title'] }}
                    <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </x-button>
                <x-button variant="outline" href="#capabilities">
                    Explore Capabilities
                </x-button>
            </div>
        </div>
    </div>

    {{-- Capabilities & Deliverables --}}
    <x-section :border="false" id="capabilities">
        <div class="reveal">
            <x-section-label number="01" label="Core Deliverables" />
            <h2 class="mt-4 text-h2 text-fg">What We Deliver</h2>
            <p class="mt-2 max-w-2xl text-body text-fg-secondary">
                Our team provides full-spectrum technical execution without outsourcing or third-party dependencies.
            </p>
        </div>

        <div class="reveal-stagger mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($service['capabilities'] as $cap)
                <div class="reveal flex flex-col justify-between rounded-xl border border-border bg-bg-elevated p-6 transition-all duration-200 hover:border-border-hover">
                    <div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-accent-subtle text-accent">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        </div>
                        <h3 class="mt-4 text-base font-semibold text-fg">{{ $cap }}</h3>
                    </div>
                    <p class="mt-2 text-xs text-fg-muted">
                        Engineered with strict code review, continuous integration, and automated test coverage.
                    </p>
                </div>
            @endforeach
        </div>
    </x-section>

    {{-- Related Work --}}
    @if (!empty($relatedWork))
        <x-section id="proof">
            <div class="reveal">
                <x-section-label number="02" label="Verified Case Studies" />
                <h2 class="mt-4 text-h2 text-fg">Demonstrated Work</h2>
                <p class="mt-2 max-w-2xl text-body text-fg-secondary">
                    Real software systems engineered and delivered for production environments.
                </p>
            </div>

            <div class="reveal-stagger mt-12 grid gap-8 lg:grid-cols-3">
                @foreach (array_slice($relatedWork, 0, 3) as $project)
                    <x-case-study-card :project="$project" />
                @endforeach
            </div>
        </x-section>
    @endif

    {{-- Process --}}
    <x-section id="process">
        <div class="reveal">
            <x-section-label number="03" label="Methodology" />
            <h2 class="mt-4 text-h2 text-fg">Engineering Delivery Lifecycle</h2>
            <p class="mt-2 max-w-2xl text-body text-fg-secondary">
                How we advance your project from initial concept to high-availability production deployment.
            </p>
        </div>

        <div class="reveal-stagger mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($process as $step)
                <x-process-step :step="$step" />
            @endforeach
        </div>
    </x-section>

    {{-- Call to Action --}}
    <x-section :border="false">
        <x-cta-block
            :title="'Start Your ' . $service['title'] . ' Project'"
            description="Discuss technical requirements directly with our senior engineers and receive a structured implementation plan."
            buttonText="Initiate Project"
            :buttonHref="'/contact?service=' . ($service['slug'] instanceof \BackedEnum ? $service['slug']->value : $service['slug'])"
        />
    </x-section>

</x-layouts.app>
