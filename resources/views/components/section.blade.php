@props([
    'id' => null,
    'border' => true,
    'class' => '',
])

<section @if($id) id="{{ $id }}" @endif {{ $attributes->merge(['class' => ($border ? 'border-t border-neutral-200/80 ' : '') . 'py-16 sm:py-24 px-4 sm:px-6 lg:px-8 ' . $class]) }}>
    <div class="mx-auto max-w-[1400px]">
        {{ $slot }}
    </div>
</section>
