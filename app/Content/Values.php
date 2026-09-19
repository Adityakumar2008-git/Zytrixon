<?php

declare(strict_types=1);

namespace App\Content;

/**
 * Business values from docs/23-business-data.md §19.
 */
final class Values
{
    /**
     * @return array<int, array{title: string, description: string, icon: string}>
     */
    public static function all(): array
    {
        return [
            [
                'title' => 'Security First',
                'description' => 'Security is built into every stage of development. We follow OWASP standards, implement SSL encryption, and conduct regular security audits.',
                'icon' => 'shield-check',
            ],
            [
                'title' => 'Innovation Driven',
                'description' => 'We work with AI, IoT, and emerging technologies to build solutions that stay ahead of the curve.',
                'icon' => 'lightbulb',
            ],
            [
                'title' => 'Full Transparency',
                'description' => 'Clear communication, honest billing, weekly progress reports, and full visibility into what is being built and why.',
                'icon' => 'eye',
            ],
        ];
    }
}
