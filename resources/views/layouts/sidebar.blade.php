<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-mobile-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Gadget Store</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard: Admin dan User -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Halaman
    </div>

    <!-- Category -->
    <li class="nav-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('categories.*') ? '' : 'collapsed' }}"
           href="#"
           data-toggle="collapse"
           data-target="#collapseTwo"
           aria-expanded="{{ request()->routeIs('categories.*') ? 'true' : 'false' }}"
           aria-controls="collapseTwo">

            <i class="fas fa-fw fa-cog"></i>
            <span>Category</span>
        </a>

        <div id="collapseTwo"
             class="collapse {{ request()->routeIs('categories.*') ? 'show' : '' }}"
             data-parent="#accordionSidebar">

            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Halaman Kategori</h6>

                <a class="collapse-item" href="{{ route('categories.index') }}">
                    Data Kategori
                </a>

                @if(auth()->user()->role === 'admin')
                    <a class="collapse-item" href="{{ route('categories.create') }}">
                        Tambah Kategori
                    </a>
                @endif
            </div>
        </div>
    </li>

    <!-- Produk -->
    <li class="nav-item {{ request()->routeIs('products.*') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('products.*') ? '' : 'collapsed' }}"
           href="#"
           data-toggle="collapse"
           data-target="#collapseUtilities"
           aria-expanded="{{ request()->routeIs('products.*') ? 'true' : 'false' }}"
           aria-controls="collapseUtilities">

            <i class="fas fa-tags"></i>
            <span>Produk</span>
        </a>

        <div id="collapseUtilities"
             class="collapse {{ request()->routeIs('products.*') ? 'show' : '' }}"
             data-parent="#accordionSidebar">

            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Halaman Produk</h6>

                <a class="collapse-item" href="{{ route('products.index') }}">
                    Data Produk
                </a>

                @if(auth()->user()->role === 'admin')
                    <a class="collapse-item" href="{{ route('products.create') }}">
                        Tambah Produk
                    </a>
                @endif
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
