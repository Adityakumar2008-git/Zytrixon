@props([
    'number' => null,
    'label',
    'class' => '',
])

<div {{ $attributes->merge(['class' => 'flex items-center gap-2.5 font-mono text-xs uppercase tracking-[0.2em] text-neutral-400 ' . $class]) }}>
    @if($number)
        <span class="text-neutral-900 dark:text-white font-semibold">{{ str_pad((string)$number, 2, '0', STR_PAD_LEFT) }}</span>
        <span class="text-neutral-300 dark:text-neutral-600">//</span>
    @endif
    <span>{{ $label }}</span>
</div>
