<?php

declare(strict_types=1);

namespace App\Content;

/**
 * Engineering Insights from docs/23-business-data.md §20.
 * Source of truth: Publicly listed articles on zytrixontech.com.
 */
final class Insights
{
    /**
     * @return array<int, array{
     *     title: string,
     *     slug: string,
     *     published_at: string,
     *     category: string,
     *     read_time: string,
     *     summary: string,
     * }>
     */
    public static function all(): array
    {
        return [
            [
                'title' => 'The Future of Enterprise Architecture: Serverless Meets Edge Computing',
                'slug' => 'future-of-enterprise-architecture-serverless-edge',
                'published_at' => 'May 24, 2026',
                'category' => 'Cloud Architecture',
                'read_time' => '6 min read',
                'summary' => 'Exploring how low-latency edge functions and event-driven serverless architectures transform modern cloud resilience.',
            ],
            [
                'title' => 'Mastering GSAP for Modern React Applications',
                'slug' => 'mastering-gsap-modern-react-applications',
                'published_at' => 'May 18, 2026',
                'category' => 'Frontend Engineering',
                'read_time' => '8 min read',
                'summary' => 'Techniques for coordinating hardware-accelerated animations, scroll triggers, and responsive transitions in React.',
            ],
            [
                'title' => 'How to Implement Zero-Trust Security in SaaS',
                'slug' => 'how-to-implement-zero-trust-security-saas',
                'published_at' => 'May 12, 2026',
                'category' => 'Security',
                'read_time' => '7 min read',
                'summary' => 'Practical steps for micro-segmentation, identity verification, and continuous least-privilege enforcement.',
            ],
            [
                'title' => 'Designing for the Dark Mode: Best Practices',
                'slug' => 'designing-dark-mode-best-practices',
                'published_at' => 'May 05, 2026',
                'category' => 'UI/UX Design',
                'read_time' => '5 min read',
                'summary' => 'Contrast ratios, surface hierarchies, and psychological considerations when building dark-first enterprise interfaces.',
            ],
            [
                'title' => 'Why Next.js 15 is a Game Changer for SEO',
                'slug' => 'why-nextjs-15-game-changer-seo',
                'published_at' => 'April 28, 2026',
                'category' => 'Web Development',
                'read_time' => '6 min read',
                'summary' => 'Leveraging server components, streaming metadata, and caching primitives to boost search visibility.',
            ],
            [
                'title' => 'Automating Customer Support with Custom LLMs',
                'slug' => 'automating-customer-support-custom-llms',
                'published_at' => 'April 21, 2026',
                'category' => 'AI & Automation',
                'read_time' => '9 min read',
                'summary' => 'Designing domain-grounded retrieval pipelines and guardrails for automated client support at scale.',
            ],
            [
                'title' => 'Migrating from Monolith to Microservices',
                'slug' => 'migrating-monolith-to-microservices',
                'published_at' => 'April 15, 2026',
                'category' => 'Architecture',
                'read_time' => '10 min read',
                'summary' => 'A structured strangler-fig migration strategy that minimizes downtime and eliminates operational bottlenecks.',
            ],
        ];
    }

    /**
     * @return array<int, array{title: string, slug: string, published_at: string, category: string, read_time: string, summary: string}>
     */
    public static function recent(int $limit = 3): array
    {
        return array_slice(self::all(), 0, $limit);
    }
}
