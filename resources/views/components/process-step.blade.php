@props([
    'step',
    'class' => '',
])

<div {{ $attributes->merge(['class' => 'relative flex flex-col justify-between rounded-xl border border-border bg-bg-elevated p-6 transition-all duration-200 hover:border-border-hover hover:bg-bg-surface ' . $class]) }}>
    <div>
        <div class="flex items-center justify-between">
            <span class="font-mono text-2xl font-bold tracking-tight text-accent/80">
                {{ $step['number'] }}
            </span>
            <span class="h-2 w-2 rounded-full bg-accent/40"></span>
        </div>

        <h3 class="mt-4 text-lg font-semibold text-fg">
            {{ $step['title'] }}
        </h3>

        <p class="mt-2 text-sm leading-relaxed text-fg-secondary">
            {{ $step['description'] }}
        </p>
    </div>
</div>
