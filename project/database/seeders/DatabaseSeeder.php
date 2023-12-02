<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categorie;
use App\Models\Product;
use App\Models\Product_Brand;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Photo;
use App\Models\Product_Color;
use App\Models\Color;
use App\Models\Product_Categorie;
use App\Models\Stock;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(BrandsSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(CategoriesSeeder::class);

        Color::factory(10)->create();
        Product::factory(10)->create();
        User::factory(10)->create();

        Product_Categorie::factory(10)->create();
        Product_Brand::factory(10)->create();
        Product_Color::factory(10)->create();
        Photo::factory(10)->create();
        Stock::factory(10)->create();
    }
}
