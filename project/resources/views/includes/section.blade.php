<section id="sectionBrand">
    <div class="container title">
      <div class="col12 colS4 colM8">
        <h1>@yield('contentTitle', '')</h1>
      </div>
    </div>
    <div class="container content">
      <div class="col12 colS4 colM8">
        @yield('contentInfo', '')
      </div>
    </div>
    <div class="arrows arrowsBrands">
      <div class="homeArrow">
        @yield('arrowUp', '')
      </div>
      <div class="newarrivalsArrow">
        @yield('arrowDown', '')
      </div>
    </div>
</section>