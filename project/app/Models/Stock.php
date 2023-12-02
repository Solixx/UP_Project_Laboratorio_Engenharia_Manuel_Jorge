<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product_Color;
use App\Models\Size;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_color_id',
        'size_id',
        'stock',
        'price',
    ];

    public function product_color(){
        return $this->belongsTo(Product_Color::class, 'product_color_id', 'id');
    }

    public function size(){
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }
}
