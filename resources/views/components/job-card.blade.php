@props([
    'job',
    'class' => '',
])

<div {{ $attributes->merge(['class' => 'reveal rounded-3xl border border-neutral-200/80 dark:border-neutral-800/80 bg-white dark:bg-[#141519] p-8 shadow-[inset_0_1px_1px_rgba(255,255,255,0.9),0_12px_32px_-8px_rgba(0,0,0,0.04)] dark:shadow-[0_12px_32px_-8px_rgba(0,0,0,0.6)] hover-lift ' . $class]) }}>
    <div class="flex flex-wrap items-center justify-between gap-2">
        <div class="flex flex-wrap items-center gap-2">
            <x-badge variant="accent">{{ $job['department'] }}</x-badge>
            <x-badge variant="neutral">{{ $job['work_mode'] }}</x-badge>
            <x-badge variant="muted">{{ $job['employment_type'] }}</x-badge>
        </div>
        <span class="font-mono text-xs text-neutral-500 dark:text-neutral-400">{{ $job['location'] }}</span>
    </div>

    <h3 class="mt-5 text-xl font-bold text-neutral-900 dark:text-white">{{ $job['title'] }}</h3>

    <p class="mt-2 text-sm leading-relaxed text-neutral-600 dark:text-neutral-400">
        {{ $job['description'] }}
    </p>

    @if (!empty($job['requirements']))
        <ul class="mt-5 space-y-2 border-t border-neutral-100 dark:border-neutral-800 pt-4 text-xs text-neutral-600 dark:text-neutral-400">
            @foreach ($job['requirements'] as $req)
                <li class="flex items-center gap-2">
                    <span class="h-1.5 w-1.5 rounded-full bg-neutral-900 dark:bg-white"></span>
                    <span>{{ $req }}</span>
                </li>
            @endforeach
        </ul>
    @endif

    <div class="mt-8 flex items-center justify-between border-t border-neutral-100 dark:border-neutral-800 pt-5">
        <a href="mailto:{{ \App\Content\Careers::applicationEmail() }}?subject=Application:%20{{ urlencode($job['title']) }}"
           class="btn-magnetic inline-flex items-center gap-2 rounded-full bg-neutral-900 dark:bg-[#18191E] dark:border dark:border-neutral-700 dark:hover:bg-[#22242B] px-5 py-2.5 text-xs font-semibold text-white transition-all hover:bg-black hover:shadow-lg active:scale-[0.97]">
            <span>Apply via Email</span>
            <span>&rarr;</span>
        </a>
        <span class="font-mono text-xs text-neutral-400">Immediate Opening</span>
    </div>
</div>
