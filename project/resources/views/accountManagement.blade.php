@extends('layouts.app')

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
                <form action="">
                    <div class="editProfileInfos">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" placeholder="Email" value="exemple@gmail.com">
                        <p>Gender</p>
                        <div class="genders">
                            <div class="gMan">
                                <input type="radio" id="man" name="gender">
                                <label for="man">Man</label>
                            </div>
                            <div class="gWomen">
                                <input type="radio" name="gender" id="">
                                <label for="gender">female</label>
                            </div>
                        </div>
                    </div>
                    @include('includes.accountSettingsBtn')
                </form>
                <h2>Disable Account</h2>
                <form action="">
                    <button>Disable Account</button>
                </form>
            </div>
        </div>
    
    
@endsection
