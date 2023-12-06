<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_Brand extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'brand_id',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
