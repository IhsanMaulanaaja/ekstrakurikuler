<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        // generic login now redirects to the student login form
        $response = $this->get('/login');

        $response->assertRedirect(route('login-siswa', absolute: false));
    }

    public function test_siswa_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login-siswa');
        $response->assertStatus(200);
    }

    public function test_admin_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login-admin');
        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_pembina_user_is_redirected_to_dashboard_on_login(): void
    {
        $pembina = User::factory()->create(['role' => 'pembina']);

        $response = $this->post('/login', [
            'email' => $pembina->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticatedAs($pembina);
        $response->assertRedirect(route('dashboard', absolute: false));

        // hitting /dashboard should render the new pembina view as well
        $this->actingAs($pembina)->get('/dashboard')->assertViewIs('Admin.berandapembina');
    }

    public function test_siswa_route_denies_admin_account(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->post('/login-siswa', [
            'email' => $admin->email,
            'password' => 'password',
        ]);

        $this->assertGuest();
    }

    public function test_admin_route_denies_student_account(): void
    {
        $student = User::factory()->create(['role' => 'siswa']);

        $this->post('/login-admin', [
            'email' => $student->email,
            'password' => 'password',
        ]);

        $this->assertGuest();
    }

    public function test_siswa_user_can_login_via_siswa_route(): void
    {
        $student = User::factory()->create(['role' => 'siswa']);

        $response = $this->post('/login-siswa', [
            'email' => $student->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticatedAs($student);
        $response->assertRedirect(route('dashboard-siswa', absolute: false));
    }

    public function test_admin_user_can_login_via_admin_route(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->post('/login-admin', [
            'email' => $admin->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticatedAs($admin);
        $response->assertRedirect(route('dashboard-admin', absolute: false));
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_dashboard_pembina_route_requires_authentication_and_role(): void
    {
        // unauthenticated users are redirected to login
        $this->get('/dashboard-pembina')->assertRedirect('/login');

        // authenticated non‑pembina users should be denied
        $student = User::factory()->create(['role' => 'siswa']);
        $this->actingAs($student)->get('/dashboard-pembina')->assertStatus(403);

        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin)->get('/dashboard-pembina')->assertStatus(403);

        // pembina users can access the page and see the right view
        $pembina = User::factory()->create(['role' => 'pembina']);
        $this->actingAs($pembina)->get('/dashboard-pembina')
            ->assertStatus(200)
            ->assertViewIs('Admin.berandapembina');
    }

    /**
     * When a user has the pembina role the generic dashboard route should
     * render the pembina-specific view so the new page actually works.
     */
    public function test_dashboard_route_displays_pembina_view_for_pembina_role(): void
    {
        $pembina = User::factory()->create(['role' => 'pembina']);

        $response = $this->actingAs($pembina)->get('/dashboard');

        $response->assertStatus(200);
        $response->assertViewIs('Admin.berandapembina');
    }

    public function test_users_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }

    public function test_admin_dashboard_contains_link_to_pembina_homepage(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->get('/dashboard-admin');

        $response->assertStatus(200);
        $response->assertSee('Simpan &amp; Lanjut');
        $response->assertSee(route('dashboard-pembina', absolute: false));
    }
}
