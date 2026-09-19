<x-layouts.app
    title="500 — Server Error | Zytrixon Tech"
    description="A temporary server error occurred. Our engineering team has been alerted.">

    <div class="flex min-h-[70vh] items-center justify-center px-6 py-24 text-center lg:px-8">
        <div class="mx-auto max-w-lg">
            <p class="font-mono text-xs font-semibold uppercase tracking-[0.25em] text-red-400">
                500 // INTERNAL_SERVER_ERROR
            </p>

            <h1 class="mt-4 text-4xl font-bold tracking-tight text-fg sm:text-5xl">
                System Processing Exception
            </h1>

            <p class="mt-4 text-base leading-relaxed text-fg-secondary">
                An unexpected condition interrupted request execution. Our engineering monitoring has recorded this event.
            </p>

            <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
                <x-button variant="primary" href="/">
                    &larr; Return to Homepage
                </x-button>
                <x-button variant="outline" href="/contact">
                    Report Issue / Contact Us
                </x-button>
            </div>
        </div>
    </div>

</x-layouts.app>
