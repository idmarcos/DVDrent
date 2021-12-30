<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Dvd;
use App\Models\User;

class DvdTest extends TestCase
{
    public function test_movie_list()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/list/movies');

        $response->assertStatus(200);
    }

    public function test_movie_rent()
    {
        $dvd = Dvd::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/movies/1/rent', [
            'user_id' => 1,
            'dvd_id' => 1,
            'rent_date' => '2021-12-30',
            'address' => 'Calle 2',
            'cp' => '12345',
            'state' => 'California',
        ]);

        $response->assertRedirect('list/movies');
    }
}
