@extends('layouts.appAccount')

@section('title')
    UP | Account Management
@endsection

@section('content')
    
        <div class="container editProfile">
            @include('includes.accountSettingsMenu')
            <div class="col3 colL4 colM8 colS4"></div>
            <div class="col6 colL6 colM8 colS4 editProfileForm">
                <h1>Account Management</h1>
                <h2>Your Account</h2>
                <form method="POST" action="{{ route('settings.accountManagementPost',$authUser->id) }}">
                    @csrf
                    <div class="editProfileInfos">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" placeholder="Email" value="{{ $authUser->email }}">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" placeholder="Address" value="{{ $authUser->address }}">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" placeholder="Phone" value="{{ $authUser->phone }}">
                        <p>Gender</p>
                        <div class="genders">
                            <div class="gMan">
                                <input value="m" type="radio" id="man" name="gender" @if($authUser->gender == 'm') checked @endif>
                                <label for="man">Man</label>
                            </div>
                            <div class="gWomen">
                                <input value="f" type="radio" name="gender" id="women" @if($authUser->gender == 'f') checked @endif>
                                <label for="women">female</label>
                            </div>
                        </div>
                    </div>
                    @include('includes.accountSettingsBtn')
                </form>
                <h2>Disable Account</h2>
                <form action="{{ Route('settings.disableAccount') }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Disable Account</button>
                </form>
            </div>
        </div>
    
    
@endsection
