@props([
    'insight',
    'class' => '',
])

<article {{ $attributes->merge(['class' => 'group flex flex-col justify-between rounded-xl border border-border bg-bg-elevated p-6 transition-all duration-200 hover:border-border-hover hover:bg-bg-surface hover:shadow-lg ' . $class]) }}>
    <div>
        <div class="flex items-center justify-between text-xs text-fg-muted font-mono">
            <span>{{ $insight['category'] }}</span>
            <span>{{ $insight['read_time'] }}</span>
        </div>

        <h3 class="mt-4 text-base font-semibold text-fg group-hover:text-accent transition-colors duration-150">
            {{ $insight['title'] }}
        </h3>

        <p class="mt-2 text-sm leading-relaxed text-fg-secondary">
            {{ $insight['summary'] }}
        </p>
    </div>

    <div class="mt-6 flex items-center justify-between border-t border-border pt-4 text-xs">
        <span class="font-mono text-fg-muted">{{ $insight['published_at'] }}</span>
        <span class="font-semibold text-accent group-hover:translate-x-1 transition-transform duration-150 inline-flex items-center gap-1">
            Read article &rarr;
        </span>
    </div>
</article>
