@props([
    'id' => null,
    'border' => true,
    'class' => '',
])

<section @if($id) id="{{ $id }}" @endif {{ $attributes->merge(['class' => ($border ? 'border-t border-border ' : '') . 'px-6 py-20 lg:px-8 lg:py-28 ' . $class]) }}>
    <x-container>
        {{ $slot }}
    </x-container>
</section>
