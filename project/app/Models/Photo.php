<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product_Color;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'imgPath',
        'product_color_id',
    ];

    public function product_color(){
        return $this->belongsTo(Product_Color::class, 'product_color_id', 'id');
    }
}
