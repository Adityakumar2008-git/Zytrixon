@php
    use App\Content\Navigation;
    use App\Content\Site;
@endphp

{{-- Footer — docs/17-component-inventory.md §12
     Contact info, nav links, social, copyright --}}
<footer class="border-t border-border bg-bg-elevated" role="contentinfo">
    <div class="mx-auto max-w-[var(--container-max)] px-6 py-16 lg:px-8 lg:py-20">

        {{-- Footer Grid --}}
        <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-4">

            {{-- Brand Column --}}
            <div class="lg:col-span-1">
                <a href="/" class="text-label text-lg tracking-[0.15em] text-fg" aria-label="{{ Site::BRAND }} — Home">
                    {{ Site::BRAND }}
                </a>
                <p class="mt-4 max-w-xs text-body-sm text-fg-secondary">
                    {{ Site::DESCRIPTION }}
                </p>
                <div class="mt-6 space-y-2">
                    <a href="mailto:{{ Site::EMAIL }}" class="block text-body-sm text-fg-secondary transition-colors duration-150 hover:text-accent">
                        {{ Site::EMAIL }}
                    </a>
                    <a href="tel:{{ str_replace(' ', '', Site::PHONE_PRIMARY) }}" class="block text-body-sm text-fg-secondary transition-colors duration-150 hover:text-accent">
                        {{ Site::PHONE_PRIMARY }}
                    </a>
                    <p class="text-body-sm text-fg-muted">
                        {{ Site::primaryAddress() }}
                    </p>
                </div>
            </div>

            {{-- Navigation Columns --}}
            @foreach (Navigation::footer() as $group => $links)
                <div>
                    <h3 class="text-label text-fg-muted">{{ $group }}</h3>
                    <ul class="mt-4 space-y-3" role="list">
                        @foreach ($links as $link)
                            <li>
                                <a href="{{ $link['href'] }}"
                                   class="text-body-sm text-fg-secondary transition-colors duration-150 hover:text-fg">
                                    {{ $link['label'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach

            {{-- Connect Column --}}
            <div>
                <h3 class="text-label text-fg-muted">Connect</h3>
                <div class="mt-4 space-y-3">
                    <a href="mailto:{{ Site::EMAIL }}"
                       class="inline-flex items-center gap-2 rounded-lg border border-border px-4 py-2.5 text-sm text-fg-secondary transition-all duration-150 hover:border-border-hover hover:text-fg">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                        Email Us
                    </a>
                    <a href="https://wa.me/{{ str_replace(['+', ' '], '', Site::PHONE_PRIMARY) }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 rounded-lg border border-border px-4 py-2.5 text-sm text-fg-secondary transition-all duration-150 hover:border-border-hover hover:text-fg">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                            <path d="M12 0C5.373 0 0 5.373 0 12c0 2.625.846 5.059 2.284 7.034L.789 23.492a.75.75 0 0 0 .918.918l4.458-1.495A11.952 11.952 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22a9.94 9.94 0 0 1-5.39-1.584l-.386-.238-2.65.889.889-2.65-.238-.386A9.94 9.94 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/>
                        </svg>
                        WhatsApp
                    </a>
                </div>
            </div>

        </div>

        {{-- Bottom Bar --}}
        <div class="mt-12 flex flex-col items-center justify-between gap-4 border-t border-border pt-8 md:flex-row">
            <p class="text-caption text-fg-muted">
                &copy; {{ date('Y') }} {{ Site::NAME }}. All rights reserved.
            </p>
            <p class="text-caption text-fg-subtle">
                {{ Site::POSITIONING }}
            </p>
        </div>

    </div>
</footer>
