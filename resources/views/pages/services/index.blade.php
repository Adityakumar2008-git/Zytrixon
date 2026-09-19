<x-layouts.app
    title="Engineering Services — Zytrixon Tech"
    description="Full-stack Web, Mobile, IoT, and AI solutions engineered with architectural rigor and enterprise scalability.">

    {{-- Page Header --}}
    <section class="pt-16 pb-12 sm:pt-24 sm:pb-16 px-4 sm:px-6 lg:px-8 border-b border-neutral-200/80 dark:border-neutral-800/80 bg-white dark:bg-[#0A0A0B]">
        <div class="mx-auto max-w-[1400px]">
            <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">OUR CAPABILITIES</p>
            <h1 class="mt-4 text-4xl sm:text-6xl font-bold tracking-tight text-neutral-900 dark:text-white leading-[1.1]">
                Enterprise Engineering Services
            </h1>
            <p class="mt-6 max-w-2xl text-base sm:text-lg text-neutral-600 dark:text-neutral-400 leading-relaxed">
                Built for scale. We design, build, and deploy resilient digital systems. From mission-critical web applications to industrial IoT architectures, our team delivers software engineered to endure.
            </p>
        </div>
    </section>

    {{-- Services Grid --}}
    <x-section :border="false" id="capabilities">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">SERVICE OFFERINGS</p>
                <h2 class="mt-3 text-3xl sm:text-4xl font-bold tracking-tight text-neutral-900 dark:text-white">
                    Full-Lifecycle Engineering
                </h2>
            </div>
            <p class="max-w-md text-sm text-neutral-600 dark:text-neutral-400">
                Executed by dedicated in-house specialists across frontend, backend, cloud DevOps, and automated QA.
            </p>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($services as $service)
                <x-service-card :service="$service" />
            @endforeach
        </div>
    </x-section>

    {{-- Engagement Models (docs/23-business-data.md §17) --}}
    <x-section id="engagement-models" class="bg-[#F7F7F8] dark:bg-[#0E0F12]">
        <div>
            <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">COMMERCIAL FRAMEWORKS</p>
            <h2 class="mt-3 text-3xl sm:text-4xl font-bold tracking-tight text-neutral-900 dark:text-white">
                How We Partner
            </h2>
            <p class="mt-2 max-w-2xl text-sm sm:text-base text-neutral-600 dark:text-neutral-400">
                Flexible commercial frameworks structured around your product maturity, timeline, and architectural requirements.
            </p>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-3">
            <div class="rounded-3xl border border-neutral-200/80 dark:border-neutral-800/80 bg-white dark:bg-[#141519] p-8 transition-all duration-300 hover:shadow-xl hover:border-neutral-300 dark:hover:border-neutral-700 flex flex-col justify-between">
                <div>
                    <span class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">Model 01</span>
                    <h3 class="mt-4 text-2xl font-bold text-neutral-900 dark:text-white">Fixed Price</h3>
                    <p class="mt-3 text-sm leading-relaxed text-neutral-600 dark:text-neutral-400">
                        Ideal for well-defined scopes and defined deadlines. Clear milestone deliverables, fixed budget, and dedicated project management.
                    </p>
                </div>
                <ul class="mt-8 space-y-2.5 border-t border-neutral-100 dark:border-neutral-800 pt-5 text-xs text-neutral-600 dark:text-neutral-400">
                    <li class="flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-neutral-900 dark:bg-white"></span>
                        <span>Strict scope baseline</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-neutral-900 dark:bg-white"></span>
                        <span>Guaranteed delivery timelines</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-neutral-900 dark:bg-white"></span>
                        <span>Milestone-based billing</span>
                    </li>
                </ul>
            </div>

            <div class="rounded-3xl border border-neutral-200/80 dark:border-neutral-800/80 bg-white dark:bg-[#141519] p-8 transition-all duration-300 hover:shadow-xl hover:border-neutral-300 dark:hover:border-neutral-700 flex flex-col justify-between">
                <div>
                    <span class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">Model 02</span>
                    <h3 class="mt-4 text-2xl font-bold text-neutral-900 dark:text-white">Dedicated Team</h3>
                    <p class="mt-3 text-sm leading-relaxed text-neutral-600 dark:text-neutral-400">
                        Monthly retainer model providing embedded engineers focused exclusively on your roadmap. Direct communication and rapid sprint cadence.
                    </p>
                </div>
                <ul class="mt-8 space-y-2.5 border-t border-neutral-100 dark:border-neutral-800 pt-5 text-xs text-neutral-600 dark:text-neutral-400">
                    <li class="flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-neutral-900 dark:bg-white"></span>
                        <span>Flexible backlog management</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-neutral-900 dark:bg-white"></span>
                        <span>Direct Slack / standup access</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-neutral-900 dark:bg-white"></span>
                        <span>Continuous deployment pipeline</span>
                    </li>
                </ul>
            </div>

            <div class="rounded-3xl border border-neutral-200/80 dark:border-neutral-800/80 bg-white dark:bg-[#141519] p-8 transition-all duration-300 hover:shadow-xl hover:border-neutral-300 dark:hover:border-neutral-700 flex flex-col justify-between">
                <div>
                    <span class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">Model 03</span>
                    <h3 class="mt-4 text-2xl font-bold text-neutral-900 dark:text-white">Time & Material</h3>
                    <p class="mt-3 text-sm leading-relaxed text-neutral-600 dark:text-neutral-400">
                        Designed for evolving architectures, R&D initiatives, or fast-moving prototypes. Pay for actual engineering hours delivered with full transparency.
                    </p>
                </div>
                <ul class="mt-8 space-y-2.5 border-t border-neutral-100 dark:border-neutral-800 pt-5 text-xs text-neutral-600 dark:text-neutral-400">
                    <li class="flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-neutral-900 dark:bg-white"></span>
                        <span>Dynamic requirements & iterations</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-neutral-900 dark:bg-white"></span>
                        <span>Weekly detailed timesheets</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-neutral-900 dark:bg-white"></span>
                        <span>Elastic team scaling</span>
                    </li>
                </ul>
            </div>
        </div>
    </x-section>

    {{-- Engineering Process --}}
    <x-section id="process">
        <div>
            <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">METHODOLOGY</p>
            <h2 class="mt-3 text-3xl sm:text-4xl font-bold tracking-tight text-neutral-900 dark:text-white">
                Our Engineering Process
            </h2>
            <p class="mt-2 max-w-2xl text-sm sm:text-base text-neutral-600 dark:text-neutral-400">
                A rigorous, multi-stage delivery pipeline ensuring architectural integrity from initial discovery to high-availability production deployment.
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
                title="Have an engineering challenge?"
                description="Discuss your system requirements with our engineering leads and receive a structured architecture roadmap."
                buttonText="Discuss Your Project"
                buttonHref="/contact"
            />
        </div>
    </section>

</x-layouts.app>
