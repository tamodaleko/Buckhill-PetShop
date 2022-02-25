<?php

namespace Tests\Feature\Brand;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CreateBrandTest extends TestCase
{
    use DatabaseTransactions;
    
    /**
     * @var string
     */
    private $defaultTitle = 'Test Brand';
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_brand()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        
        $response = $this->postJson(route('api.v' . config('app.api_latest') . '.brand.create'), [
            'title' => $this->defaultTitle
        ]);
 
        $response->assertStatus(201)
            ->assertJsonFragment([
                'title' => $this->defaultTitle,
            ]);
    }
}
