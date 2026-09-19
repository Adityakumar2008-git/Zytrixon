@props([
    'title' => "Let's turn your idea\ninto real impact.",
    'description' => 'Discuss your technical requirements with our engineering leadership and receive a structured architecture proposal.',
    'buttonText' => 'Start a Conversation',
    'buttonHref' => '/contact',
    'secondaryText' => null,
    'secondaryHref' => null,
    'label' => 'READY TO BUILD?',
    'class' => '',
])

<div {{ $attributes->merge(['class' => 'reveal relative overflow-hidden rounded-3xl frosted-glass-card grid lg:grid-cols-12 items-stretch hover-lift ' . $class]) }}>

    {{-- Left Content Area --}}
    <div class="p-8 sm:p-12 lg:p-16 lg:col-span-8 flex flex-col justify-between relative z-10">
        {{-- Subtle ambient liquid reflection --}}
        <div class="pointer-events-none absolute -top-24 -left-24 h-64 w-64 rounded-full bg-neutral-200/40 blur-3xl" aria-hidden="true"></div>

        <div class="relative z-10">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full border border-neutral-200/80 dark:border-neutral-700/80 bg-white/90 dark:bg-[#181920]/90 backdrop-blur-md font-mono text-xs uppercase tracking-[0.2em] text-neutral-500 dark:text-neutral-400 shadow-xs">
                <span>{{ $label }}</span>
            </div>

            <h2 class="mt-5 text-3xl sm:text-5xl font-bold tracking-tight text-neutral-900 dark:text-white leading-[1.12]">
                {!! nl2br(e($title)) !!}
            </h2>

            @if($description)
                <p class="mt-4 text-base sm:text-lg text-neutral-600 dark:text-neutral-300 max-w-xl leading-relaxed">
                    {{ $description }}
                </p>
            @endif
        </div>

        <div class="relative z-10 mt-10">
            <div class="flex flex-wrap items-center gap-4">
                <a href="{{ $buttonHref }}"
                   class="btn-magnetic inline-flex items-center gap-2 rounded-full bg-neutral-900 dark:bg-[#18191E] dark:border dark:border-neutral-700 dark:hover:bg-[#22242B] px-7 py-3.5 text-sm font-semibold text-white transition-all duration-200 hover:bg-black hover:shadow-xl active:scale-[0.97]">
                    <span>{{ $buttonText }}</span>
                    <svg class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>

                @if($secondaryHref && $secondaryText)
                    <a href="{{ $secondaryHref }}"
                       class="btn-magnetic inline-flex items-center gap-2 rounded-full border border-neutral-300/90 dark:border-neutral-700 bg-white/90 dark:bg-[#181920]/90 backdrop-blur-md px-6 py-3.5 text-sm font-semibold text-neutral-800 dark:text-neutral-200 transition-all duration-200 hover:border-neutral-900 dark:hover:border-white hover:text-neutral-900 dark:hover:text-white hover:shadow-md active:scale-[0.97]">
                        <span>{{ $secondaryText }}</span>
                    </a>
                @endif
            </div>

            <div class="mt-8 flex items-center gap-2.5 text-xs text-neutral-500 dark:text-neutral-400 font-mono">
                <span class="h-2 w-2 rounded-full bg-emerald-500 ring-4 ring-emerald-500/20 animate-pulse"></span>
                <span>Typical response time: Within 2 hours &bull; 100% Confidential</span>
            </div>
        </div>
    </div>

    {{-- Right Dark Glass Wing --}}
    <div class="relative hidden lg:flex lg:col-span-4 frosted-glass-dark text-white p-12 flex-col justify-center items-start overflow-hidden border-l border-white/10">
        {{-- Diagonal architectural lines --}}
        <div class="absolute inset-0 opacity-20 bg-[linear-gradient(135deg,rgba(255,255,255,0.15)_1px,transparent_1px)] bg-[size:36px_36px] pointer-events-none"></div>

        {{-- Ambient blue glow --}}
        <div class="pointer-events-none absolute -right-16 -top-16 h-48 w-48 rounded-full bg-blue-500/15 blur-3xl" aria-hidden="true"></div>

        {{-- Vertical Typography with subtle divider line --}}
        <div class="relative z-10 space-y-3 font-mono text-xs uppercase tracking-[0.3em] text-white/70 pl-4 border-l border-white/20">
            <p class="font-semibold text-white flex items-center gap-2">
                <span>IDEAS</span>
                <span class="h-1 w-1 rounded-full bg-white"></span>
            </p>
            <p>TECHNOLOGY</p>
            <p>PEOPLE</p>
            <p class="text-white/90">IMPACT</p>
        </div>
    </div>
</div>
