<div class="navBG">
    <div class="container nav">
         <div class="logo colS1 colM1 colL2 col3">
             <a href="{{ url('/') }}"><img src="{{ asset('imgs/logo-BLACK.png') }}" alt="" /></a>
         </div>
         <div class="mainMenu colM1 colL5 col4 flexCenter">
             <ul>
                 <li><a href="{{ url('/') }}">Home</a></li>
                 <li><a href="{{ url('/products') }}">Men</a></li>
                 <li><a href="{{ url('/products') }}">Women</a></li>
             </ul>
         </div>
         <div class="accountMenu colM1 colL3 col3 flexLeft">
            <ul>
                <li><a href="{{ url('/') }}">ADM PANEL</a></li>
                <li class="liAccount">
                   <div>
                       <img id="avatarImage" class="avatar" src="{{ asset('imgs/snekears.jpg') }}" alt="avatar" />
                       <div class="myAccountMenu" id="accountMenu" style="display: none">
                           <h2 class="accountMenuTitle">Account</h2>
                           <hr>
                           <ul>
                               <li><a href="{{ url('/profile') }}">Profile</a></li>
                               <li><a href="{{ url('/settings/account-management') }}">Settings</a></li>
                               <li><a href="{{ url('/') }}">Log Out</a></li>
                           </ul>
                       </div>
                   </div>
               </li>
               <li class="cartOpenbtn" onclick="openCartNav()"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg></li>
            </ul>
        </div>
        <div class="searchMenu colL2 col2">
            <form action="">
                <input id="searchInputID" class="searchInput" type="text" placeholder="Search...">
            </form>
                <div class="searchIcon">
                    <svg id="searchIconID" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                    </svg>
                </div>
        </div>
     </div> 
 </div>


 @section('phoneMenu')
    <form action="{{ route('products') }}" method="GET">
        <input id="searchInputID" class="searchInput" type="text" placeholder="Search...">
    </form>
    <li><a href="{{ url('/') }}">Home</a></li>
    <li><a href="{{ url('/products') }}">Men</a></li>
    <li><a href="{{ url('/products') }}">Women</a></li>
    <h1>Account</h1>
    <li><a href="{{ url('/profile') }}">Profile</a></li>
    <li class="cartOpenbtn" onclick="openCartNav()">Cart</li>
    <li><a href="{{ url('/settings/account-management') }}">Settings</a></li>
    <li><a href="{{ url('/') }}">Log Out</a></li>
    <h1>Admin Panel</h1>
    <li><a href="{{ url('/') }}">Admin</a></li>
 @endsection
 @include('includes.navbar_phone')
 