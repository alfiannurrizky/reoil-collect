<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item">
            <a href="{{ route('bengkels.index') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Data Bengkel</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="{{ route('kontak.index') }}" class='sidebar-link'>
                <i class="bi bi-collection-fill"></i>
                <span>Notifikasi Pesan</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="{{ route('settings.edit') }}" class='sidebar-link'>
                <i class="bi bi-gear"></i>
                <span>Pengaturan</span>
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

    </ul>
</div>
