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
                <p>New</p>
                <p>Sweetshirt</p>
                <p>Longsleeve</p>
                <p>Shirt</p>
                <p>Pants</p>
                <p>All</p>
                <p>New</p>
                <p>Sweetshirt</p>
                <p>Longsleeve</p>
                <p>Shirt</p>
                <p>Pants</p>
            </div>
        </div>
        <div class="container">
            <div class="col3 colS4 colM4 colL3 paginations flexLeft">
                <select name="" id="">
                    <option value="25">25</option>
                    <option value="25">50</option>
                    <option value="25">100</option>
                </select>
            </div>
            <div class="col9 colS4 colM4 colL9 filters flexRight">
                <h3 class="filtersOpenbtn" onclick="openFiltersNav()">Filters +</h3>
            </div>
        </div>
        <div class="container">
            @for ($i = 0; $i < 20; $i++)
                <div class="col3 colS4 colM4 colL3">
                    <div class="product">
                        <img src="{{ asset('imgs/snekears.jpg') }}" alt="">
                        <div class="productInfo">
                            <h3>Product Name</h3>
                            {{-- <p>Product Description</p> --}}
                            <h3>100.00€</h3>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
    
@endsection

<script src="{{ asset('js/categoriesScrollX.js') }}"></script>
<script src="{{ asset('js/filtersSideBarScript.js') }}"></script>
