<?php

namespace Tests\Feature;

use App\Models\CodingProject;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class PublicPortfolioSafetyTest extends TestCase
{
    use RefreshDatabase;

    public function test_duplicate_post_titles_receive_unique_slugs(): void
    {
        $first = Post::create(['title' => 'My First Post', 'content' => 'First post content']);
        $second = Post::create(['title' => 'My First Post', 'content' => 'Second post content']);

        $this->assertSame('my-first-post', $first->slug);
        $this->assertSame('my-first-post-2', $second->slug);
    }

    public function test_post_content_removes_scripts_event_handlers_and_unsafe_links(): void
    {
        $post = new Post([
            'content' => '<p onclick="alert(1)"><strong>Aman</strong> <a href="javascript:alert(1)">bad</a> <a href="https://example.com">good</a></p><script>alert(1)</script>',
        ]);

        $content = $post->safe_content;

        $this->assertStringContainsString('<strong>Aman</strong>', $content);
        $this->assertStringContainsString('href="https://example.com" rel="noopener noreferrer"', $content);
        $this->assertStringNotContainsString('onclick=', $content);
        $this->assertStringNotContainsString('javascript:', $content);
        $this->assertStringNotContainsString('<script>', $content);
    }

    public function test_guestbook_page_contains_the_required_interactions(): void
    {
        $this->get(route('portfolio.guestbook'))
            ->assertOk()
            ->assertSee('function openBlogModal', false)
            ->assertSee('function closeBlogModal', false)
            ->assertSee('function openGuestbookModal', false)
            ->assertSee('function closeGuestbookModal', false)
            ->assertSee('function selectEndpoint', false)
            ->assertSee('responseBody.textContent = JSON.stringify(data, null, 4);', false);
    }

    public function test_public_write_routes_are_rate_limited(): void
    {
        $this->assertContains('throttle:5,1', Route::getRoutes()->getByName('testimonial.store')->gatherMiddleware());
        $this->assertContains('throttle:5,1', Route::getRoutes()->getByName('guestbook.store')->gatherMiddleware());
        $this->assertContains('throttle:60,1', Route::getRoutes()->match(request()->create('/api/v1/ping', 'GET'))->gatherMiddleware());
    }

    public function test_coding_project_upload_uses_supabase_when_configured(): void
    {
        Storage::fake('supabase');
        config()->set('filesystems.default', 'supabase');
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post(route('admin.coding_projects.store'), [
            'title' => 'Supabase Coding Project',
            'description' => 'Storage test project',
            'image_file' => UploadedFile::fake()->image('coding.png'),
            'category' => 'web',
            'type' => 'personal',
            'order' => 0,
        ]);

        $response->assertSessionHasNoErrors();
        $project = CodingProject::where('title', 'Supabase Coding Project')->firstOrFail();
        $this->assertNotEmpty(Storage::disk('supabase')->allFiles('coding-projects'));
        $this->assertStringContainsString('coding-projects/', $project->image_url);
    }

    public function test_coding_project_rejects_unsafe_urls(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)->from(route('admin.coding_projects.index'))
            ->post(route('admin.coding_projects.store'), [
                'title' => 'Unsafe URL Project',
                'description' => 'Validation test project',
                'demo_url' => 'javascript:alert(1)',
                'category' => 'web',
                'type' => 'personal',
                'order' => 0,
            ])
            ->assertRedirect(route('admin.coding_projects.index'))
            ->assertSessionHasErrors('demo_url');
    }
}
