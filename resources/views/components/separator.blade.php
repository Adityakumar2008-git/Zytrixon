@props([
    'class' => '',
])

<hr {{ $attributes->merge(['class' => 'border-0 border-t border-border my-8 ' . $class]) }} />
