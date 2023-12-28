@extends('layouts.adminPanelApp')
 
@section('title')
    Edit User | UP
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
              <h5 class="card-title fw-semibold mb-4">Edit User</h5>
              <div class="card">
                <div class="card-body">
                  <form action="{{ Route('admin.updateUser',$user->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mb-3"> 
                        <img style="max-height: 200px;
                                    max-width: 200px;
                                    margin: auto; 
                                    border: none; 
                                    object-fit: contain; 
                                    object-position: 50% 50%; 
                                    cursor: pointer;" 
                                    class="form-control" 
                                    style="margin: 0 auto; min-width: 100px; max-width: 50%; border: none;" 
                                    id="userdisplay" 
                                    src="{{ asset($user->imgPath) }}" alt="Profile Image" onclick="triggerclick()" />
                        <input id="userImgInput" type="file" name="image" onchange="displayimage(this)" style="display: none;">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputUser1" class="form-label">Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputUser1" value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputUser2" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="exampleInputUser2" value="{{ $user->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputUser3" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="exampleInputUser3" value="{{ $user->address }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputUser4" class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" id="exampleInputUser4" value="{{ $user->phone }}">
                    </div>
                    <div class="mb-3">
                        <div class="editProfileInfos">
                            <label for="exampleInputUser5" class="form-label">Gender</label>
                            <div class="genders">
                                <div class="gMan">
                                    <input value="m" type="radio" id="man" name="gender" @if($user->gender == 'm') checked @endif>
                                    <label for="man">Man</label>
                                </div>
                                <div class="gWomen">
                                    <input value="f" type="radio" name="gender" id="women" @if($user->gender == 'f') checked @endif>
                                    <label for="women">female</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h4 >Is Admin?</h4>
                        <input type="checkbox" class="form-control" style="width: 100%; max-width: 100px; height: 50px; -webkit-appearance:checkbox" name="isAdmin" id="exampleInputUser6" value="1" @if($user->isAdmin) checked @endif>
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


  <script>
    function triggerclick(){
		document.querySelector('#userImgInput').click();
	}
	function displayimage(e){
		if (e.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				document.querySelector('#userdisplay').setAttribute('src',e.target.result);
			}
			reader.readAsDataURL(e.files[0]);
		}
	}
</script>