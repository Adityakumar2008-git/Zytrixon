@props([
    'as' => 'div',
    'class' => '',
])

<{{ $as }} {{ $attributes->merge(['class' => 'mx-auto max-w-[var(--container-max)] px-6 lg:px-8 ' . $class]) }}>
    {{ $slot }}
</{{ $as }}>
