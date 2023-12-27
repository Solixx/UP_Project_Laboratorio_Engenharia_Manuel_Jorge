<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\invoice;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Order::all() as $order){
            $invoice = [
                'order_id' => $order->id,
                'user_id' => $order->user_id,
                'total_price' => $order->total_price,
                'date' => now(),
            ];
            invoice::insert($invoice);
        }
    }
}
