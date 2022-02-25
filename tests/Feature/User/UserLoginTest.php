<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    /**
     * @return void
     */
    public function test_user_login_successful()
    {
        $response = $this->json('POST', route('api.v' . config('app.api_latest') . '.user.login'), [
            'email'  =>  'admin@buckhill.co.uk',
            'password'  =>  'admin',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'access_token', 'token_type', 'expires_in'
            ]);
    }

    /**
     * @return void
     */
    public function test_user_login_invalid()
    {
        $response = $this->json('POST', route('api.v' . config('app.api_latest') . '.user.login'), [
            'email'  =>  'admin@buckhill.co.uk',
            'password'  =>  'wrong',
        ]);

        $response->assertStatus(401);
    }

    /**
     * @return void
     */
    public function test_user_login_validation()
    {
        $response = $this->json('POST', route('api.v' . config('app.api_latest') . '.user.login'), [
            'email'  =>  'admin@buckhill.co.uk',
        ]);

        $response->assertStatus(422);
    }
}
