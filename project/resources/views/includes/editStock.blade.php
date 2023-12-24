@extends('layouts.adminPanelApp')
 
@section('title')
    Edit Stock | UP
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
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Edit Stock</h5>
              <div class="card" style="background-color: rgba({{ $r }}, {{ $g }}, {{ $b }}, {{ $opacity }}); box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); backdrop-filter: blur(5px); -webkit-backdrop-filter: blur(5px);">
                <div class="card-body">
                  <form action="{{ Route('admin.updateStock',$stock->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputDescription1" class="form-label">Price</label>
                      <input type="number" name="price" class="form-control" id="exampleInputDescription1" value="{{ $stock->price }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescription2" class="form-label">Stock</label>
                        <input type="number" name="stock" class="form-control" id="exampleInputDescription2" value="{{ $stock->stock }}">
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