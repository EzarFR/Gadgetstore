<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow-sm">

    <!-- Sidebar Toggle -->
    <button id="sidebarToggleTop"
        class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0">
        <div class="input-group topbar-search">
            <input type="text"
                class="form-control bg-light border-0"
                placeholder="Cari produk, kategori..."
                aria-label="Search">

            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Right -->
    <ul class="navbar-nav ml-auto align-items-center">

        <!-- Divider -->
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- User Dropdown -->
        <li class="nav-item dropdown no-arrow">

            <a class="nav-link dropdown-toggle user-profile-link"
                href="#"
                id="userDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">

                <div class="user-info d-none d-lg-block">
                    <span class="user-name">
                        {{ Auth::user()->name }}
                    </span>
                    <span class="user-role">Administrator</span>
                </div>

                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
            </a>

            <!-- Dropdown -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">

                <h6 class="dropdown-header">
                    Akun GadgetStore
                </h6>

                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-primary"></i>
                    Profile
                </a>

                <div class="dropdown-divider"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="dropdown-item">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                        Logout
                    </button>
                </form>

            </div>
        </li>

    </ul>
</nav>

<style>
    .topbar {
        min-height: 70px;
        padding: 0 25px;
        border-radius: 10px;
        border: 1px solid #edf0f6;
    }

    .topbar-search {
        width: 340px;
        border-radius: 8px;
        overflow: hidden;
        background: #f3f6fc;
    }

    .topbar-search input {
        height: 42px;
        font-size: 13px;
        padding-left: 16px;
        color: #34415c;
    }

    .topbar-search input:focus {
        box-shadow: none;
        background: #f3f6fc;
    }

    .topbar-search button {
        width: 45px;
        background: #3478f6;
        border-color: #3478f6;
    }

    .topbar-search button:hover {
        background: #245fda;
    }

    .topbar-divider {
        width: 1px;
        height: 35px;
        background: #e7ebf3;
        margin: 0 18px;
    }

    .user-profile-link {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .user-info {
        display: flex;
        flex-direction: column;
        text-align: right;
    }

    .user-name {
        color: #293b5b;
        font-size: 13px;
        font-weight: 700;
    }

    .user-role {
        color: #8491a8;
        font-size: 11px;
    }

    .user-avatar {
        width: 39px;
        height: 39px;
        border-radius: 50%;
        background: #eaf1ff;
        color: #3478f6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        border: 2px solid #dce7ff;
    }

    .topbar .dropdown-menu {
        border: 1px solid #edf0f6;
        border-radius: 10px;
        padding: 8px;
    }

    .topbar .dropdown-item {
        border-radius: 6px;
        padding: 10px 12px;
        font-size: 13px;
    }

    .topbar .dropdown-item:hover {
        background: #f0f5ff;
    }

    @media (max-width: 576px) {
        .topbar {
            padding: 0 12px;
        }

        .topbar-search {
            width: 190px;
        }
    }
</style>
