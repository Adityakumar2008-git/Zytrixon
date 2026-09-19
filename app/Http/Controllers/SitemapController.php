<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Content\CaseStudies;
use App\Content\Services;
use App\Content\Site;
use Illuminate\Http\Response;

final class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $urls = [
            ['loc' => Site::URL . '/', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => Site::URL . '/services', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => Site::URL . '/work', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => Site::URL . '/about', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => Site::URL . '/contact', 'priority' => '0.8', 'changefreq' => 'monthly'],
        ];

        foreach (Services::slugs() as $slug) {
            $urls[] = [
                'loc' => Site::URL . '/services/' . $slug,
                'priority' => '0.8',
                'changefreq' => 'monthly',
            ];
        }

        foreach (CaseStudies::slugs() as $slug) {
            $urls[] = [
                'loc' => Site::URL . '/work/' . $slug,
                'priority' => '0.8',
                'changefreq' => 'monthly',
            ];
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($urls as $url) {
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . htmlspecialchars($url['loc']) . '</loc>' . "\n";
            $xml .= '    <changefreq>' . $url['changefreq'] . '</changefreq>' . "\n";
            $xml .= '    <priority>' . $url['priority'] . '</priority>' . "\n";
            $xml .= '  </url>' . "\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
