 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar" style="position: fixed; top: 0; left: 0; height: 100vh; width: 250px; z-index: 1030; overflow-y: auto;">
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
                <a class="nav-link" href="<?= base_url('user/user')?>">
                    <i class="fas fa-fw fa-home text-white"></i>
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/permohonan')?>">
                    <i class="fas fa-fw fa-file-alt text-white"></i>
                    <span>Permohonan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/profil')?>">
                    <i class="fas fa-fw fa-user text-white"></i>
                    <span>Profil</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout')?>">
                    <i class="fas fa-fw fa-sign-out-alt text-white"></i>
                    <span>Log out</span></a>
            </li>
        </ul>

        <!-- Main Content Wrapper -->
<div id="content-wrapper" style="margin-left: -1570px;  width: calc(100% - 1000px);">
    <!-- Content here -->
</div>