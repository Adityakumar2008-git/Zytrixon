<x-layouts.app
    title="Engineering Services — Zytrixon Tech"
    description="Full-stack Web, Mobile, IoT, and AI solutions engineered with architectural rigor and enterprise scalability.">

    {{-- Page Header --}}
    <div class="relative overflow-hidden border-b border-border px-6 py-20 lg:px-8 lg:py-28">
        <div class="mx-auto max-w-[var(--container-max)]">
            <x-section-label number="01" label="Core Capabilities" />
            <h1 class="mt-4 text-display text-fg">
                Enterprise Engineering Services
            </h1>
            <p class="mt-6 max-w-2xl text-lg text-fg-secondary">
                We design, build, and deploy resilient digital systems. From mission-critical web applications to industrial IoT architectures, our team delivers software built for scale.
            </p>
        </div>
    </div>

    {{-- Services Grid --}}
    <x-section :border="false" id="capabilities">
        <div class="reveal">
            <x-section-label number="02" label="Service Offerings" />
            <h2 class="mt-4 text-h2 text-fg">Full-Lifecycle Engineering</h2>
            <p class="mt-2 max-w-2xl text-body text-fg-secondary">
                Explore our six primary engineering capabilities. Every project is executed by dedicated in-house specialists across frontend, backend, DevOps, and QA.
            </p>
        </div>

        <div class="reveal-stagger mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($services as $service)
                <x-service-card :service="$service" />
            @endforeach
        </div>
    </x-section>

    {{-- Engagement Models (docs/23-business-data.md §17) --}}
    <x-section id="engagement-models">
        <div class="reveal">
            <x-section-label number="03" label="Engagement Models" />
            <h2 class="mt-4 text-h2 text-fg">How We Partner</h2>
            <p class="mt-2 max-w-2xl text-body text-fg-secondary">
                Flexible commercial frameworks structured around your product maturity, timeline, and architectural requirements.
            </p>
        </div>

        <div class="reveal-stagger mt-12 grid gap-6 sm:grid-cols-3">
            <div class="reveal rounded-xl border border-border bg-bg-elevated p-6">
                <span class="font-mono text-xs uppercase tracking-wider text-accent">Model 01</span>
                <h3 class="mt-3 text-lg font-semibold text-fg">Fixed Price</h3>
                <p class="mt-2 text-sm text-fg-secondary">
                    Ideal for well-defined scopes and defined deadlines. Clear milestone deliverables, fixed budget, and dedicated project management.
                </p>
                <ul class="mt-4 space-y-2 border-t border-border pt-4 text-xs text-fg-muted">
                    <li>&bull; Strict scope baseline</li>
                    <li>&bull; Guaranteed delivery timelines</li>
                    <li>&bull; Milestone-based billing</li>
                </ul>
            </div>

            <div class="reveal rounded-xl border border-border bg-bg-elevated p-6">
                <span class="font-mono text-xs uppercase tracking-wider text-accent">Model 02</span>
                <h3 class="mt-3 text-lg font-semibold text-fg">Dedicated Team</h3>
                <p class="mt-2 text-sm text-fg-secondary">
                    Monthly retainer model providing embedded engineers focused exclusively on your roadmap. Direct communication and rapid sprint cadence.
                </p>
                <ul class="mt-4 space-y-2 border-t border-border pt-4 text-xs text-fg-muted">
                    <li>&bull; Flexible backlog management</li>
                    <li>&bull; Direct Slack/standup access</li>
                    <li>&bull; Continuous deployment</li>
                </ul>
            </div>

            <div class="reveal rounded-xl border border-border bg-bg-elevated p-6">
                <span class="font-mono text-xs uppercase tracking-wider text-accent">Model 03</span>
                <h3 class="mt-3 text-lg font-semibold text-fg">Time & Material</h3>
                <p class="mt-2 text-sm text-fg-secondary">
                    Designed for evolving architectures, R&D initiatives, or fast-moving prototypes. Pay for actual engineering hours delivered with full transparency.
                </p>
                <ul class="mt-4 space-y-2 border-t border-border pt-4 text-xs text-fg-muted">
                    <li>&bull; Dynamic requirements</li>
                    <li>&bull; Weekly detailed timesheets</li>
                    <li>&bull; Elastic team sizing</li>
                </ul>
            </div>
        </div>
    </x-section>

    {{-- Engineering Process --}}
    <x-section id="process">
        <div class="reveal">
            <x-section-label number="04" label="Delivery Lifecycle" />
            <h2 class="mt-4 text-h2 text-fg">Our Engineering Process</h2>
            <p class="mt-2 max-w-2xl text-body text-fg-secondary">
                A rigorous, multi-stage delivery pipeline ensuring architectural integrity from initial discovery to continuous production operation.
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
            title="Have an Engineering Challenge?"
            description="Discuss your system requirements with our engineering leads and get a structured architecture roadmap."
            buttonText="Discuss Your Project"
            buttonHref="/contact"
        />
    </x-section>

</x-layouts.app>
