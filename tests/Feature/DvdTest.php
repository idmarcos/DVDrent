<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class DvdTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_movie_list()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/list/movies');

        $response->assertStatus(200);
    }
}
