@props([
    'number' => null,
    'label',
    'class' => '',
])

<div {{ $attributes->merge(['class' => 'flex items-center gap-3 font-mono text-xs font-semibold uppercase tracking-[0.2em] text-accent ' . $class]) }}>
    @if($number)
        <span class="text-accent/60">{{ str_pad((string)$number, 2, '0', STR_PAD_LEFT) }}</span>
        <span class="text-border-hover">//</span>
    @endif
    <span>{{ $label }}</span>
</div>
