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
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Add Product</h5>
              <div class="card">
                <div class="card-body">
                  <form>
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Description</label>
                      <textarea name="description" class="form-control" id="exampleInputPassword1" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <h4 for="" class="form-label">Brands</h4>
                        <label for="exampleInputBrand1" class="form-label">Brands</label>
                        <input type="radio" name="brands" id="exampleInputBrand1">
                    </div>
                    <div class="mb-3">
                        <h4 for="" class="form-label">Colors</h4>
                        <label for="exampleInputColor1" class="form-label">Blue</label>
                        <input type="radio" name="colors" id="exampleInputColor1">
                    </div>
                    <div class="mb-3">
                        <h4 for="" class="form-label">Sizes</h4>
                        <label for="exampleInputSize1" class="form-label">34</label>
                        <input type="radio" name="sizes" id="exampleInputSize1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputStock1" class="form-label">Stock</label>
                        <input type="number" name="stock" class="form-control" id="exampleInputStock1">
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