<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Models\User;
use \App\Models\Stock;
use \App\Models\Favorite;

class FavoriteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $user = User::factory()->create();
        $stock = Stock::all()->last();

        $response = $this->actingAs($user)->post('/favorite/' . $stock->id);

        $response->assertStatus(302);
    }
}
