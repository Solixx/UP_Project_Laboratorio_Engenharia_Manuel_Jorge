<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\Order_Items;
use App\Models\Stock;
use Carbon\Carbon;

class StripeController extends Controller
{
    public function checkout(/* Request $request */)
    {
        Stripe::setApiKey(config('stripe.sk'));

        $cartItems = Cart::instance('shopping')->content();

        $lineItems = [];

        foreach ($cartItems as $cartItem) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $cartItem->name,
                    ],
                    'unit_amount' => $cartItem->priceTax() * 100,
                ],
                'quantity' => $cartItem->qty,
            ];
        }

        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('stripe.success'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->processed_date = Carbon::today();
        $order->delivery_time = "3 days";
        $order->delivery_address = auth()->user()->address;
        $order->delivery_phone = auth()->user()->phone;
        $order->delivery_email = auth()->user()->email;
        $order->delivery_name = auth()->user()->name;
        $order->save();
        
        foreach (Cart::instance('shopping')->content() as $cart_item) {
            Order_Items::create([
                'order_id' => $order->id,
                'stock_id' => $cart_item->id,
                'quantity' => $cart_item->qty,
                'price' => $cart_item->price,
            ]);

            $stock = Stock::find($cart_item->id);
            $stock->stock -= $cart_item->qty;
            $stock->save();
        }
        $order->total_price = $order->total_price() + Cart::instance('shopping')->tax();
        $order->save();

        Cart::instance('shopping')->destroy();

        return redirect()->route('products');
    }
}
