@extends('layouts.app')

@section('title')
    UP
@endsection

@section('content')

    {{-- Support - Section --}}
    @extends('includes.supportSection')
    @section('supportTitle')
        <h1>Support</h1>
    @endsection

    @section('supportInfo')
        <form action="">
            <input type="text" placeholder="Email" name="" id="">
            <textarea name="" id="" cols="30" rows="10" placeholder="Message"></textarea>
            <button>Submit</button>
        </form>
    @endsection

    @section('supportArrowUp')
        <a href="#sectionNewArrivals">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/></svg>          
        </a>
    @endsection

    {{-- New Arrivals - Section --}}
    @extends('includes.newArrivalsSection')
    @section('newarrivalsTitle')
        <h1>New Arrivals</h1>
    @endsection

    @section('newarrivalsInfo')
        <div id="newArrivalsImageGallery" class="newArrivalsInfo">
            <img src="{{ asset('imgs/snekears.jpg') }}" alt="">
            <img src="{{ asset('imgs/db37e277c3e9b04a677e5e936fe6c497.jpg') }}" alt="">
            <img src="{{ asset('imgs/snekears3.jpg') }}" alt="">
            <img src="{{ asset('imgs/snekears4.jpg') }}" alt="">
            <img src="{{ asset('imgs/snekears2.jpg') }}" alt="">
            <img src="{{ asset('imgs/snekears5.jpg') }}" alt="">
        </div>
    @endsection

    @section('newarrivalsArrowUp')
        <a href="#sectionBrand">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/></svg>          
        </a>
    @endsection

    @section('newarrivalsArrowDown')
        <a href="#sectionSupport">
            <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
        </a>
    @endsection


    {{-- Brands - Section --}}
    @extends('includes.brandsSection')
    @section('brandsTitle')
        <h1>Brands</h1>
    @endsection

    @section('brandsInfo')
        {{-- <img src="{{ asset('imgs/BRANDS-removebg-preview.png') }}" alt=""> --}}
        @for ($i = 0; $i < 5; $i++)
            <img src="{{ asset('imgs/ADIDAS.png') }}" alt="">
            <img src="{{ asset('imgs/JORDAN-MERCH.png') }}" alt="">
            <img src="{{ asset('imgs/lacoste.png') }}" alt="">
            <img src="{{ asset('imgs/NIKE.png') }}" alt="">
            <img src="{{ asset('imgs/vans.png') }}" alt="">
            <img src="{{ asset('imgs/Champion.png') }}" alt="">
            <img src="{{ asset('imgs/Louis-Vuitton.png') }}" alt="">
            <img src="{{ asset('imgs/Chanel.png') }}" alt="">
            <img src="{{ asset('imgs/Levis.png') }}" alt="">
            <img src="{{ asset('imgs/Supreme.png') }}" alt="">
            <img src="{{ asset('imgs/Off-White.png') }}" alt="">
            <img src="{{ asset('imgs/balenciaga.png') }}" alt="">
            <img src="{{ asset('imgs/dior.png') }}" alt="">
        @endfor
    
    @endsection

    @section('brandsArrowUp')
        <a href="#sectionHome">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/></svg>          
        </a>
    @endsection

    @section('brandsArrowDown')
        <a href="#sectionNewArrivals">
            <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
        </a>
    @endsection

    
    {{-- Home - Section --}}
    @extends('includes.homeSection')



    {{-- <section id="sectionBrand">
        @include('includes.brandsSection')
    </section>
    <section id="sectionNewArrivals">
        @include('includes.newArrivalsSection')
    </section>
    	 --}}
    
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Obtém a referência para o elemento .nav
        var nav = document.querySelector(".nav");

        // Obtém a posição da <section class="sectionBrand">
        var sectionBrand = document.querySelector("#sectionBrand");
        var sectionBrandPosition = sectionBrand.offsetTop;

        // Obtém a referência para a imagem dentro da .logo
        var logoImage = document.querySelector(".logo img");

        // Atualiza a navigation bar based on the initial scroll position
        updateNavigationBar();

        // Adiciona um ouvinte de rolagem à janela
        window.addEventListener("scroll", function () {
            // Atualiza a navigation bar durante o scroll
            updateNavigationBar();
        });

        function updateNavigationBar() {
            // Obtém a posição de rolagem atual
            var scrollPosition = window.scrollY;

            // Verifica se a posição de rolagem atingiu ou ultrapassou 100vh
            if (scrollPosition < sectionBrandPosition) {
                // Adiciona a classe .navBlack se a posição de rolagem for maior ou igual a 100
                nav.classList.add("navBlack");

                // Atualiza a imagem da logo para outra imagem
                logoImage.src = "{{ asset('imgs/logo.png') }}";
            } else {
                // Remove a classe .navBlack se a posição de rolagem for menor que 100
                nav.classList.remove("navBlack");

                // Restaura a imagem original da logo
                logoImage.src = "{{ asset('imgs/logo-BLACK.png') }}";
            }
        }

    // NewArrivals Scroll
      let isMouseDownNA = false;
      let startXNA;
      let scrollLeftNA;
  
      const newArrivals = document.getElementById('newArrivalsImageGallery');
      
      newArrivals.addEventListener('mousedown', (e) => {
          isMouseDownNA = true;
          startXNA = e.pageX - newArrivals.offsetLeft;
          scrollLeftNA = newArrivals.scrollLeft;
          newArrivals.style.cursor = 'grabbing';
      });
  
      newArrivals.addEventListener('mouseup', () => {
          isMouseDownNA = false;
          newArrivals.style.cursor = 'grab';
      });
  
      newArrivals.addEventListener('mouseleave', () => {
          isMouseDownNA = false;
          newArrivals.style.cursor = 'grab';
      });
  
      newArrivals.addEventListener('mousemove', (e) => {
          if (!isMouseDownNA) return;
          e.preventDefault();
          const x = e.pageX - newArrivals.offsetLeft;
          const walk = (x - startXNA) * 3;
          newArrivals.scrollLeft = scrollLeftNA - walk;
      });
    });
</script>
