@props([
    'member',
    'class' => '',
])

<div {{ $attributes->merge(['class' => 'reveal rounded-3xl border border-neutral-200/80 dark:border-neutral-800/80 bg-white dark:bg-[#141519] p-7 shadow-[inset_0_1px_1px_rgba(255,255,255,0.9),0_12px_32px_-8px_rgba(0,0,0,0.04)] dark:shadow-[0_12px_32px_-8px_rgba(0,0,0,0.6)] hover-lift ' . $class]) }}>
    {{-- Clean photo placeholder frame as requested --}}
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-b from-neutral-50 to-neutral-100/80 dark:from-[#1A1B20] dark:to-[#121316] border border-dashed border-neutral-300/90 dark:border-neutral-700 aspect-[4/3] flex flex-col items-center justify-center text-neutral-400 dark:text-neutral-500 group-hover:border-neutral-400 dark:group-hover:border-neutral-500 transition-colors">
        <div class="h-12 w-12 rounded-full bg-white dark:bg-[#202228] border border-neutral-200/80 dark:border-neutral-700 shadow-2xs flex items-center justify-center text-neutral-400 dark:text-neutral-300">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
        </div>
        <span class="mt-3 font-mono text-xs uppercase tracking-[0.2em] text-neutral-400 dark:text-neutral-400">Photo Placeholder</span>
    </div>

    <div class="mt-6">
        <h3 class="text-xl font-bold text-neutral-900 dark:text-white">{{ $member['name'] }}</h3>
        <p class="font-mono text-xs text-neutral-500 dark:text-neutral-400 mt-1 uppercase tracking-wider">{{ $member['role'] }}</p>
        <p class="mt-3 text-sm text-neutral-600 dark:text-neutral-400 leading-relaxed">
            {{ $member['description'] }}
        </p>
    </div>
</div>
