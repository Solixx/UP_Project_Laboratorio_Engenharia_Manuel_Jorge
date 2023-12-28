@extends('layouts.adminPanelApp')
 
@section('title')
    List Products | UP
@endsection

@section('content')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    @include('includes.sidebar_adminPanel')
    <!--  Main wrapper -->
    <div class="body-wrapper">
    {{-- @include('includes.sidebar_adminPanel') --}}
    @include('includes.navbar_adminPanel')
<div class="container-fluid">

  @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
          @endif

          @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

          @error('brands')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror

          @error('categories')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror

<div class="row">
<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Products</h5>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Id</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Image</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Name</h6>
                </th>
                {{-- <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Size</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Color</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Stock</h6>
                </th> --}}
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Edit</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Disable</h6>
                </th>
              </tr>
            </thead>
            <tbody>
              @forelse ($products as $product)
                <tr>
                  <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $product->id }}</h6></td>
                  <td class="border-bottom-0">
                    @if($product->getColorsWithTrashed && $product->getColorsWithTrashed->first() && $product->getColorsWithTrashed->first()->photos->first() && $product->getColorsWithTrashed->first()->photos->first()->exists())
                      <img style="width: 100px; heigth: 100%; object-fit: contain; bject-position: 50% 50%;" src="{{ asset($product->getColorsWithTrashed->first()->photos->first()->imgPath) }}" class="card-img-top rounded-0" alt="{{ $product->getColorsWithTrashed->first()->photos->first()->img }}">
                    @else
                      <img style="width: 100px; heigth: 100%; object-fit: contain; bject-position: 50% 50%;" src="https://via.placeholder.com/100"  class="card-img-top rounded-0" alt="">
                    @endif
                  </td>
                  <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1">{{ $product->name }}</h6>                      
                  </td>
                  {{-- <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{ $product->size->size }}</h6>                      
                </td>
                <td class="border-bottom-0">
                    <div class="colorBox colorActive" style="background-color: {{ $product->product_color->color->color }};"></div>                  
                </td>
                <td class="border-bottom-0">
                    <p class="fw-semibold mb-1">{{ $product->stock }}</p>                      
                </td> --}}
                  <td class="border-bottom-0">
                    <form action="{{ Route('admin.editProduct', $product->id) }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-primary m-1">Edit</button>
                    </form>
                  </td>
                  <td class="border-bottom-0">
                    <form action="{{ route('admin.deleteProduct',$product->id) }}" method="GET">
                        @method('DELETE')  
                        @csrf
                        <button type="submit" class="btn btn-danger m-1">Disable</button>
                    </form>
                  </td>
                </tr> 
              @empty
                  
              @endforelse                 
            </tbody>
          </table>
        </div>
      </div>

      {{ $products->links('vendor.pagination.custom-pagination') }}

    </div>
</div>

<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Disabled Products</h5>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Id</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Image</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Name</h6>
                </th>
                {{-- <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Size</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Color</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Stock</h6>
                </th> --}}
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Edit</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Enable</h6>
                </th>
              </tr>
            </thead>
            <tbody>
              @forelse ($productsDisabled as $product)
                <tr>
                  <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $product->id }}</h6></td>
                  <td class="border-bottom-0">
                    @if($product->getColorsWithTrashed && $product->getColorsWithTrashed->first() && $product->getColorsWithTrashed->first()->photos->first() && $product->getColorsWithTrashed->first()->photos->first()->exists())
                      <img style="width: 100px; heigth: 100%; object-fit: contain; bject-position: 50% 50%;" src="{{ asset($product->getColorsWithTrashed->first()->photos->first()->imgPath) }}" class="card-img-top rounded-0" alt="{{ $product->getColorsWithTrashed->first()->photos->first()->img }}">
                    @else
                      <img style="width: 100px; heigth: 100%; object-fit: contain; bject-position: 50% 50%;" src="https://via.placeholder.com/100"  class="card-img-top rounded-0" alt="">
                    @endif
                  </td>
                  <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1">{{ $product->name }}</h6>                      
                  </td>
                 {{--  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{ $product->size->size }}</h6>                      
                </td>
                <td class="border-bottom-0">
                    <div class="colorBox colorActive" style="background-color: {{ $product->product_color->color->color }};"></div>                  
                </td>
                <td class="border-bottom-0">
                    <p class="fw-semibold mb-1">{{ $product->stock }}</p>                      
                </td> --}}
                  <td class="border-bottom-0">
                    <form action="{{ Route('admin.editProduct', $product->id) }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-primary m-1">Edit</button>
                    </form>
                  </td>
                  <td class="border-bottom-0">
                    <form action="{{ route('admin.restoreProduct',$product->id) }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-danger m-1">Enable</button>
                    </form>
                  </td>
                </tr> 
              @empty
                  
              @endforelse                 
            </tbody>
          </table>
          {{-- <div class="col12 colS4 colM8 colL12 paginations flexCenter">
            {{ $users->links() }}
            </div> --}}
        </div>
      </div>

      {{ $productsDisabled->links('vendor.pagination.custom-pagination') }}

    </div>
  </div>
</div>
</div>

@endsection