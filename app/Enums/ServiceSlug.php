<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * Verified service slugs from docs/23-business-data.md §5.
 * These are the 6 primary services listed on the official Zytrixon website.
 */
enum ServiceSlug: string
{
    case WebDevelopment = 'web-development';
    case AppDevelopment = 'app-development';
    case IoTSolutions = 'iot-solutions';
    case AIAutomation = 'ai-automation';
    case CustomSoftware = 'custom-software';
    case DigitalMarketing = 'digital-marketing';

    public function label(): string
    {
        return match ($this) {
            self::WebDevelopment => 'Web Development',
            self::AppDevelopment => 'App Development',
            self::IoTSolutions => 'IoT Solutions',
            self::AIAutomation => 'AI & Automation',
            self::CustomSoftware => 'Custom Software',
            self::DigitalMarketing => 'Digital Marketing',
        };
    }
}
