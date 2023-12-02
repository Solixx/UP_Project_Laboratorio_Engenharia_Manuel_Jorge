@extends('layouts.app')

@section('title')
    UP
@endsection

@section('content')

    {{-- Support - Section --}}
    
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
    
    @section('newarrivalsTitle')
        <h1>New Arrivals</h1>
    @endsection

    @section('newarrivalsInfo')
        <div id="newArrivalsImageGallery" class="newArrivalsInfo">
            @foreach ($products as $product)
                @foreach ($product->photos as $photo)
                    @if (strlen($photo->imgPath) > 0)
                        <img src="{{ asset($photo->imgPath) }}" alt="{{ $photo->img }}">
                        @break
                    @endif
                @endforeach
            @endforeach
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
    
    @section('brandsTitle')
        <h1>Brands</h1>
    @endsection

    @section('brandsInfo')
        <div class="brandscolumns">
            <div id="brandsR1" class="brandsRow">
                @for ($i = 0; $i < $brandsLength/3; $i++)
                    <img src="{{ asset($brands[$i]->imgPath) }}" alt="">
                @endfor
            </div>
            <div id="brandsR2" class="brandsRow">
                @for ($i = $brandsLength/3+1; $i < ($brandsLength/3)*2; $i++)
                    <img src="{{ asset($brands[$i]->imgPath) }}" alt="">
                @endfor
            </div>
            <div id="brandsR3" class="brandsRow">
                @for ($i = ($brandsLength/3)*2+1; $i < ($brandsLength/3)*3; $i++)
                    <img src="{{ asset($brands[$i]->imgPath) }}" alt="">
                @endfor
            </div>
        </div>
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

    
    {{-- Includes --}}
    @include('includes.homeSection')
    @include('includes.brandsSection')
    @include('includes.newArrivalsSection')
    @include('includes.supportSection')
    
@endsection

<script src="{{ asset('js/newArrivalsScrollX.js') }}"></script>
<script src="{{ asset('js/brandsScrollX.js') }}"></script>
<script src="{{ asset('js/brandsAutoScrollX.js') }}"></script>
