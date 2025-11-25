
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('backend.content.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-clinic-medical"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ePuskesmas</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/backend.content.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Manajemen Sistem</div>

    <li class="nav-item"><a class="nav-link" href="{{ url('/pengguna') }}"><i class="fas fa-users-cog"></i> <span>Kelola Pengguna</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('/level') }}"><i class="fas fa-user-shield"></i> <span>Level Pengguna</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('/pegawai') }}"><i class="fas fa-id-badge"></i> <span>Data Pegawai</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('/master') }}"><i class="fas fa-database"></i> <span>Data Master</span></a></li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Data Medis</div>

    <li class="nav-item"><a class="nav-link" href="{{ url('/dokter') }}"><i class="fas fa-user-md"></i> <span>Data Dokter</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('/jadwal') }}"><i class="fas fa-calendar-check"></i> <span>Jadwal Praktek Dokter</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('/pasien') }}"><i class="fas fa-procedures"></i> <span>Data Pasien</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('/pendaftaran') }}"><i class="fas fa-clipboard-list"></i> <span>Data Pendaftaran</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('/diagnosa') }}"><i class="fas fa-stethoscope"></i> <span>Data Diagnosa</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('/tindakan') }}"><i class="fas fa-notes-medical"></i> <span>Data Tindakan</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('/obat') }}"><i class="fas fa-pills"></i> <span>Data Obat</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('/supplier') }}"><i class="fas fa-truck"></i> <span>Data Supplier</span></a></li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
        <h3>selamat datang </h3>
    </div>

</ul>

<!-- Link Drive -->
 <!-- https://drive.google.com/drive/folders/1D39jdtI-LVFt-RlPa-X_EInmFrD0WSZh?usp=sharing -->