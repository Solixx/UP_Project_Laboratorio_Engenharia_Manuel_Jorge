<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product_Color;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
    ];

    public function products(){
        return $this->hasMany(Product_Color::class, 'color_id', 'id');
    }
}
