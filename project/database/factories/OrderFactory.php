<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'total_price' => fake()->randomFloat(2, 1, 10000),
            'status' => fake()->randomElement(['pending', 'processed', 'shipped', 'delivered', 'canceled']),
            'delivery_date' => now(),
            'delivery_address' => fake()->address,
            'canceled_date'  => now(),
            'delivery_time' => fake()->randomNumber(1),
            'delivery_phone' => fake()->phoneNumber(),
            'delivery_email' => fake()->email(),
            'delivery_name' => fake()->name(),
            'processed_date' => now(),
            'shipped_date' => now(),
        ];
    }
}
