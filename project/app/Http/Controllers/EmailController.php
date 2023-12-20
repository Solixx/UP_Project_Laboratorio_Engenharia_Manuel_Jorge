<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPasswordEmail;
use Illuminate\Http\Request;
use App\Mail\MyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmailController extends Controller
{
    //
    public function sendEmail(){
        $subject = "My Email";
        $recipients = [
            "First Coder" => 'mailtrap.club@gmail.com',
            "Second Coder" => 'mailtrap2.club@gmail.com',
        ];
    
        foreach($recipients as $name => $recipient) {
            Mail::to($recipient)->send(new MyEmail($name, $subject));
        }

        return view('index')->with("Email sent successfully!");
    } 

    public function forgetPass(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users,email'],
        ]);

        $password = Str::random(10);

        $user = User::where('email', $request->email)->first();
        $user->update([
            'password' => Hash::make($password),
        ]);
    
        Mail::to($request->email)->send(new ForgetPasswordEmail($password));

        return view('auth.login')->with("Email sent successfully!");
    }
}
