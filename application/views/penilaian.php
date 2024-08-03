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
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar and other elements -->

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
                            <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-edit text-success"></i> Data Penilaian</h6>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center bg-success text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Alternatif</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($penilaian as $data): ?>
                                            <tr>
                                                <td class="text-center"><?php echo $no++; ?></td>
                                                <td><?php echo $data->nama_alternatif; ?></td>
                                                <td class="text-center">
                                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-id="<?php ; ?>"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
   
   <!-- Modal Tambah-->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header bg-success">
           <h4 class="modal-title text-white text-center " id="exampleModalLabel" >Tambah Data Peniaian</h4>
           <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
        
         <!-- View: data_penilaian.php -->

         <div class="modal-body">
            <?php echo form_open_multipart('penilaian/tambah_aksi'); ?>
            <input type="hidden" name="id_alternatif" value="">
            <input type="hidden" name="nama_alternatif" value="">
            <?php foreach ($kriteria as $k): ?>
                <div class="form-group">
                    <label for=""><?php echo $k->nama_kriteria; ?></label>
                    <select class="form-control" name="kriteria_<?php echo $k->id_kriteria; ?>" required>
                        <option value="">--Pilih--</option>
                        <?php if (isset($subkriteria[$k->id])): ?>
                            <?php foreach ($subkriteria[$k->id] as $sub): ?>
                                <option value="<?php echo $sub->id_subkriteria; ?>"><?php echo $sub->nama_subkriteria; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
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
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes
            var nama = button.data('nama'); // Extract nama from data-* attributes

            var modal = $(this);
            modal.find('input[name="id_alternatif"]').val(id); // Set the id_alternatif in form
            modal.find('input[name="nama_alternatif"]').val(nama); // Set the nama_alternatif in form
        });
    </script>

