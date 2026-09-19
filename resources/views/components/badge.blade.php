@props([
    'variant' => 'neutral',
    'class' => '',
])

@php
    $variants = [
        'neutral' => 'frosted-glass-pill text-neutral-800 dark:text-neutral-200 dark:border-white/10 dark:bg-white/5',
        'accent' => 'bg-neutral-900 border-neutral-900 text-white shadow-xs dark:bg-white dark:text-neutral-950 dark:border-white',
        'muted' => 'bg-neutral-100/70 border-neutral-200/60 text-neutral-500 dark:bg-neutral-800/60 dark:border-neutral-700/60 dark:text-neutral-400',
    ];
    $variantClass = $variants[$variant] ?? $variants['neutral'];
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center gap-1.5 rounded-full border px-3 py-1 text-xs font-mono {$variantClass} {$class}"]) }}>
    {{ $slot }}
</span>
