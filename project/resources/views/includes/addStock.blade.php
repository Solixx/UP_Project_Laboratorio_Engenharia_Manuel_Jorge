@extends('layouts.adminPanelApp')
 
@section('title')
    Add Product | UP
@endsection

@php
  // Convert HEX to RGB
  list($r, $g, $b) = sscanf($stock->product_color->color->color, "#%02x%02x%02x");
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
              <h5 class="card-title fw-semibold mb-4">Add Product {{ $stock->size->size }}</h5>
              <div class="card" style="background-color: rgba({{ $r }}, {{ $g }}, {{ $b }}, {{ $opacity }}); box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); backdrop-filter: blur(5px); -webkit-backdrop-filter: blur(5px);">
                <div class="card-body">
                  <form action="{{ Route('admin.storeStock', $stock->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                      <h4 for="" class="form-label">Price</h4>
                        <input type="number" name="price">
                    </div>
                    <div class="mb-3">
                        <h4 for="" class="form-label">Stock</h4>
                          <input type="number" name="stock">
                      </div>
                    <div class="mb-3">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>