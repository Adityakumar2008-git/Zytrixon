<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Content\Services;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'service' => ['nullable', 'string', Rule::in(Services::slugs())],
            'message' => ['required', 'string', 'min:10', 'max:3000'],
            'hp_company' => ['prohibited'], // Honeypot field: must not be present/filled
        ];
    }

    /**
     * Custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please provide your name.',
            'email.required' => 'A valid email address is required so we can reply.',
            'email.email' => 'Please provide a valid email format.',
            'message.required' => 'Please describe your project or requirements.',
            'message.min' => 'Please provide at least 10 characters so we understand your request.',
            'hp_company.prohibited' => 'Spam submission detected.',
        ];
    }
}
