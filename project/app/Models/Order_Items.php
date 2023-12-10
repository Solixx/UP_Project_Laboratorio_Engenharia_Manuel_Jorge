<?php

namespace App\Models;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Order_Items extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_id',
        'stock_id',
        'quantity',
        'price',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function getSubtotalAttribute()
    {
        return $this->price * $this->quantity + Cart::instance('shopping')->tax();
    }
}
