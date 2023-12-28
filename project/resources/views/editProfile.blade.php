@extends('layouts.appAccount')

@section('title')
    UP | Edit Profile
@endsection

@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ route('settings.editProfilePost',$authUser->id) }}">
        @csrf
        <div class="container editProfile">
            @include('includes.accountSettingsMenu')
            @include('includes.accountSettingsBtn')
            <div class="col3 colL4 colM8 colS4"></div>
            <div class="col6 colL6 colM8 colS4 editProfileForm">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

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

                <h1>Edit Profile</h1>
                    <div class="editProfileImg">
                        <img id="profiledisplay" src="{{asset($authUser->imgPath)}}" alt="Profile Image" onclick="triggerclick()">
                        <input id="profileImgInput" type="file" name="image" onchange="displayimage(this)">
                    </div>
                    <div class="editProfileInfos">
                        {{-- <label for="name">Name</label> --}}
                        <input type="text" name="name" id="name" placeholder="Name" value="{{ $authUser->name }}">
                    </div>
            </div>
        </div>
    </form>
    
@endsection

<script>
    function triggerclick(){
		document.querySelector('#profileImgInput').click();
	}
	function displayimage(e){
		if (e.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				document.querySelector('#profiledisplay').setAttribute('src',e.target.result);
			}
			reader.readAsDataURL(e.files[0]);
		}
	}
</script>