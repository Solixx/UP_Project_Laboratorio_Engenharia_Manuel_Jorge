<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product_Categorie;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function categories(){
        return $this->hasMany(Product_Categorie::class, 'categorie_id', 'id');
    }
}
