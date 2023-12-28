@extends('layouts.adminPanelApp')
 
@section('title')
    Edit Categorie | UP
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
              <h5 class="card-title fw-semibold mb-4">Edit Categorie</h5>
              <div class="card">
                <div class="card-body">
                  <form action="{{ Route('admin.updateCategorie',$categorie->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputName1" class="form-label">Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" value="{{ $categorie->name }}">
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