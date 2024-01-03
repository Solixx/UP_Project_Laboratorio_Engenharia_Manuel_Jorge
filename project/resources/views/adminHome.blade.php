@extends('layouts.adminPanelApp')
 
@section('title')
  Admin Panel | UP
@endsection

@section('content')
 <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    @include('includes.sidebar_adminPanel')
    <!--  Main wrapper -->
    <div class="body-wrapper">
      @include('includes.navbar_adminPanel')
      <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <div class="mb-4">
                  <h5 class="card-title fw-semibold">Recent Orders</h5>
                </div>
                <ul class="timeline-widget mb-0 position-relative mb-n5">
                  @foreach ($orders as $order)
                    <li class="timeline-item d-flex position-relative overflow-hidden">
                      
                        @if ($order->status == 'pending' || $order->status == 'processed')
                          <div class="timeline-time text-dark flex-shrink-0 text-end"> 
                            {{ $order->processed_date }}
                          </div>
                          <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                            <span class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                          </div>
                        @elseif($order->status == 'shipped')
                          <div class="timeline-time text-dark flex-shrink-0 text-end"> 
                            {{ $order->shipped_date }}
                          </div>
                          <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                            <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                          </div>
                        @elseif($order->status == 'delivered')
                          <div class="timeline-time text-dark flex-shrink-0 text-end"> 
                            {{ $order->delivery_date }}
                          </div>
                          <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                            <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                          </div>
                        @else
                          <div class="timeline-time text-dark flex-shrink-0 text-end"> 
                            {{ $order->canceled_date }}
                          </div>
                          <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                            <span class="timeline-badge border-2 border border-danger flex-shrink-0 my-8"></span>
                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                          </div>
                        @endif
                      
                      <div class="timeline-desc fs-3 text-dark mt-n1">
                        Order#{{ $order->id }}: {{ $order->delivery_name }}
                      </div>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">New Users</h5>
                <div class="table-responsive">

                  <!-- 
                    New Users List Table
                  -->
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
                          <h6 class="fw-semibold mb-0">Email</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">isAdmin</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($users as $user)
                        <tr>
                          <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $user->id }}</h6></td>
                          <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-1">{{ $user->name }}</h6>
                          </td>
                          <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">{{ $user->email }}</p>
                          </td>
                          <td class="border-bottom-0">
                            @if ($user->isAdmin)
                              <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-primary rounded-3 fw-semibold">Yes</span>
                              </div>
                            @else
                              <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-danger rounded-3 fw-semibold">No</span>
                              </div>
                            @endif
                          </td>
                        </tr> 
                      @empty
                          
                      @endforelse                 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          @forelse ($products as $product)
            <div class="col-sm-6 col-xl-3">
              <div class="card overflow-hidden rounded-2">
                <div class="position-relative">
                  <a href="javascript:void(0)">
                    @if($product->Product_Color && 
                        $product->Product_Color->photos && 
                        $product->Product_Color->photos->first())
                      <img src="{{ asset($product->Product_Color->photos->first()->imgPath) }}" 
                            class="card-img-top rounded-0" 
                            alt="{{ $product->Product_Color->photos->first()->img }}" />
                    @else
                      <img src="https://via.placeholder.com/100"  
                            class="card-img-top rounded-0" alt="No Image" />
                    @endif
                  </a>
                </div>
                <div class="card-body pt-3 p-4">
                  <h6 class="fw-semibold fs-4">{{ $product->product_color->product->name }}</h6>
                  <div class="d-flex align-items-center justify-content-between">
                    <h6 class="fw-semibold fs-4 mb-0">€{{ $product->price }}
                  </div>
                </div>
              </div>
            </div>
          @empty
              
          @endforelse
        </div>
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a></p>
        </div>
      </div>
    </div>
  </div>

@endsection