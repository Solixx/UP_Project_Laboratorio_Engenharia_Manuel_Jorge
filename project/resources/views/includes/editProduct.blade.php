@extends('layouts.adminPanelApp')
 
@section('title')
    Edit Product | UP
@endsection

@section('content')
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('includes.sidebar_adminPanel')
    <!--  Main wrapper -->
    <div class="body-wrapper">
    {{-- @include('includes.sidebar_adminPanel') --}}
    @include('includes.navbar_adminPanel')
    <!--  Sidebar End -->
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Edit Product</h5>
              <div class="card">
                <div class="card-body">
                  <form action="{{ Route('admin.updateProduct',$product->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputDescription1" class="form-label">Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputDescription1" value="{{ $product->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescription2" class="form-label">Description</label>
                        <textarea type="text" name="description" class="form-control" id="exampleInputDescription2">{{ $product->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <h4 for="" class="form-label">Brands</h4>
                        @forelse ($brands as $brand)
                          <label for="exampleInputBrand{{ $brand->id }}" class="form-label">{{ $brand->name }}</label>
                          <?php $have = false; ?>
                          @forelse ($product->brands as $prodBrand)
                            @if($prodBrand->brand_id == $brand->id)
                                <?php $have = true; ?>
                                <input type="checkbox" name="brands[]" id="exampleInputBrand{{ $brand->id }}" value="{{ $brand->id }}" checked>
                                @break;
                            @endif
                          @empty
                        @endforelse
                          @if(!$have)
                            <input type="checkbox" name="brands[]" id="exampleInputBrand{{ $brand->id }}" value="{{ $brand->id }}">
                          @endif
                        @empty
                        @endforelse
                    </div>
                    <div class="mb-3">
                      <h4 for="" class="form-label">Categories</h4>
                      @forelse ($categories as $category)
                        <label for="exampleInputCategory{{ $category->id }}" class="form-label">{{ $category->name }}</label>
                        <?php $have = false; ?>
                          @forelse ($product->categories as $prodCategory)
                            @if($prodCategory->categorie_id == $category->id)
                                <?php $have = true; ?>
                                <input type="checkbox" name="categories[]" id="exampleInputCategory{{ $category->id }}" value="{{ $category->id }}" checked>
                                @break;
                            @endif
                          @empty
                          @endforelse
                          @if(!$have)
                            <input type="checkbox" name="categories[]" id="exampleInputCategory{{ $category->id }}" value="{{ $category->id }}">
                          @endif
                      @empty
                      @endforelse
                    </div>
                    <div class="mb-3">
                        <h4 for="" class="form-label">Colors</h4>
                        @forelse ($colors as $color)

                          <?php $have = false; ?>
                          @forelse ($product->colors as $prodColor)
                            @if($prodColor->color_id == $color->id)
                                <?php $have = true; ?>
                                @break;
                            @endif
                          @empty
                          @endforelse
                          @if(!$have)
                            <div class="colorBox" style="background-color: {{ $color->color }};"></div>
                            <input type="checkbox" name="colors[]" id="exampleInputColor{{ $color->id }}" value="{{ $color->id }}">
                          @endif

                        @empty
                        @endforelse
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>



          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Edit Product Colors</h5>
              <div class="card">
                <div class="card-body">
                    <h4>Colors</h4>
                    @forelse ($product_color as $prodColor)
                        <a href="{{ Route('admin.editProductColor', $prodColor->id) }}"><div class="colorBox" style="background-color: {{ $prodColor->color->color }};"></div></a>
                    @empty
                    @endforelse
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>