@extends('layouts.adminPanelApp')
 
@section('title')
    List Users | UP
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
<div class="row">
<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Categories</h5>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Id</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Name</h6>
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
              @forelse ($categories as $categorie)
                <tr>
                  <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $categorie->id }}</h6></td>
                  <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1">{{ $categorie->name }}</h6>                      
                  </td>
                  <td class="border-bottom-0">
                    <form action="{{ Route('admin.editCategorie',$categorie->id) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary m-1">Edit</button>
                    </form>
                  </td>
                  <td class="border-bottom-0">
                    <form action="{{ route('admin.deleteCategorie',$categorie->id) }}" method="GET">
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

      {{ $categories->links('vendor.pagination.custom-pagination') }}

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
                    <h6 class="fw-semibold mb-0">Name</h6>
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
              @forelse ($categoriesDisabled as $categorie)
                <tr>
                  <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $categorie->id }}</h6></td>
                  <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1">{{ $categorie->name }}</h6>                      
                  </td>
                  <td class="border-bottom-0">
                    <form action="{{ Route('admin.editCategorie',$categorie->id) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary m-1">Edit</button>
                    </form>
                  </td>
                  <td class="border-bottom-0">
                    <form action="{{ route('admin.restoreCategorie',$categorie->id) }}" method="GET">
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

      {{ $categoriesDisabled->links('vendor.pagination.custom-pagination') }}

    </div>
  </div>
</div>
</div>

@endsection