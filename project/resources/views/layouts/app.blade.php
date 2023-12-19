<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet" />
    
    <link rel="icon" href="{{ asset('imgs/logo.png') }}" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cols.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebars.css') }}">
    
    <title>@yield('title', 'UP')</title>
</head>

<body>
    <main>
        @guest
            @include('includes.navbar_visitante')
        @elseif(Auth::user()->isAdmin && Auth::user()->email_verified_at != null)
            @include('includes.navbar_adm')
        @else
            @include('includes.navbar_logado')
        @endguest
        
        @yield('content')
        @include('includes.cartSideBar')
        @include('includes.footer')
    </main>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('js/navbarScript.js') }}"></script>
    <script src="{{ asset('js/arrowsScript.js') }}"></script>
    <script src="{{ asset('js/cartSideBarScript.js') }}"></script>
</body>

</html>