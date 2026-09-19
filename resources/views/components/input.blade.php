@props([
    'name',
    'id' => null,
    'label' => null,
    'type' => 'text',
    'value' => null,
    'placeholder' => '',
    'required' => false,
    'error' => null,
    'help' => null,
])

@php
    $inputId = $id ?? $name;
@endphp

<div class="space-y-2">
    @if ($label)
        <label for="{{ $inputId }}" class="block text-xs font-mono font-semibold uppercase tracking-wider text-neutral-700">
            {{ $label }}
            @if ($required)
                <span class="text-neutral-900 ml-0.5">*</span>
            @endif
        </label>
    @endif

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $inputId }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        @if ($required) required @endif
        {{ $attributes->merge([
            'class' => 'w-full rounded-xl border bg-white px-4 py-3 text-sm text-neutral-900 placeholder:text-neutral-400 transition-colors focus:border-neutral-900 focus:outline-none focus:ring-1 focus:ring-neutral-900 disabled:opacity-50 ' . ($error || $errors->has($name) ? 'border-red-500' : 'border-neutral-300')
        ]) }}
    />

    @if ($help && !$error && !$errors->has($name))
        <p class="text-xs text-neutral-500">{{ $help }}</p>
    @endif

    @error($name)
        <p class="text-xs text-red-600 mt-1 font-mono">{{ $message }}</p>
    @enderror
</div>
