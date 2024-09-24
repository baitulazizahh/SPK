
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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
    .modal-body .row {
        margin-bottom: 15px; /* Memberi jarak antara setiap baris */
    }
    .modal-body strong {
        font-weight: 600; /* Mempertebal label */
    }
    .btn-info.btn-sm {
        padding: 3px 10px; /* Ukuran tombol kecil */
        font-size: 12px;   /* Ukuran teks kecil */
    }
    #content {
        margin-top: 110px; /* Jarak antara topbar dan konten */
    }
</style>

</head>

<body id="page-top">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
            <div class="container-fluid"> 
    <!-- DataTales Example -->
    <div class="card shadow mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">
                <i class="fas fa-fw fa-chart-bar text-success"></i> Data Hasil Akhir
            </h6>
        </div>

        <div class="card-body">
            <!-- Dropdown Pilihan Tahun Periode -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="tahun_periode" class="form-label">Pilih Tahun Periode</label>
                    <form method="post" action="<?= base_url('hasil/index'); ?>" class="d-flex align-items-end">
                        <select class="form-control me-3" id="tahun_periode" name="tahun_periode" required>
                            <option value="">-- Pilih Tahun --</option>
                            <?php foreach ($years as $year): ?>
                                <option value="<?= $year->year ?>" <?= set_select('tahun_periode', $year->year, $selected_year == $year->year ? true : false); ?>><?= $year->year ?></option>
                            <?php endforeach; ?>
                        </select> 
                        <div class="text-white"> jar</div>
                        <button type="submit" class="btn btn-primary btn-sm ">Tampilkan</button>
                    </form>
                </div>
            </div>
            <div>
            <!-- Tampilkan data hanya jika tahun dipilih -->
            <?php if (isset($selected_year)): ?>
                <h6 id="judul-laporan" class="font-weight-bold text-center mb-3 mt-4">DATA LAPORAN PERMOHONAN BANTUAN TAHUN <?= $selected_year ?></h6>
                <div class="d-flex justify-content-end mb-3">
                <a href="<?= site_url('hasil/print?year=' . $selected_year); ?>" class="btn btn-secondary btn-sm" target="_blank">Cetak Laporan</a>
                </div>
                </div>

                <!-- Tabel Data Hasil -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center bg-success text-white">
                            <tr>
                                <th>No</th>
                                <th>Nama Pemohon</th>
                                <th>Nilai</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($hasil)): ?>
                                <?php $no=1; ?>
                                <?php foreach ($hasil as $h): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++?></td>
                                        <td class="text-center"><?= $h->nama; ?></td>
                                        <td class="text-center"><?= number_format($h->hasil, 5); ?></td>
                                        <td class="text-center">
                                            <?php if (strtolower($h->status) == 'diproses'): ?>
                                                <span class="badge badge-pill badge-warning">Diproses</span>
                                            <?php elseif (strtolower($h->status) == 'diterima'): ?>
                                                <span class="badge badge-pill badge-primary">Diterima</span>
                                            <?php elseif (strtolower($h->status) == 'ditolak'): ?>
                                                <span class="badge badge-pill badge-danger">Ditolak</span>
                                            <?php endif; ?>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data untuk tahun ini</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
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