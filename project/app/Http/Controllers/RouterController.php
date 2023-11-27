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

    public function profile()
    {
        return view('profile');
    }

    public function editProfile()
    {
        return view('editProfile');
    }

    public function accountManagement()
    {
        return view('accountManagement');
    }

    public function changePassword()
    {
        return view('changePass');
    }
}
