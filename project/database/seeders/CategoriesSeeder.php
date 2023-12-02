<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories=[
            [
                'name' => 'Shirts',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pants',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Shoes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hats',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Socks',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jackets',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sweaters',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Underwear',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Swimwear',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Accessories',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sneakers',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Boots',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sandals',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Slippers',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Belts',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hats',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gloves',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Scarves',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sunglasses',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Watches',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Wallets',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Backpacks',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Briefcases',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Luggage',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ties',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bow Ties',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pocket Squares',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cufflinks',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Categorie::insert($categories);
    }
}
