<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cols.css') }}">
    
    <title>@yield('title', 'UP')</title>
</head>

<body>
    <main>
        {{-- @include('includes.navbar_visitante') --}}
        {{-- @include('includes.navbar_logado') --}}
        @include('includes.navbar_adm')
        @yield('content')
        @include('includes.footer')
    </main>
    
    

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function() {
    // Seletor para todas as setas em todos os arquivos
    var arrows = $('.arrows');

    arrows.each(function(index) {
      // Ajusta dinamicamente a posição das setas
      var topPosition = index * 100 + 95 + '%';
      $(this).css('top', topPosition);

      if (index === arrows.length - 1) {
        $(this).addClass("arrowsWhite");
      }
    });
  });
</script>
</body>

</html>