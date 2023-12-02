<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes=[
            [
                'size' => 'XS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => 'S',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => 'M',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => 'L',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => 'XL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => 'XXL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '32',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '33',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '34',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '35',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '36',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '37',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '38',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '39',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '40',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '41',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '42',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '43',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '44',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '45',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '46',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '47',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '48',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '49',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '50',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '51',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '52',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'size' => '53',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Size::insert($sizes);
    }
}
