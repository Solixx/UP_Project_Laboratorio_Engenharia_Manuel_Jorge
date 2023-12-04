<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product_Brand;
use App\Models\Product_Categorie;
use App\Models\Product_Color;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function brands(){
        return $this->hasMany(Product_Brand::class, 'product_id', 'id');
    }

    public function categories(){
        return $this->hasMany(Product_Categorie::class, 'product_id', 'id');
    }

    public function colors(){
        return $this->hasMany(Product_Color::class, 'product_id', 'id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'product_id', 'id');
    }
}
