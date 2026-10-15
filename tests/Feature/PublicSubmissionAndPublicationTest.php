<?php

namespace Tests\Feature;

use App\Models\GuestBook;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class PublicSubmissionAndPublicationTest extends TestCase
{
    use RefreshDatabase;

    public function test_static_testimonial_submission_does_not_require_a_session_csrf_token(): void
    {
        $response = $this->postJson(route('public-api.testimonials.store'), [
            'name' => 'Portfolio Visitor',
            'email' => 'visitor@example.test',
            'position' => 'Reviewer',
            'message' => 'This portfolio communicates the work clearly.',
            'rating' => 5,
        ]);

        $response->assertCreated()
            ->assertJsonPath('message', 'Terima kasih. Testimoni Anda sedang menunggu moderasi.');

        $this->assertDatabaseHas('testimonials', [
            'email' => 'visitor@example.test',
            'is_approved' => false,
        ]);
    }

    public function test_static_guestbook_submission_returns_json_validation_errors(): void
    {
        $this->postJson(route('public-api.guestbook.store'), [
            'name' => '',
            'message' => '',
        ])->assertUnprocessable()
            ->assertJsonValidationErrors(['name', 'message']);

        $this->assertSame(0, GuestBook::count());
    }

    public function test_static_guestbook_submission_persists_only_validated_fields(): void
    {
        $this->postJson(route('public-api.guestbook.store'), [
            'name' => 'Private Visitor',
            'email' => 'private@example.test',
            'message' => 'Please contact me about the scholarship application.',
            'unexpected' => 'not persisted',
        ])->assertCreated()
            ->assertJsonPath('message', 'Pesan pribadi Anda sudah diterima.');

        $this->assertDatabaseHas('guest_books', [
            'name' => 'Private Visitor',
            'email' => 'private@example.test',
        ]);
    }

    public function test_manual_publication_triggers_only_the_server_side_hook(): void
    {
        config()->set('public-site.deploy_hook_url', 'https://vercel.example.test/deploy-hook');
        Http::fake([
            'https://vercel.example.test/deploy-hook' => Http::response(['job' => 'queued'], 201),
        ]);
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->post(route('admin.public-site.publish'))
            ->assertRedirect()
            ->assertSessionHas('success', 'Konten tersimpan dan publikasi website sudah dijadwalkan.');

        Http::assertSent(fn ($request) => $request->url() === 'https://vercel.example.test/deploy-hook');
    }

    public function test_unapproved_testimonial_is_not_exported(): void
    {
        config()->set('public-site.export_token', 'static-build-secret');
        Testimonial::create([
            'name' => 'Pending Visitor',
            'email' => 'pending@example.test',
            'message' => 'This should remain private before moderation.',
            'rating' => 5,
            'is_approved' => false,
        ]);

        $this->withToken('static-build-secret')
            ->get(route('internal.public-site-export'))
            ->assertOk()
            ->assertJsonCount(0, 'data.testimonials')
            ->assertDontSee('Pending Visitor');
    }
}
