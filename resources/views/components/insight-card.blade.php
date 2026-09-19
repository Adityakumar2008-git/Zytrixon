@props([
    'insight',
    'class' => '',
])

@php
    $slug = $insight['slug'] ?? '';
    $imageMap = [
        'future-of-ai-in-business' => 'images/insight-ai-mountain.jpg',
        'why-custom-software-wins' => 'images/insight-custom-software.jpg',
        'how-to-build-scalable-products' => 'images/insight-scalable-architecture.jpg',
    ];
    $cardImage = $insight['image'] ?? ($imageMap[$slug] ?? 'images/insight-ai-mountain.jpg');
@endphp

<article {{ $attributes->merge(['class' => 'reveal group flex flex-col justify-between rounded-3xl frosted-glass-card p-5 hover-lift ' . $class]) }}>

    <div>
        {{-- Thumbnail --}}
        <div class="overflow-hidden rounded-2xl bg-neutral-100 dark:bg-neutral-800 aspect-[16/10] border border-neutral-200/80 dark:border-neutral-800/80 relative">
            <img
                src="{{ asset($cardImage) }}"
                alt="{{ $insight['title'] }}"
                class="h-full w-full object-cover transition-transform duration-500 ease-out group-hover:scale-105"
                loading="lazy"
            />
            <div class="absolute top-3 left-3">
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-mono bg-white/90 dark:bg-[#15161A]/90 backdrop-blur-md text-neutral-800 dark:text-neutral-200 border border-white/60 dark:border-neutral-700/60 shadow-xs">
                    {{ $insight['category'] ?? 'Engineering' }}
                </span>
            </div>
        </div>

        {{-- Meta & Title --}}
        <div class="mt-5 px-1">
            <div class="flex items-center justify-between text-xs text-neutral-400 font-mono">
                <span>{{ $insight['published_at'] ?? '2024' }}</span>
                <span>{{ $insight['read_time'] ?? '5 min read' }}</span>
            </div>

            <h3 class="mt-3 text-lg font-bold text-neutral-900 dark:text-white group-hover:text-neutral-600 dark:group-hover:text-neutral-300 transition-colors">
                {{ $insight['title'] }}
            </h3>

            @if (!empty($insight['summary']))
                <p class="mt-2 text-sm leading-relaxed text-neutral-600 dark:text-neutral-400 line-clamp-2">
                    {{ $insight['summary'] }}
                </p>
            @endif
        </div>
    </div>

    <div class="mt-5 px-1 flex items-center justify-between text-xs font-mono text-neutral-500 dark:text-neutral-400 pt-4 border-t border-neutral-100 dark:border-neutral-800/80">
        <span class="font-semibold text-neutral-900 dark:text-white">Read Article</span>
        <span class="group-hover:translate-x-1.5 transition-transform duration-200 text-neutral-900 dark:text-white font-bold">&rarr;</span>
    </div>
</article>
