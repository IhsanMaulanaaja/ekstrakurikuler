<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register-siswa');

        $response->assertStatus(200);
    }

    public function test_generic_register_redirects_to_student(): void
    {
        $response = $this->get('/register');

        $response->assertRedirect('/register-siswa');
    }

    public function test_admin_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register-admin');

        $response->assertStatus(200);
    }

    public function test_new_students_can_register(): void
    {
        $response = $this->post('/register-siswa', [
            'name' => 'Test Student',
            'email' => 'student@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard-siswa', absolute: false));
        $this->assertDatabaseHas('users', ['email' => 'student@example.com', 'role' => 'siswa']);
    }

    public function test_new_admins_can_register(): void
    {
        $response = $this->post('/register-admin', [
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard-admin', absolute: false));
        $this->assertDatabaseHas('users', ['email' => 'admin@example.com', 'role' => 'admin']);
    }
}
