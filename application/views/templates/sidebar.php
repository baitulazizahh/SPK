 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="">
                <link href="<?php echo base_url() ?>assets/img/Baznas.png" rel="stylesheet">
                 
                </div>
                
                <div class="sidebar-brand-text "> <img src="<?php echo base_url() ?>/assets/img/Baznas.png"  class="brand-image  " width = "60"  height = "50" >
                    <span class="brand-text font-weight-light">SPK Bantuan</span></div>
            </a>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin')?>">
                    <i class="fas fa-fw fa-home text-white"></i>
                    <span>Home</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?= base_url('kriteria')?>">
                    <i class="fas fa-fw fa-cube text-white"></i>
                    <span>Data Kriteria</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?= base_url('subkriteria')?>">
                    <i class="fas fa-fw fa-cubes text-white"></i>
                    <span>Data Subkriteria</span></a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="<?= base_url('alternatif')?>">
                    <i class="fas fa-fw fa-database text-white"></i>
                    <span>Data Alternatif</span></a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('permohonan')?>">
                    <i class="fas fa-fw fa-file-alt text-white"></i>
                    <span>Data Permohonan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('penilaian')?>">
                    <i class="fas fa-fw fa-edit text-white"></i>
                    <span>Penilaian</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('perhitungan')?>">
                    <i class="fas fa-fw fa-calculator text-white"></i>
                    <span>Perhitungan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('hasil')?>">
                    <i class="fas fa-fw fa-chart-bar text-white"></i>
                    <span>Hasil Akhir</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('hasil')?>">
                  
                    <i class="fas fa-fw fa-calendar-minus text-white"></i>
                    <span>Laporan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('pengguna')?>">
                    <i class="fas fa-fw fa-users text-white"></i>
                    <span>Data User</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout')?>">
                    <i class="fas fa-fw fa-sign-out-alt text-white"></i>
                    <span>Log out</span></a>
            </li>
        </ul>