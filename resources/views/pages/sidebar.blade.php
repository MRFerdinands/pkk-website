<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/images/faviconCar.png') }}" alt="">
            </span>
            <span class="app-brand-text menu-text fw-bolder ms-2 fs-5">New Jaya Mandiri</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Home</span></li>
        <!-- Cards -->
        <li class="menu-item {{ Route::currentRouteName() == 'pendaftaran' ? 'active' : '' }}">
            <a href="{{ route('pendaftaran') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-message-alt-add'></i>
                <div data-i18n="Basic">Pendaftaran</div>
            </a>
        </li>
        {{-- <li class="menu-item {{ Route::currentRouteName() == 'pendaftaranonline' ? 'active' : '' }}">
            <a href="{{ route('pendaftaran') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-message-alt-add'></i>
                <div data-i18n="Basic">Pendaftaran Online</div>
            </a>
        </li> --}}
        <li class="menu-item {{ Route::currentRouteName() == 'transaksi' ? 'active' : '' }}">
            <a href="{{ route('transaksi') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cart"></i>
                <div data-i18n="Basic">Transaksi</div>
            </a>
        </li>
        <li class="menu-item {{ Route::currentRouteName() == 'customer' ? 'active' : '' }}">
            <a href="{{ route('customer') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-circle"></i>
                <div data-i18n="Basic">Customer</div>
            </a>
        </li>
        {{-- <li class="menu-item {{ Route::currentRouteName() == 'laporan' ? 'active' : '' }}">
            <a href="{{ route('laporan') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-report"></i>
                <div data-i18n="Basic">Laporan</div>
            </a>
        </li> --}}
        @if (Auth::user()->role == 'Admin')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Extra</span>
            </li>
            <li
                class="menu-item {{ Route::currentRouteName() == 'user' || Route::currentRouteName() == 'edituser' ? 'active' : '' }}">
                <a href="{{ route('user') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-user-badge"></i>
                    <div data-i18n="Basic">User</div>
                </a>
            </li>
            {{-- <li
                class="menu-item {{ Route::currentRouteName() == 'tipekendaraan' || Route::currentRouteName() == 'editkendaraan' ? 'active' : '' }}">
                <a href="{{ route('tipekendaraan') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-car"></i>
                    <div data-i18n="Basic">Tipe Mobil</div>
                </a>
            </li> --}}
            <li
                class="menu-item {{ Route::currentRouteName() == 'tipeservice' || Route::currentRouteName() == 'editservice' ? 'active' : '' }}">
                <a href="{{ route('tipeservice') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-list-ul"></i>
                    <div data-i18n="Basic">Tipe Service</div>
                </a>
            </li>
            <li class="menu-item {{ Route::currentRouteName() == 'kritiksaran' ? 'active' : '' }}">
                <a href="{{ route('kritiksaran') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-message-dots"></i>
                    <div data-i18n="Basic">Kritik & Saran</div>
                </a>
            </li>
        @endif
        <!-- Components -->
    </ul>
</aside>
