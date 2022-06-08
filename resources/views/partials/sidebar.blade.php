<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('welcome') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @if(Auth::user()->level_akun == 'karyawan' || Auth::user()->level_akun == 'staff ti' || Auth::user()->level_akun == 'staff sdm' )
    @else
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ request()->routeIs('berita.*') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('berita.*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Berita</span>
        </a>
        <div id="collapseTwo" class="collapse {{ request()->routeIs('berita.*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @if(Auth::user()->level_akun == 'karyawan' || Auth::user()->level_akun == 'manager' || Auth::user()->level_akun == 'staff sdm')
                @else
                <a class="collapse-item {{ request()->routeIs('berita.posting') ? 'active' : '' }}" href="{{ route('berita.posting') }}">Posting Berita</a>
                @endif
                <a class="collapse-item {{ request()->routeIs('berita.lihat') ? 'active' : '' }}" href="{{ route('berita.lihat') }}">Lihat Berita</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Utilities Collapse Menu -->
    @if(Auth::user()->level_akun == 'karyawan'|| Auth::user()->level_akun == 'manager' || Auth::user()->level_akun == 'staff ti' )
    @else
    <li class="nav-item {{ request()->routeIs('user.*') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('user.*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-users"></i>
            <span>Kelola Akun Pengguna</span>
        </a>
        <div id="collapseUtilities" class="collapse {{ request()->routeIs('user.*') ? 'show' : '' }}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->routeIs('user.lihat') ? 'active' : '' }}" href="{{ route('user.lihat') }}">Kelola Akun</a>
                <a class="collapse-item {{ request()->routeIs('user.tanggungan') ? 'active' : '' }}" href="{{ route('user.tanggungan') }}">Kelola Tanggungan</a>
            </div>
        </div>
    </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Pages Collapse Menu -->
    @if(Auth::user()->level_akun == 'manager')
    @else
    <li class="nav-item {{ request()->routeIs('beasiswa.*') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('beasiswa.*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Pengajuan Beasiswa</span>
        </a>
        <div id="collapsePages" class="collapse {{ request()->routeIs('beasiswa.*') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->routeIs('beasiswa.tambah') ? 'active' : '' }}" href="{{ route('beasiswa.tambah') }}">Tambah Pengajuan</a>
                <a class="collapse-item {{ request()->routeIs('beasiswa.status') ? 'active' : '' }}" href="{{ route('beasiswa.status') }}">Lihat Status Pengajuan</a>
                @if(Auth::user()->level_akun == 'karyawan' || Auth::user()->level_akun == 'staff ti')
                @else
                <a class="collapse-item {{ request()->routeIs('beasiswa.kelola') ? 'active' : '' }}" href="{{ route('beasiswa.kelola') }}">Kelola Pengajuan</a>
                @endif
            </div>
        </div>
    </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Charts -->
    @if(Auth::user()->level_akun == 'karyawan' || Auth::user()->level_akun == 'manager' || Auth::user()->level_akun == 'staff sdm')
    @else
    <li class="nav-item {{ request()->routeIs('beasiswa.rangking') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('beasiswa.rangking') }}">
            <i class="fas fa-fw fa-list-ul"></i>
            <span>Perangkingan Beasiswa</span></a>
    </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Tables -->
    @if(Auth::user()->level_akun == 'karyawan')
    @else
    <li class="nav-item {{ request()->routeIs('laporan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laporan') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Laporan</span></a>
    </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>