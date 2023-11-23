@extends('layouts.app')

@section('title')
    UP | Products
@endsection

@section('content')
    <div class="products">
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
                <h3>Filters +</h3>
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

<script>

    document.addEventListener("DOMContentLoaded", function () {
    // Categories Scroll

    let isMouseDownC = false;
    let startXC;
    let scrollLeftC;

    const categories = document.getElementById('categoriesGallery');

    categories.addEventListener('mousedown', (e) => {
        isMouseDownC = true;
        startXC = e.pageX - categories.offsetLeft;
        scrollLeftC = categories.scrollLeft;
        categories.style.cursor = 'grabbing';
    });

    categories.addEventListener('mouseup', () => {
        isMouseDownC = false;
        categories.style.cursor = 'grab';
    });

    categories.addEventListener('mouseleave', () => {
        isMouseDownC = false;
        categories.style.cursor = 'grab';
    });

    categories.addEventListener('mousemove', (e) => {
        if (!isMouseDownC) return;
        e.preventDefault();
        const x = e.pageX - categories.offsetLeft;
        const walk = (x - startXC) * 3;
        categories.scrollLeft = scrollLeftC - walk;
    });
});

</script>
