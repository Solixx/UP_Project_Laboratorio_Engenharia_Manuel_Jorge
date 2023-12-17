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
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Size</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Color</h6>
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
              @forelse ($products as $product)
                <tr>
                  <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $product->id }}</h6></td>
                  <td class="border-bottom-0">
                    @if($product->Product_Color->photos->first()->exists())
                      <img style="width: 100px; heigth: 100%; object-fit: contain; bject-position: 50% 50%;" src="{{ asset($product->Product_Color->photos->first()->imgPath) }}" class="card-img-top rounded-0" alt="{{ $product->Product_Color->photos->first()->img }}">
                    @else
                      <img style="width: 100px; heigth: 100%; object-fit: contain; bject-position: 50% 50%;" src="https://via.placeholder.com/100"  class="card-img-top rounded-0" alt="">
                    @endif
                  </td>
                  <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1">{{ $product->product_color->product->name }}</h6>                      
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{ $product->size->size }}</h6>                      
                </td>
                <td class="border-bottom-0">
                    <div class="colorBox colorActive" style="background-color: {{ $product->product_color->color->color }};"></div>                  
                </td>
                <td class="border-bottom-0">
                    <p class="fw-semibold mb-1">{{ $product->stock }}</p>                      
                </td>
                  <td class="border-bottom-0">
                    <form action="">
                        @csrf
                        <button type="button" class="btn btn-primary m-1">Edit</button>
                    </form>
                  </td>
                  <td class="border-bottom-0">
                    <form action="{{ route('admin.deleteProduct',$product->id) }}" method="POST">
                        @method('DELETE')  
                        @csrf
                        <button type="submit" class="btn btn-danger m-1">Disable</button>
                    </form>
                  </td>
                </tr> 
              @empty
                  
              @endforelse
              {{-- <tr>
                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">1</h6></td>
                <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">Sunil Joshi</h6>
                    <span class="fw-normal">Web Designer</span>                          
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">Elite Admin</p>
                </td>
                <td class="border-bottom-0">
                  <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary rounded-3 fw-semibold">Low</span>
                  </div>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4">$3.9</h6>
                </td>
              </tr> 
              <tr>
                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">2</h6></td>
                <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">Andrew McDownland</h6>
                    <span class="fw-normal">Project Manager</span>                          
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">Real Homes WP Theme</p>
                </td>
                <td class="border-bottom-0">
                  <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-secondary rounded-3 fw-semibold">Medium</span>
                  </div>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4">$24.5k</h6>
                </td>
              </tr> 
              <tr>
                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">3</h6></td>
                <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">Christopher Jamil</h6>
                    <span class="fw-normal">Project Manager</span>                          
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">MedicalPro WP Theme</p>
                </td>
                <td class="border-bottom-0">
                  <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-danger rounded-3 fw-semibold">High</span>
                  </div>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4">$12.8k</h6>
                </td>
              </tr>      
              <tr>
                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">4</h6></td>
                <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">Nirav Joshi</h6>
                    <span class="fw-normal">Frontend Engineer</span>                          
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">Hosting Press HTML</p>
                </td>
                <td class="border-bottom-0">
                  <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-success rounded-3 fw-semibold">Critical</span>
                  </div>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4">$2.4k</h6>
                </td>
              </tr>    --}}                    
            </tbody>
          </table>
          {{-- <div class="col12 colS4 colM8 colL12 paginations flexCenter">
            {{ $users->links() }}
            </div> --}}
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection