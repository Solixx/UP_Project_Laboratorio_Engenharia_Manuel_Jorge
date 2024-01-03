<div class="navBG">
    <div class="container nav">
         <div class="logo colS1 colM1 colL2 col3">
             <a href="{{ Route('index') }}"><img src="{{ asset('imgs/logo-BLACK.png') }}" alt="" /></a>
         </div>
         <div class="mainMenu colM1 colL5 col4 flexCenter">
             <ul>
                 <li><a href="{{ Route('index') }}">Home</a></li>
                 <li><a href="{{ Route('products') }}">Men</a></li>
                 <li><a href="{{ Route('products') }}">Women</a></li>
             </ul>
         </div>
         <div class="accountMenu colM1 colL3 col3 flexLeft">
             <ul>
                 <li><a href="{{ Route('login') }}">Login</a></li>
                 <li><a href="{{ Route('register') }}">Register</a></li>
             </ul>
         </div>
         <div class="searchMenu colL2 col2">
             <form action="{{ route('search.products') }}" method="GET">
                 <input id="searchInputID" class="searchInput" name="searchName" type="text" placeholder="Search...">
             </form>
                 <div class="searchIcon">
                     <svg id="searchIconID" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                         <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 
                         376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 
                         0 0-288 144 144 0 1 0 0 288z" />
                     </svg>
                 </div>
         </div>
     </div> 
 </div>
 
 
 @section('phoneMenu')
    <form action="{{ route('search.products') }}" method="GET">
        <input id="searchInputID" class="searchInput" name="searchName" type="text" placeholder="Search...">
    </form>
    <ul>
        <li><a href="{{ Route('index') }}">Home</a></li>
        <li><a href="{{ Route('products') }}">Men</a></li>
        <li><a href="{{ Route('products') }}">Women</a></li>
    </ul>  
 @endsection
 @include('includes.navbar_phone')