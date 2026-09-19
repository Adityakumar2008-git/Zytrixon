<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Content\CaseStudies;
use App\Content\Services;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

final class ExportStaticSite extends Command
{
    protected $signature = 'export:static {--output=dist : Output directory}';
    protected $description = 'Export all pages and assets as a static site ready for Netlify';

    public function handle(): int
    {
        $outputDir = base_path($this->option('output'));
        $this->info("Exporting Zytrixon static site to: {$outputDir}");

        // Ensure clean output directory
        if (!File::exists($outputDir)) {
            File::makeDirectory($outputDir, 0755, true);
        }

        $routes = [
            '/' => 'index.html',
            '/about' => 'about/index.html',
            '/services' => 'services/index.html',
            '/work' => 'work/index.html',
            '/contact' => 'contact/index.html',
            '/sitemap.xml' => 'sitemap.xml',
            '/404' => '404.html',
        ];

        // Add all service detail routes
        foreach (Services::all() as $service) {
            $slug = is_object($service['slug']) ? $service['slug']->value : $service['slug'];
            $routes["/services/{$slug}"] = "services/{$slug}/index.html";
        }

        // Add all case study detail routes
        foreach (CaseStudies::all() as $caseStudy) {
            $slug = $caseStudy['slug'];
            $routes["/work/{$slug}"] = "work/{$slug}/index.html";
        }

        // Export each page
        foreach ($routes as $uri => $destRelative) {
            $this->exportRoute($uri, $outputDir, $destRelative);
        }

        // Copy static assets
        $this->copyAssets($outputDir);

        // Generate Netlify specific helper files
        $this->generateNetlifyFiles($outputDir);

        $this->info('✓ Static export completed successfully! Ready for Netlify deployment.');
        return self::SUCCESS;
    }

    private function exportRoute(string $uri, string $outputDir, string $destRelative): void
    {
        $destPath = $outputDir . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $destRelative);
        $destDir = dirname($destPath);

        if (!File::exists($destDir)) {
            File::makeDirectory($destDir, 0755, true);
        }

        try {
            if ($uri === '/404') {
                $html = view('errors.404')->render();
            } else {
                $request = Request::create($uri, 'GET');
                $response = app()->handle($request);
                $html = $response->getContent();
            }

            // Normalize absolute localhost URLs to root-relative paths for Netlify
            $html = str_replace([
                'http://localhost/build/',
                'http://localhost/images/',
                'http://localhost/',
                'http://localhost',
            ], [
                '/build/',
                '/images/',
                '/',
                '/',
            ], $html);

            File::put($destPath, $html);
            $this->line("  <info>Exported:</info> {$uri} -> {$destRelative}");
        } catch (\Throwable $e) {
            $this->error("  <error>Failed:</error> {$uri} - " . $e->getMessage());
        }
    }

    private function copyAssets(string $outputDir): void
    {
        $publicDir = public_path();

        // 1. Copy build directory (Vite output: CSS, JS, manifest)
        $buildSrc = $publicDir . DIRECTORY_SEPARATOR . 'build';
        $buildDest = $outputDir . DIRECTORY_SEPARATOR . 'build';
        if (File::exists($buildSrc)) {
            File::copyDirectory($buildSrc, $buildDest);
            $this->line('  <info>Copied:</info> public/build -> dist/build');
        }

        // 2. Copy images directory
        $imagesSrc = $publicDir . DIRECTORY_SEPARATOR . 'images';
        $imagesDest = $outputDir . DIRECTORY_SEPARATOR . 'images';
        if (File::exists($imagesSrc)) {
            File::copyDirectory($imagesSrc, $imagesDest);
            $this->line('  <info>Copied:</info> public/images -> dist/images');
        }

        // 3. Copy individual root files
        $singleFiles = ['favicon.ico', 'robots.txt'];
        foreach ($singleFiles as $file) {
            $fileSrc = $publicDir . DIRECTORY_SEPARATOR . $file;
            $fileDest = $outputDir . DIRECTORY_SEPARATOR . $file;
            if (File::exists($fileSrc)) {
                File::copy($fileSrc, $fileDest);
                $this->line("  <info>Copied:</info> public/{$file} -> dist/{$file}");
            }
        }
    }

    private function generateNetlifyFiles(string $outputDir): void
    {
        // 1. _redirects
        $redirectsContent = <<<'TXT'
# Netlify Redirects for Zytrixon
# Serve 404 page for missing endpoints
/*    /404.html   404
TXT;
        File::put($outputDir . DIRECTORY_SEPARATOR . '_redirects', $redirectsContent);
        $this->line('  <info>Generated:</info> dist/_redirects');

        // 2. _headers
        $headersContent = <<<'TXT'
/*
  X-Frame-Options: SAMEORIGIN
  X-Content-Type-Options: nosniff
  X-XSS-Protection: 1; mode=block
  Referrer-Policy: strict-origin-when-cross-origin

/build/assets/*
  Cache-Control: public, max-age=31536000, immutable

/images/*
  Cache-Control: public, max-age=864000
TXT;
        File::put($outputDir . DIRECTORY_SEPARATOR . '_headers', $headersContent);
        $this->line('  <info>Generated:</info> dist/_headers');
    }
}
