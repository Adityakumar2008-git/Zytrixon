<?php

declare(strict_types=1);

namespace App\Content;

use App\Enums\IndustrySlug;

/**
 * Industry sectors from docs/23-business-data.md §6.
 *
 * These are capabilities/industry claims. They should NOT automatically
 * be represented as proof of completed client projects in each sector.
 */
final class Industries
{
    /**
     * @return array<string, array{slug: IndustrySlug, title: string, description: string, icon: string}>
     */
    public static function all(): array
    {
        return [
            IndustrySlug::FinTechBanking->value => [
                'slug' => IndustrySlug::FinTechBanking,
                'title' => 'FinTech & Banking',
                'description' => 'Secure payment gateways, blockchain ledgers, and banking portals.',
                'icon' => 'wallet',
            ],
            IndustrySlug::Healthcare->value => [
                'slug' => IndustrySlug::Healthcare,
                'title' => 'Healthcare',
                'description' => 'Patient management systems and healthcare technology platforms.',
                'icon' => 'heart-pulse',
            ],
            IndustrySlug::ECommerce->value => [
                'slug' => IndustrySlug::ECommerce,
                'title' => 'E-Commerce',
                'description' => 'High-converting retail platforms and marketplace solutions.',
                'icon' => 'shopping-cart',
            ],
            IndustrySlug::EdTech->value => [
                'slug' => IndustrySlug::EdTech,
                'title' => 'EdTech',
                'description' => 'Learning management systems and interactive learning platforms.',
                'icon' => 'graduation-cap',
            ],
            IndustrySlug::TravelLogistics->value => [
                'slug' => IndustrySlug::TravelLogistics,
                'title' => 'Travel & Logistics',
                'description' => 'Booking engines, fleet management, and real-time routing systems.',
                'icon' => 'map-pin',
            ],
            IndustrySlug::Manufacturing->value => [
                'slug' => IndustrySlug::Manufacturing,
                'title' => 'Manufacturing',
                'description' => 'IoT sensor tracking and industrial process optimization.',
                'icon' => 'factory',
            ],
            IndustrySlug::RealEstate->value => [
                'slug' => IndustrySlug::RealEstate,
                'title' => 'Real Estate',
                'description' => 'Property management and real estate technology applications.',
                'icon' => 'building',
            ],
            IndustrySlug::Gaming->value => [
                'slug' => IndustrySlug::Gaming,
                'title' => 'Gaming',
                'description' => 'Interactive gaming experiences and entertainment platforms.',
                'icon' => 'gamepad',
            ],
            IndustrySlug::SupplyChain->value => [
                'slug' => IndustrySlug::SupplyChain,
                'title' => 'Supply Chain',
                'description' => 'Automated fleet and supply-chain monitoring solutions.',
                'icon' => 'truck',
            ],
            IndustrySlug::MediaEntertainment->value => [
                'slug' => IndustrySlug::MediaEntertainment,
                'title' => 'Media & Entertainment',
                'description' => 'High-traffic content platforms, video streaming infrastructure, and enterprise CMS solutions.',
                'icon' => 'play',
            ],
        ];
    }
}
