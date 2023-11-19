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
        @extends('includes.navbar_visitante')
        @yield('content')
    </main>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
          // Obtém a referência para o elemento .nav
          var nav = document.querySelector(".nav");
  
          // Obtém a posição da <section class="sectionBrand">
          var sectionBrand = document.querySelector("#sectionBrand");
          var sectionBrandPosition = sectionBrand.offsetTop;
  
            // Obtém a referência para a imagem dentro da .logo
          var logoImage = document.querySelector(".logo img");
  
          // Adiciona um ouvinte de rolagem à janela
          window.addEventListener("scroll", function () {
            // Obtém a posição de rolagem atual
            var scrollPosition = window.scrollY;
  
            // Verifica se a posição de rolagem atingiu ou ultrapassou 100vh
            if (scrollPosition >= sectionBrandPosition) {
              // Adiciona a classe .navBlue se a posição de rolagem for maior ou igual a 100
              nav.classList.add("navBlack");
  
              // Atualiza a imagem da logo para outra imagem
              logoImage.src = "{{ asset('imgs/logo-BLACK.png') }}";
            } else {
              // Remove a classe .navBlue se a posição de rolagem for menor que 100
              nav.classList.remove("navBlack");
  
              // Restaura a imagem original da logo
              logoImage.src = "{{ asset('imgs/logo.png') }}";
            }
          });
        });
  
        let isMouseDown = false;
      let startX;
      let scrollLeft;
  
      const gallery = document.getElementById('newArrivalsImageGallery');
  
      gallery.addEventListener('mousedown', (e) => {
          isMouseDown = true;
          startX = e.pageX - gallery.offsetLeft;
          scrollLeft = gallery.scrollLeft;
          gallery.style.cursor = 'grabbing';
      });
  
      gallery.addEventListener('mouseup', () => {
          isMouseDown = false;
          gallery.style.cursor = 'grab';
      });
  
      gallery.addEventListener('mouseleave', () => {
          isMouseDown = false;
          gallery.style.cursor = 'grab';
      });
  
      gallery.addEventListener('mousemove', (e) => {
          if (!isMouseDown) return;
          e.preventDefault();
          const x = e.pageX - gallery.offsetLeft;
          const walk = (x - startX) * 3;
          gallery.scrollLeft = scrollLeft - walk;
      });
      </script>
</body>

</html>