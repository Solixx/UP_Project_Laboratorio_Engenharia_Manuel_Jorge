<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RouterController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function products()
    {
        return view('products');
    }
}
