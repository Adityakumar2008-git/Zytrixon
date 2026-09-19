@props([
    'variant' => 'primary',
    'href' => null,
    'type' => 'button',
    'class' => '',
])

@php
    $baseStyles = 'btn-magnetic inline-flex items-center justify-center font-semibold text-sm rounded-full transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-neutral-900 focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none active:scale-[0.97]';

    $variants = [
        'primary' => 'bg-neutral-900 text-white px-7 py-3 hover:bg-black hover:shadow-xl shadow-sm border border-neutral-900',
        'secondary' => 'bg-white/90 backdrop-blur-md border border-neutral-300/90 text-neutral-800 px-6 py-3 hover:border-neutral-900 hover:text-neutral-900 hover:shadow-md shadow-[inset_0_1px_0_rgba(255,255,255,0.9)]',
        'outline' => 'bg-white/80 backdrop-blur-md border border-neutral-300/90 text-neutral-800 px-6 py-3 hover:border-neutral-900 hover:text-neutral-900 hover:shadow-md shadow-[inset_0_1px_0_rgba(255,255,255,0.9)]',
        'ghost' => 'text-neutral-600 hover:text-neutral-900 hover:bg-neutral-100/80 px-5 py-2.5',
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
