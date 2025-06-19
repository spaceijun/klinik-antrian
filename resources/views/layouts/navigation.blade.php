<div id="scrollbar">
    <div class="container-fluid">
        <div id="two-column-menu"></div>
        @php
            $current_url = Request::path();
            $role = Auth::user()->role; // Mengambil role user yang login
        @endphp
        <ul class="navbar-nav" id="navbar-nav">
            @if ($role == 'Superadmin')
                {{-- Menu Khusus Super Admin --}}
                <li class="nav-item">
                    <a href="{{ url('superadmin/dashboard') }}"
                        class="nav-link {{ $current_url == 'superadmin/dashboard' ? 'active' : '' }}">
                        <i data-feather="home"></i>Dashboard
                    </a>
                </li>

                <li class="menu-title"><span data-key="t-menu">Pengaturan Menu</span></li>
                <li class="nav-item">
                    <a href="{{ url('superadmin/dokters') }}"
                        class="nav-link {{ $current_url == 'superadmin/dokters' ? 'active' : '' }}">
                        <i data-feather="github"></i>Dokter
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('superadmin/pendaftarans') }}"
                        class="nav-link {{ $current_url == 'superadmin/pendaftarans' ? 'active' : '' }}">
                        <i data-feather="users"></i>Pendaftaran
                    </a>
                </li>

                <li class="menu-title"><span data-key="t-menu">Pengaturan Menu</span></li>

                <li class="nav-item">
                    <a href="{{ url('superadmin/settings') }}"
                        class="nav-link {{ $current_url == 'superadmin/settings' ? 'active' : '' }}">
                        <i data-feather="settings"></i>Settings Website
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('superadmin/users') }}"
                        class="nav-link {{ $current_url == 'superadmin/users' ? 'active' : '' }}">
                        <i data-feather="users"></i>Manajemen Pengguna
                    </a>
                </li>
            @elseif($role == 'Pasien')
                {{-- Menu Khusus User --}}
                <li class="nav-item">
                    <a href="{{ url('pasien/dashboard') }}"
                        class="nav-link {{ $current_url == 'pasien/dashboard' ? 'active' : '' }}">
                        <i data-feather="home"></i>Beranda
                    </a>
                </li>
                <li class="menu-title"><span data-key="t-menu">Menu Utama</span></li>
                <li class="nav-item">
                    <a href="{{ url('pasien/pendaftaran') }}"
                        class="nav-link {{ $current_url == 'pasien/pendaftaran' ? 'active' : '' }}">
                        <i data-feather="users"></i>Pendaftaran
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ url('superuser/activities') }}"
                        class="nav-link {{ $current_url == 'superuser/activities' ? 'active' : '' }}">
                        <i data-feather="activity"></i>Aktivitas
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('superuser/notifications') }}"
                        class="nav-link {{ $current_url == 'superuser/notifications' ? 'active' : '' }}">
                        <i data-feather="bell"></i>Notifikasi
                    </a>
                </li> --}}
            @endif

            {{-- Menu yang tersedia untuk semua role --}}
            {{-- <li class="menu-title"><span data-key="t-menu">Umum</span></li>
          <li class="nav-item">
              <a href="{{ url('help') }}"
                  class="nav-link {{ $current_url == 'help' ? 'active' : '' }}">
                  <i data-feather="help-circle"></i>Bantuan
              </a>
          </li> --}}
        </ul>
    </div>
    <!-- Sidebar -->
</div>
