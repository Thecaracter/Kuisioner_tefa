<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/dashboard"> <img alt="image" src="{{ asset('admin/assets/img/logo.png') }}" class="header-logo" />
                <span class="logo-name">Quisioner</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown {{ Request::path() === 'dashboard' ? 'active' : '' }}">
                <a href="/dashboard" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li
                class="dropdown {{ Request::path() === 'user' || Request::path() === 'jenis-quisioner' || Request::path() === 'quisioner' || Request::path() === 'posisi' || Request::path() === 'perusahaan' || Request::path() === 'detail-quisioner' ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="briefcase"></i><span>Master</span></a>
                <ul class="dropdown-menu">
                    <li class="dropdown {{ Request::path() === 'user' ? 'active' : '' }}"><a class="nav-link"
                            href="/user"><i data-feather="user"></i><span>User</span></a>
                    </li>
                    <li class="dropdown {{ Request::path() === 'jenis-quisioner' ? 'active' : '' }}"><a class="nav-link"
                            href="/jenis-quisioner"><i data-feather="bookmark"></i><span>Jenis Quisioner</span></a>
                    </li>
                    <li class="dropdown {{ Request::path() === 'quisioner' ? 'active' : '' }}"><a class="nav-link"
                            href="/quisioner"><i data-feather="file"></i><span>Quisioner</span></a>
                    </li>
                    <li class="dropdown {{ Request::path() === 'detail-quisioner' ? 'active' : '' }}"><a
                            class="nav-link" href="/detail-quisioner"><i data-feather="file-text"></i><span>Detail
                                Quisioner</span></a>
                    </li>
                    <li class="dropdown {{ Request::path() === 'perusahaan' ? 'active' : '' }}"><a class="nav-link"
                            href="/perusahaan"><i data-feather="home"></i><span>Perusahaan</span></a>
                    </li>
                    <li class="dropdown {{ Request::path() === 'posisi' ? 'active' : '' }}"><a class="nav-link"
                            href="/posisi"><i data-feather="gitlab"></i><span>Posisi</span></a>
                    </li>
                </ul>
            </li>
            <li class="dropdown {{ Request::path() === 'Penyimpanan' ? 'active' : '' }}">
                <a href="/penyimpanan" class="nav-link"><i data-feather="hard-drive"></i><span>Penyimpanan</span></a>
            </li>
        </ul>
    </aside>
</div>
