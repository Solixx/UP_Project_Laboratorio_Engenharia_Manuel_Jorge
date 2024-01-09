<?php

namespace Tests\Feature;

use App\Models\Stock;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Models\User;
use \App\Models\Product;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function testProductShow(): void
    {
        $response = null;

        if(!Stock::where('id', 1)->onlyTrashed()->first()){
            $response = $this->get('/product/1');
        }

        if ($response) {
            $response->assertStatus(200);
        } else {
            $this->assertTrue(true, 'A condição não foi satisfeita, não há resposta para testar.');
        }
    }

    public function testProductIndex(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
    }

    public function testProductStore(): void
    {
        $user_admin = User::factory()->create(['isAdmin' => true]);

        $response = $this->actingAs($user_admin);

        $response = $this->post('admin/product/store', [
            'name' => 'test',
            'description' => 'test',
            'brands' => [1],
            'categories' => [1],
            'colors' => [1],
        ]);

        $response->assertStatus(302);
    }

    public function testProductUpdate(): void
    {
        $user_admin = User::factory()->create(['isAdmin' => true]);

        $response = $this->actingAs($user_admin);

        $response = $this->post('admin/product/1', [
            'name' => 'test',
            'description' => 'test',
            'brands' => [1, 2],
            'categories' => [1, 2],
            'colors' => [1, 2],
        ]);

        $response->assertStatus(302);
    }

    public function testProductDelete(): void
    {
        $response = null;

        $user_admin = User::factory()->create(['isAdmin' => true]);

        if(!Stock::where('id', 1)->onlyTrashed()->first()){
            $response = $this->actingAs($user_admin);

            $response = $this->get('admin/product/1');
        }

        if ($response) {
        $response->assertStatus(302);
        } else {
            $this->assertTrue(true, 'A condição não foi satisfeita, não há resposta para testar.');
        }
    }
}
