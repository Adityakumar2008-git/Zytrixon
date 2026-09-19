<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Content\CaseStudies;
use App\Content\Services;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class PagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_loads_successfully(): void
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('ZYTRIXON')
            ->assertSee('We Engineer Digital Dominance')
            ->assertSee('Capabilities')
            ->assertSee('Selected Work');
    }

    public function test_homepage_contains_schema_and_og_metadata(): void
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('application/ld+json', false)
            ->assertSee('schema.org', false)
            ->assertSee('images/og-image.jpg', false);
    }

    public function test_security_headers_are_present(): void
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertHeader('X-Content-Type-Options', 'nosniff')
            ->assertHeader('X-Frame-Options', 'SAMEORIGIN')
            ->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin')
            ->assertHeader('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');
    }

    public function test_services_hub_loads_successfully(): void
    {
        $response = $this->get('/services');

        $response->assertOk()
            ->assertSee('Enterprise Engineering Services')
            ->assertSee('Web Development')
            ->assertSee('App Development')
            ->assertSee('IoT Solutions');
    }

    public function test_all_service_detail_pages_load_successfully(): void
    {
        foreach (Services::slugs() as $slug) {
            $response = $this->get("/services/{$slug}");
            $response->assertOk();
        }
    }

    public function test_invalid_service_returns_404(): void
    {
        $response = $this->get('/services/non-existent-service');
        $response->assertNotFound();
    }

    public function test_work_hub_loads_successfully(): void
    {
        $response = $this->get('/work');

        $response->assertOk()
            ->assertSee('Selected Engineering Work')
            ->assertSee('School Management System')
            ->assertSee('Affiliate Marketing App')
            ->assertSee('IoT Smart Factory Dashboard');
    }

    public function test_all_case_study_detail_pages_load_successfully(): void
    {
        foreach (CaseStudies::slugs() as $slug) {
            $response = $this->get("/work/{$slug}");
            $response->assertOk();
        }
    }

    public function test_invalid_case_study_returns_404(): void
    {
        $response = $this->get('/work/non-existent-project');
        $response->assertNotFound();
    }

    public function test_about_page_loads_successfully(): void
    {
        $response = $this->get('/about');

        $response->assertOk()
            ->assertSee('Local Roots, Global Standards')
            ->assertSee('Bipin Sahani')
            ->assertSee('Saurav Shandilya')
            ->assertSee('Anup Kumar')
            ->assertSee('Security First');
    }

    public function test_contact_page_loads_successfully(): void
    {
        $response = $this->get('/contact');

        $response->assertOk()
            ->assertSee('Build Something Exceptional')
            ->assertSee('zytrixon@gmail.com')
            ->assertSee('+91 70497 11475')
            ->assertSee('+91 90319 85702')
            ->assertSee('Kankarbagh, Patna')
            ->assertSee('Samastipur, Bihar');
    }

    public function test_contact_form_submits_successfully(): void
    {
        $response = $this->post('/contact', [
            'name' => 'Alice Test',
            'email' => 'alice@example.com',
            'phone' => '+1 555 123 4567',
            'service' => 'web-development',
            'message' => 'We are looking to rebuild our enterprise web portal with modern architecture.',
        ]);

        $response->assertRedirect('/contact');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('leads', [
            'name' => 'Alice Test',
            'email' => 'alice@example.com',
            'service' => 'web-development',
            'status' => 'new',
        ]);
    }

    public function test_contact_form_requires_mandatory_fields(): void
    {
        $response = $this->post('/contact', []);

        $response->assertSessionHasErrors(['name', 'email', 'message']);
    }

    public function test_contact_form_honeypot_blocks_spambots(): void
    {
        $response = $this->post('/contact', [
            'name' => 'Bot User',
            'email' => 'bot@example.com',
            'message' => 'Spam message content here.',
            'hp_company' => 'Acme Spambot Corp', // Honeypot filled
        ]);

        $response->assertSessionHasErrors(['hp_company']);
    }

    public function test_sitemap_xml_returns_valid_xml(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertOk()
            ->assertHeader('Content-Type', 'application/xml')
            ->assertSee('<urlset', false)
            ->assertSee('https://zytrixontech.com/services/web-development', false);
    }
}
