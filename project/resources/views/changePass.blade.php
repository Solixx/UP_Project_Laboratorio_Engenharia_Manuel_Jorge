@extends('layouts.app')

@section('title')
    UP | Change Password
@endsection

@section('content')
    
        <div class="container editProfile">
            @include('includes.accountSettingsMenu')
            <div class="col3 colL4 colM8 colS4"></div>
            <div class="col6 colL6 colM8 colS4 editProfileForm">
                <h1>Change Password</h1>
                <form action="">
                    @csrf
                    <div class="editProfileInfos">
                        <label for="curPass">Current Password</label>
                        <input type="password" name="curPass" id="curPass" placeholder="Current Password">
                        <label for="newPass">New Password</label>
                        <input type="password" name="newPass" id="newPass" placeholder="New Password">
                        <label for="repPass">Repeat New Password</label>
                        <input type="password" name="repPass" id="repPass" placeholder="Repeat Password">
                    </div>
                    @include('includes.accountSettingsBtn')
                </form>
            </div>
        </div>
    
    
@endsection
