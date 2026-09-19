@props([
    'variant' => 'neutral',
    'class' => '',
])

@php
    $variants = [
        'neutral' => 'frosted-glass-pill text-neutral-800',
        'accent' => 'bg-neutral-900 border-neutral-900 text-white shadow-xs',
        'muted' => 'bg-neutral-100/70 border-neutral-200/60 text-neutral-500',
    ];
    $variantClass = $variants[$variant] ?? $variants['neutral'];
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center gap-1.5 rounded-full border px-3 py-1 text-xs font-mono {$variantClass} {$class}"]) }}>
    {{ $slot }}
</span>
