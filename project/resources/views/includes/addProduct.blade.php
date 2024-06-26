@extends('layouts.adminPanelApp')
 
@section('title')
    Add Product | UP
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
              <h5 class="card-title fw-semibold mb-4">Add Product</h5>
              <div class="card">
                <div class="card-body">
                  <form action="{{ Route('admin.storeProduct') }}" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Description</label>
                      <textarea name="description" class="form-control" id="exampleInputPassword1" cols="30" rows="10" value="{{ old('description') }}"></textarea>
                    </div>
                    <div class="mb-3">
                        <h4 for="" class="form-label">Brands</h4>
                        @forelse ($brands as $brand)
                          <label for="exampleInputBrand{{ $brand->id }}" class="form-label">{{ $brand->name }}</label>
                          <input type="checkbox" name="brands[]" id="exampleInputBrand{{ $brand->id }}" value="{{ $brand->id }}">
                        @empty
                        @endforelse
                    </div>
                    <div class="mb-3">
                      <h4 for="" class="form-label">Categories</h4>
                      @forelse ($categories as $category)
                        <label for="exampleInputCategory{{ $category->id }}" class="form-label">{{ $category->name }}</label>
                        <input type="checkbox" name="categories[]" id="exampleInputCategory{{ $category->id }}" value="{{ $category->id }}">
                      @empty
                      @endforelse
                    </div>
                    <div class="mb-3">
                        <h4 for="" class="form-label">Colors</h4>
                        @forelse ($colors as $color)
                          <div class="colorBox" style="background-color: {{ $color->color }};"></div>
                          <input type="checkbox" name="colors[]" id="exampleInputColor{{ $color->id }}" value="{{ $color->id }}">
                        @empty
                        @endforelse
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
              {{-- <h5 class="card-title fw-semibold mb-4">Disabled forms</h5>
              <div class="card mb-0">
                <div class="card-body">
                  <form>
                    <fieldset disabled>
                      <legend>Disabled fieldset example</legend>
                      <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Disabled input</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                      </div>
                      <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Disabled select menu</label>
                        <select id="disabledSelect" class="form-select">
                          <option>Disabled select</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" disabled>
                          <label class="form-check-label" for="disabledFieldsetCheck">
                            Can't check this
                          </label>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </fieldset>
                  </form>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>