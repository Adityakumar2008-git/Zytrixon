<?php

declare(strict_types=1);

namespace App\Content;

/**
 * Navigation structure for the Zytrixon website.
 * Matches exact UI design: Services, Work, Insights, About, Careers.
 */
final class Navigation
{
    /**
     * Primary navigation items.
     *
     * @return array<int, array{label: string, href: string, children: ?array}>
     */
    public static function primary(): array
    {
        return [
            ['label' => 'Services', 'href' => '/services', 'children' => null],
            ['label' => 'Work', 'href' => '/work', 'children' => null],
            ['label' => 'Insights', 'href' => '/#insights', 'children' => null],
            ['label' => 'About', 'href' => '/about', 'children' => null],
            ['label' => 'Careers', 'href' => '/about#careers', 'children' => null],
        ];
    }

    /**
     * Footer navigation groups matching UI design.
     *
     * @return array<string, array<int, array{label: string, href: string}>>
     */
    public static function footer(): array
    {
        return [
            'Services' => [
                ['label' => 'Custom Software', 'href' => '/services/custom-software'],
                ['label' => 'Web Development', 'href' => '/services/web-development'],
                ['label' => 'Mobile Apps', 'href' => '/services/app-development'],
                ['label' => 'AI & Automation', 'href' => '/services/ai-automation'],
                ['label' => 'UI/UX Design', 'href' => '/services/web-development'],
                ['label' => 'Digital Consultancy', 'href' => '/services/iot-solutions'],
            ],
            'Company' => [
                ['label' => 'About Us', 'href' => '/about'],
                ['label' => 'Our Work', 'href' => '/work'],
                ['label' => 'Insights', 'href' => '/#insights'],
                ['label' => 'Careers', 'href' => '/about#careers'],
                ['label' => 'Contact', 'href' => '/contact'],
            ],
            'Legal' => [
                ['label' => 'Privacy Policy', 'href' => '#'],
                ['label' => 'Terms of Service', 'href' => '#'],
            ],
        ];
    }
}
