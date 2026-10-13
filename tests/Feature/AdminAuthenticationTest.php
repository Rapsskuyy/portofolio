<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_and_legacy_key_cannot_access_the_admin_dashboard(): void
    {
        $this->get(route('admin.dashboard'))
            ->assertRedirect(route('admin.login'));

        $this->get(route('admin.dashboard', ['key' => 'raffa']))
            ->assertRedirect(route('admin.login'));
    }

    public function test_an_administrator_can_log_in_and_log_out(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@example.test',
            'is_admin' => true,
        ]);

        $this->post(route('admin.login.submit'), [
            'email' => $admin->email,
            'password' => 'password',
        ])->assertRedirect(route('admin.dashboard'));

        $this->assertAuthenticatedAs($admin);

        $this->post(route('admin.logout'))
            ->assertRedirect(route('admin.login'));

        $this->assertGuest();
    }

    public function test_non_administrators_cannot_log_in_to_the_admin_panel(): void
    {
        $user = User::factory()->create([
            'email' => 'member@example.test',
            'is_admin' => false,
        ]);

        $this->from(route('admin.login'))
            ->post(route('admin.login.submit'), [
                'email' => $user->email,
                'password' => 'password',
            ])
            ->assertRedirect(route('admin.login'))
            ->assertSessionHasErrors('login');

        $this->assertGuest();
    }

    public function test_failed_login_attempts_are_throttled(): void
    {
        $payload = [
            'email' => 'missing@example.test',
            'password' => 'not-the-right-password',
        ];

        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->from(route('admin.login'))
                ->post(route('admin.login.submit'), $payload)
                ->assertRedirect(route('admin.login'));
        }

        $this->post(route('admin.login.submit'), $payload)
            ->assertTooManyRequests();
    }
}
