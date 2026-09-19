@php use App\Content\Site; @endphp

<x-layouts.app
    title="Contact Us — Start a Project | Zytrixon Tech"
    description="Get in touch with Zytrixon Tech. Discuss your software, web, mobile, or IoT engineering requirements. We reply within 2 hours.">

    {{-- Contact Hero --}}
    <section class="pt-16 pb-12 sm:pt-24 sm:pb-16 px-4 sm:px-6 lg:px-8 border-b border-neutral-200/80 bg-white">
        <div class="mx-auto max-w-[1400px]">
            <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">DIRECT CHANNEL</p>
            <h1 class="mt-4 text-4xl sm:text-6xl font-bold tracking-tight text-neutral-900 leading-[1.1]">
                Let's Build Something Exceptional
            </h1>
            <p class="mt-6 max-w-2xl text-base sm:text-lg text-neutral-600 leading-relaxed">
                Tell us about your project, timeline, and architectural challenges. We evaluate technical feasibility and reply within 2 hours.
            </p>
        </div>
    </section>

    {{-- Form + Details Section --}}
    <x-section :border="false" id="form">
        <div class="grid gap-12 lg:grid-cols-12 items-start">

            {{-- Left: Contact Form (7 cols) --}}
            <div class="lg:col-span-7">
                <div class="rounded-3xl border border-neutral-200/80 bg-white p-8 lg:p-12 shadow-sm">

                    {{-- Success Notification --}}
                    @if (session('success'))
                        <div class="mb-8 rounded-2xl border border-emerald-500/30 bg-emerald-50 p-5 text-emerald-900">
                            <div class="flex items-center gap-3">
                                <svg class="h-5 w-5 flex-shrink-0 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm font-semibold">{{ session('success') }}</span>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6" novalidate>
                        @csrf

                        {{-- Honeypot field (hidden from human users, catches bots) --}}
                        <div class="hidden" aria-hidden="true">
                            <label for="hp_company">Do not fill this field</label>
                            <input type="text" name="hp_company" id="hp_company" tabindex="-1" autocomplete="off">
                        </div>

                        {{-- Name --}}
                        <x-input
                            name="name"
                            label="Your Name / Organization"
                            placeholder="Aditya Sharma"
                            :required="true"
                        />

                        {{-- Email --}}
                        <x-input
                            type="email"
                            name="email"
                            label="Business Email"
                            placeholder="aditya@company.com"
                            :required="true"
                        />

                        {{-- Phone & Service row --}}
                        <div class="grid gap-6 sm:grid-cols-2">
                            <x-input
                                type="tel"
                                name="phone"
                                label="Phone / WhatsApp"
                                placeholder="+91 70497 11475"
                            />

                            <x-select
                                name="service"
                                label="Primary Service"
                                :options="$serviceOptions"
                                :selected="request('service')"
                                placeholder="Select area of interest..."
                            />
                        </div>

                        {{-- Message --}}
                        <x-textarea
                            name="message"
                            label="Project Overview & Requirements"
                            placeholder="Describe what you are trying to build, key features, target timeline, or architectural constraints..."
                            :rows="5"
                            :required="true"
                        />

                        {{-- Submit Button --}}
                        <div class="pt-2">
                            <button type="submit"
                                    class="w-full flex items-center justify-center gap-2 rounded-full bg-neutral-900 py-4 text-sm font-semibold text-white transition-all hover:bg-black hover:shadow-lg">
                                <span>Send Architecture Inquiry</span>
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </button>
                        </div>

                        <p class="text-center font-mono text-xs text-neutral-400">
                            100% Confidential &bull; Target response: Within 2 hours
                        </p>
                    </form>
                </div>
            </div>

            {{-- Right: Direct Contact Details & Locations (5 cols) --}}
            <div class="lg:col-span-5 space-y-8">

                {{-- Direct Contacts --}}
                <div class="rounded-3xl border border-neutral-200/80 bg-white p-8 shadow-sm">
                    <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">DIRECT LINES</p>
                    <h2 class="mt-3 text-2xl font-bold text-neutral-900">Reach Us Directly</h2>

                    <div class="mt-8 space-y-6">
                        {{-- Email --}}
                        <div class="flex items-start gap-4">
                            <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-neutral-100 border border-neutral-200 text-neutral-900">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <div>
                                <span class="font-mono text-xs uppercase tracking-wider text-neutral-400">General & Projects Email</span>
                                <p class="mt-1 font-bold text-neutral-900">
                                    <a href="mailto:{{ Site::EMAIL }}" class="hover:underline">{{ Site::EMAIL }}</a>
                                </p>
                            </div>
                        </div>

                        {{-- Primary Phone / WhatsApp --}}
                        <div class="flex items-start gap-4">
                            <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-neutral-100 border border-neutral-200 text-neutral-900">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>
                            </div>
                            <div>
                                <span class="font-mono text-xs uppercase tracking-wider text-neutral-400">Primary Phone & WhatsApp</span>
                                <p class="mt-1 font-bold text-neutral-900">
                                    <a href="tel:{{ str_replace(' ', '', Site::PHONE_PRIMARY) }}" class="hover:underline">{{ Site::PHONE_PRIMARY }}</a>
                                </p>
                            </div>
                        </div>

                        {{-- Secondary Phone --}}
                        <div class="flex items-start gap-4">
                            <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-neutral-100 border border-neutral-200 text-neutral-900">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                </svg>
                            </div>
                            <div>
                                <span class="font-mono text-xs uppercase tracking-wider text-neutral-400">Secondary Phone</span>
                                <p class="mt-1 font-bold text-neutral-900">
                                    <a href="tel:{{ str_replace(' ', '', Site::PHONE_SECONDARY) }}" class="hover:underline">{{ Site::PHONE_SECONDARY }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Location References (docs/23-business-data.md §2) --}}
                <div class="rounded-3xl border border-neutral-200/80 bg-white p-8 shadow-sm">
                    <p class="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">OFFICE LOCATIONS</p>
                    <h2 class="mt-3 text-2xl font-bold text-neutral-900">Where We Operate</h2>

                    <div class="mt-6 space-y-6">
                        <div class="border-l-2 border-neutral-900 pl-4">
                            <h3 class="font-bold text-neutral-900">Patna Location</h3>
                            <p class="mt-1 text-sm text-neutral-600">{{ Site::LOCATION_PATNA }}</p>
                        </div>

                        <div class="border-l-2 border-neutral-300 pl-4">
                            <h3 class="font-bold text-neutral-900">Samastipur Location</h3>
                            <p class="mt-1 text-sm text-neutral-600">{{ Site::LOCATION_SAMASTIPUR }}</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </x-section>

</x-layouts.app>
