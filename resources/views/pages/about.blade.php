@php use App\Content\Site; @endphp

<x-layouts.app
    title="About Us — Zytrixon Tech"
    description="Learn about Zytrixon Tech: our leadership, engineering values, and our mission to engineer digital dominance for clients worldwide.">

    {{-- Page Header --}}
    <section class="pt-16 pb-12 sm:pt-24 sm:pb-16 px-4 sm:px-6 lg:px-8 border-b border-neutral-200/80 dark:border-neutral-800/80 bg-white dark:bg-[#0A0A0B]">
        <div class="mx-auto max-w-[1400px]">
            <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">ABOUT ZYTRIXON</p>
            <h1 class="mt-4 text-4xl sm:text-6xl font-bold tracking-tight text-neutral-900 dark:text-white leading-[1.1]">
                Local Roots, Global Standards.
            </h1>
            <p class="mt-6 max-w-2xl text-base sm:text-lg text-neutral-600 dark:text-neutral-400 leading-relaxed">
                Zytrixon Tech is an enterprise technology company delivering full-stack Web, Mobile, and IoT solutions. We build durable digital products that empower businesses to compete and scale internationally.
            </p>
        </div>
    </section>

    {{-- Editorial Architectural Visual Showcase --}}
    <section class="py-8 px-4 sm:px-6 lg:px-8 bg-neutral-100 dark:bg-[#0E0F12]">
        <div class="mx-auto max-w-[1400px] overflow-hidden rounded-3xl border border-neutral-200/80 dark:border-neutral-800/80 shadow-md">
            <div class="relative aspect-[21/9] bg-neutral-900">
                <img
                    src="{{ asset('images/office-boardroom.png') }}"
                    alt="Zytrixon Modern Engineering Headquarters"
                    class="h-full w-full object-cover"
                />
            </div>
        </div>
    </section>

    {{-- Company Story & Values --}}
    <x-section :border="false" id="story">
        <div class="grid gap-12 lg:grid-cols-2">
            <div>
                <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">OUR PHILOSOPHY</p>
                <h2 class="mt-3 text-3xl sm:text-4xl font-bold tracking-tight text-neutral-900 dark:text-white">
                    Engineering Without Compromise
                </h2>
                <p class="mt-6 text-base leading-relaxed text-neutral-600 dark:text-neutral-400">
                    We believe that exceptional software requires deep domain comprehension, disciplined system design, and rigorous execution. We reject brittle shortcuts and unverified third-party dependencies in favor of robust, modular architectures designed to withstand enterprise operational loads.
                </p>
                <p class="mt-4 text-base leading-relaxed text-neutral-600 dark:text-neutral-400">
                    Our in-house capabilities span every facet of modern product development: UI/UX design, frontend engineering, backend architecture, cloud DevOps, automated quality assurance, and technical project management.
                </p>
            </div>

            <div class="space-y-4">
                @foreach ($values as $val)
                    <div class="rounded-2xl border border-neutral-200/80 dark:border-neutral-800/80 bg-white dark:bg-[#141519] p-6 shadow-xs transition-all hover:shadow-md hover:border-neutral-300 dark:hover:border-neutral-700">
                        <h3 class="text-base font-bold text-neutral-900 dark:text-white">{{ $val['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-neutral-600 dark:text-neutral-400">{{ $val['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </x-section>

    {{-- Leadership Team (docs/23-business-data.md §12) --}}
    <x-section id="team" class="bg-[#F7F7F8] dark:bg-[#0E0F12]">
        <div>
            <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">LEADERSHIP</p>
            <h2 class="mt-3 text-3xl sm:text-4xl font-bold tracking-tight text-neutral-900 dark:text-white">
                The People Behind Zytrixon
            </h2>
            <p class="mt-2 max-w-2xl text-sm sm:text-base text-neutral-600 dark:text-neutral-400">
                Our founders and core leadership bring hands-on engineering, operational, and strategic acumen to every engagement.
            </p>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-3">
            @foreach ($team as $member)
                <x-team-member :member="$member" />
            @endforeach
        </div>
    </x-section>

    {{-- Global Reach & Presence (docs/23-business-data.md §14 & §2) --}}
    <x-section id="presence">
        <div>
            <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">GLOBAL FOOTPRINT</p>
            <h2 class="mt-3 text-3xl sm:text-4xl font-bold tracking-tight text-neutral-900 dark:text-white">
                Serving Clients Globally
            </h2>
            <p class="mt-2 max-w-2xl text-sm sm:text-base text-neutral-600 dark:text-neutral-400">
                Over 60% of our clients span the USA, UK, and UAE, with systems operating continuously across multiple time zones.
            </p>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-3xl border border-neutral-200/80 dark:border-neutral-800/80 bg-white dark:bg-[#141519] p-8 text-center shadow-xs">
                <span class="font-mono text-4xl font-bold text-neutral-900 dark:text-white">60%</span>
                <p class="mt-3 text-xs font-mono uppercase tracking-wider text-neutral-400">International Clients</p>
                <p class="mt-1 text-xs text-neutral-600 dark:text-neutral-400">USA, UK & UAE primary markets</p>
            </div>

            <div class="rounded-3xl border border-neutral-200/80 dark:border-neutral-800/80 bg-white dark:bg-[#141519] p-8 text-center shadow-xs">
                <span class="font-mono text-4xl font-bold text-neutral-900 dark:text-white">100%</span>
                <p class="mt-3 text-xs font-mono uppercase tracking-wider text-neutral-400">In-House Talent</p>
                <p class="mt-1 text-xs text-neutral-600 dark:text-neutral-400">Zero third-party outsourcing</p>
            </div>

            <div class="rounded-3xl border border-neutral-200/80 dark:border-neutral-800/80 bg-white dark:bg-[#141519] p-8 text-center shadow-xs">
                <span class="font-mono text-4xl font-bold text-neutral-900 dark:text-white">2h</span>
                <p class="mt-3 text-xs font-mono uppercase tracking-wider text-neutral-400">Response Target</p>
                <p class="mt-1 text-xs text-neutral-600 dark:text-neutral-400">Fast enquiry turnaround</p>
            </div>

            <div class="rounded-3xl border border-neutral-200/80 dark:border-neutral-800/80 bg-white dark:bg-[#141519] p-8 text-center shadow-xs">
                <span class="font-mono text-4xl font-bold text-neutral-900 dark:text-white">30d</span>
                <p class="mt-3 text-xs font-mono uppercase tracking-wider text-neutral-400">Free Support</p>
                <p class="mt-1 text-xs text-neutral-600 dark:text-neutral-400">Post-launch bug-fix window</p>
            </div>
        </div>
    </x-section>

    {{-- Open Positions (docs/23-business-data.md §21) --}}
    @if (!empty($careers))
        <x-section id="careers" class="bg-[#F7F7F8] dark:bg-[#0E0F12]">
            <div>
                <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">JOIN OUR TEAM</p>
                <h2 class="mt-3 text-3xl sm:text-4xl font-bold tracking-tight text-neutral-900 dark:text-white">
                    Career Opportunities
                </h2>
                <p class="mt-2 max-w-2xl text-sm sm:text-base text-neutral-600 dark:text-neutral-400">
                    We are always seeking talented engineers and designers who care deeply about code quality, architectural elegance, and user experience.
                </p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2">
                @foreach ($careers as $job)
                    <x-job-card :job="$job" />
                @endforeach
            </div>
        </x-section>
    @endif

    {{-- Call to Action --}}
    <section class="py-12 px-4 sm:px-6 lg:px-8 bg-white dark:bg-[#0A0A0B]">
        <div class="mx-auto max-w-[1400px]">
            <x-cta-block
                title="Let's build together."
                description="Discuss your next project or explore how our engineering team can integrate with your product roadmap."
                buttonText="Start a Project"
                buttonHref="/contact"
            />
        </div>
    </section>

</x-layouts.app>
