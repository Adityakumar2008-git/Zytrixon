<x-layouts.app
    title="404 — Page Not Found | Zytrixon Tech"
    description="The requested page could not be located on the server.">

    <div class="flex min-h-[70vh] items-center justify-center px-6 py-24 text-center lg:px-8">
        <div class="mx-auto max-w-lg">
            <p class="font-mono text-xs font-semibold uppercase tracking-[0.25em] text-accent">
                404 // NOT_FOUND
            </p>

            <h1 class="mt-4 text-4xl font-bold tracking-tight text-fg sm:text-5xl">
                Page Not Located
            </h1>

            <p class="mt-4 text-base leading-relaxed text-fg-secondary">
                The requested resource does not exist or has migrated to a different endpoint.
            </p>

            <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
                <x-button variant="primary" href="/">
                    &larr; Return to Homepage
                </x-button>
                <x-button variant="outline" href="/services">
                    Browse Services
                </x-button>
            </div>
        </div>
    </div>

</x-layouts.app>
