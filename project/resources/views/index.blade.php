@extends('layouts.app')

@section('title')
    UP
@endsection

@section('content')
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
        <a href="#sectionNewArrivals">
            <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
        </a>
    @endsection


    {{-- Brands - Section --}}
    @extends('includes.brandsSection')
    @section('brandsTitle')
        <h1>Brands</h1>
    @endsection

    @section('brandsInfo')
        <img src="{{ asset('imgs/BRANDS-removebg-preview.png') }}" alt="">
        {{-- <img src="{{ asset('imgs/BRANDS-removebg-preview.png') }}" alt=""> --}}
    @endsection

    @section('brandsArrowUp')
        <a href="#sectionHome">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/></svg>          
        </a>
    @endsection

    @section('brandsArrowDown')
        <a href="#sectionNewArrivals">
            <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
        </a>
    @endsection

    
    {{-- Home - Section --}}
    @extends('includes.homeSection')

@endsection

