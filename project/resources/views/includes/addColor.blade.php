@extends('layouts.adminPanelApp')
 
@section('title')
    Add Color | UP
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

          @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
          @endif

          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Add Color</h5>
              <div class="card">
                <div class="card-body">
                  <form action="{{ Route('admin.storeColor') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputColor1" class="form-label">Color</label>
                      <input type="text" name="color" class="form-control" id="exampleInputColor1" value="#" min="7" max="7">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

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

        </div>
      </div>
    </div>
  </div>