@php use App\Content\Site; @endphp

<x-layouts.app
    title="Zytrixon Tech — We Engineer Digital Dominance"
    description="Enterprise-grade Web, Mobile, and IoT solutions. We build technology that drives business growth across 8+ countries.">

    {{-- ============================================================
         HERO — docs/18-page-specifications.md §6
         Preserve existing brand language: "WE ENGINEER DIGITAL DOMINANCE."
         ============================================================ --}}
    <section class="relative overflow-hidden px-6 py-24 lg:px-8 lg:py-36">
        {{-- Subtle grid background --}}
        <div class="pointer-events-none absolute inset-0 bg-[linear-gradient(rgba(59,130,246,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(59,130,246,0.03)_1px,transparent_1px)] bg-[size:60px_60px]" aria-hidden="true"></div>

        <div class="relative mx-auto max-w-[var(--container-max)]">
            <div class="max-w-3xl">
                {{-- Eyebrow --}}
                <p class="reveal text-label text-accent">
                    Technology Partner
                </p>

                {{-- Display Heading --}}
                <h1 class="reveal mt-6 text-display text-fg">
                    {{ Site::TAGLINE }}
                </h1>

                {{-- Supporting Copy --}}
                <p class="reveal mt-6 max-w-xl text-lg leading-relaxed text-fg-secondary lg:text-xl">
                    We build enterprise-grade Web, Mobile, and IoT solutions that transform how businesses operate and compete.
                </p>

                {{-- CTAs --}}
                <div class="reveal mt-10 flex flex-wrap gap-4">
                    <a href="/contact"
                       class="inline-flex items-center rounded-lg bg-accent px-6 py-3.5 text-sm font-semibold text-white transition-all duration-200 hover:bg-accent-hover hover:shadow-lg hover:shadow-accent/20">
                        Start a Project
                        <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
                    </a>
                    <a href="/work"
                       class="inline-flex items-center rounded-lg border border-border px-6 py-3.5 text-sm font-semibold text-fg transition-all duration-200 hover:border-border-hover hover:bg-bg-surface">
                        View Our Work
                    </a>
                </div>

                {{-- Positioning --}}
                <p class="reveal mt-12 text-caption text-fg-muted">
                    {{ Site::POSITIONING }}
                </p>
            </div>
        </div>
    </section>

    {{-- ============================================================
         CAPABILITIES — docs/18-page-specifications.md §8
         6 verified services from §5, grouped into a clear hierarchy.
         ============================================================ --}}
    <section class="border-t border-border px-6 py-20 lg:px-8 lg:py-28" id="services">
        <div class="mx-auto max-w-[var(--container-max)]">
            <div class="reveal">
                <p class="text-label text-accent">What We Do</p>
                <h2 class="mt-4 text-h2 text-fg">Capabilities</h2>
                <p class="mt-4 max-w-2xl text-body text-fg-secondary">
                    End-to-end technology services from strategy to deployment, built by an in-house team covering UI/UX, frontend, backend, DevOps, QA, and project management.
                </p>
            </div>

            <div class="reveal-stagger mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($services as $service)
                    <a href="/services/{{ $service['slug']->value }}"
                       class="reveal group rounded-xl border border-border bg-bg-elevated p-6 transition-all duration-200 hover:border-border-hover hover:bg-bg-surface">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-accent-subtle text-accent">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" /></svg>
                        </div>
                        <h3 class="mt-4 text-h4 text-fg">{{ $service['title'] }}</h3>
                        <p class="mt-2 text-body-sm text-fg-secondary">{{ $service['description'] }}</p>
                        <span class="mt-4 inline-flex items-center text-caption text-accent opacity-0 transition-opacity duration-200 group-hover:opacity-100">
                            Learn more →
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================================
         INDUSTRIES — docs/23-business-data.md §6
         10 industry sectors (capability claims, not proof of projects)
         ============================================================ --}}
    <section class="border-t border-border px-6 py-20 lg:px-8 lg:py-28" id="industries">
        <div class="mx-auto max-w-[var(--container-max)]">
            <div class="reveal">
                <p class="text-label text-accent">Industries</p>
                <h2 class="mt-4 text-h2 text-fg">Sectors We Serve</h2>
            </div>

            <div class="reveal-stagger mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
                @foreach ($industries as $industry)
                    <div class="reveal rounded-lg border border-border bg-bg-elevated p-4 transition-colors duration-200 hover:border-border-hover">
                        <h3 class="text-sm font-medium text-fg">{{ $industry['title'] }}</h3>
                        <p class="mt-1 text-caption text-fg-muted">{{ $industry['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================================
         SELECTED WORK — docs/18-page-specifications.md §9
         3 real projects from §8–10
         ============================================================ --}}
    <section class="border-t border-border px-6 py-20 lg:px-8 lg:py-28" id="work">
        <div class="mx-auto max-w-[var(--container-max)]">
            <div class="reveal">
                <p class="text-label text-accent">Selected Work</p>
                <h2 class="mt-4 text-h2 text-fg">Projects We've Built</h2>
            </div>

            <div class="reveal-stagger mt-12 grid gap-8 lg:grid-cols-3">
                @foreach ($caseStudies as $study)
                    <a href="/work/{{ $study['slug'] }}"
                       class="reveal group rounded-xl border border-border bg-bg-elevated transition-all duration-200 hover:border-border-hover hover:bg-bg-surface">
                        {{-- Project preview area --}}
                        <div class="flex h-48 items-center justify-center rounded-t-xl bg-bg-muted p-6">
                            <span class="text-label text-fg-subtle">{{ $study['type'] }}</span>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2">
                                <span class="rounded-md bg-accent-subtle px-2 py-0.5 text-caption text-accent">{{ $study['technology'] }}</span>
                            </div>
                            <h3 class="mt-3 text-h4 text-fg">{{ $study['title'] }}</h3>
                            <p class="mt-2 text-body-sm text-fg-secondary">{{ $study['description'] }}</p>
                            <span class="mt-4 inline-flex items-center text-caption text-accent opacity-0 transition-opacity duration-200 group-hover:opacity-100">
                                View case study →
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================================
         PROCESS — docs/23-business-data.md §7
         6-stage development process
         ============================================================ --}}
    <section class="border-t border-border px-6 py-20 lg:px-8 lg:py-28" id="process">
        <div class="mx-auto max-w-[var(--container-max)]">
            <div class="reveal">
                <p class="text-label text-accent">How We Work</p>
                <h2 class="mt-4 text-h2 text-fg">Our Engineering Process</h2>
            </div>

            <div class="reveal-stagger mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($process as $step)
                    <div class="reveal rounded-xl border border-border bg-bg-elevated p-6 transition-colors duration-200 hover:border-border-hover">
                        <span class="font-mono text-3xl font-bold text-accent/30">{{ $step['number'] }}</span>
                        <h3 class="mt-3 text-h4 text-fg">{{ $step['title'] }}</h3>
                        <p class="mt-2 text-body-sm text-fg-secondary">{{ $step['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================================
         TECHNOLOGY — docs/23-business-data.md §11
         Communicate as capability, not universal usage
         ============================================================ --}}
    <section class="border-t border-border px-6 py-20 lg:px-8 lg:py-28" id="technology">
        <div class="mx-auto max-w-[var(--container-max)]">
            <div class="reveal">
                <p class="text-label text-accent">Technology Stack</p>
                <h2 class="mt-4 text-h2 text-fg">Built With Modern Tools</h2>
            </div>

            <div class="mt-12 space-y-10">
                @foreach ($technologies as $category => $techs)
                    <div class="reveal">
                        <h3 class="text-label text-fg-muted">{{ $category }}</h3>
                        <div class="mt-4 flex flex-wrap gap-3">
                            @foreach ($techs as $tech)
                                <span class="rounded-lg border border-border bg-bg-elevated px-4 py-2 text-sm text-fg-secondary transition-colors duration-150 hover:border-border-hover hover:text-fg">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Capability Keywords Ticker --}}
            <div class="reveal mt-16 overflow-hidden rounded-xl border border-border bg-bg-elevated p-6">
                <div class="flex flex-wrap gap-3">
                    @foreach ($capabilityKeywords as $keyword)
                        <span class="rounded-full border border-border px-3 py-1 text-caption text-fg-muted">{{ $keyword }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         TEAM — docs/23-business-data.md §12
         3 verified core team members
         ============================================================ --}}
    <section class="border-t border-border px-6 py-20 lg:px-8 lg:py-28" id="team">
        <div class="mx-auto max-w-[var(--container-max)]">
            <div class="reveal">
                <p class="text-label text-accent">Our Team</p>
                <h2 class="mt-4 text-h2 text-fg">The People Behind Zytrixon</h2>
            </div>

            <div class="reveal-stagger mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($team as $member)
                    <div class="reveal rounded-xl border border-border bg-bg-elevated p-6 transition-colors duration-200 hover:border-border-hover">
                        {{-- Avatar placeholder --}}
                        <div class="flex h-16 w-16 items-center justify-center rounded-full bg-accent-subtle text-lg font-bold text-accent">
                            {{ collect(explode(' ', $member['name']))->map(fn ($n) => mb_substr($n, 0, 1))->join('') }}
                        </div>
                        <h3 class="mt-4 text-h4 text-fg">{{ $member['name'] }}</h3>
                        <p class="mt-1 text-label text-accent">{{ $member['role'] }}</p>
                        <p class="mt-3 text-body-sm text-fg-secondary">{{ $member['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================================
         VALUES — docs/23-business-data.md §19
         Security First, Innovation Driven, Full Transparency
         ============================================================ --}}
    <section class="border-t border-border px-6 py-20 lg:px-8 lg:py-28" id="values">
        <div class="mx-auto max-w-[var(--container-max)]">
            <div class="reveal">
                <p class="text-label text-accent">Our Values</p>
                <h2 class="mt-4 text-h2 text-fg">What We Stand For</h2>
            </div>

            <div class="reveal-stagger mt-12 grid gap-8 sm:grid-cols-3">
                @foreach ($values as $value)
                    <div class="reveal rounded-xl border border-border bg-bg-elevated p-6">
                        <h3 class="text-h4 text-fg">{{ $value['title'] }}</h3>
                        <p class="mt-3 text-body-sm text-fg-secondary">{{ $value['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================================
         CTA — Primary conversion section
         ============================================================ --}}
    <section class="border-t border-border bg-bg-elevated px-6 py-20 lg:px-8 lg:py-28">
        <div class="reveal mx-auto max-w-[var(--container-narrow)] text-center">
            <p class="text-label text-accent">Ready to Build?</p>
            <h2 class="mt-4 text-h2 text-fg">Let's Engineer Your Next Advantage</h2>
            <p class="mx-auto mt-4 max-w-xl text-body text-fg-secondary">
                Tell us about your project and we'll get back to you with a plan.
            </p>
            <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
                <a href="/contact"
                   class="inline-flex items-center rounded-lg bg-accent px-8 py-4 text-base font-semibold text-white transition-all duration-200 hover:bg-accent-hover hover:shadow-lg hover:shadow-accent/20">
                    Start a Project
                    <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
                </a>
                <a href="mailto:{{ Site::EMAIL }}"
                   class="inline-flex items-center rounded-lg border border-border px-8 py-4 text-base font-semibold text-fg transition-all duration-200 hover:border-border-hover hover:bg-bg-surface">
                    {{ Site::EMAIL }}
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>
