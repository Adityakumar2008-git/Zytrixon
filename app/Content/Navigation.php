<?php

declare(strict_types=1);

namespace App\Content;

/**
 * Navigation structure for the Zytrixon website.
 * Driven from typed configuration per docs/17-component-inventory.md §11.
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
            ['label' => 'About', 'href' => '/about', 'children' => null],
            ['label' => 'Contact', 'href' => '/contact', 'children' => null],
        ];
    }

    /**
     * Footer navigation groups.
     *
     * @return array<string, array<int, array{label: string, href: string}>>
     */
    public static function footer(): array
    {
        return [
            'Services' => [
                ['label' => 'Web Development', 'href' => '/services/web-development'],
                ['label' => 'App Development', 'href' => '/services/app-development'],
                ['label' => 'IoT Solutions', 'href' => '/services/iot-solutions'],
                ['label' => 'AI & Automation', 'href' => '/services/ai-automation'],
                ['label' => 'Custom Software', 'href' => '/services/custom-software'],
                ['label' => 'Digital Marketing', 'href' => '/services/digital-marketing'],
            ],
            'Company' => [
                ['label' => 'About Us', 'href' => '/about'],
                ['label' => 'Our Work', 'href' => '/work'],
                ['label' => 'Contact', 'href' => '/contact'],
            ],
        ];
    }
}
