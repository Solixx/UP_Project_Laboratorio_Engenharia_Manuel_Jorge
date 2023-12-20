<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Product_Color;

class RouterController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $brandsLength = count($brands);
        /* $products = Product::latest()
            ->whereHas('colors', function ($query) {
                $query->whereHas('photos');
            })
            ->take(5)
            ->get(); */
        $products = Product_Color::latest()
            ->whereHas('photos')
            ->whereHas('stock')
            ->take(5)
            ->get();
        return view('index', compact('brands', 'brandsLength', 'products'));
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

    public function forgetPass()
    {
        return view('auth.forgetPassword');
    }
}
