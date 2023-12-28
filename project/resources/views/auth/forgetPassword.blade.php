@extends('layouts.appAuth')

@section('title')
    UP | Forget Password
@endsection

@section('content')
<section id="sectionLogin">
    <div class="login">
        <div class="container">
            <div class="col12 colS4 colM8 colL12">
                <div class="loginForm">
                    <form action="{{ route('forgetPass') }}" method="POST">
                        @csrf
                        <h1>Forget Password</h1>

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

                        <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                        <button type="submit">Submit</button>
                        <div class="loginExtraOp">
                            <div class="goToSignup">
                                <p>Go Back?</p><a href="{{ route('login') }}">Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
     
@endsection