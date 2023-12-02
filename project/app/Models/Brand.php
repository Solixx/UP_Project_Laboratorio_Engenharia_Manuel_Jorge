<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product_Brand;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img',
        'imgPath',
    ];

    public function products(){
        return $this->hasMany(Product_Brand::class, 'brand_id', 'id');
    }
}