<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthGuardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_redirects_guests()
    {
        $response = $this->get('/profile');

        $response->assertRedirect('/login');
    }

    /** @test */
    public function it_allows_authenticated_users()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/profile');

        $response->assertOk();
    }
}
