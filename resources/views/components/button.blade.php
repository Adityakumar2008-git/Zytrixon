@props([
    'variant' => 'primary',
    'href' => null,
    'type' => 'button',
    'class' => '',
])

@php
    $baseStyles = 'inline-flex items-center justify-center font-medium text-sm rounded-lg transition-all duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-accent focus-visible:ring-offset-2 focus-visible:ring-offset-bg disabled:opacity-50 disabled:pointer-events-none';

    $variants = [
        'primary' => 'bg-accent text-white px-5 py-2.5 hover:bg-accent-hover active:bg-accent-active shadow-sm hover:shadow-accent/20 hover:shadow-lg',
        'secondary' => 'bg-bg-elevated border border-border text-fg px-5 py-2.5 hover:bg-bg-surface hover:border-border-hover',
        'outline' => 'border border-border text-fg px-5 py-2.5 hover:border-border-hover hover:bg-bg-surface',
        'ghost' => 'text-fg-secondary hover:text-fg hover:bg-bg-surface px-4 py-2',
    ];

    $classes = $baseStyles . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . $class;
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
