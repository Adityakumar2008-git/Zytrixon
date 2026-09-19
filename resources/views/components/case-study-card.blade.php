@props([
    'project',
    'class' => '',
])

<article {{ $attributes->merge(['class' => 'group relative flex flex-col justify-between overflow-hidden rounded-xl border border-border bg-bg-elevated p-8 transition-all duration-200 hover:border-border-hover hover:bg-bg-surface hover:shadow-xl hover:shadow-black/50 ' . $class]) }}>
    <div>
        {{-- Tags --}}
        <div class="flex flex-wrap items-center gap-2">
            <x-badge variant="accent">{{ $project['type'] }}</x-badge>
            <x-badge variant="neutral">{{ $project['technology'] }}</x-badge>
        </div>

        {{-- Heading --}}
        <h3 class="mt-5 text-xl font-bold text-fg lg:text-2xl">
            <a href="/work/{{ $project['slug'] }}" class="focus:outline-none">
                <span class="absolute inset-0" aria-hidden="true"></span>
                {{ $project['title'] }}
            </a>
        </h3>

        {{-- Description --}}
        <p class="mt-3 text-sm leading-relaxed text-fg-secondary">
            {{ $project['description'] }}
        </p>

        {{-- Features --}}
        @if (!empty($project['features']))
            <div class="mt-6 border-t border-border pt-5">
                <p class="font-mono text-xs uppercase tracking-wider text-fg-muted">Key Capabilities</p>
                <ul class="mt-3 space-y-2 text-xs text-fg-secondary">
                    @foreach ($project['features'] as $feature)
                        <li class="flex items-center gap-2">
                            <svg class="h-3.5 w-3.5 flex-shrink-0 text-accent" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                            </svg>
                            <span>{{ $feature }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Testimonial if present --}}
        @if (!empty($project['testimonial']))
            <div class="mt-6 rounded-lg border border-border/60 bg-bg/50 p-4 text-xs italic text-fg-muted">
                <p>&ldquo;{{ $project['testimonial']['quote'] }}&rdquo;</p>
                <p class="mt-2 not-italic font-medium text-fg-secondary">
                    &mdash; {{ $project['testimonial']['name'] }}, {{ $project['testimonial']['title'] }} ({{ $project['testimonial']['company'] }})
                </p>
            </div>
        @endif
    </div>

    {{-- Link footer --}}
    <div class="mt-8 flex items-center justify-between border-t border-border pt-4">
        <span class="text-xs font-semibold text-accent transition-colors duration-150 group-hover:text-accent-hover">
            View Case Study &rarr;
        </span>
        <svg class="h-4 w-4 text-fg-muted transition-transform duration-200 group-hover:translate-x-1 group-hover:text-accent" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
        </svg>
    </div>
</article>
