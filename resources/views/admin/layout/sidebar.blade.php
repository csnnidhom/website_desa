<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
        <a class="nav-link" href="/admin/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- <li class="nav-item {{ (request()->is('admin/kategori')) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="/admin/kategori">
            <i class="fas fa-list-ul"></i>
            <span>Organisasi</span>
        </a>
    </li> -->

    <li class="nav-item {{ (request()->is('admin/berita')) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="/admin/berita">
            <i class="far fa-newspaper"></i>
            <span>Berita</span>
        </a>
    </li>

    <li class="nav-item {{ (request()->is('admin/anggota')) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="/admin/anggota">
            <i class="fas fa-user"></i>
            <span>Anggota</span>
        </a>
    </li>

    <li class="nav-item {{ (request()->is('admin/pesan')) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="/admin/pesan">
            <i class="fas fa-user"></i>
            <span>Pesan</span>
        </a>
    </li>

    <!-- <li class="nav-item">
        <a class="nav-link " href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-images"></i>
            <span>Galeri</span>
        </a>
        <div id="collapseTwo" class="collapse {{ (request()->is('admin/image')) || (request()->is('admin/video')) ? 'show' : ' ' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded ">
                <h6 class="collapse-header">Galeri:</h6>
                <a class="collapse-item {{ (request()->is('admin/image')) ? 'active' : '' }}" href="/admin/image">Image</a>
                <a class="collapse-item {{ (request()->is('admin/video')) ? 'active' : '' }}" href="/admin/video">Video</a>
            </div>
        </div>
    </li> -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('logout') }}" onclick="return confirm('Yakin Logout?')">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>