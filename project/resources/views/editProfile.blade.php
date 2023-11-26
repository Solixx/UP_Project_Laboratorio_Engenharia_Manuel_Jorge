@extends('layouts.app')

@section('title')
    UP | Edit Profile
@endsection

@section('content')
    <form action="">
        <div class="container editProfile">
            <div class="col3 colL4 colM8 colS4 settingsMenu">
                <div class="settingsOptions">
                    <div class="settingsOption">
                        <a href="{{ url('settings/edit-profile') }}"><h1 class="optionActive">Edit Profile</h1></a>
                    </div>
                    <div class="settingsOption">
                        <a href="{{ url('settings/edit-password') }}"><h1>Account Management</h1></a>
                    </div>
                    <div class="settingsOption">
                        <a href="{{ url('settings/edit-payment') }}"><h1>Edit Payment</h1></a>
                    </div>
                </div>
            </div>
            <div class="col3 colL4 colM8 colS4"></div>
            <div class="col6 colL6 colM8 colS4 editProfileForm">
                <h1>Edit Profile</h1>
                <form action="">
                    <div class="editProfileImg">
                        <img src="{{ asset('imgs/snekears.jpg') }}" alt="">
                        <input type="file" name="profileImg" id="">
                    </div>
                    <div class="editProfileInfos">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Name" value="Manuel Gonçalves">
                    </div>
                </form>
            </div>
        </div>

        @extends('includes.accountSettingsBtn')
    </form>
    
@endsection
