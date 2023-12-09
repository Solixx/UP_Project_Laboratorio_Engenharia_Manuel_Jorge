@extends('layouts.app')

@section('title')
    UP | Products
@endsection

@section('content')
    @include('includes.filtersSideBar')
    <div id="products" class="products">
        <div class="content categorias">
            <div id="categoriesGallery" class="categoriasList">
                <p class="active">All</p>
                @foreach ($categories as $categorie)
                    <p>{{ $categorie->name }}</p>
                @endforeach
            </div>
        </div>
        <div class="container">
            {{-- <div class="col3 colS4 colM4 colL3 paginations flexLeft">
                <form action="{{ Route('products') }}" method="GET">
                    <select name="pages" id="">
                        <option value="" disabled selected>Default</option>
                        <option value="20">20</option>
                        <option value="40">40</option>
                        <option value="80">80</option>
                    </select>
                    <button type="submit">Apply</button>
                </form>
            </div>
            <div class="col9 colS4 colM4 colL9 filters flexRight">
                <h3 class="filtersOpenbtn" onclick="openFiltersNav()">Filters +</h3>
            </div> --}}
            <div class="col12 colS4 colM8 colL12 filters flexRight">
                <h3 class="filtersOpenbtn" onclick="openFiltersNav()">Filters +</h3>
            </div>
        </div>
        <div class="container">
            @foreach ($stocks as $stock)
                <div class="col3 colS4 colM4 colL3 productLink">
                    <a href="{{ route('product',$stock->id) }}">
                        <div class="product">
                            @if (count($stock->product_color->photos) > 0)
                                <img src="{{ asset($stock->product_color->photos->first()->imgPath) }}" alt="{{ $stock->product_color->photos->first()->img }}">
                            @else
                                <img src="{{ asset('imgs/no_img.JPG') }}" alt="">
                            @endif
                            <div class="productInfo">
                                <h3 class="prodInfoTitle">{{ $stock->product_color->product->name }}</h3>
                                <h3>{{ $stock->price }}€</h3>
                                {{ $stock->id }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        {{-- <div class="container"> --}}
            <div class="col12 colS4 colM8 colL12 paginations flexCenter">
                {{ $stocks->links() }}
            </div>
        {{-- </div> --}}
    </div>
    
@endsection

<script src="{{ asset('js/categoriesScrollX.js') }}"></script>
<script src="{{ asset('js/filtersSideBarScript.js') }}"></script>
