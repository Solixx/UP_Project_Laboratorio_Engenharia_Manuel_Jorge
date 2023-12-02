<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Stock;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'size',
    ];

    public function stock(){
        return $this->hasMany(Stock::class, 'size_id', 'id');
    }
}
