<?php

namespace Tests\Feature;

use App\Models\CodingProject;
use App\Models\Post;
use App\Models\Skill;
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

    public function test_homepage_does_not_load_nonessential_scripts_during_initial_render(): void
    {
        $this->get(route('portfolio.home'))
            ->assertOk()
            ->assertSee('rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"', false)
            ->assertDontSee('bootstrap.bundle.min.js', false)
            ->assertDontSee('setInterval(() => {', false)
            ->assertDontSee('cdn.jsdelivr.net/npm/sweetalert2@11', false);
    }

    public function test_homepage_uses_the_compact_intro_and_accessible_navigation_hooks(): void
    {
        $this->get(route('portfolio.home'))
            ->assertOk()
            ->assertSee('id="portfolioSplash"', false)
            ->assertSee('class="nav-dot-label">Home</span>', false)
            ->assertSee('data-section-reveal', false)
            ->assertDontSee('Software Engineering student at SMKN 1 Depok with a dedicated focus on Backend Architecture.', false);
    }

    public function test_homepage_skills_use_accessible_progress_bars_without_circular_chart_logic(): void
    {
        Skill::create(['name' => 'Communication', 'type' => 'soft', 'proficiency' => 87]);
        Skill::create(['name' => 'Laravel', 'type' => 'hard', 'proficiency' => 65]);

        $this->get(route('portfolio.home'))
            ->assertOk()
            ->assertSee('class="skill-bar-fill"', false)
            ->assertSee('role="progressbar"', false)
            ->assertSee('aria-valuenow="', false)
            ->assertSee('aria-valuemin="0"', false)
            ->assertSee('aria-valuemax="100"', false)
            ->assertSee('aria-label="', false)
            ->assertDontSee('circle-progress', false);

        $portfolioScript = file_get_contents(public_path('js/portfolio.js'));
        $portfolioStyles = file_get_contents(public_path('css/portfolio.css'));

        $this->assertIsString($portfolioScript);
        $this->assertIsString($portfolioStyles);
        $this->assertStringContainsString("document.querySelectorAll('.skill-bar-fill')", $portfolioScript);
        $this->assertStringContainsString('new IntersectionObserver', $portfolioScript);
        $this->assertStringNotContainsString('circumference', $portfolioScript);
        $this->assertStringNotContainsString('strokeDashoffset', $portfolioScript);
        $this->assertStringNotContainsString('.circle-progress', $portfolioStyles);
        $this->assertStringContainsString('@media (max-width: 768px)', $portfolioStyles);
        $this->assertStringContainsString('@media (min-width: 769px) and (max-width: 1100px)', $portfolioStyles);
        $this->assertStringContainsString('@media (min-width: 1101px) and (max-width: 1199px)', $portfolioStyles);
        $this->assertStringContainsString('overflow-wrap: anywhere', $portfolioStyles);
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
