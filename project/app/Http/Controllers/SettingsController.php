<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $favorites = Auth::user()->favorites;
        $orders = Auth::user()->orders;

        return view('profile', compact('favorites', 'orders'));
        /* return view('profile'); */
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

    public function accountManagementPost(Request $request, User $user)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id),],
            'gender' => 'required|max:1',
            'phone' => 'numeric|nullable|digits_between:9,15|unique:users,phone,'.$user->id,
            'address' => 'string|nullable|max:255',
        ]);

        $user->update($request->all());

        return redirect()->route('settings.accountManagement')->with('status', 'User Has been uploaded');
    }

    public function changePassword(Request $request)
    {
        return view('changePass');
    }

    public function changePasswordPost(Request $request)
    {
        $request->validate([
            'curPass' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if($request->curPass == $request->password){
            return redirect()->route('settings.changePassword')->with('status', 'New Password Cannot be the same as Current Password');
        }
        if(!Hash::check($request->curPass, Auth::user()->password)){
            return redirect()->route('settings.changePassword')->with('status', 'Current Password is incorrect');
        }

        $user = User::find(Auth::user()->id);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('settings.changePassword')->with('status', 'Password Has been changed');
    }

    public function disableAccount()
    {
        $user = User::where('id', Auth::user()->id);
        $user->delete();
        return redirect()->route('index')->with('status', 'Account Has Been Disabled');
    }
}