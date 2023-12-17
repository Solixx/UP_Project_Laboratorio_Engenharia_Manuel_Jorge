<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Items;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(/* Request $request */)
    {
        /* $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_price' => 'required|numeric',
            'delivery_date' => 'required|date',
            'delivery_time' => 'required|date_format:H:i',
            'delivery_address' => 'required|string',
            'delivery_phone' => 'required|string',
            'delivery_email' => 'required|email',
            'delivery_name' => 'required|string',
            'processed_date' => 'nullable|date',
            'shipped_date' => 'nullable|date',
        ]); */

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->save();
        
        foreach (Cart::instance('shopping')->content() as $cart_item) {
            Order_Items::create([
                'order_id' => $order->id,
                'stock_id' => $cart_item->id,
                'quantity' => $cart_item->qty,
                'price' => $cart_item->price,
            ]);
        }
        $order->total_price = $order->total_price() + Cart::instance('shopping')->tax();
        $order->save();

        Cart::instance('shopping')->destroy();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->back()
            ->with('success', 'Order deleted successfully.');
    }
}
