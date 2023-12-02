@extends('layouts.app')

@section('title')
    UP | Login
@endsection

@section('content')
<section id="sectionLogin">
    <div class="login">
        <div class="container">
            <div class="col12 colS4 colM8 colL12">
                <div class="loginForm">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <h1>Login</h1>
                        <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                        <input type="password" name="password" placeholder="Password" id="password" required>
                        <div class="rememberMe">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">Remember Me</label>
                        </div>
                        <button type="submit">Login</button>
                        <div class="loginExtraOp">
                            <div class="goToSignup">
                                <p>New User?</p><a href="{{ route('register') }}"> Sign UP</a>
                            </div>
                            <a href="">Forget Password</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
     
@endsection