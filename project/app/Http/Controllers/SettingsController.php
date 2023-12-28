<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $favorites = Auth::user()->favorites;
        $orders = /* Auth::user()->orders */ Order::where('user_id', Auth::user()->id)->withTrashed()->get();

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
            'name' => 'required|string|min:1|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);


        if($request->hasFile('image')){
            $imgName = $request->file('image')->getClientOriginalName();
            $request->file('image')->store('public/images');
            $user->img = $imgName;
            $user->imgPath = 'storage/images/'.$request->file('image')->hashName();
        }

        $user->update($request->all());

        return redirect()->route('settings.editProfile')->with('success', 'User Has been updated');
    }

    public function accountManagement()
    {
        return view('accountManagement');
    }

    public function accountManagementPost(Request $request, User $user)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'min:1', Rule::unique('users')->ignore($user->id),],
            'gender' => 'required|max:1',
            'phone' => 'numeric|nullable|digits_between:9,15|unique:users,phone,'.$user->id,
            'address' => 'string|nullable|max:255',
        ]);

        $user->update($request->all());

        return redirect()->route('settings.accountManagement')->with('success', 'User Has been updated');
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
            return redirect()->route('settings.changePassword')->with('error', 'New Password Cannot be the same as Current Password');
        }
        if(!Hash::check($request->curPass, Auth::user()->password)){
            return redirect()->route('settings.changePassword')->with('error', 'Current Password is incorrect');
        }

        $user = User::find(Auth::user()->id);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('settings.changePassword')->with('success', 'Password Has been changed');
    }

    public function disableAccount()
    {
        $user = User::where('id', Auth::user()->id);
        $user->delete();
        return redirect()->route('index')->with('success', 'Account Has Been Disabled');
    }
}