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
