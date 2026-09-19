@props([
    'service',
    'class' => '',
])

@php
    $slug = $service['slug'] instanceof \BackedEnum ? $service['slug']->value : $service['slug'];
@endphp

<div {{ $attributes->merge(['class' => 'reveal group relative flex flex-col justify-between rounded-3xl frosted-glass-card p-8 hover-lift ' . $class]) }}>

    <div>
        {{-- Icon Header --}}
        <div class="flex items-center justify-between">
            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white dark:bg-[#18191E] border border-neutral-200/80 dark:border-neutral-700/80 text-neutral-900 dark:text-white shadow-xs transition-colors duration-200 group-hover:bg-neutral-900 dark:group-hover:bg-white group-hover:text-white dark:group-hover:text-black">
                @if(($service['icon'] ?? '') === 'globe')
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" /></svg>
                @elseif(($service['icon'] ?? '') === 'device-mobile')
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" /></svg>
                @elseif(($service['icon'] ?? '') === 'cpu-chip')
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V5.25a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 5.25v13.5A2.25 2.25 0 0 0 6.75 21Z" /></svg>
                @elseif(($service['icon'] ?? '') === 'sparkles')
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" /></svg>
                @elseif(($service['icon'] ?? '') === 'code-bracket')
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" /></svg>
                @else
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" /></svg>
                @endif
            </div>

            <div class="btn-magnetic flex h-9 w-9 items-center justify-center rounded-full border border-neutral-300/80 dark:border-neutral-700 bg-white/90 dark:bg-[#18191E] text-neutral-900 dark:text-white shadow-2xs transition-all duration-200 group-hover:bg-neutral-900 dark:group-hover:bg-white group-hover:text-white dark:group-hover:text-black group-hover:border-neutral-900 dark:group-hover:border-white">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </div>
        </div>

        <h3 class="mt-6 text-xl font-bold text-neutral-900 dark:text-white group-hover:text-black dark:group-hover:text-white">
            <a href="/services/{{ $slug }}" class="focus:outline-none">
                <span class="absolute inset-0" aria-hidden="true"></span>
                {{ $service['title'] }}
            </a>
        </h3>

        <p class="mt-3 text-sm leading-relaxed text-neutral-600 dark:text-neutral-400">
            {{ $service['description'] }}
        </p>

        @if (!empty($service['capabilities']))
            <div class="mt-6 border-t border-neutral-200/60 dark:border-neutral-800 pt-4 flex flex-wrap gap-1.5">
                @foreach (array_slice($service['capabilities'], 0, 3) as $cap)
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-mono bg-white/80 dark:bg-neutral-800/80 border border-neutral-200/70 dark:border-neutral-700/70 text-neutral-600 dark:text-neutral-300 shadow-2xs">
                        {{ $cap }}
                    </span>
                @endforeach
            </div>
        @endif
    </div>

    <div class="mt-8 pt-2 flex items-center gap-2 text-xs font-semibold text-neutral-900 dark:text-white">
        <span>Explore Architecture</span>
        <span class="group-hover:translate-x-1.5 transition-transform duration-200">&rarr;</span>
    </div>
</div>
