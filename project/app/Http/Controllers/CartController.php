<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Stock;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function store(Stock $stock)
    {
        Cart::instance('shopping')->add($stock->id, $stock->product_color->product->name, 1, $stock->price)->associate('App\Models\Stock');

        $stockId = $stock->id;
        $item = Cart::instance('shopping')->search(function ($cartItem, $rowId) use ($stockId) {
            return $cartItem->id === $stockId;
        });
        if($item->first()->qty > $stock->stock){
            Cart::instance('shopping')->update($item->first()->rowId, $stock->stock);
        }

        return back();
    }

    public function decreaseQty(Stock $stock)
    {
        $stockId = $stock->id;
        $item = Cart::instance('shopping')->search(function ($cartItem, $rowId) use ($stockId) {
            return $cartItem->id === $stockId;
        });

        if($item->isNotEmpty()) {
            if($item->first()->qty == 1){
                Cart::instance('shopping')->remove($item->first()->rowId);
            }
            else{
                Cart::instance('shopping')->update($item->first()->rowId, $item->first()->qty - 1);
            }
        }

        return back();
    }

    public function increaseQty(Stock $stock)
    {
        $stockId = $stock->id;
        $item = Cart::instance('shopping')->search(function ($cartItem, $rowId) use ($stockId) {
            return $cartItem->id === $stockId;
        });

        if($item->isNotEmpty() && $item->first()->qty < $stock->stock) {
            Cart::instance('shopping')->update($item->first()->rowId, $item->first()->qty + 1);
        }

        return back();
    }

    public function setQty(Request $request, Stock $stock)
    {
        $request->validate([
            'qty' => 'required|numeric|min:1'
        ]);

        $stockId = $stock->id;
        $item = Cart::instance('shopping')->search(function ($cartItem, $rowId) use ($stockId) {
            return $cartItem->id === $stockId;
        });

        if($item->isNotEmpty() && $request->qty <= $stock->stock) {
            Cart::instance('shopping')->update($item->first()->rowId, $request->qty);
        } else{
            Cart::instance('shopping')->update($item->first()->rowId, $stock->stock);
        }

        return back();
    }

    public function remove(Stock $stock)
    {
        $stockId = $stock->id;
        $item = Cart::instance('shopping')->search(function ($cartItem, $rowId) use ($stockId) {
            return $cartItem->id === $stockId;
        });

        if($item->isNotEmpty()) {
            Cart::instance('shopping')->remove($item->first()->rowId);
        }

        return back();
    }
}
