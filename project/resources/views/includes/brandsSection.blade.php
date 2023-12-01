{{-- @extends('includes.section')

@section('contentTitle')
    <h1>Brands</h1>
@endsection

@section('contentInfo')
    <img src="{{ asset('imgs/BRANDS-removebg-preview.png') }}" alt="">
    <img src="{{ asset('imgs/BRANDS-removebg-preview.png') }}" alt="">
@endsection

@section('arrowUp')
    <a href="#sectionHome">
        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/></svg>          
    </a>
@endsection

@section('arrowDown')
    <a href="#sectionNewArrivals">
        <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
    </a>
@endsection --}}

<section id="sectionBrand">
    <div class="container title">
      <div class="col12 colS4 colM8 colL12">
        <h1>@yield('brandsTitle', '')</h1>
      </div>
    </div>
    <div class="content brands">
        @yield('brandsInfo', '')
    </div>
    <div class="arrows arrow-container">
      <div class="arrowUp">
        @yield('brandsArrowUp', '')
      </div>
      <div class="arrowDown">
        @yield('brandsArrowDown', '')
      </div>
    </div>
</section>