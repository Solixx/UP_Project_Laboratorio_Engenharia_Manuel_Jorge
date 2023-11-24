<div class="navBG">
   <div class="container nav">
        <div class="logo colS1 colM1 colL2 col3">
            <a href="{{ url('/') }}"><img src="{{ asset('imgs/logo-BLACK.png') }}" alt="" /></a>
        </div>
        <div class="mainMenu colM1 colL5 col4 flexCenter">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="men.php">Men</a></li>
                <li><a href="women.php">Women</a></li>
            </ul>
        </div>
        <div class="accountMenu colM1 colL4 col4 flexLeft">
            <ul>
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            </ul>
        </div>
        <div class="searchMenu colL1 col1">
            <a href="{{ url('/products') }}">
                <div class="searchIcon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                    </svg>
                </div>
            </a>
            
        </div>
    </div> 
</div>
<div class="navbarPhone">
    <div class="nav-container">
        <input class="navPhoneCheckbox" type="checkbox" name="" id="" />
        <div class="hamburger-lines">
          <span class="line line1"></span>
          <span class="line line2"></span>
          <span class="line line3"></span>
        </div>  
      <div class="menu-items">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="men.php">Men</a></li>
        <li><a href="women.php">Women</a></li>
      </div>
    </div>
  </div>
