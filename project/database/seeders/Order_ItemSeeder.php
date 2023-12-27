<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Order_Items;
use App\Models\Stock;

class Order_ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Order::all() as $order){
            $num = rand(1, 5);
            $stocks = Stock::all()->shuffle();
            for($i = 0; $i < $num; $i++){
                $order_items = [
                    'order_id' => $order->id,
                    'stock_id' => $stocks[$i]->id,
                    'quantity' => rand(1, 20),
                    'price' => $stocks[$i]->price,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Order_Items::insert($order_items);
            }
        }
    }
}
