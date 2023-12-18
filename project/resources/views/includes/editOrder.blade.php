@extends('layouts.adminPanelApp')
 
@section('title')
    Edit Order | UP
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
              <h5 class="card-title fw-semibold mb-4">Edit Order</h5>
              <div class="card">
                <div class="card-body">
                  <form action="{{ Route('admin.updateOrder',$order->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <h5>Status: {{ $order->status }}</h5>
                    </select>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputOrder1" class="form-label">Delivery Date</label>
                      <input type="date" name="delivery_date" class="form-control" id="exampleInputOrder1" value="{{ $order->delivery_date }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputOrder2" class="form-label">Delivery Time</label>
                        <input type="text" name="delivery_time" class="form-control" id="exampleInputOrder2" value="{{ $order->delivery_time }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputOrder3" class="form-label">Processed Date</label>
                        <input type="date" name="processed_date" class="form-control" id="exampleInputOrder3" value="{{ $order->processed_date }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputOrder4" class="form-label">Shipped Date</label>
                        <input type="date" name="shipped_date" class="form-control" id="exampleInputOrder4" value="{{ $order->shipped_date }}">
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