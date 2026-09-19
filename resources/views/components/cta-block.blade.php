@props([
    'title' => 'Ready to Build Something Exceptional?',
    'description' => 'Discuss your technical requirements with our engineering leadership and receive a structured architecture proposal.',
    'buttonText' => 'Start a Project',
    'buttonHref' => '/contact',
    'secondaryText' => 'Schedule a Consultation',
    'secondaryHref' => 'mailto:zytrixon@gmail.com',
    'class' => '',
])

<div {{ $attributes->merge(['class' => 'relative overflow-hidden rounded-2xl border border-border bg-gradient-to-b from-bg-surface to-bg-elevated p-8 sm:p-12 lg:p-16 text-center ' . $class]) }}>
    {{-- Glow background --}}
    <div class="pointer-events-none absolute -top-24 left-1/2 -translate-x-1/2 h-48 w-96 rounded-full bg-accent/15 blur-3xl" aria-hidden="true"></div>

    <div class="relative mx-auto max-w-2xl">
        <p class="font-mono text-xs font-semibold uppercase tracking-[0.2em] text-accent">
            Next Steps
        </p>

        <h2 class="mt-4 text-2xl font-bold tracking-tight text-fg sm:text-3xl lg:text-4xl">
            {{ $title }}
        </h2>

        <p class="mt-4 text-base leading-relaxed text-fg-secondary sm:text-lg">
            {{ $description }}
        </p>

        <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
            <x-button variant="primary" :href="$buttonHref">
                {{ $buttonText }}
                <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </x-button>

            @if($secondaryHref)
                <x-button variant="outline" :href="$secondaryHref">
                    {{ $secondaryText }}
                </x-button>
            @endif
        </div>

        <p class="mt-6 text-xs text-fg-muted font-mono">
            Typical response time: Within 2 hours &bull; 100% Confidential
        </p>
    </div>
</div>
