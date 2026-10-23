<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPostTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_and_update_a_post_as_a_draft_or_published(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->from(route('admin.posts.index'))
            ->post(route('admin.posts.store'), [
                'title' => 'Draft article',
                'content' => 'Draft body',
            ])
            ->assertRedirect(route('admin.posts.index'));

        $post = Post::where('title', 'Draft article')->firstOrFail();
        $this->assertFalse($post->is_published);

        $this->actingAs($admin)
            ->put(route('admin.posts.update', $post), [
                'title' => 'Published article',
                'content' => 'Published body',
                'is_published' => '1',
            ])
            ->assertRedirect(route('admin.posts.index'));

        $this->assertTrue($post->fresh()->is_published);

        $this->actingAs($admin)
            ->put(route('admin.posts.update', $post), [
                'title' => 'Draft again',
                'content' => 'Draft body again',
            ])
            ->assertRedirect(route('admin.posts.index'));

        $this->assertFalse($post->fresh()->is_published);
    }

    public function test_admin_post_edit_escapes_textarea_boundaries(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $post = Post::create([
            'title' => 'Textarea boundary',
            'content' => '</textarea><script>alert(1)</script>',
            'is_published' => false,
        ]);

        $this->actingAs($admin)
            ->get(route('admin.posts.index'))
            ->assertOk()
            ->assertSee('&lt;/textarea&gt;&lt;script&gt;alert(1)&lt;/script&gt;', false)
            ->assertDontSee('</textarea><script>alert(1)</script>', false);
    }
}
