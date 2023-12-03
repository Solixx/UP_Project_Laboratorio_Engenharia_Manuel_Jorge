<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Stock;
use App\Models\User;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_id',
        'user_id',
    ];

    public function stock(){
        return $this->belongsTo(Stock::class, 'stock_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
