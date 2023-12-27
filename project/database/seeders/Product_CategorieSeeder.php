<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Product_Categorie;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Product_CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Product::all() as $product){
            $num = rand(1, 5);
            $categories = Categorie::all()->shuffle();
            for($i = 0; $i < $num; $i++){
                $product_categories = [
                    'product_id' => $product->id,
                    'categorie_id' => $categories[$i]->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Product_Categorie::insert($product_categories);
            }
        }
    }
}
