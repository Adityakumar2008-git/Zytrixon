@props([
    'member',
    'class' => '',
])

<div {{ $attributes->merge(['class' => 'rounded-xl border border-border bg-bg-elevated p-6 transition-all duration-200 hover:border-border-hover hover:bg-bg-surface ' . $class]) }}>
    {{-- Initials Avatar placeholder with gradient per design system --}}
    <div class="flex items-center gap-4">
        <div class="flex h-14 w-14 items-center justify-center rounded-full border border-border bg-gradient-to-br from-accent/20 to-bg-surface font-mono text-base font-bold text-accent">
            {{ collect(explode(' ', $member['name']))->map(fn($part) => substr($part, 0, 1))->join('') }}
        </div>
        <div>
            <h3 class="text-base font-semibold text-fg">{{ $member['name'] }}</h3>
            <p class="font-mono text-xs text-accent">{{ $member['role'] }}</p>
        </div>
    </div>

    <p class="mt-4 text-sm leading-relaxed text-fg-secondary">
        {{ $member['description'] }}
    </p>
</div>
