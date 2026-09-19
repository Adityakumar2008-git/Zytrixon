<?php

declare(strict_types=1);

namespace App\Content;

/**
 * Verified career opportunities from docs/23-business-data.md §21.
 * Source of truth: Publicly listed careers on zytrixontech.com.
 */
final class Careers
{
    /**
     * @return array<int, array{
     *     title: string,
     *     department: string,
     *     location: string,
     *     work_mode: string,
     *     employment_type: string,
     *     description: string,
     *     requirements: string[],
     * }>
     */
    public static function all(): array
    {
        return [
            [
                'title' => 'Senior React Engineer',
                'department' => 'Engineering',
                'location' => 'Samastipur, IN',
                'work_mode' => 'Hybrid',
                'employment_type' => 'Full-time',
                'description' => 'Lead frontend architecture and build high-performance, accessible web and mobile applications using modern React and TypeScript.',
                'requirements' => [
                    'Proficiency with React, Next.js, and TypeScript',
                    'Experience with state management and design systems',
                    'Knowledge of frontend performance optimization and web vitals',
                ],
            ],
            [
                'title' => 'Backend Lead (Laravel)',
                'department' => 'Engineering',
                'location' => 'Remote',
                'work_mode' => 'Remote',
                'employment_type' => 'Full-time',
                'description' => 'Architect robust REST and GraphQL APIs, optimize database queries, and design scalable services with Laravel and PostgreSQL.',
                'requirements' => [
                    'Deep expertise in PHP and modern Laravel',
                    'Experience designing relational schemas and caching strategies',
                    'Knowledge of API security, queue systems, and background jobs',
                ],
            ],
            [
                'title' => 'UI/UX Designer',
                'department' => 'Design',
                'location' => 'Samastipur, IN',
                'work_mode' => 'On-site',
                'employment_type' => 'Full-time',
                'description' => 'Craft intuitive, accessible user interfaces and design systems for enterprise web and mobile applications.',
                'requirements' => [
                    'Proficiency in Figma and modern prototyping tools',
                    'Experience building scalable component libraries and design tokens',
                    'Strong understanding of usability, typography, and responsive layouts',
                ],
            ],
            [
                'title' => 'AI & Automation Specialist',
                'department' => 'Data & AI',
                'location' => 'Remote',
                'work_mode' => 'Remote',
                'employment_type' => 'Contract',
                'description' => 'Develop workflow automations and integrate custom language models and machine learning pipelines into client applications.',
                'requirements' => [
                    'Experience with Python, LLM APIs, and embedding models',
                    'Knowledge of automated workflow orchestration and agentic patterns',
                    'Familiarity with data processing pipelines and vector stores',
                ],
            ],
        ];
    }

    public static function applicationEmail(): string
    {
        return Site::EMAIL;
    }
}
