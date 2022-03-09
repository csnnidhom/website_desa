    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="/admin/dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/berita">
                    <i class="bi bi-journal-text"></i><span>Berita</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/kategori">
                    <i class="bi bi-tags"></i><span>Category</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-camera-fill"></i></i><span>Galeri</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="icons-bootstrap.html">
                            <i class="bi bi-circle"></i><span>Foto</span>
                        </a>
                    </li>
                    <li>
                        <a href="icons-remix.html">
                            <i class="bi bi-circle"></i><span>Video</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('logout') }}" onclick="return confirm('Yakin Logout?')"><i class="bi bi-box-arrow-left"></i><span>Logout</span>
                </a>
            </li>


        </ul>

    </aside>
    <!-- End Sidebar-->