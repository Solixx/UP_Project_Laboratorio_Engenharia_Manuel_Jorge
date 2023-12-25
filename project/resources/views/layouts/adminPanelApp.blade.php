<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('imgs/logo.png') }}" />
  <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">

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

    .genders{
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-evenly;
      width: 100%;
      margin-bottom: 30px;
    }

    .genders .gMan , .genders .gWomen {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .genders .gMan input, .genders .gWomen input{
      width: 100px;
      margin: 0;
      margin-right: 10px;
    }

    .genders .gMan label, .genders .gWomen label{
      margin: 0;
      margin-right: 30px;
    }


    .editProfileInfos{
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;	
      }

      .editProfileInfos label{
        font-size: 20px;
        margin-bottom: 10px;
      }

      .editProfileInfos input{
        width: 100%;
        height: 50px;
        border: 1px solid #111111;
        background-color: #f3f3f3;
        padding: 10px;
        margin-bottom: 30px;
      }

      .editProfileInfos p{
        margin-bottom: 10px;
      }

    @media (min-width: 768px) {
      .genders{
        display: flex;
        flex-direction: row;
        align-items: center;
        width: 100%;
        margin-bottom: 30px;
      }
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