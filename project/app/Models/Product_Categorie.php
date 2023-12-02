<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Models\Categorie;

class Product_Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'categorie_id',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class, 'categorie_id', 'id');
    }
}
