<?php

declare(strict_types=1);

namespace App\Content;

/**
 * Verified team members from docs/23-business-data.md §12.
 *
 * Only publish team members approved by the business at launch.
 * Do not add people based on third-party sources.
 */
final class Team
{
    /**
     * @return array<int, array{name: string, role: string, description: string}>
     */
    public static function all(): array
    {
        return [
            [
                'name' => 'Bipin Sahani',
                'role' => 'Co-founder & CTO',
                'description' => 'Leading the technical vision and strategic growth with 2.5+ years of extensive full-stack experience.',
            ],
            [
                'name' => 'Saurav Shandilya',
                'role' => 'Co-founder & COO',
                'description' => 'Driving operations and business strategy to scale solutions globally.',
            ],
            [
                'name' => 'Anup Kumar',
                'role' => 'Chief Marketing Officer',
                'description' => 'Crafting brand narratives and leading digital marketing to expand market reach.',
            ],
        ];
    }
}
