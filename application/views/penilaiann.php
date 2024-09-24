
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
</style>

</head>

<body id="page-top">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                
                <div class="container-fluid"> 

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Data Penilaian</h1>
                    </div>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-list-alt text-successy"></i> Data Penilaian</h6>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="10" >
                                    <thead class="text-center bg-success text-white">
                                        <tr>
                                            <th class="text-center align-middle">No</th>
                                            <th class="text-center align-middle">Nama Pemohon</th>
                                            <th class="text-center align-middle">Jenis Usaha</th>
                                            <th class="text-center align-middle">Riwayat Bantuan</th>
                                            <th class="text-center align-middle">Tanggungan</th>
                                            <th class="text-center align-middle">Pendapatan</th>
                                            <th class="text-center align-middle">Persyaratan</th>
                                            <th class="text-center align-middle">SKU</th>
                                            <th class="text-center align-middle">Aksi</th>
                                        </tr>
                                       
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php if (isset($penilaian) && !empty($penilaian)): ?>
                                    <?php foreach ($penilaian as $p): ?>  
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td class><?php echo $p->nama ?></td>
                                            <td class="text-center"><?php echo $p->c1; ?></td>
                                            <td class="text-center"><?php echo $p->c2; ?></td>
                                            <td class="text-center"><?php echo $p->c3; ?></td>
                                            <td class="text-center"><?php echo $p->c4; ?></td>
                                            <td class="text-center"><?php echo $p->c5; ?></td>
                                            <td class="text-center"><?php echo $p->c6; ?></td>
                                            <td class="text-center">
                                                <!-- <a data-toggle="modal" data-id_permohonan="<?php echo $p->id_permohonan; ?>"  data-target="#updateModal" data-placement="bottom" title="Update Data" href="<?php echo base_url()?>penilaian/update_penilaian/" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a> -->
                                                <a data-toggle="modal" data-target="#delete<?= $p->id_permohonan;?>" data-placement="bottom" title="Hapus Data" href="<?php echo base_url()?>penilaian/hapus_data/" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-sm"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="8" class="text-center">Data tidak ditemukan</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


            <!-- Modal Hapus-->
            <?php foreach ($penilaian as $p): ?>  
                <div class="modal fade" id="delete<?= $p->id_permohonan;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin menghapus data?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Tidak</button>
                                <a class="btn btn-primary" href="<?= base_url('penilaian/hapus/').$p->id_permohonan;?>">Ya</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- End Modal Hapus-->
            <!-- Modal Edit -->
            <?php foreach($penilaian as $data): ?>
                    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-success">
                                    <h4 class="modal-title text-white text-center " id="exampleModalLabel" >Edit Penilaian</h4>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo form_open_multipart('penilaian/update_penilaian'); ?>
                                    <input type="hidden" name="id_permohonan" name="id_permohonan">
                                    <?php foreach ($kriteria as $k): ?>
                                        <div class="form-group">
                                            <label for=""><?php echo $k->nama_kriteria; ?></label>
                                            <select class="form-control" name="subkriteria_<?php echo $k->id_kriteria; ?>" required>
                                                <option value="">--Pilih--</option>
                                                <?php foreach ($subkriteria as $sub): ?>
                                                    <!-- Filter subkriteria berdasarkan id_kriteria -->
                                                    <?php if ($sub->id_kriteria == $k->id_kriteria): ?>
                                                        <option value="<?php echo $sub->id_subkriteria; ?>"
                                                            <?php echo ($sub->id_subkriteria == $penilaian->{'subkriteria_'.$k->id_kriteria}) ? 'selected' : ''; ?>>
                                                            <?php echo $sub->nama_subkriteria; ?> (Nilai: <?php echo $sub->nilai; ?>)
                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- End Modal Edit  -->
   
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

    <script>
        $(document).ready(function(){
            $('#updateModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Tombol yang diklik
                console.log(button); // Debug: Cek apakah tombol berhasil ditangkap
                var id_permohonan = button.data('id_permohonan'); // Ambil data-id_permohonan

                // Debug: Log ID permohonan ke console
                console.log("ID Permohonan yang diambil: " + id_permohonan);

                // Set ID permohonan ke input hidden jika ID ditemukan
                if (id_permohonan) {
                    var modal = $(this);
                    modal.find('#id_permohonan').val(id_permohonan);
                } else {
                    console.log("ID Permohonan tidak ditemukan!");
                }
            });
        });
    </script>
        


                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        <!-- End of Content Wrapper -->
    </div>
   

    

</body>

</html>