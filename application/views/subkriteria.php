<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Subkriteria</title>
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Subkriteria</h1>
                    </div>

                    <!-- Tabel Perhitungan -->
                    <?php foreach ($kriteria as $k): ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                <h6 class="m-0 font-weight-bold text-success d-flex align-items-center">
                                    <i class="fas fa-fw fa-calculator text-success"></i>
                                    <span class="ml-2"><?= $k->nama_kriteria; ?></span>
                                </h6>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-id_kriteria="<?= $k->id; ?>">
                                    <i class="fa fa-plus "></i> Tambah data
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="10">
                                        <thead class="text-center bg-success text-white">
                                            <tr>
                                                <th>Nama Subkriteria</th>
                                                <th>Nilai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if (isset($subkriteria_by_kriteria[$k->id])) {
                                                    $subkriteria = $subkriteria_by_kriteria[$k->id];
                                                    foreach ($subkriteria as $index => $sk):
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $sk->nama_subkriteria; ?></td>
                                                    <td class="text-center"><?= $sk->nilai; ?></td>
                                                    <td class="text-center">
                                                        <a data-toggle="modal" data-target="#update<?= $sk->id_subkriteria; ?>" data-placement="bottom" title="Update Data" href="<?php echo base_url() ?>admin/update_data/" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                        <a data-toggle="modal" data-target="#delete<?= $sk->id_subkriteria; ?>" data-placement="bottom" title="Hapus Data" href="<?php echo base_url() ?>admin/hapus_data/" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>

                                                <!-- Modal Hapus -->
                                                <div class="modal fade" id="delete<?= $sk->id_subkriteria; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <a class="btn btn-primary" href="<?= base_url('subkriteria/hapus/').$sk->id_subkriteria; ?>">Ya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Hapus -->

                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="update<?= $sk->id_subkriteria; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-success">
                                                                <h5 class="modal-title text-white" id="editModalLabel">Edit Subkriteria</h5>
                                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= base_url('subkriteria/update'); ?>" method="post">
                                                                    <input type="hidden" name="id_subkriteria" value="<?= $sk->id_subkriteria; ?>">
                                                                    <div class="form-group">
                                                                        <label for="nama_subkriteria">Nama Subkriteria</label>
                                                                        <input type="text" class="form-control" name="nama_subkriteria" value="<?= $sk->nama_subkriteria; ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nilai">Nilai</label>
                                                                        <input type="text" class="form-control" name="nilai" value="<?= $sk->nilai; ?>" required>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Edit -->

                                            <?php
                                                    endforeach;
                                                } else {
                                            ?>
                                                <tr>
                                                    <td colspan="4" class="text-center">Tidak ada data subkriteria</td>
                                                </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- /.container-fluid -->
                 

            </div>
            <!-- End of Main Content -->

            

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
     <!-- Modal Tambah-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title text-white text-center " id="exampleModalLabel" >Tambah Data Sub Kriteria</h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <?php echo form_open_multipart('subkriteria/tambah_aksi'); ?> -->
        <form action="<?php echo base_url().'subkriteria/tambah_aksi'; ?>"method="post">
        <input type="hidden" name="id_kriteria"> <!-- Hidden input untuk id_kriteria -->    
        <div class="form-group">
                <label for="">Nama Sub Kriteria</label>
                <input type="text" name="nama_subkriteria" class="form-control"  value="<?= set_value('nama_subkriteria');?>"> 
                <?= form_error('nama_subkriteria','<small class="text-danger pl-1">','</small>'); ?>
            </div>
            <div class="form-group">
                <label for="">Nilai</label>
                <input type="text" name="nilai" class="form-control"  value="<?= set_value('nilai');?>"> 
                <?= form_error('nilai','<small class="text-danger pl-1">','</small>'); ?>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>  
        <!-- <?php echo form_close(); ?> -->
        </form>
      </div>
    </div>
  </div>
</div>
  </div>
  <!-- End Modal Tambah -->

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

    <!-- Script open modal -->
    <script>
        $(document).ready(function(){
            <?php if ($this->session->flashdata('modal_open')): ?>
                $('#exampleModal').modal('show');
            <?php endif; ?>

            // Mengisi input hidden id_kriteria ketika modal dibuka
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Tombol yang menekan modal
                var id_kriteria = button.data('id_kriteria'); // Ambil nilai id_kriteria dari data-id_kriteria
                var modal = $(this);
                modal.find('input[name="id_kriteria"]').val(id_kriteria); // Isi input hidden dengan id_kriteria yang sesuai
            });

        });
    </script>

</body>

</html>
