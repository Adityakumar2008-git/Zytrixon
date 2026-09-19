<?php

declare(strict_types=1);

namespace App\Content;

use App\Enums\ServiceSlug;

/**
 * Verified services from docs/23-business-data.md §5.
 * 6 primary services listed on the official Zytrixon website.
 *
 * Do not add services not publicly listed.
 * Do not invent capabilities beyond what the source provides.
 */
final class Services
{
    /**
     * Get all services.
     *
     * @return array<string, array{slug: ServiceSlug, title: string, description: string, capabilities: string[], icon: string}>
     */
    public static function all(): array
    {
        return [
            ServiceSlug::WebDevelopment->value => [
                'slug' => ServiceSlug::WebDevelopment,
                'title' => 'Web Development',
                'description' => 'Full-stack web applications using technologies including React, Next.js, and Laravel.',
                'capabilities' => [
                    'Fast, secure, scalable applications',
                    'Full-stack development',
                    'Progressive web apps',
                    'E-commerce platforms',
                    'Content management systems',
                ],
                'icon' => 'globe',
            ],
            ServiceSlug::AppDevelopment->value => [
                'slug' => ServiceSlug::AppDevelopment,
                'title' => 'App Development',
                'description' => 'Native and cross-platform mobile applications using React Native and Flutter for iOS and Android.',
                'capabilities' => [
                    'iOS & Android native apps',
                    'Cross-platform development',
                    'React Native & Flutter',
                    'App Store optimization',
                    'Performance optimization',
                ],
                'icon' => 'device-mobile',
            ],
            ServiceSlug::IoTSolutions->value => [
                'slug' => ServiceSlug::IoTSolutions,
                'title' => 'IoT Solutions',
                'description' => 'Smart devices, sensor networks, and real-time dashboards connecting physical and digital systems.',
                'capabilities' => [
                    'Smart device integration',
                    'Sensor networks',
                    'Real-time dashboards',
                    'Industrial monitoring',
                    'Edge computing',
                ],
                'icon' => 'cpu',
            ],
            ServiceSlug::AIAutomation->value => [
                'slug' => ServiceSlug::AIAutomation,
                'title' => 'AI & Automation',
                'description' => 'Custom AI models, workflow automation, and smart analytics to streamline business operations.',
                'capabilities' => [
                    'Custom AI models',
                    'Workflow automation',
                    'Predictive analytics',
                    'AI chatbots',
                    'Cognitive search',
                ],
                'icon' => 'sparkle',
            ],
            ServiceSlug::CustomSoftware->value => [
                'slug' => ServiceSlug::CustomSoftware,
                'title' => 'Custom Software',
                'description' => 'Tailor-made enterprise software, CRM, and ERP systems designed around client requirements.',
                'capabilities' => [
                    'Bespoke architecture',
                    'Enterprise integrations',
                    'CRM & ERP systems',
                    'Legacy system modernization',
                    'Role-based access control',
                ],
                'icon' => 'code',
            ],
            ServiceSlug::DigitalMarketing->value => [
                'slug' => ServiceSlug::DigitalMarketing,
                'title' => 'Digital Marketing',
                'description' => 'SEO, PPC, Social Media Marketing, and Analytics to grow your business online.',
                'capabilities' => [
                    'Search engine optimization',
                    'Pay-per-click advertising',
                    'Social media marketing',
                    'Analytics & insights',
                    'Conversion optimization',
                ],
                'icon' => 'chart-line',
            ],
        ];
    }

    /**
     * Get a single service by slug.
     */
    public static function find(string $slug): ?array
    {
        return self::all()[$slug] ?? null;
    }

    /**
     * Get all service slugs.
     *
     * @return string[]
     */
    public static function slugs(): array
    {
        return array_keys(self::all());
    }
}
