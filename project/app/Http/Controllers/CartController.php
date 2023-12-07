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

        if($item->isNotEmpty()) {
            Cart::instance('shopping')->update($item->first()->rowId, $item->first()->qty + 1);
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
