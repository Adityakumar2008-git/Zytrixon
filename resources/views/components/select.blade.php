@props([
    'name',
    'id' => null,
    'label' => null,
    'options' => [],
    'selected' => null,
    'placeholder' => 'Select an option...',
    'required' => false,
    'error' => null,
    'help' => null,
])

@php
    $inputId = $id ?? $name;
    $current = old($name, $selected);
@endphp

<div class="space-y-1.5">
    @if ($label)
        <label for="{{ $inputId }}" class="block text-xs font-mono font-medium uppercase tracking-wider text-fg-secondary">
            {{ $label }}
            @if ($required)
                <span class="text-accent ml-0.5">*</span>
            @endif
        </label>
    @endif

    <select
        name="{{ $name }}"
        id="{{ $inputId }}"
        @if ($required) required @endif
        {{ $attributes->merge([
            'class' => 'w-full rounded-lg border bg-bg-surface px-4 py-2.5 text-sm text-fg transition-colors focus:border-accent focus:outline-none focus:ring-1 focus:ring-accent disabled:opacity-50 ' . ($error || $errors->has($name) ? 'border-red-500' : 'border-border')
        ]) }}
    >
        @if ($placeholder)
            <option value="" disabled {{ $current === null || $current === '' ? 'selected' : '' }}>{{ $placeholder }}</option>
        @endif

        @foreach ($options as $val => $optLabel)
            <option value="{{ $val }}" {{ (string)$current === (string)$val ? 'selected' : '' }}>
                {{ $optLabel }}
            </option>
        @endforeach
    </select>

    @if ($help && !$error && !$errors->has($name))
        <p class="text-xs text-fg-muted">{{ $help }}</p>
    @endif

    @error($name)
        <p class="text-xs text-red-400 mt-1 font-mono">{{ $message }}</p>
    @enderror
</div>
