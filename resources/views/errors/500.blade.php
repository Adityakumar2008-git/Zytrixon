<x-layouts.app
    title="500 — Server Error | Zytrixon Tech"
    description="A temporary server error occurred. Our engineering team has been alerted.">

    <div class="flex min-h-[70vh] items-center justify-center px-4 sm:px-6 py-24 text-center lg:px-8 bg-[#FAFAFA]">
        <div class="mx-auto max-w-lg">
            <p class="font-mono text-xs font-semibold uppercase tracking-[0.25em] text-red-500">
                500 // INTERNAL_SERVER_ERROR
            </p>

            <h1 class="mt-4 text-4xl font-bold tracking-tight text-neutral-900 sm:text-5xl">
                System Processing Exception
            </h1>

            <p class="mt-4 text-base leading-relaxed text-neutral-600">
                An unexpected condition interrupted request execution. Our engineering monitoring has recorded this event.
            </p>

            <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
                <a href="/"
                   class="inline-flex items-center gap-2 rounded-full bg-neutral-900 px-7 py-3.5 text-sm font-semibold text-white transition-all hover:bg-black hover:shadow-lg">
                    <span>&larr; Return to Homepage</span>
                </a>
                <a href="/contact"
                   class="inline-flex items-center gap-2 rounded-full border border-neutral-300 bg-white px-6 py-3.5 text-sm font-semibold text-neutral-800 transition-colors hover:border-neutral-900 hover:text-neutral-900">
                    <span>Report Issue / Contact Us</span>
                </a>
            </div>
        </div>
    </div>

</x-layouts.app>
