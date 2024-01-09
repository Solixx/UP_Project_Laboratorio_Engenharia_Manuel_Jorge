<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker;

    /**
     * A basic feature test example.
     */
    public function testUserCreate(): void
    {
        $response = $this->post('register', [
            'email' => $this->faker->email,
            'password' => $this->faker->password,
            'password_confirmation' => $this->faker->password,
        ]);

        $user = User::all()->last();

        $response->assertStatus(302);
        $this->assertDatabaseHas('users', ['id' => $user->id]);
    }

    public function testUserProfile(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/profile');

        $response->assertStatus(200);
    }

    public function testUserAdminHome(): void
    {
        $user = User::factory()->create(['isAdmin' => true]);

        $response = $this->actingAs($user)->get('admin/');

        $response->assertStatus(200);
    }

    public function testUserListUsers(): void
    {
        $user = User::factory()->create(['isAdmin' => true]);

        $response = $this->actingAs($user)->get('admin/users');

        $response->assertStatus(200);
    }

    public function testUserListProducts(): void
    {
        $user = User::factory()->create(['isAdmin' => true]);

        $response = $this->actingAs($user)->get('admin/products');

        $response->assertStatus(200);
    }

    public function testUserListCategories(): void
    {
        $user = User::factory()->create(['isAdmin' => true]);

        $response = $this->actingAs($user)->get('admin/categories');

        $response->assertStatus(200);
    }

    public function testUserListBrands(): void
    {
        $user = User::factory()->create(['isAdmin' => true]);

        $response = $this->actingAs($user)->get('admin/brands');

        $response->assertStatus(200);
    }

    public function testUserListOrders(): void
    {
        $user = User::factory()->create(['isAdmin' => true]);

        $response = $this->actingAs($user)->get('admin/orders');

        $response->assertStatus(200);
    }

    public function testUserEditProfile(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/settings/edit-profile');

        $response->assertStatus(200);
    }

    public function testUserEditProfilePost(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/settings/edit-profile/' . $user->id, [
            'name' => $this->faker->name,
            'image' => $this->faker->image,
        ]);

        $response->assertStatus(302);
    }

    public function testUserAccountManagement(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/settings/account-management');

        $response->assertStatus(200);
    }
    
    public function testUserAccountManagementPost(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/settings/account-management/' . $user->id);

        $response->assertStatus(302);
    }

    public function testAdminUserDeletePost(): void
    {
        $user_admin = User::factory()->create(['isAdmin' => true]);
        $user = User::factory()->create();

        $response = $this->actingAs($user_admin)->get('admin/users/' . $user->id);

        $response->assertStatus(302);
    }
}
