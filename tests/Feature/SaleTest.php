<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class SaleTest extends TestCase
{
    public function test_show_sales()
    {
        $user = User::factory()->create([
            'user_type_id'=>1
        ]);

        $response = $this->actingAs($user)->get('/sales');

        $response->assertStatus(200);
    }
}
