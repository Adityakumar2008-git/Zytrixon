<x-layouts.app
    title="500 — Server Error | Zytrixon Tech"
    description="A temporary server error occurred. Our engineering team has been alerted.">

    <div class="flex min-h-[70vh] items-center justify-center px-4 sm:px-6 py-24 text-center lg:px-8 bg-[#FAFAFA] dark:bg-[#0A0A0B]">
        <div class="mx-auto max-w-lg">
            <p class="font-mono text-xs font-semibold uppercase tracking-[0.25em] text-red-500">
                500 // INTERNAL_SERVER_ERROR
            </p>

            <h1 class="mt-4 text-4xl font-bold tracking-tight text-neutral-900 dark:text-white sm:text-5xl">
                System Processing Exception
            </h1>

            <p class="mt-4 text-base leading-relaxed text-neutral-600 dark:text-neutral-400">
                An unexpected condition interrupted request execution. Our engineering monitoring has recorded this event.
            </p>

            <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
                <a href="/"
                   class="btn-magnetic inline-flex items-center gap-2 rounded-full bg-neutral-900 dark:bg-[#18191E] dark:border dark:border-neutral-700 px-7 py-3.5 text-sm font-semibold text-white transition-all hover:bg-black dark:hover:bg-[#22242B] hover:shadow-lg">
                    <span>&larr; Return to Homepage</span>
                </a>
                <a href="/contact"
                   class="btn-magnetic inline-flex items-center gap-2 rounded-full border border-neutral-300 dark:border-neutral-700 bg-white dark:bg-[#141519] px-6 py-3.5 text-sm font-semibold text-neutral-800 dark:text-neutral-200 transition-colors hover:border-neutral-900 dark:hover:border-white hover:text-neutral-900 dark:hover:text-white">
                    <span>Report Issue / Contact Us</span>
                </a>
            </div>
        </div>
    </div>

</x-layouts.app>
