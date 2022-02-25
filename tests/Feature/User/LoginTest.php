<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var string
     */
    private $defaultPassword = 'password';
    
    /**
     * @return void
     */
    public function test_login_successful()
    {
        $user = User::factory()->create();
        
        $response = $this->postJson(route('api.v' . config('app.api_latest') . '.user.login'), [
            'email'  =>  $user->email,
            'password'  =>  $this->defaultPassword,
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'access_token', 'token_type', 'expires_in'
            ]);
    }

    /**
     * @return void
     */
    public function test_login_invalid()
    {
        $user = User::factory()->create();
        
        $response = $this->postJson(route('api.v' . config('app.api_latest') . '.user.login'), [
            'email'  =>  $user->email,
            'password'  =>  str_random(10),
        ]);

        $response->assertStatus(401);
    }

    /**
     * @return void
     */
    public function test_login_validation()
    {
        $response = $this->postJson(route('api.v' . config('app.api_latest') . '.user.login'), []);

        $response->assertStatus(422);
    }
}
