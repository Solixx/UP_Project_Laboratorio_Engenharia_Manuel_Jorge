<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Brand;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands=[
            [
                'name' => 'Adidas',
                'img' => 'adidas.png',
                'imgPath' => 'imgs/brands/ADIDAS.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Balenmciaga',
                'img' => 'balenciaga.png',
                'imgPath' => 'imgs/brands/balenmciaga.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Champions',
                'img' => 'champions.png',
                'imgPath' => 'imgs/brands/champions.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dior',
                'img' => 'dior.png',
                'imgPath' => 'imgs/brands/dior.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gucci',
                'img' => 'gucci.png',
                'imgPath' => 'imgs/brands/gucci.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jordan',
                'img' => 'jordan.png',
                'imgPath' => 'imgs/brands/JORDAN-MERCH.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'LaCoste',
                'img' => 'lacoste.png',
                'imgPath' => 'imgs/brands/lacoste.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Levis',
                'img' => 'levis.png',
                'imgPath' => 'imgs/brands/Levis.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Louis Vuitton',
                'img' => 'louisvuitton.png',
                'imgPath' => 'imgs/brands/Louis-Vuitton.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nike',
                'img' => 'nike.png',
                'imgPath' => 'imgs/brands/NIKE.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Off White',
                'img' => 'offwhite.png',
                'imgPath' => 'imgs/brands/Off-White.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Palm Angels',
                'img' => 'palmangels.png',
                'imgPath' => 'imgs/brands/palm-angels.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Supreme',
                'img' => 'supreme.png',
                'imgPath' => 'imgs/brands/Supreme.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vans',
                'img' => 'vans.png',
                'imgPath' => 'imgs/brands/vans.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Versace',
                'img' => 'versace.png',
                'imgPath' => 'imgs/brands/versace.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Yeezy',
                'img' => 'yeezy.png',
                'imgPath' => 'imgs/brands/yeezy.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Brand::insert($brands);
    }
}
