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

<div class="space-y-1.5">
    @if ($label)
        <label for="{{ $inputId }}" class="block text-xs font-mono font-medium uppercase tracking-wider text-fg-secondary">
            {{ $label }}
            @if ($required)
                <span class="text-accent ml-0.5">*</span>
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
            'class' => 'w-full rounded-lg border bg-bg-surface px-4 py-2.5 text-sm text-fg placeholder:text-fg-muted transition-colors focus:border-accent focus:outline-none focus:ring-1 focus:ring-accent disabled:opacity-50 ' . ($error || $errors->has($name) ? 'border-red-500' : 'border-border')
        ]) }}
    >{{ old($name, $value) }}</textarea>

    @if ($help && !$error && !$errors->has($name))
        <p class="text-xs text-fg-muted">{{ $help }}</p>
    @endif

    @error($name)
        <p class="text-xs text-red-400 mt-1 font-mono">{{ $message }}</p>
    @enderror
</div>
