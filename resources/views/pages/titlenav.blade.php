@php
    $pesan = '';
    switch (Route::currentRouteName()) {
        case 'dashboard':
            $pesan = 'DashBoard';
            break;
        case 'pendaftaran':
            $pesan = 'Pendaftaran';
            break;
        case 'transaksi':
            $pesan = 'Transaksi';
            break;
        case 'customer':
            $pesan = 'Customer';
            break;
        case 'laporan':
            $pesan = 'Laporan';
            break;
        case 'user':
            $pesan = 'User';
            break;
        case 'edituser':
            $pesan = 'Edit User';
            break;
        case 'tipekendaraan':
            $pesan = 'Tipe Mobil';
            break;
        case 'editkendaraan':
            $pesan = 'Edit Mobil';
            break;
        case 'tipeservice':
            $pesan = 'Tipe Service';
            break;
        case 'editservice':
            $pesan = 'Edit Service';
            break;
        case 'kritiksaran':
            $pesan = 'Kritik & Saran';
            break;
        case 'setting':
            $pesan = 'Settings';
            break;
        default:
            # code...
            break;
    }
@endphp

<!-- Search -->
<div class="navbar-nav align-items-center">
    <div class="nav-item d-flex align-items-center">
        <span class="navbar-text fw-bold fs-4">• {{ $pesan }}</span>
    </div>
</div>
<!-- /Search -->
