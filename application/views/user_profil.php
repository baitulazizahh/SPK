<div class="container-fluid"> 

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Biodata Pengguna</h1>
                        
                        <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>      Tambah data</button> -->
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-fw fa-user text-success"></i> Biodata Pengguna
                    </h6>
   
                </div>
                        <div class="card-body">
                            <div class="table-responsive">
                           
                            <form>
                                <div class="mb-3">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" value="<?= $user->nama; ?>"> 
                                </div>
                                <div class="mb-3">  
                                    <label>Email</label>
                                    <input type="email" name="emil" class="form-control" value="<?= $user->email;?>"> 
                                </div>
                                <div class="mb-3">
                                    <label>No.HP</label>
                                    <input type="text" name="no_hp" class="form-control" value="<?= $user->no_hp;?>"> 
                                </div>
                                <div class="mb-3">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control" value="<?= $user->alamat;?>"> 
                                </div> 
                            </form>
                            <div class="d-flex justify-content-end">
                                <a data-toggle="modal" data-target="#update<?= $user->id_user;?>" data-placement="bottom" title="Update Data" href="<?php echo base_url()?>user/profil/update_profil/" class="btn btn-warning btn-sm">Ubah</a>
                            </div>
                           
                            </div>
                        </div>
                    </div>

<!-- Modal Edit-->
<div class="modal fade" id="update<?= $user->id_user;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title text-white text-center " id="exampleModalLabel" >Edit Biodata Pengguna</h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?= $this->session->flashdata('message'); ?>
        <?php echo form_open ('user/profil/update'); ?>
            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input type="hidden" name="id_user" value="<?= $user->id_user;?>"> 
                <input type="hidden" name="id_role" value="<?= $user->id_role;?>"> 
                <input type="text" name="nama" class="form-control" value="<?= $user->nama;?>"> 
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control"  value="<?= $user->email;?>"> 
            </div>
            <div class="form-group">
                <label for="">No.HP</label>
                <input type="text" name="no_hp" class="form-control"  value="<?= $user->no_hp;?>"> 
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <input type="text" name="alamat" class="form-control"  value="<?= $user->alamat;?>"> 
            </div>
            <div class="form-group">
                <label for="">Paaword</label>
                <input type="password" name="password" class="form-control"> 
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