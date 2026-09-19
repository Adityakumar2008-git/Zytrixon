<x-layouts.app
    title="Production Work & Case Studies — Zytrixon Tech"
    description="Selected software projects engineered by Zytrixon Tech, spanning school ERP systems, mobile affiliate ecosystems, and IoT smart factory dashboards.">

    {{-- Page Header --}}
    <section class="pt-16 pb-12 sm:pt-24 sm:pb-16 px-4 sm:px-6 lg:px-8 border-b border-neutral-200/80 bg-white">
        <div class="mx-auto max-w-[1400px]">
            <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">PORTFOLIO & PROOF</p>
            <h1 class="mt-4 text-4xl sm:text-6xl font-bold tracking-tight text-neutral-900 leading-[1.1]">
                Selected Engineering Work.
            </h1>
            <p class="mt-6 max-w-2xl text-base sm:text-lg text-neutral-600 leading-relaxed">
                Production-grade software engineered for real-world operations. We design systems that handle complex business workflows, multi-device ecosystems, and high data velocity.
            </p>
        </div>
    </section>

    {{-- Projects Grid --}}
    <x-section :border="false" id="case-studies">
        <div>
            <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">VERIFIED CASE STUDIES</p>
            <h2 class="mt-3 text-3xl sm:text-4xl font-bold tracking-tight text-neutral-900">
                Production Deployments
            </h2>
            <p class="mt-2 max-w-2xl text-sm sm:text-base text-neutral-600">
                Real software solutions delivered to clients, with verified technical and business impact.
            </p>
        </div>

        <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($caseStudies as $project)
                <x-case-study-card :project="$project" />
            @endforeach
        </div>
    </x-section>

    {{-- Sectors We Serve (docs/23-business-data.md §6) --}}
    <x-section id="sectors" class="bg-[#F7F7F8]">
        <div>
            <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">DOMAIN EXPERIENCE</p>
            <h2 class="mt-3 text-3xl sm:text-4xl font-bold tracking-tight text-neutral-900">
                Industries We Serve
            </h2>
            <p class="mt-2 max-w-2xl text-sm sm:text-base text-neutral-600">
                We adapt our engineering methodologies to meet the regulatory, performance, and operational constraints of diverse market sectors.
            </p>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-5">
            @foreach ($industries as $industry)
                <div class="rounded-2xl border border-neutral-200/80 bg-white p-6 transition-all duration-300 hover:shadow-lg hover:border-neutral-300 flex flex-col justify-between">
                    <div>
                        <span class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">{{ $industry['slug'] }}</span>
                        <h3 class="mt-3 text-lg font-bold text-neutral-900">{{ $industry['title'] }}</h3>
                        <p class="mt-2 text-xs leading-relaxed text-neutral-600">{{ $industry['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </x-section>

    {{-- Call to Action --}}
    <section class="py-12 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="mx-auto max-w-[1400px]">
            <x-cta-block
                title="Have a project in mind?"
                description="Let's review your product specifications, technology stack requirements, and delivery timeline."
                buttonText="Start Your Project"
                buttonHref="/contact"
            />
        </div>
    </section>

</x-layouts.app>
