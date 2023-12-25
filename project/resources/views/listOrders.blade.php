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
<div class="row">
<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Orders</h5>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Id</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">User</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Price</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Status</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Processed Date</h6>
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
              @forelse ($orders as $order)
                <tr>
                  <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $order->id }}</h6></td>
                  <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1">{{ $order->delivery_name }}</h6>                      
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{ $order->total_price }}</h6>                      
                </td>
                <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{ strtoupper($order->status) }}</h6>                      
                </td>
                <td class="border-bottom-0">
                    @if($order->processed_date == null)
                        <h6 class="fw-semibold mb-1">Not processed yet</h6>
                    @else
                        <h6 class="fw-semibold mb-1">{{ $order->processed_date }}</h6>            
                    @endif          
                </td>
                  <td class="border-bottom-0">
                    <form action="{{ Route('admin.editOrder',$order->id) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary m-1">Edit</button>
                    </form>
                  </td>
                  <td class="border-bottom-0">
                    <form action="{{ route('deleteOrder',$order->id) }}" method="POST">
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

      {{ $orders->links('vendor.pagination.custom-pagination') }}

    </div>
</div>

<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Disabled Orders</h5>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Id</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">User</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Price</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Status</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Processed Date</h6>
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
              @forelse ($ordersDisabled as $order)
                <tr>
                  <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $order->id }}</h6></td>
                  <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1">{{ $order->delivery_name }}</h6>                      
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{ $order->total_price }}</h6>                      
                </td>
                <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{ strtoupper($order->status) }}</h6>                      
                </td>
                <td class="border-bottom-0">
                    @if($order->processed_date == null)
                        <h6 class="fw-semibold mb-1">Not processed yet</h6>
                    @else
                        <h6 class="fw-semibold mb-1">{{ $order->processed_date }}</h6>            
                    @endif          
                </td>
                  <td class="border-bottom-0">
                    <form action="{{ Route('admin.editOrder',$order->id) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary m-1">Edit</button>
                    </form>
                  </td>
                  <td class="border-bottom-0">
                    <form action="{{ route('admin.restoreOrder',$order->id) }}" method="GET">
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

      {{ $ordersDisabled->links('vendor.pagination.custom-pagination') }}

    </div>
  </div>
</div>
</div>

@endsection