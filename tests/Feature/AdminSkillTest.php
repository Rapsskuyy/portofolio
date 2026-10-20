<?php

namespace Tests\Feature;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminSkillTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_access_or_modify_skills(): void
    {
        $this->get(route('admin.skills.index'))
            ->assertRedirect(route('admin.login'));

        $this->post(route('admin.skills.store'), [
            'name' => 'Laravel',
            'type' => 'hard',
            'proficiency' => 80,
        ])->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_create_update_and_delete_a_skill(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->post(route('admin.skills.store'), [
                'name' => 'API Design',
                'type' => 'hard',
                'proficiency' => 82,
            ])
            ->assertRedirect(route('admin.skills.index'));

        $skill = Skill::where('name', 'API Design')->firstOrFail();

        $this->actingAs($admin)
            ->put(route('admin.skills.update', $skill), [
                'name' => 'REST API Design',
                'type' => 'hard',
                'proficiency' => 90,
            ])
            ->assertRedirect(route('admin.skills.index'));

        $this->assertDatabaseHas('skills', [
            'id' => $skill->id,
            'name' => 'REST API Design',
            'proficiency' => 90,
        ]);

        $this->actingAs($admin)
            ->delete(route('admin.skills.delete', $skill))
            ->assertRedirect(route('admin.skills.index'));

        $this->assertDatabaseMissing('skills', ['id' => $skill->id]);
    }

    public function test_skill_proficiency_and_type_are_validated(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->from(route('admin.skills.index'))
            ->post(route('admin.skills.store'), [
                'name' => 'Invalid Skill',
                'type' => 'other',
                'proficiency' => 101,
            ])
            ->assertRedirect(route('admin.skills.index'))
            ->assertSessionHasErrors(['type', 'proficiency']);
    }
}
