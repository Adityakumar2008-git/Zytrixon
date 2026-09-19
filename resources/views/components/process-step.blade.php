@props([
    'step',
    'class' => '',
])

<div {{ $attributes->merge(['class' => 'reveal relative flex flex-col justify-between rounded-3xl border border-neutral-200/80 bg-gradient-to-b from-white/95 to-[#F7F7F8]/85 backdrop-blur-md p-8 shadow-[inset_0_1px_1px_rgba(255,255,255,0.9),0_8px_24px_-6px_rgba(0,0,0,0.03)] hover-lift ' . $class]) }}>
    <div>
        <div class="flex items-center justify-between">
            <span class="font-mono text-2xl font-bold tracking-tight text-neutral-900">
                {{ $step['number'] }}
            </span>
            <span class="h-2 w-2 rounded-full bg-neutral-900 ring-4 ring-neutral-900/10"></span>
        </div>

        <h3 class="mt-5 text-lg font-bold text-neutral-900">
            {{ $step['title'] }}
        </h3>

        <p class="mt-2 text-sm leading-relaxed text-neutral-600">
            {{ $step['description'] }}
        </p>
    </div>
</div>
