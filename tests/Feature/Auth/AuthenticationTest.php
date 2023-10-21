<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

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
        $response->assertRedirect(RouteServiceProvider::HOME);
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

    public function testLoginRequestValidationPasses()
    {
        $request = new LoginRequest();
        $this->assertTrue($request->authorize()); // Authorization rules are met
    }

    public function testLoginRequestValidationFails()
    {
        $request = new LoginRequest();
        // Customize the input data to make the validation fail
        $request->merge([
            'email' => 'invalid-email',
            'password' => 'short',
        ]);
        $this->assertFalse($request->authorize()); // Authorization rules are not met
    }

    // Test the login function inside the form request

    public function testLoginFunctionSucceeds()
    {
        $request = new LoginRequest();
        $request->merge([
            'email' => 'valid@example.com',
            'password' => 'validPassword',
        ]);

        $this->assertTrue($request->login()); // Ensure login function succeeds
    }

    public function testLoginFunctionFails()
    {
        $request = new LoginRequest();
        $request->merge([
            'email' => 'invalid@example.com',
            'password' => 'invalidPassword',
        ]);

        $this->assertFalse($request->login()); // Ensure login function fails

    }

}
