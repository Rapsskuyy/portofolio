<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminProjectGalleryTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_access_or_modify_admin_gallery_projects(): void
    {
        $this->get(route('admin.projects.index'))
            ->assertRedirect(route('admin.login'));

        $this->post(route('admin.projects.store'), [
            'title' => 'Sample Gallery',
            'description' => 'A test gallery item',
        ])->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_view_gallery_projects(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        Project::create([
            'title' => 'Event Project Test',
            'description' => 'Test event description',
            'order' => 1,
            'is_visible' => true,
        ]);

        $this->actingAs($admin)
            ->get(route('admin.projects.index'))
            ->assertOk()
            ->assertSee('Event Project Test');
    }

    public function test_admin_can_create_a_gallery_project(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create(['is_admin' => true]);
        $image = UploadedFile::fake()->image('gallery.png');

        $response = $this->actingAs($admin)
            ->post(route('admin.projects.store'), [
                'title' => 'Bulan Bahasa 2026',
                'description' => 'Dokumentasi Bulan Bahasa',
                'image' => $image,
                'order' => 2,
                'is_visible' => '1',
            ]);

        $response->assertRedirect(route('admin.projects.index'));
        $this->assertDatabaseHas('projects', [
            'title' => 'Bulan Bahasa 2026',
            'order' => 2,
            'is_visible' => true,
        ]);
    }

    public function test_admin_can_update_a_gallery_project(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $project = Project::create([
            'title' => 'Original Title',
            'description' => 'Original description',
            'order' => 0,
            'is_visible' => true,
        ]);

        $response = $this->actingAs($admin)
            ->put(route('admin.projects.update', $project->id), [
                'title' => 'Updated Title',
                'description' => 'Updated description',
                'order' => 5,
                'is_visible' => '0',
            ]);

        $response->assertRedirect(route('admin.projects.index'));
        $this->assertDatabaseHas('projects', [
            'id' => $project->id,
            'title' => 'Updated Title',
            'order' => 5,
            'is_visible' => false,
        ]);
    }

    public function test_admin_can_delete_a_gallery_project(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $project = Project::create([
            'title' => 'To Be Deleted',
            'description' => 'Will be removed',
        ]);

        $response = $this->actingAs($admin)
            ->delete(route('admin.projects.destroy', $project->id));

        $response->assertRedirect(route('admin.projects.index'));
        $this->assertDatabaseMissing('projects', [
            'id' => $project->id,
        ]);
    }
}
