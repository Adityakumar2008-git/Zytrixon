@props([
    'variant' => 'neutral',
    'class' => '',
])

@php
    $variants = [
        'neutral' => 'bg-bg-surface border-border text-fg-secondary',
        'accent' => 'bg-accent-subtle border-accent/20 text-accent',
        'muted' => 'bg-bg-muted border-border text-fg-muted',
    ];
    $variantClass = $variants[$variant] ?? $variants['neutral'];
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center gap-1.5 rounded-full border px-2.5 py-1 text-xs font-mono {$variantClass} {$class}"]) }}>
    {{ $slot }}
</span>
