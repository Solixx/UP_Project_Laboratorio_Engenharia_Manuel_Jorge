<aside class="left-sidebar">
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="{{ Route('index') }}" class="text-nowrap logo-img">
        <img src="{{ asset('imgs/logo-BLACK.png') }}" width="180" alt="" />
      </a>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8"></i>
      </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
      <ul id="sidebarnav">
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ Route('admin.home') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Lists</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ Route('admin.listUsers') }}" aria-expanded="false">
            <span>
              <i class="ti ti-users"></i>
            </span>
            <span class="hide-menu">Users</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ Route('admin.listProducts') }}" aria-expanded="false">
            <span>
              <i class="ti ti-hanger"></i>
            </span>
            <span class="hide-menu">Products</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ Route('admin.listCategories') }}" aria-expanded="false">
            <span>
              <i class="ti ti-category"></i>
            </span>
            <span class="hide-menu">Categories</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ Route('admin.listBrands') }}" aria-expanded="false">
            <span>
              <i class="ti ti-affiliate"></i>
            </span>
            <span class="hide-menu">Brands</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ Route('admin.listOrders') }}" aria-expanded="false">
            <span>
              <i class="ti ti-brand-shopee"></i>
            </span>
            <span class="hide-menu">Orders</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Add</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ Route('admin.addProduct') }}" aria-expanded="false">
            <span>
              <i class="ti ti-hanger"></i>
            </span>
            <span class="hide-menu">Product</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ Route('admin.addCategorie') }}" aria-expanded="false">
            <span>
              <i class="ti ti-category"></i>
            </span>
            <span class="hide-menu">Categorie</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ Route('admin.addBrand') }}" aria-expanded="false">
            <span>
              <i class="ti ti-affiliate"></i>
            </span>
            <span class="hide-menu">Brand</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
            <span>
              <i class="ti ti-color-filter"></i>
            </span>
            <span class="hide-menu">Color</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
            <span>
              <i class="ti ti-ruler-3"></i>
            </span>
            <span class="hide-menu">Size</span>
          </a>
        </li>
        {{-- <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">EXTRA</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
            <span>
              <i class="ti ti-mood-happy"></i>
            </span>
            <span class="hide-menu">Icons</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
            <span>
              <i class="ti ti-aperture"></i>
            </span>
            <span class="hide-menu">Sample Page</span>
          </a>
        </li> --}}
      </ul>
      <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
        <div class="d-flex">
          <div class="unlimited-access-title me-3">
            <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
            <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
          </div>
          <div class="unlimited-access-img">
            <img src="{{ asset('imgs/backgrounds/rocket.png') }}" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
</aside>