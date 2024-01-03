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
            <span class="hide-menu">Category</span>
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
          <a class="sidebar-link" href="{{ Route('admin.addColor') }}" aria-expanded="false">
            <span>
              <i class="ti ti-color-filter"></i>
            </span>
            <span class="hide-menu">Color</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ Route('admin.addSize') }}" aria-expanded="false">
            <span>
              <i class="ti ti-ruler-3"></i>
            </span>
            <span class="hide-menu">Size</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Create</span>
        </li>
        <li class="sidebar-item" style="margin-bottom: 10rem;">
          <a class="sidebar-link" href="{{ Route('admin.createNewslleter') }}" aria-expanded="false">
            <span>
              <i class="ti ti-mail"></i>
            </span>
            <span class="hide-menu">Newslleter</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
</aside>