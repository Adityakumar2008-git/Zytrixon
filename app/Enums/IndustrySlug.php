<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * Industry sectors from docs/23-business-data.md §6.
 * 10 sectors publicly listed on the Zytrixon homepage.
 */
enum IndustrySlug: string
{
    case FinTechBanking = 'fintech-banking';
    case Healthcare = 'healthcare';
    case ECommerce = 'e-commerce';
    case EdTech = 'edtech';
    case TravelLogistics = 'travel-logistics';
    case Manufacturing = 'manufacturing';
    case RealEstate = 'real-estate';
    case Gaming = 'gaming';
    case SupplyChain = 'supply-chain';
    case MediaEntertainment = 'media-entertainment';

    public function label(): string
    {
        return match ($this) {
            self::FinTechBanking => 'FinTech & Banking',
            self::Healthcare => 'Healthcare',
            self::ECommerce => 'E-Commerce',
            self::EdTech => 'EdTech',
            self::TravelLogistics => 'Travel & Logistics',
            self::Manufacturing => 'Manufacturing',
            self::RealEstate => 'Real Estate',
            self::Gaming => 'Gaming',
            self::SupplyChain => 'Supply Chain',
            self::MediaEntertainment => 'Media & Entertainment',
        };
    }
}
