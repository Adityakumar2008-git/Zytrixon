@props([
    'project',
    'class' => '',
])

@php
    $slug = $project['slug'] ?? '';
    $imageMap = [
        'school-management-system' => 'images/work-laptop.png',
        'affiliate-marketing-app' => 'images/dashboard-devices.png',
        'iot-smart-factory-dashboard' => 'images/office-boardroom.png',
        'smart-campus-erp' => 'images/work-laptop.png',
        'affiliate-growth-app' => 'images/dashboard-devices.png',
        'iot-smart-meter' => 'images/office-boardroom.png',
    ];
    $cardImage = $project['image'] ?? ($imageMap[$slug] ?? 'images/work-laptop.png');
@endphp

<article {{ $attributes->merge(['class' => 'reveal group relative flex flex-col justify-between overflow-hidden rounded-3xl frosted-glass-card hover-lift ' . $class]) }}
    data-project-cursor="true"
    data-project-cursor-text="VIEW CASE">

    <div>
        {{-- Visual Preview with glass badge overlay --}}
        <div class="relative overflow-hidden aspect-[16/10] bg-neutral-900 border-b border-neutral-200/80">
            <img
                src="{{ asset($cardImage) }}"
                alt="{{ $project['title'] }}"
                class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                loading="lazy"
            />
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
            <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-mono bg-white/90 backdrop-blur-md text-neutral-900 font-semibold shadow-xs border border-white/60">
                    {{ $project['technology'] }}
                </span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-mono bg-black/70 backdrop-blur-md text-white border border-white/20">
                    {{ $project['type'] }}
                </span>
            </div>
        </div>

        {{-- Content Body --}}
        <div class="p-8">
            <h3 class="text-2xl font-bold tracking-tight text-neutral-900 group-hover:text-black">
                <a href="/work/{{ $slug }}" class="focus:outline-none">
                    <span class="absolute inset-0" aria-hidden="true"></span>
                    {{ $project['title'] }}
                </a>
            </h3>

            <p class="mt-3 text-sm leading-relaxed text-neutral-600">
                {{ $project['description'] }}
            </p>

            {{-- Capabilities / Features --}}
            @if (!empty($project['features']))
                <div class="mt-6 border-t border-neutral-100 pt-5">
                    <ul class="space-y-2 text-xs text-neutral-600">
                        @foreach (array_slice($project['features'], 0, 3) as $feature)
                            <li class="flex items-center gap-2">
                                <span class="h-1.5 w-1.5 rounded-full bg-neutral-900"></span>
                                <span>{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    {{-- Link footer --}}
    <div class="p-8 pt-0 flex items-center justify-between">
        <span class="text-xs font-semibold text-neutral-900 group-hover:underline">
            View Case Study &rarr;
        </span>
        <div class="btn-magnetic h-8 w-8 rounded-full border border-neutral-200/90 bg-neutral-50/90 backdrop-blur-xs flex items-center justify-center text-neutral-900 group-hover:bg-neutral-900 group-hover:text-white transition-all duration-200 shadow-2xs">
            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </div>
    </div>
</article>
