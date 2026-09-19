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

<div class="space-y-2">
    @if ($label)
        <label for="{{ $inputId }}" class="block text-xs font-mono font-semibold uppercase tracking-wider text-neutral-700 dark:text-neutral-300">
            {{ $label }}
            @if ($required)
                <span class="text-neutral-900 dark:text-white ml-0.5">*</span>
            @endif
        </label>
    @endif

    <select
        name="{{ $name }}"
        id="{{ $inputId }}"
        @if ($required) required @endif
        {{ $attributes->merge([
            'class' => 'w-full rounded-xl border bg-white dark:bg-[#16171B] px-4 py-3 text-sm text-neutral-900 dark:text-white transition-colors focus:border-neutral-900 dark:focus:border-white focus:outline-none focus:ring-1 focus:ring-neutral-900 dark:focus:ring-white disabled:opacity-50 ' . ($error || $errors->has($name) ? 'border-red-500 dark:border-red-500' : 'border-neutral-300 dark:border-neutral-700/80')
        ]) }}
    >
        @if ($placeholder)
            <option value="" disabled {{ $current === null || $current === '' ? 'selected' : '' }} class="dark:bg-[#16171B] dark:text-neutral-400">{{ $placeholder }}</option>
        @endif

        @foreach ($options as $val => $optLabel)
            <option value="{{ $val }}" {{ (string)$current === (string)$val ? 'selected' : '' }} class="dark:bg-[#16171B] dark:text-white">
                {{ $optLabel }}
            </option>
        @endforeach
    </select>

    @if ($help && !$error && !$errors->has($name))
        <p class="text-xs text-neutral-500 dark:text-neutral-400">{{ $help }}</p>
    @endif

    @error($name)
        <p class="text-xs text-red-600 dark:text-red-400 mt-1 font-mono">{{ $message }}</p>
    @enderror
</div>
