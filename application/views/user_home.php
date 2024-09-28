<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPK Bantuan</title>

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        #content {
            margin-top: 100px; /* Jarak antara topbar dan konten */
            margin-left: -10px;
            
        }
    </style>

</head>

<body id="page-top">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
        <div class="container-fluid"> 
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-3">
                        <h1 class="h3 mb-0 text-gray-800"> Home</h1>
                    </div>
                    <!-- Timeline -->
                    <div class="">
                    <div class="card shadow  shadow h-100 py-2" style="padding: 10px;  background-color: #D1E9F6;" >
                            <div class="card-body  " style="padding: 2px;">
                            <div class="">
                                <?php if (!empty($periode)): ?>
                                    <p class="m-0 text-dark" style="margin: 0; padding: 0px;">
                                        Batas waktu pengajuan permohonan 
                                        <?= date('d F Y', strtotime($periode->tgl_mulai)); ?> - 
                                        <?= date('d F Y', strtotime($periode->tgl_akhir)); ?>
                                    </p>
                                <?php else: ?>
                                    <p class="m-0 text-dark" style="margin: 0; padding: 0px;">
                                        Tidak ada periode aktif saat ini.
                                    </p>
                                <?php endif; ?>
                            </div>
                            </div>
                        </div>
                    </div>
                        
                   <div class="row ">
                        <div class="col-xl-8 col-lg-7 mt-3">
                            <div class="card shadow mb-4 ">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-success">Petunjuk Pengajuan Permohonan</h6>
                                </div>
                                <div class="card-body">
                                    <ol>
                                        <li>Siapkan berkas persyaratan yang dibutuhkan:
                                            <ul>
                                                <li>Proposal permohonan bantuan (format pdf)</li>
                                                <li>Surat Keterangan Usaha yang diketahui oleh Wali Nagari (format pdf)</li>
                                                <li>Foto Kartu Keluarga (format pdf, png, jpg, atau jpeg)</li>
                                                <li>Foto KTP (format pdf, png, jpg, atau jpeg)</li>
                                            </ul>
                                        </li>
                                        <li>Ajukan permohonan pada menu "Permohonan" dan silakan isi form sesuai dengan data yang diminta</li>
                                        <li>Unggah berkas pendukung seperti Proposal, Surat Keterangan Usaha (SKU), Foto Kartu Keluarga (KK), dan Foto KTP.</li>
                                        <li>Pastikan semua data yang diisi dalam formulir adalah benar dan sesuai dengan dokumen resmi.</li>
                                        <li>Jika semua data sudah benar, klik tombol "Simpan" untuk mengirim permohonan.</li>
                                        <li>Anda dapat memantau status permohonan secara berkala.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-5 mt-3">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-success">Template Berkas Permohonan</h6>
                                </div>
                                <div class="card-body">
                                <p>Template proposal yang digunakan untuk pengajuan permohonan</p>
                                    <a href="<?= base_url('assets/templates/template_proposal.docx'); ?>" class="btn btn-info btn-sm">
                                        Unduh Template 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
            </div>
            <!-- End content -->
        </div>
        <!-- End of Content Wrapper -->

        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?php echo base_url() ?>assets/js/demo/datatables-demo.js"></script>
    
    </body>

</html>
