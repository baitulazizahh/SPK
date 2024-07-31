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
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-id_kriteria="<?=$k->id; ?>">
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
                                    <a data-toggle="modal" data-target="#update<?= $sk->id_subkriteria;?>" data-placement="bottom" title="Update Data" href="<?php echo base_url()?>admin/update_data/" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <a data-toggle="modal" data-target="#delete<?= $sk->id_subkriteria;?>" data-placement="bottom" title="Hapus Data" href="<?php echo base_url()?>admin/hapus_data/" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <!-- Modal Hapus-->
                                <?php foreach ($subkriteria as $sk): ?>  
                                        <div class="modal fade" id="delete<?= $sk->id_subkriteria;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                                        <a class="btn btn-primary" href="<?= base_url('subkriteria/hapus/').$sk->id_subkriteria;?>">Ya</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                <!-- End Modal Hapus-->
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



  <!-- Modal Edit-->
   <?php foreach ($kriteria as $data): ?> 
    <div class="modal fade" id="update<?= $data->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-success">
        <!-- <h4 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-list-alt text-successy"></i> Data Kriteria</h4> -->
            <h4 class="modal-title text-white text-center " id="exampleModalLabel" > <i class="fas fa-fw fa-edit text-successy"></i> Edit Data Kriteria</h4>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php echo form_open_multipart('kriteria/update'); ?>
            <!-- <form action="<?php echo base_url().'admin/update'; ?>"method="post"> -->
                <div class="form-group">
                    <label for="">ID Kriteria</label>
                    <input type="hidden" name="id" value="<?= $data->id;?>"> 
                    <input type="text" name="id_kriteria" class="form-control" value="<?= $data->id_kriteria;?>"> 
                </div>
                <div class="form-group">
                    <label for="">Nama Kriteria</label>
                    <input type="text" name="nama_kriteria" class="form-control" value="<?= $data->nama_kriteria;?>"> 
                </div>
                <div class="form-group">
                    <label for="">Jenis Kriteria</label>
                    <select class=" form-control" name="jenis_kriteria" value="<?= $data->jenis_kriteria;?>">
                        <option>Benefit</option>
                        <option>Cost</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Bobot</label>
                    <input type="text" name="bobot" class="form-control" value="<?= $data->bobot;?>"> 
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

            // Mengisi input hidden id_kriteria ketika modal dibuka
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Tombol yang menekan modal
                var id_kriteria = button.data('id_kriteria'); // Ambil nilai id_kriteria dari data-id_kriteria
                var modal = $(this);
                modal.find('input[name="id_kriteria"]').val(id_kriteria); // Isi input hidden dengan id_kriteria yang sesuai
            });

        });
    </script>
