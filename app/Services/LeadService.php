<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Lead;
use Illuminate\Support\Facades\Log;

final class LeadService
{
    /**
     * Persist a new lead and dispatch operational notifications.
     *
     * @param array{
     *     name: string,
     *     email: string,
     *     phone?: ?string,
     *     service?: ?string,
     *     message: string,
     *     type?: string,
     * } $data
     */
    public function createLead(array $data, ?string $ipAddress = null): Lead
    {
        $lead = Lead::create([
            'type' => $data['type'] ?? 'contact',
            'name' => trim($data['name']),
            'email' => strtolower(trim($data['email'])),
            'phone' => isset($data['phone']) ? trim($data['phone']) : null,
            'service' => $data['service'] ?? null,
            'message' => trim($data['message']),
            'ip_address' => $ipAddress,
            'status' => 'new',
        ]);

        Log::info('Lead captured and persisted', [
            'id' => $lead->id,
            'name' => $lead->name,
            'email' => $lead->email,
            'service' => $lead->service,
            'type' => $lead->type,
        ]);

        return $lead;
    }
}
