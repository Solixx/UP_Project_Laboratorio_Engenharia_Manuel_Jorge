@extends('layouts.appAccount')

@section('title')
    UP | Change Password
@endsection

@section('content')
    
        <div class="container editProfile">
            @include('includes.accountSettingsMenu')
            <div class="col3 colL4 colM8 colS4"></div>
            <div class="col6 colL6 colM8 colS4 editProfileForm">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('currPassError') || session('passConfirmError'))
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        @if(session('currPassError'))
                            <p>{{ session('currPassError') }}</p>
                        @endif
                        @if(session('passConfirmError'))
                            <p>{{ session('passConfirmError') }}</p>
                        @endif
                    </div>
                @endif

                <h1>Change Password</h1>
                <form action="{{ Route('settings.changePasswordPost') }}" method="POST">
                    @csrf
                    <div class="editProfileInfos">
                        <label for="curPass">Current Password</label>
                        <input type="text" name="curPass" id="curPass" placeholder="Current Password" required autocomplete="curPass" autofocus>
                        <label for="newPass">New Password</label>
                        <input type="password" name="password" id="newPass" placeholder="New Password" required>
                        <label for="repPass">Repeat New Password</label>
                        <input id="password-confirm" type="password" name="password_confirmation" id="repPass" placeholder="Repeat Password" required>
                    </div>
                    @include('includes.accountSettingsBtn')
                </form>
            </div>
        </div>
    
    
@endsection
