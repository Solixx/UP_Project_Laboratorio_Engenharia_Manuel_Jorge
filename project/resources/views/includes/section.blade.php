<section>
    <div class="container title">
      <div class="col12 colS4 colM8 colL12">
        <h1>@yield('contentTitle', '')</h1>
      </div>
    </div>
    <div class="container content">
      <div class="col12 colS4 colM8 colL12">
        @yield('contentInfo', '')
      </div>
    </div>
    <div class="arrows arrow-container">
      <div class="arrowUp">
        @yield('arrowUp', '')
      </div>
      <div class="arrowDown">
        @yield('arrowDown', '')
      </div>
    </div>
</section>