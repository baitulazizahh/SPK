<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column" style="margin-left: 250px;">

    <!-- Main Content -->
    <div id="content" style="overflow-y: auto; height: calc(100vh - 56px); margin-top:10px;">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="position: fixed; top: 0; left: -100px; right: 0; z-index: 1029;">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-700 small"><?= $user['nama']; ?></span>
                        <img class="img-profile rounded-circle" src="<?php echo base_url() ?>assets/img/user2.png">
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Your other content here -->
    </div>
</div>
