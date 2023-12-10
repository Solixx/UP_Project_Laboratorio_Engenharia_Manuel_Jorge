<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'total_price',
        'status',
        'delivery_date',
        'delivery_time',
        'delivery_address',
        'delivery_phone',
        'delivery_email',
        'delivery_name',
        'processed_date',
        'shipped_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_items()
    {
        return $this->hasMany(Order_Items::class);
    }

    public function total_price()
    {
        $total_price = 0;
        foreach ($this->order_items as $order_item) {
            $total_price += $order_item->price * $order_item->quantity;
        }
        $this->total_price = $total_price + Cart::instance('shopping')->tax();
        return $total_price;
    }
}
