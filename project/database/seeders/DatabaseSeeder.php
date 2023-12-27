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
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\newslleter;
use App\Models\Order;
use App\Models\Order_Items;
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

        Color::factory(30)->create();
        Product::factory(10)->create();
        User::factory(10)->create();

        /* Product_Categorie::factory(50)->create();
        Product_Brand::factory(30)->create(); */
        $this->call(Product_CategorieSeeder::class);
        $this->call(Product_BrandSeeder::class);

        $this->call(Product_ColorSeeder::class);
        Photo::factory(100)->create();
        $this->call(StockSeeder::class);

        Comment::factory(50)->create();
        Favorite::factory(50)->create();
        newslleter::factory(10)->create();

        Order::factory(30)->create();
        $this->call(Order_ItemSeeder::class);
        $this->call(InvoiceSeeder::class);
    }
}
