<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicSiteExportTest extends TestCase
{
    use RefreshDatabase;

    public function test_export_requires_the_configured_build_token(): void
    {
        config()->set('public-site.export_token', 'static-build-secret');

        $this->get(route('internal.public-site-export'))
            ->assertNotFound();

        $this->withToken('wrong-token')->get(route('internal.public-site-export'))
            ->assertNotFound();
    }

    public function test_export_contains_only_public_records_and_no_testimonial_email(): void
    {
        config()->set('public-site.export_token', 'static-build-secret');

        Project::create([
            'title' => 'Published project',
            'description' => 'Visible project',
            'image_url' => 'published.webp',
            'is_visible' => true,
            'order' => 1,
        ]);
        Project::create([
            'title' => 'Private project',
            'description' => 'Hidden project',
            'image_url' => 'private.webp',
            'is_visible' => false,
            'order' => 2,
        ]);
        Testimonial::create([
            'name' => 'Verified Person',
            'email' => 'private@example.test',
            'message' => 'A real approved testimonial.',
            'rating' => 5,
            'is_approved' => true,
        ]);

        $response = $this->withToken('static-build-secret')
            ->get(route('internal.public-site-export'));

        $response->assertOk()
            ->assertHeader('Cache-Control', 'no-store, private')
            ->assertJsonPath('version', 1)
            ->assertJsonPath('data.projects.0.title', 'Published project')
            ->assertJsonMissing(['title' => 'Private project'])
            ->assertJsonPath('data.testimonials.0.name', 'Verified Person')
            ->assertJsonMissing(['email' => 'private@example.test'])
            ->assertJsonPath('pages./guestbook', fn (string $page) => str_contains($page, 'data-public-form'));

        $this->assertStringNotContainsString('private@example.test', $response->getContent());
    }
}
