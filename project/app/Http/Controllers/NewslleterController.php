<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\newslleter;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class NewslleterController extends Controller
{
    public function create()
    {
        return view('includes.createNewslleter');
    }

    /* public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $newslleter = new newslleter();

        $newslleter->email = $request->email;

        $newslleter->save();

        return redirect()->route('index');
    } */

    public function store($id/* , $hash */)
    { 
        $newslleter = Newslleter::find($id);

        /* $emailToHash = $newslleter->email;
        $decodedHash = urldecode($hash); */

        // Check if the hash matches the email
        /* if (Hash::check($emailToHash, $decodedHash)) {
            $newslleter->email_verified_at = now();
            $newslleter->save(); */

            $newslleter->email_verified_at = now();
            $newslleter->save();

            return redirect()->route('index')->with('success', 'Email verified successfully.');
        /* } else {
            return redirect()->route('index')->with('error', 'Email verification failed.');
        } */
    }
}
