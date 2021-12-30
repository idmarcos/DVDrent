<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Dvd;
use App\Models\User;
use App\Models\UserDvd;

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

    public function test_return_movie()
    {
        $dvd = Dvd::factory()->create([
            'id'=>1
        ]);
        $user = User::factory()->create([
            'id'=>1
        ]);
        $user_dvd = UserDvd::factory()->create([
            'id'=>1,
            'user_id'=>1,
            'dvd_id'=>1
        ]);

        $response = $this->actingAs($user)->post('/rent/1/return', [

        ]);

        $response->assertRedirect('list/myrents');
    }

    public function test_return_all_movies()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/movies');

        $response->assertStatus(200);
    }

    public function test_create_movie()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/movies', [
            'title'=>'Test',
            'duration'=>199,
            'year'=>1997,
            'gender'=>'Action',
            'synopsis'=>'Synopsis de la pelicula',
            'cast'=>'Brad Pitt',
            'age_rating'=>18,
            'available'=>1,
        ]);

        $response->assertRedirect('movies');
    }

    public function test_update_movie()
    {
        $user = User::factory()->create();
        $dvd = Dvd::factory()->create([
            'id'=>1
        ]);

        $response = $this->actingAs($user)->put('/movies/1', [
            'title'=>'Test',
            'duration'=>199,
            'year'=>1997,
            'gender'=>'Action',
            'synopsis'=>'Synopsis de la pelicula',
            'cast'=>'Brad Pitt',
            'age_rating'=>18,
            'available'=>1,
        ]);

        $response->assertRedirect('movies');
    }

    public function test_delete_movie()
    {
        $user = User::factory()->create();
        $dvd = Dvd::factory()->create([
            'id'=>1
        ]);

        $response = $this->actingAs($user)->delete('/movies/1', [
            
        ]);

        $response->assertRedirect('movies');
    }
}
