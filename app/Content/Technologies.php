<?php

declare(strict_types=1);

namespace App\Content;

/**
 * Technology stack from docs/23-business-data.md §11.
 *
 * This is a publicly displayed technology stack, not a claim that
 * every technology is used on every project. Communicate as capability.
 */
final class Technologies
{
    /**
     * @return array<string, string[]>
     */
    public static function all(): array
    {
        return [
            'Frontend / Application' => [
                'React',
                'Next.js',
                'Vue.js',
                'Laravel',
                'Node.js',
                'Python',
                'React Native',
                'Flutter',
                'TypeScript',
                'Tailwind CSS',
                'GraphQL',
            ],
            'Infrastructure / Data' => [
                'AWS',
                'Docker',
                'Kubernetes',
                'MongoDB',
                'PostgreSQL',
                'Redis',
            ],
        ];
    }

    /**
     * Flat list of all technologies.
     *
     * @return string[]
     */
    public static function flat(): array
    {
        return array_merge(...array_values(self::all()));
    }

    /**
     * Capability keywords from §27 (homepage ticker).
     *
     * @return string[]
     */
    public static function capabilityKeywords(): array
    {
        return [
            'IoT Solutions',
            'React',
            'Laravel',
            'Cloud Infrastructure',
            'AI & ML',
            'Embedded Systems',
            'TypeScript',
            'Digital Twins',
            'Edge Computing',
            'Full Stack',
            'UI/UX Design',
            'DevOps',
            'Smart Devices',
            'Blockchain',
            'APIs',
            'Mobile Apps',
        ];
    }
}
