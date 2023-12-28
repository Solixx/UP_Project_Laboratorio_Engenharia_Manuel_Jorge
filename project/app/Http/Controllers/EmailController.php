<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;

use App\Mail\ForgetPasswordEmail;
use Illuminate\Http\Request;
use App\Mail\MyEmail;
use App\Mail\SupportEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\NewslleterEmail;
use App\Models\newslleter;
use App\Mail\ValidateNewslleterEmail;

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

        return view('auth.login')->with('success', 'Email sent successfully!');
    }

    public function support(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
        ]);

        Mail::to('supportUpStore@up.com')->send(new SupportEmail($request->message, $request->email));

        return redirect()->route('index')->with('success', 'Email sent successfully!');
    }

    public function newslleter(Request $request){
        $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
        ]);

        $newslleter = newslleter::all();

        foreach($newslleter as $email){
            Mail::to($email->email)->send(new NewslleterEmail($request->message, $request->subject));
        }

        return back()->with('success', 'Newslleter send');
    }

    public function formNewslleter(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:newslleters'],
        ]);

        $newslleter = new newslleter();

        $newslleter->email = $request->email;

        $newslleter->save();

        /* $hash = Hash::make($request->email);
        $hash = urlencode($hash); */
        /* $hash = urlencode(base64_encode($request->email)); */

        $verificationUrl = URL::signedRoute(
            'validateNewslleter', ['id' => $newslleter->id]
        );

        Mail::to($request->email)->send(new ValidateNewslleterEmail($verificationUrl));

        return back();
    }
}
