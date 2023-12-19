<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('imgs/logo.png') }}" />
  <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />

  <title>@yield('title', 'Admin Panel | UP')</title>

  <style>
    .colorBox{
      width: 40px;
      height: 40px;
      margin-right: 10px;
      border-radius: 50%;
      display: inline-block;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .colorBox:hover{
      border: 2px solid #111111;
    }

    .colorActive{
      border: 2px solid #111111;
    }
  </style>
</head>

<body>
    @yield('content')

    <script src="{{ asset("libs/jquery/dist/jquery.min.js") }}"></script>
  <script src="{{ asset("libs/bootstrap/dist/js/bootstrap.bundle.min.js") }}"></script>
  <script src="{{ asset("js/sidebarmenu.js") }}"></script>
  <script src="{{ asset("js/app.min.js") }}"></script>
  <script src="{{ asset("libs/apexcharts/dist/apexcharts.min.js") }}"></script>
  <script src="{{ asset("libs/simplebar/dist/simplebar.js") }}"></script>
  <script src="{{ asset("js/dashboard.js") }}"></script>
</body>

</html>