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
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-home text-white"></i>
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-list-alt text-white"></i>
                    <span>Kriteria</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout')?>">
                    <i class="fas fa-fw fa-sign-out-alt text-white"></i>
                    <span>Log out</span></a>
            </li>
        </ul>