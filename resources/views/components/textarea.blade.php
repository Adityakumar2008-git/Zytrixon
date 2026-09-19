@props([
    'name',
    'id' => null,
    'label' => null,
    'value' => null,
    'placeholder' => '',
    'rows' => 4,
    'required' => false,
    'error' => null,
    'help' => null,
])

@php
    $inputId = $id ?? $name;
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

    <textarea
        name="{{ $name }}"
        id="{{ $inputId }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        @if ($required) required @endif
        {{ $attributes->merge([
            'class' => 'w-full rounded-xl border bg-white dark:bg-[#16171B] px-4 py-3 text-sm text-neutral-900 dark:text-white placeholder:text-neutral-400 dark:placeholder:text-neutral-500 transition-colors focus:border-neutral-900 dark:focus:border-white focus:outline-none focus:ring-1 focus:ring-neutral-900 dark:focus:ring-white disabled:opacity-50 ' . ($error || $errors->has($name) ? 'border-red-500 dark:border-red-500' : 'border-neutral-300 dark:border-neutral-700/80')
        ]) }}
    >{{ old($name, $value) }}</textarea>

    @if ($help && !$error && !$errors->has($name))
        <p class="text-xs text-neutral-500 dark:text-neutral-400">{{ $help }}</p>
    @endif

    @error($name)
        <p class="text-xs text-red-600 dark:text-red-400 mt-1 font-mono">{{ $message }}</p>
    @enderror
</div>
