<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Content\Services;
use App\Content\Site;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

final class ContactController extends Controller
{
    public function show(): View
    {
        $services = Services::all();
        $serviceOptions = [];
        foreach ($services as $slug => $service) {
            $serviceOptions[$slug] = $service['title'];
        }

        return view('pages.contact', [
            'serviceOptions' => $serviceOptions,
        ]);
    }

    public function submit(ContactRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // Log enquiry for operational records
        Log::info('New project enquiry received', [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'service' => $validated['service'] ?? null,
            'ip' => $request->ip(),
        ]);

        return redirect()->route('contact.show')->with('success', 'Thank you for reaching out. We have received your message and will reply within 2 hours.');
    }
}
