
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
    /* Mengatur strip hanya untuk baris genap */
    table.table-striped tbody tr:nth-child(even) {
        background-color: #f2f2f2; /* Warna strip untuk baris genap */
    }

    /* Mengatur baris ganjil agar berwarna putih */
    table.table-striped tbody tr:nth-child(odd) {
        background-color: white; /* Warna putih untuk baris ganjil */
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
                        <h1 class="h3 mb-0 text-gray-800"> Data User</h1>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>      Tambah data</button>
                    </div>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-users text-successy"></i> Data User</h6>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped " id="dataTable" width="100%" cellspacing="10" >
                                    <thead class="text-center bg-success text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama </th>
                                            <th>Email</th>
                                            <th>Role </th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>  
                                    <?php foreach ($user as $data): ?>  
                                        <tr>
                                            <td class="text-center"><?php echo $no++?></td>
                                            <td><?php echo $data->nama ?></td>
                                            <td class="text-center"><?php echo $data->email ?></td>
                                            <td class="text-center"><?php echo $data->role ?></td>
                                            <td class="text-center">
                                                <!-- <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> -->
                                                <a data-toggle="modal" data-target="#update<?= $data->id_user;?>" data-placement="bottom" title="Update Data" href="<?php echo base_url()?>pengguna/update_data/" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
                                                <a data-toggle="modal" data-target="#delete<?= $data->id_user;?>" data-placement="bottom" title="Hapus Data" href="<?php echo base_url()?>pengguna/hapus_data/" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-sm"></i></a>
                                                <!-- <td onclick="javascript: return confirm('Yakin menghapus data?')"><?php echo anchor ('admin/hapus/'.$data->id,'<div class="btn btn-danger btn-sm "><i class="fa fa-trash "></i></div>')  ?></td> -->
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
        </div>
        <!-- End of Content Wrapper -->
    </div>
    
    <!-- Modal Tambah-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title text-white text-center " id="exampleModalLabel" >Tambah Data User</h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'pengguna/tambah_aksi'; ?>"method="post">
            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control"  value="<?= set_value('nama');?>"> 
                <?= form_error('nama','<small class="text-danger pl-1">','</small>'); ?>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control"  value="<?= set_value('email');?>"> 
                <?= form_error('email','<small class="text-danger pl-1">','</small>'); ?>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="text" name="password" class="form-control"  value="<?= set_value('password');?>"> 
                <?= form_error('password','<small class="text-danger pl-1">','</small>'); ?>
            </div>
            <div class="form-group">
                <label>Role</label>
                    <select name="id_role" class="form-control">
                    <?php foreach ($datarole as $data): ?>
                        <option value=" <?php echo $data->id_role?>">
                            <?php echo $data->role?></option>
                        <?php endforeach ?>
                    </select>
                
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

   <!-- Modal Hapus-->
   <?php foreach ($user as $data): ?>  
        <div class="modal fade" id="delete<?= $data->id_user;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <a class="btn btn-primary" href="<?= base_url('pengguna/hapus/').$data->id_user;?>">Ya</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
  <!-- End Modal Hapus-->

 <!-- Modal Edit-->
 <?php foreach ($user as $data): ?> 
    <div class="modal fade" id="update<?= $data->id_user;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-success">
            <h4 class="modal-title text-white text-center " id="exampleModalLabel" > <i class="fas fa-fw fa-edit text-successy"></i> Edit Data User</h4>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php echo form_open_multipart('pengguna/update'); ?>
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="hidden" name="id_user" value="<?= $data->id_user;?>"> 
                    <input type="text" name="nama" class="form-control" value="<?= $data->nama;?>"> 
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" value="<?= $data->email;?>"> 
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="id_role" class="form-control">
                        <?php foreach ($datarole as $role): ?>
                            <option value=" <?php echo $role->id_role?>"
                            <?php echo ($role->id_role == $data->id_role) ? 'selected' : ''; ?>>
                                <?php echo $role->role?></option>
                            <?php endforeach ?>
                    </select>
                </div>
                <!-- <div class="form-group">
                    <label>Password</label>
                        <input type="text" name="email" class="form-control" value="<?= $data->email;?>"> 
                </div> -->

                </div>
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
   <!-- End Modal Edit-->

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

    <!-- Script open modal  -->
    <script>
        $(document).ready(function(){
            <?php if ($this->session->flashdata('modal_open')): ?>
                $('#exampleModal').modal('show');
            <?php endif; ?>
        });
    </script>

</body>

</html>