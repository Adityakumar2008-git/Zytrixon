<?php

declare(strict_types=1);

namespace App\Content;

/**
 * Verified case studies / portfolio projects from docs/23-business-data.md §8–10.
 *
 * These are real projects from the official Zytrixon website.
 * Do not invent additional project metrics or client details
 * beyond what the source provides.
 */
final class CaseStudies
{
    /**
     * @return array<string, array{slug: string, title: string, type: string, technology: string, description: string, features: string[], testimonial: ?array{quote: string, name: string, title: string, company: string}}>
     */
    public static function all(): array
    {
        return [
            'school-management-system' => [
                'slug' => 'school-management-system',
                'title' => 'School Management System',
                'type' => 'Web Application',
                'technology' => 'Next.js',
                'description' => 'A comprehensive school ERP system digitizing education administration.',
                'features' => [
                    'Student data management',
                    'Real-time attendance tracking',
                    'Fee processing',
                    'Exam grading',
                    'Parent portal',
                ],
                // §26: Existing public testimonial. Subject to re-authorization.
                'testimonial' => [
                    'quote' => 'Zytrixon understood the business logic and delivered the School Management System ahead of schedule.',
                    'name' => 'Rahul Kumar',
                    'title' => 'CEO',
                    'company' => 'TechEdu',
                ],
            ],
            'affiliate-marketing-app' => [
                'slug' => 'affiliate-marketing-app',
                'title' => 'Affiliate Marketing App',
                'type' => 'Mobile App',
                'technology' => 'React Native',
                'description' => 'A cross-platform mobile ecosystem for global affiliate marketers.',
                'features' => [
                    'Real-time multi-tier commission tracking',
                    'Referral-chain visualization',
                    'Multi-currency payment gateways',
                ],
                'testimonial' => null,
            ],
            'iot-smart-factory-dashboard' => [
                'slug' => 'iot-smart-factory-dashboard',
                'title' => 'IoT Smart Factory Dashboard',
                'type' => 'IoT / Real-time Analytics',
                'technology' => 'IoT Platform',
                'description' => 'A live industrial monitoring dashboard for smart manufacturing.',
                'features' => [
                    'Real-time sensor data visualization',
                    'AI-driven predictive-maintenance alerts',
                    'Remote machine calibration',
                ],
                'testimonial' => null,
            ],
        ];
    }

    public static function find(string $slug): ?array
    {
        return self::all()[$slug] ?? null;
    }

    public static function slugs(): array
    {
        return array_keys(self::all());
    }

    /**
     * Get featured case studies for homepage (small number of strong projects).
     */
    public static function featured(): array
    {
        return self::all();
    }
}
