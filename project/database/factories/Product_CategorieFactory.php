<?php

namespace Database\Factories;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product_Categorie>
 */
class Product_CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::all()->random()->id,
            'categorie_id' => Categorie::all()->random()->id,
        ];
    }
}
