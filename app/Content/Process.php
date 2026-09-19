<?php

declare(strict_types=1);

namespace App\Content;

/**
 * 6-stage development process from docs/23-business-data.md §7.
 * Publicly described on the official Zytrixon website.
 */
final class Process
{
    /**
     * @return array<int, array{number: string, title: string, description: string}>
     */
    public static function all(): array
    {
        return [
            [
                'number' => '01',
                'title' => 'Discovery',
                'description' => 'We dive into your business, industry, and goals through workshops and research to map the landscape and identify opportunities.',
            ],
            [
                'number' => '02',
                'title' => 'Design',
                'description' => 'Wireframes developed into high-fidelity prototypes with emphasis on usability and conversion.',
            ],
            [
                'number' => '03',
                'title' => 'Architecture',
                'description' => 'System architecture, database schemas, and technology-stack choices designed before development begins.',
            ],
            [
                'number' => '04',
                'title' => 'Develop',
                'description' => 'Clean, modular development using agile sprints with transparent progress updates.',
            ],
            [
                'number' => '05',
                'title' => 'QA & Testing',
                'description' => 'Automated and manual testing, performance optimization, and security checks before launch.',
            ],
            [
                'number' => '06',
                'title' => 'Deploy',
                'description' => 'Production deployment followed by monitoring and iterative improvements.',
            ],
        ];
    }
}
