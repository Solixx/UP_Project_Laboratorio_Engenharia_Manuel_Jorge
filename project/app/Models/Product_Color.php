<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Color;
use App\Models\Product;
use App\Models\Photo;
use App\Models\Stock;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_Color extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'product_id',
        'color_id',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function productWithTrashed(){
        return $this->product()->withTrashed();
    }

    public function color(){
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }

    public function photos(){
        return $this->hasMany(Photo::class, 'product_color_id', 'id');
    }

    public function stock(){
        return $this->hasMany(Stock::class, 'product_color_id', 'id');
    }
}
