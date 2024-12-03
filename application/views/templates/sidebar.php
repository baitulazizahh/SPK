<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar" style="position: fixed; top: 0; left: 0; height: 110vh; width: 250px; z-index: 1030; overflow-y: auto;">
    
    <style>
        /* Mengatur jarak antar menu */
        .navbar-nav .nav-item {
            margin-bottom: -2px; /* Kurangi margin bawah antar item */

        }

        /* Mengurangi padding di dalam link */
        .navbar-nav .nav-link {
            padding: 2px 5px; /* Sesuaikan padding atas-bawah dan kiri-kanan */
            font-size: 14px; /* Ukuran teks lebih kecil untuk compact view */
        }

        /* Jika ingin mengurangi jarak antar item ikon dan teks */
        .navbar-nav .nav-link i {
            margin-right: 8px; /* Sesuaikan jarak antara ikon dan teks */
        }
    </style>
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="">
            <link href="<?php echo base_url() ?>assets/img/Baznas.png" rel="stylesheet">
        </div>
        
        <div class="sidebar-brand-text">
            <img src="<?php echo base_url() ?>/assets/img/Baznas.png" class="brand-image" width="60" height="50">
            <span class="brand-text font-weight-light">SPK Bantuan</span>
        </div>
    </a>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin')?>">
            <i class="fas fa-fw fa-home text-white"></i>
            <span>Home</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kriteria')?>">
            <i class="fas fa-fw fa-cube text-white"></i>
            <span>Data Kriteria</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('subkriteria')?>">
            <i class="fas fa-fw fa-cubes text-white"></i>
            <span>Data Subkriteria</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('permohonan')?>">
            <i class="fas fa-fw fa-file-alt text-white"></i>
            <span>Data Permohonan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('penilaian')?>">
            <i class="fas fa-fw fa-edit text-white"></i>
            <span>Penilaian</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('perhitungan')?>">
            <i class="fas fa-fw fa-calculator text-white"></i>
            <span>Perhitungan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('hasil')?>">
            <i class="fas fa-fw fa-chart-bar text-white"></i>
            <span>Laporan Hasil Akhir</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('hasil/index2')?>">
            <i class="fas fa-fw fa-chart-bar text-white"></i>
            <span>Laporan Penerima</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pengguna')?>">
            <i class="fas fa-fw fa-users text-white"></i>
            <span>Data User</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('periode')?>">
            <i class="fas fa-fw fa-calendar-alt text-white"></i>
            <span>Periode Pengajuan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout')?>" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt text-white"></i>
            <span>Log out</span>
        </a>
    </li>
</ul>


<!-- Main Content Wrapper -->
<div id="content-wrapper" style="margin-left: -1550px;  width: calc(100% - 1000px);">
  
    <!-- Modal Konfirmasi Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">Apakah anda yakin ingin logout?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                        <a href="<?= base_url('auth/logout'); ?>" class="btn btn-primary">Ya</a>
                    </div>
                </div>
            </div>
        </div>

</div>
