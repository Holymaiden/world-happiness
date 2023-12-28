<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Brisik</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">BS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Master Data</li>
            <li class="{{ Request::is('dashboard/master-data/negara') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.negara') }}"><i class="fas fa-user">
                    </i> <span>Negara</span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/master-data/history') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.history') }}"><i class="fas fa-users">
                    </i> <span>History</span>
                </a>
            </li>
            <li class="menu-header">Laporan</li>
            <li class="{{ Request::is('dashboard/laporan/regresi') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.laporan.regresi') }}"><i class="fas fa-chart-line">
                    </i> <span>Regresi Linier Berganda</span>
                </a>
            </li>
        </ul>

        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="{{ route('logout') }}" class="btn btn-danger btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Keluar
            </a>
        </div>
    </aside>
</div>
