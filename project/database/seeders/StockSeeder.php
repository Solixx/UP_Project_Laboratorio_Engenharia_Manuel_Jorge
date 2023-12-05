<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product_Color;
use App\Models\Size;
use App\Models\Stock;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Product_Color::all() as $product){
            $num = rand(1, 15);
            $sizes = Size::all()->shuffle();
            for($i = 0; $i < $num; $i++){
                $stocks = [
                    'product_color_id' => $product->id,
                    'size_id' => $sizes[$i]->id,
                    'stock' => rand(0, 100),
                    'price' => rand(0, 100),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Stock::insert($stocks);
            }
        }
    }
}
