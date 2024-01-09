<?php

namespace Database\Seeders;

use App\Models\Product_Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\Color;

class Product_ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Product::all() as $product){
            $num = random_int(1,5);
            $colors = Color::all()->shuffle();
            for($i = 0; $i < $num; $i++){
                $product_colors = [
                    'product_id' => $product->id,
                    'color_id' => $colors[$i]->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Product_Color::insert($product_colors);
            }
        }
    }
}
