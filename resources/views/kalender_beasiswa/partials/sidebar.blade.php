<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
<a href="../../index3.html" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            @auth
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            @endauth
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
            <li
                class="nav-item ">
                <a href="#=" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Data Master
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-list">
                    <li class="nav-item">
                        <a href=" {{ Route('kalender_beasiswa.index') }} "
                            class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kalender Beasiswa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=" {{ Route('user.index') }} "
                            class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=" {{ Route('level_user.index') }} "
                            class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Level User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=" {{ Route('tingkat_studi.index') }} "
                            class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tingkat Studi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=" {{ Route('negara.index') }} "
                            class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Negara</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=" {{ Route('benua.index') }} "
                            class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Benua</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
