<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Product_Brand;

class Product_BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Product::all() as $product){
            $num = random_int(1,5);
            $brands = Brand::all()->shuffle();
            for($i = 0; $i < $num; $i++){
                $product_brands = [
                    'product_id' => $product->id,
                    'brand_id' => $brands[$i]->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Product_Brand::insert($product_brands);
            }
        }
    }
}
