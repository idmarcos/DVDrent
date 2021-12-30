<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class ClientTest extends TestCase
{
    public function test_show_clients()
    {
        $user = User::factory()->create([
            'user_type_id'=>1
        ]);

        $response = $this->actingAs($user)->get('/clients');

        $response->assertStatus(200);
    }
}
