@extends('layouts.app')

@section('title')
    UP | Edit Profile
@endsection

@section('content')
    <form action="">
        <div class="container editProfile">
            @include('includes.accountSettingsMenu')
            @include('includes.accountSettingsBtn')
            <div class="col3 colL4 colM8 colS4"></div>
            <div class="col6 colL6 colM8 colS4 editProfileForm">
                <h1>Edit Profile</h1>
                    <div class="editProfileImg">
                        <img id="profiledisplay" src="{{ asset('imgs/snekears.jpg') }}" alt="Profile Image" onclick="triggerclick()">
                        <input id="profileImgInput" type="file" name="profileImg" onchange="displayimage(this)">
                    </div>
                    <div class="editProfileInfos">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Name" value="Manuel Gonçalves">
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