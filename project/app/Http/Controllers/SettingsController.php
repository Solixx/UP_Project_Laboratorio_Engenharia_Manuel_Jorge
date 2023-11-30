<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        return view('profile');
    }

    public function editProfile()
    {
        return view('editProfile');
    }

    public function editProfilePost(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);


        if($request->hasFile('image')){
            $imgName = $request->file('image')->getClientOriginalName();
            $request->file('image')->store('public/images');
            $user->img = $imgName;
            $user->imgPath = 'storage/images/'.$request->file('image')->hashName();
        }

        $user->update($request->all());

        return redirect()->route('settings.editProfile')->with('status', 'User Has been uploaded');
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