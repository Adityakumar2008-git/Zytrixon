<?php

declare(strict_types=1);

namespace App\Content;

/**
 * Global site configuration — Single source of truth.
 *
 * Data from docs/23-business-data.md §1–4.
 * Do not duplicate this data across Blade templates.
 */
final class Site
{
    /** Official company name */
    public const NAME = 'Zytrixon Tech';

    /** Brand name (display) */
    public const BRAND = 'ZYTRIXON';

    /** Primary tagline */
    public const TAGLINE = 'We Engineer Digital Dominance.';

    /** Secondary positioning */
    public const POSITIONING = 'Local Roots, Global Standards.';

    /** Company description */
    public const DESCRIPTION = 'Enterprise-grade Web, Mobile, and IoT solutions. We build technology that drives business growth.';

    /** Contact — email (verified, §3) */
    public const EMAIL = 'zytrixon@gmail.com';

    /** Contact — primary phone (§3) */
    public const PHONE_PRIMARY = '+91 70497 11475';

    /**
     * Contact — secondary phone (§3, appears on Samastipur page).
     * Requires business confirmation for which is primary.
     */
    public const PHONE_SECONDARY = '+91 90319 85702';

    /** Domain */
    public const DOMAIN = 'zytrixontech.com';

    /** Full URL */
    public const URL = 'https://zytrixontech.com';

    /**
     * Location — CONFLICT per §2 and §29.
     * The current site shows both Patna and Samastipur.
     * Using Patna (Kankarbagh) as the primary until business confirms.
     */
    public const LOCATION_PATNA = 'Kankarbagh, Patna, Bihar — 800020';
    public const LOCATION_SAMASTIPUR = 'Samastipur, Bihar — 848101';

    public const LOCATION_PRIMARY = [
        'area' => 'Kankarbagh',
        'city' => 'Patna',
        'state' => 'Bihar',
        'pincode' => '800020',
        'country' => 'India',
    ];

    public const LOCATION_SECONDARY = [
        'area' => '',
        'city' => 'Samastipur',
        'state' => 'Bihar',
        'pincode' => '848101',
        'country' => 'India',
    ];

    /**
     * Countries explicitly listed on official website (§14).
     * The site also claims "15+ countries" but does not list them all.
     * Do NOT manufacture the missing country names.
     */
    public const COUNTRIES = [
        'India',
        'USA',
        'UK',
        'UAE',
        'Australia',
        'Canada',
        'Singapore',
        'Germany',
    ];

    /** Response claim from contact page (§4). Subject to business confirmation. */
    public const RESPONSE_CLAIM = 'We reply within 2 hours.';

    /** Confidentiality claim from contact page (§4). */
    public const CONFIDENTIALITY_CLAIM = '100% confidential';

    /**
     * Get the formatted primary address.
     */
    public static function primaryAddress(): string
    {
        $loc = self::LOCATION_PRIMARY;
        return "{$loc['area']}, {$loc['city']}, {$loc['state']} — {$loc['pincode']}";
    }
}
