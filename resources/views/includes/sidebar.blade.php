<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        @if (auth()->user()->role == 'admin')
            <li class="sidebar-item">
                <a href="{{ route('home') }}" class='sidebar-link'>
                    <i class="bi bi-layout-sidebar-inset"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{ route('bengkels.index') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Data Bengkel</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{ route('admin.pickup_requests.index') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Pengajuan Customer</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{ route('kontak.index') }}" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Notifikasi Pesan</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{ route('admin.akun.index') }}" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Akun</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{ route('settings.edit') }}" class='sidebar-link'>
                    <i class="bi bi-gear"></i>
                    <span>Pengaturan</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{ route('auth.passwords.edit') }}" class='sidebar-link'>
                    <i class="bi bi-key-fill"></i>
                    <span>Ganti Password</span>
                </a>
            </li>

            <li class="sidebar-item  ">
                <a href="#" class='sidebar-link'
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @else
            <li class="sidebar-item">
                <a href="{{ route('pickup-requests.index') }}" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Penjemputan</span>
                </a>
            </li>

            <li class="sidebar-item  ">
                <a href="#" class='sidebar-link'
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @endif
    </ul>
</div>
