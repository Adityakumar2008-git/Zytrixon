@props([
    'member',
    'class' => '',
])

<div {{ $attributes->merge(['class' => 'rounded-2xl border border-neutral-200/80 bg-white p-6 transition-all duration-200 hover:border-neutral-400 hover:shadow-sm ' . $class]) }}>
    {{-- Clean photo placeholder frame as requested --}}
    <div class="relative overflow-hidden rounded-xl bg-neutral-100 border border-dashed border-neutral-300 aspect-[4/3] flex flex-col items-center justify-center text-neutral-400">
        <svg class="h-12 w-12 text-neutral-300" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
        </svg>
        <span class="mt-2 font-mono text-xs uppercase tracking-wider text-neutral-400">Placeholder Image</span>
    </div>

    <div class="mt-5">
        <h3 class="text-lg font-bold text-neutral-900">{{ $member['name'] }}</h3>
        <p class="font-mono text-xs text-neutral-500 mt-0.5">{{ $member['role'] }}</p>
        <p class="mt-3 text-sm text-neutral-600 leading-relaxed">
            {{ $member['description'] }}
        </p>
    </div>
</div>
