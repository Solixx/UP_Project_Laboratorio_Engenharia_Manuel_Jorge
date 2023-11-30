<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function adminHome()
    {
        if(auth()->user()->isAdmin) {
            return view('adminHome');
        }
        return redirect('/')->with('error', 'You have not admin access');
    }
}
