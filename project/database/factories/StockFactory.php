<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Product_Color;
use App\Models\Size;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_color_id' => Product_Color::all()->random()->id,
            'size_id' => Size::all()->random()->id,
            'stock' => $this->faker->numberBetween(0, 100),
            'price' => $this->faker->numberBetween(0, 100),
        ];
    }
}
