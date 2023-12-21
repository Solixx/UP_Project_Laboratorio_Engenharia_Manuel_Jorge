<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\newslleter;
use Illuminate\Http\Request;

class NewslleterController extends Controller
{
    public function create()
    {
        return view('includes.createNewslleter');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $newslleter = new newslleter();

        $newslleter->email = $request->email;

        $newslleter->save();

        return redirect()->route('index');
    }
}
