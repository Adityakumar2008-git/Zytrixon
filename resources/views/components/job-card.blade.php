@props([
    'job',
    'class' => '',
])

<div {{ $attributes->merge(['class' => 'rounded-xl border border-border bg-bg-elevated p-6 transition-all duration-200 hover:border-border-hover hover:bg-bg-surface ' . $class]) }}>
    <div class="flex flex-wrap items-center justify-between gap-2">
        <div class="flex flex-wrap items-center gap-2">
            <x-badge variant="accent">{{ $job['department'] }}</x-badge>
            <x-badge variant="neutral">{{ $job['work_mode'] }}</x-badge>
            <x-badge variant="muted">{{ $job['employment_type'] }}</x-badge>
        </div>
        <span class="font-mono text-xs text-fg-muted">{{ $job['location'] }}</span>
    </div>

    <h3 class="mt-4 text-lg font-semibold text-fg">{{ $job['title'] }}</h3>

    <p class="mt-2 text-sm leading-relaxed text-fg-secondary">
        {{ $job['description'] }}
    </p>

    @if (!empty($job['requirements']))
        <ul class="mt-4 space-y-1.5 border-t border-border pt-4 text-xs text-fg-muted">
            @foreach ($job['requirements'] as $req)
                <li class="flex items-center gap-2">
                    <span class="h-1.5 w-1.5 rounded-full bg-accent/60"></span>
                    <span>{{ $req }}</span>
                </li>
            @endforeach
        </ul>
    @endif

    <div class="mt-6 flex items-center justify-between border-t border-border pt-4">
        <a href="mailto:{{ \App\Content\Careers::applicationEmail() }}?subject=Application:%20{{ urlencode($job['title']) }}"
           class="inline-flex items-center gap-2 text-xs font-semibold text-accent transition-colors hover:text-accent-hover">
            Apply via Email &rarr;
        </a>
    </div>
</div>
