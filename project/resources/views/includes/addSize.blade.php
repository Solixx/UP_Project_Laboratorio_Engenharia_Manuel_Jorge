@extends('layouts.adminPanelApp')
 
@section('title')
    Add Size | UP
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
              <h5 class="card-title fw-semibold mb-4">Add Size</h5>
              <div class="card">
                <div class="card-body">
                  <form action="{{ Route('admin.storeSize') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputSize1" class="form-label">Size</label>
                      <input type="text" name="size" class="form-control" id="exampleInputSize1" value="{{ old('size') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>