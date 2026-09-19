<x-layouts.app
    title="Production Work & Case Studies — Zytrixon Tech"
    description="Selected software projects engineered by Zytrixon Tech, spanning school ERP systems, mobile affiliate ecosystems, and IoT smart factory dashboards.">

    {{-- Page Header --}}
    <div class="relative overflow-hidden border-b border-border px-6 py-20 lg:px-8 lg:py-28">
        <div class="mx-auto max-w-[var(--container-max)]">
            <x-section-label number="01" label="Portfolio" />
            <h1 class="mt-4 text-display text-fg">
                Selected Engineering Work
            </h1>
            <p class="mt-6 max-w-2xl text-lg text-fg-secondary">
                Production-grade software engineered for real-world operations. We design systems that handle complex business workflows, multi-device ecosystems, and high data velocity.
            </p>
        </div>
    </div>

    {{-- Projects Grid --}}
    <x-section :border="false" id="case-studies">
        <div class="reveal">
            <x-section-label number="02" label="Case Studies" />
            <h2 class="mt-4 text-h2 text-fg">Verified Production Projects</h2>
            <p class="mt-2 max-w-2xl text-body text-fg-secondary">
                Real software solutions delivered to clients, with real business impact.
            </p>
        </div>

        <div class="reveal-stagger mt-12 grid gap-8 lg:grid-cols-3">
            @foreach ($caseStudies as $project)
                <x-case-study-card :project="$project" />
            @endforeach
        </div>
    </x-section>

    {{-- Sectors We Serve (docs/23-business-data.md §6) --}}
    <x-section id="sectors">
        <div class="reveal">
            <x-section-label number="03" label="Domain Experience" />
            <h2 class="mt-4 text-h2 text-fg">Industries We Serve</h2>
            <p class="mt-2 max-w-2xl text-body text-fg-secondary">
                We adapt our engineering methodologies to meet the regulatory, performance, and operational constraints of diverse market sectors.
            </p>
        </div>

        <div class="reveal-stagger mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
            @foreach ($industries as $industry)
                <div class="reveal rounded-xl border border-border bg-bg-elevated p-5 transition-all duration-200 hover:border-border-hover">
                    <span class="font-mono text-xs uppercase tracking-wider text-accent">{{ $industry['slug'] }}</span>
                    <h3 class="mt-2 text-base font-semibold text-fg">{{ $industry['title'] }}</h3>
                    <p class="mt-2 text-xs leading-relaxed text-fg-muted">{{ $industry['description'] }}</p>
                </div>
            @endforeach
        </div>
    </x-section>

    {{-- Call to Action --}}
    <x-section :border="false">
        <x-cta-block
            title="Have a Project in Mind?"
            description="Let's review your product specifications, technology stack requirements, and timeline."
            buttonText="Start Your Project"
            buttonHref="/contact"
        />
    </x-section>

</x-layouts.app>
