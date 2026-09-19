@props([
    'class' => '',
])

<hr {{ $attributes->merge(['class' => 'border-0 border-t border-neutral-200/80 dark:border-neutral-800/80 my-8 ' . $class]) }} />
