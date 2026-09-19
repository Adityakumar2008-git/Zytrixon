<?php

declare(strict_types=1);

namespace App\Services;

use App\Content\Site;

final class SeoService
{
    /**
     * Generate Schema.org Organization JSON-LD array.
     *
     * @return array<string, mixed>
     */
    public static function organizationSchema(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => Site::NAME,
            'alternateName' => Site::BRAND,
            'url' => Site::URL,
            'logo' => Site::URL . '/logo.png',
            'description' => Site::DESCRIPTION,
            'email' => Site::EMAIL,
            'telephone' => Site::PHONE_PRIMARY,
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => Site::LOCATION_PRIMARY['area'],
                'addressLocality' => Site::LOCATION_PRIMARY['city'],
                'addressRegion' => Site::LOCATION_PRIMARY['state'],
                'postalCode' => Site::LOCATION_PRIMARY['pincode'],
                'addressCountry' => 'IN',
            ],
            'sameAs' => [
                'https://wa.me/917049711475',
            ],
        ];
    }

    /**
     * Generate Schema.org Service JSON-LD array.
     *
     * @param array{slug: mixed, title: string, description: string, capabilities: string[]} $service
     * @return array<string, mixed>
     */
    public static function serviceSchema(array $service): array
    {
        $slug = $service['slug'] instanceof \BackedEnum ? $service['slug']->value : $service['slug'];

        return [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => $service['title'],
            'description' => $service['description'],
            'provider' => [
                '@type' => 'Organization',
                'name' => Site::NAME,
                'url' => Site::URL,
            ],
            'url' => Site::URL . '/services/' . $slug,
            'serviceType' => $service['title'],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => "{$service['title']} Capabilities",
                'itemListElement' => array_map(fn($cap) => [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => $cap,
                    ],
                ], $service['capabilities'] ?? []),
            ],
        ];
    }

    /**
     * Generate Schema.org BreadcrumbList JSON-LD array.
     *
     * @param array<int, array{name: string, url: string}> $breadcrumbs
     * @return array<string, mixed>
     */
    public static function breadcrumbSchema(array $breadcrumbs): array
    {
        $items = [];
        foreach ($breadcrumbs as $index => $crumb) {
            $items[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $crumb['name'],
                'item' => $crumb['url'],
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $items,
        ];
    }
}
