{{-- @extends('includes.section')

@section('contentTitle')
    <h1>New Arrivals</h1>
@endsection

@section('contentInfo')
  <div id="newArrivalsImageGallery" class="newArrivalsInfo">
    <img src="{{ asset('imgs/snekears.jpg') }}" alt="">
    <img src="{{ asset('imgs/db37e277c3e9b04a677e5e936fe6c497.jpg') }}" alt="">
    <img src="{{ asset('imgs/snekears3.jpg') }}" alt="">
    <img src="{{ asset('imgs/snekears4.jpg') }}" alt="">
    <img src="{{ asset('imgs/snekears2.jpg') }}" alt="">
    <img src="{{ asset('imgs/snekears5.jpg') }}" alt="">
  </div>
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

<section id="sectionNewArrivals">
    <div class="container title">
      <div class="col12 colS4 colM8 colL12">
        <h1>@yield('newarrivalsTitle', '')</h1>
      </div>
    </div>
    <div class="content newArrivals">
        @yield('newarrivalsInfo', '')
    </div>
    <div class="arrows arrow-container">
      <div class="arrowUp">
        @yield('newarrivalsArrowUp', '')
      </div>
      <div class="arrowDown">
        @yield('newarrivalsArrowDown', '')
      </div>
    </div>
</section>