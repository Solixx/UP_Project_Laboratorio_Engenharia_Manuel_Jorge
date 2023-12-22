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
        <h5 class="card-title fw-semibold mb-4">Users</h5>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Id</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Avatar</h6>
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
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Edit</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Disable</h6>
                  </th>
              </tr>
            </thead>
            <tbody>
              @forelse ($users as $user)
                <tr>
                  <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $user->id }}</h6></td>
                  <td class="border-bottom-0">
                    <img style="border-radius: 50% !important; width: 50px; heigth: 100%; object-fit: contain; bject-position: 50% 50%;" src="{{ asset($user->imgPath) }}" class="card-img-top rounded-0" alt="{{ $user->img }}">
                  </td>
                  <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1">{{ $user->name }}</h6>                      
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $user->email }}</p>
                  </td>
                  <td class="border-bottom-0">
                    @if ($user->isAdmin && $user->id != Auth::user()->id)
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary rounded-3 fw-semibold">Yes</span>
                      </div>
                    @elseif($user->id == Auth::user()->id)
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-success rounded-3 fw-semibold">You</span>
                      </div>
                    @else
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-danger rounded-3 fw-semibold">No</span>
                      </div>
                    @endif
                  </td>
                  <td class="border-bottom-0">
                    <form action="">
                        @csrf
                        @if($user->id != Auth::user()->id)
                          <button type="button" class="btn btn-primary m-1">Edit</button>
                        @else
                            <button type="button" class="btn btn-primary m-1" disabled>Edit</button>
                        @endif
                    </form>
                  </td>
                  <td class="border-bottom-0">
                      @if($user->id != Auth::user()->id)
                        <form action="{{ route('admin.deleteUser',$user->id) }}" method="GET">
                            @method('DELETE')  
                            @csrf
                            <button type="submit" class="btn btn-danger m-1">Disable</button>
                        </form>
                      @else
                          <button type="button" class="btn btn-danger m-1" disabled>Disable</button>
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

<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Disabled Users</h5>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Id</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Avatar</h6>
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
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Edit</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Enable</h6>
                  </th>
              </tr>
            </thead>
            <tbody>
              @forelse ($usersDisabled as $user)
                <tr>
                  <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $user->id }}</h6></td>
                  <td class="border-bottom-0">
                    <img style="border-radius: 50% !important; width: 50px; heigth: 100%; object-fit: contain; bject-position: 50% 50%;" src="{{ asset($user->imgPath) }}" class="card-img-top rounded-0" alt="{{ $user->img }}">
                  </td>
                  <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1">{{ $user->name }}</h6>                      
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $user->email }}</p>
                  </td>
                  <td class="border-bottom-0">
                    @if ($user->isAdmin && $user->id != Auth::user()->id)
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary rounded-3 fw-semibold">Yes</span>
                      </div>
                    @elseif($user->id == Auth::user()->id)
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-success rounded-3 fw-semibold">You</span>
                      </div>
                    @else
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-danger rounded-3 fw-semibold">No</span>
                      </div>
                    @endif
                  </td>
                  <td class="border-bottom-0">
                    <form action="">
                        @csrf
                        @if($user->id != Auth::user()->id)
                          <button type="button" class="btn btn-primary m-1">Edit</button>
                        @else
                            <button type="button" class="btn btn-primary m-1" disabled>Edit</button>
                        @endif
                    </form>
                  </td>
                  <td class="border-bottom-0">
                      @if($user->id != Auth::user()->id)
                        <form action="{{ route('admin.restoreUser',$user->id) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-danger m-1">Enable</button>
                        </form>
                      @else
                          <button type="button" class="btn btn-danger m-1" disabled>Enable</button>
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
</div>
{{-- <div class="col12 colS4 colM8 colL12 paginations flexCenter">
            {{ $users->links() }}
            </div> --}}
@endsection