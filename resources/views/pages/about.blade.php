@php use App\Content\Site; @endphp

<x-layouts.app
    title="About Us — Zytrixon Tech"
    description="Learn about Zytrixon Tech: our leadership, engineering values, and our mission to engineer digital dominance for clients worldwide.">

    {{-- Hero --}}
    <div class="relative overflow-hidden border-b border-border px-6 py-20 lg:px-8 lg:py-28">
        <div class="mx-auto max-w-[var(--container-max)]">
            <x-section-label number="01" label="About Zytrixon" />
            <h1 class="mt-4 text-display text-fg">
                Local Roots, Global Standards
            </h1>
            <p class="mt-6 max-w-2xl text-lg text-fg-secondary">
                Zytrixon Tech is an enterprise technology company delivering full-stack Web, Mobile, and IoT solutions. We build durable digital products that empower businesses to compete and scale internationally.
            </p>
        </div>
    </div>

    {{-- Company Story & Values --}}
    <x-section :border="false" id="story">
        <div class="grid gap-12 lg:grid-cols-2">
            <div>
                <x-section-label number="02" label="Our Philosophy" />
                <h2 class="mt-4 text-h2 text-fg">Engineering Without Compromise</h2>
                <p class="mt-4 text-base leading-relaxed text-fg-secondary">
                    We believe that exceptional software requires deep domain comprehension, disciplined system design, and rigorous execution. We reject brittle shortcuts and third-party dependencies in favor of robust, modular architectures designed to withstand enterprise operational loads.
                </p>
                <p class="mt-4 text-base leading-relaxed text-fg-secondary">
                    Our in-house capabilities span every facet of modern product development: UI/UX design, frontend engineering, backend architecture, cloud DevOps, quality assurance, and technical project management.
                </p>
            </div>

            <div class="space-y-4">
                @foreach ($values as $val)
                    <div class="rounded-xl border border-border bg-bg-elevated p-6">
                        <h3 class="text-base font-semibold text-fg">{{ $val['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-fg-secondary">{{ $val['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </x-section>

    {{-- Leadership Team (docs/23-business-data.md §12) --}}
    <x-section id="team">
        <div class="reveal">
            <x-section-label number="03" label="Leadership" />
            <h2 class="mt-4 text-h2 text-fg">The People Behind Zytrixon</h2>
            <p class="mt-2 max-w-2xl text-body text-fg-secondary">
                Our founders and core leadership bring hands-on engineering, operational, and strategic acumen to every engagement.
            </p>
        </div>

        <div class="reveal-stagger mt-12 grid gap-6 sm:grid-cols-3">
            @foreach ($team as $member)
                <x-team-member :member="$member" />
            @endforeach
        </div>
    </x-section>

    {{-- Global Reach & Presence (docs/23-business-data.md §14 & §2) --}}
    <x-section id="presence">
        <div class="reveal">
            <x-section-label number="04" label="Global Footprint" />
            <h2 class="mt-4 text-h2 text-fg">Serving Clients Globally</h2>
            <p class="mt-2 max-w-2xl text-body text-fg-secondary">
                Over 60% of our clients span the USA, UK, and UAE, with systems operating continuously across multiple time zones.
            </p>
        </div>

        <div class="reveal-stagger mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-xl border border-border bg-bg-elevated p-6 text-center">
                <span class="font-mono text-3xl font-bold text-accent">60%</span>
                <p class="mt-2 text-xs font-mono uppercase tracking-wider text-fg-muted">International Clients</p>
                <p class="mt-1 text-xs text-fg-secondary">USA, UK & UAE primary markets</p>
            </div>

            <div class="rounded-xl border border-border bg-bg-elevated p-6 text-center">
                <span class="font-mono text-3xl font-bold text-accent">100%</span>
                <p class="mt-2 text-xs font-mono uppercase tracking-wider text-fg-muted">In-House Talent</p>
                <p class="mt-1 text-xs text-fg-secondary">Zero third-party outsourcing</p>
            </div>

            <div class="rounded-xl border border-border bg-bg-elevated p-6 text-center">
                <span class="font-mono text-3xl font-bold text-accent">2h</span>
                <p class="mt-2 text-xs font-mono uppercase tracking-wider text-fg-muted">Response Target</p>
                <p class="mt-1 text-xs text-fg-secondary">Fast enquiry turnaround</p>
            </div>

            <div class="rounded-xl border border-border bg-bg-elevated p-6 text-center">
                <span class="font-mono text-3xl font-bold text-accent">30d</span>
                <p class="mt-2 text-xs font-mono uppercase tracking-wider text-fg-muted">Free Support</p>
                <p class="mt-1 text-xs text-fg-secondary">Post-launch bug-fix window</p>
            </div>
        </div>
    </x-section>

    {{-- Open Positions (docs/23-business-data.md §21) --}}
    @if (!empty($careers))
        <x-section id="careers">
            <div class="reveal">
                <x-section-label number="05" label="Join Our Team" />
                <h2 class="mt-4 text-h2 text-fg">Career Opportunities</h2>
                <p class="mt-2 max-w-2xl text-body text-fg-secondary">
                    We are always seeking talented engineers and designers who care deeply about code quality, architectural elegance, and user experience.
                </p>
            </div>

            <div class="reveal-stagger mt-12 grid gap-6 sm:grid-cols-2">
                @foreach ($careers as $job)
                    <x-job-card :job="$job" />
                @endforeach
            </div>
        </x-section>
    @endif

    {{-- Engineering Insights (docs/23-business-data.md §20) --}}
    @if (!empty($insights))
        <x-section id="insights">
            <div class="reveal">
                <x-section-label number="06" label="Knowledge" />
                <h2 class="mt-4 text-h2 text-fg">Engineering Insights</h2>
                <p class="mt-2 max-w-2xl text-body text-fg-secondary">
                    Perspectives from our engineering team on modern architecture, security, and scalable software development.
                </p>
            </div>

            <div class="reveal-stagger mt-12 grid gap-6 sm:grid-cols-3">
                @foreach ($insights as $insight)
                    <x-insight-card :insight="$insight" />
                @endforeach
            </div>
        </x-section>
    @endif

    {{-- Call to Action --}}
    <x-section :border="false">
        <x-cta-block
            title="Let's Build Together"
            description="Discuss your next project or explore how our engineering team can integrate with your product roadmap."
            buttonText="Start a Project"
            buttonHref="/contact"
        />
    </x-section>

</x-layouts.app>
