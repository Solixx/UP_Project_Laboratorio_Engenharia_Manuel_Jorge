@extends('layouts.adminPanelApp')
 
@section('title')
    Edit Product Color | UP
@endsection

@php
  // Convert HEX to RGB
  list($r, $g, $b) = sscanf($product_color->color->color, "#%02x%02x%02x");
  // Set the desired opacity (e.g., 0.5 for 50% opacity)
  $opacity = 0.2;
@endphp

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

          @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
          @endif

          @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Edit Product Color</h5>
              <div class="card" style="background-color: rgba({{ $r }}, {{ $g }}, {{ $b }},
                                      {{ $opacity }}); box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                                      backdrop-filter: blur(5px);
                                      -webkit-backdrop-filter: blur(5px);">
                <div class="card-body">
                  <form action="{{ Route('admin.updateProductColor',$product_color->id) }}" 
                        enctype="multipart/form-data" 
                        method="POST">
                    @csrf
                    <div class="mb-3">
                      <img class="form-control" 
                            style="margin: 0 auto; 
                                  min-width: 100px; 
                                  max-width: 50%; 
                                  border: none;" 
                            id="prodColordisplay" 
                            src="https://via.placeholder.com/100"  
                            class="card-img-top rounded-0" 
                            alt="No Image" 
                            onclick="triggerclick()" />
                      @if($product_color && 
                          $product_color->photos->first() && 
                          $product_color->photos->first()->exists())
                        <div class="imgGalery" style="display: flex; flex-direction: row; 
                                                      justify-content: flex-start !important; flex-wrap: wrap;">
                          @foreach ($product_color->photos as $photos)
                            <a href="{{ Route('admin.deletePhoto', $photos->id) }}">
                              <img style="min-width: 100px; 
                                          max-width: 25%; 
                                          height: 100px; 
                                          border: none; 
                                          object-fit: contain; 
                                          object-position: 50% 50%;" 
                                    src="{{ asset($photos->imgPath) }}" 
                                    alt="{{ $photos->img }}">
                            </a>
                        @endforeach
                        </div>
                      @else
                      @endif
                      <input id="prodColorImgInput" 
                              type="file" 
                              name="image" 
                              onchange="displayimage(this)" 
                              style="display: none;">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                  <form action="{{ Route('admin.deleteProductColor',$product_color->id) }}" 
                        method="GET" 
                        style="margin-top: 10px">
                    @csrf
                    <button type="submit" class="btn btn-danger">Disable</button>
                  </form>
                </div>
              </div>
            </div>
          </div>



          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Stocks</h5>
                <form action="{{ Route('admin.addProdColorStock', $product_color->id) }}" method="GET">
                  @csrf
                  <button type="submit" class="btn btn-danger m-1">Add Stock</button>
                </form>
                <div class="table-responsive">

                  <!--
                    Stocks Table List
                  -->
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Size</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Price</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Stock</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Edit</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Disable</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($stocks as $stock)
                        <tr>
                          <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $stock->id }}</h6></td>
                          <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-1">{{ $stock->size->size }}</h6>
                          </td>
                          <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{ $stock->price }}</h6>
                          </td>
                          <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{ $stock->stock }}</h6>
                          </td>
                          <td class="border-bottom-0">
                            <form action="{{ Route('admin.editStock', $stock->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary m-1">Edit</button>
                            </form>
                          </td>
                          <td class="border-bottom-0">
                            <form action="{{ route('admin.deleteStock',$stock->id) }}" method="GET">
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

              {{ $stocks->links('vendor.pagination.custom-pagination') }}

            </div>
          </div>

          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Stocks Disabled</h5>
                <div class="table-responsive">

                  <!--
                    Disabled Stocks Table List
                  -->
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Size</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Price</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Stock</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Edit</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Enable</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($stocksDisabled as $stock)
                        <tr>
                          <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $stock->id }}</h6></td>
                          <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-1">{{ $stock->size->size }}</h6>
                          </td>
                          <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{ $stock->price }}</h6>
                          </td>
                          <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{ $stock->stock }}</h6>
                          </td>
                          <td class="border-bottom-0">
                            <form action="{{ Route('admin.editStock', $stock->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary m-1">Edit</button>
                            </form>
                          </td>
                          <td class="border-bottom-0">
                            <form action="{{ route('admin.restoreStock',$stock->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-danger m-1">Enable</button>
                            </form>
                          </td>
                        </tr>
                      @empty
                          
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>

              {{ $stocksDisabled->links('vendor.pagination.custom-pagination') }}

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script>
    function triggerclick(){
		document.querySelector('#prodColorImgInput').click();
	}
	function displayimage(e){
		if (e.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				document.querySelector('#prodColordisplay').setAttribute('src',e.target.result);
			}
			reader.readAsDataURL(e.files[0]);
		}
	}
</script>