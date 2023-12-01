<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class RouterController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $brandsLength = count($brands);
        return view('index', compact('brands', 'brandsLength'));
        /* return view('index'); */
    }

    public function products()
    {
        return view('products');
    }

    public function product()
    {
        return view('product');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }
}
