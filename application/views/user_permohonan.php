
<div class="container-fluid"> 

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Data Permohonan</h1>
                        <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>      Tambah data</button> -->
                    </div>
                    <!-- // Alert -->
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-fw fa-file-alt text-success"></i> Data Permohonan
                    </h6>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                         Ajukan Permohonan
                    </button>
   
</div>
    
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="10" >
                                    <thead class="text-center bg-success text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Usaha</th>
                                            <th>Status Permohonan</th>
                                            <th>Aksi</th>
                                        </tr>
                                       
                                    </thead>
                                    <tbody>
                                        <?php if (empty($permohonan)): ?>  <!-- Mengecek apakah $permohonan kosong -->
                                            <tr>
                                                <td colspan="4" class="text-center">Tidak ada data permohonan</td> 
                                            </tr>
                                        <?php else: ?>
                                            <?php $no = 1; ?>
                                            <?php foreach ($permohonan as $data): ?>  
                                                <tr>
                                                    <td class="text-center"><?php echo $no++?></td>
                                                    <td><?php echo $data->nama_usaha ?></td>
                                                    <td class="text-center">
                                                        <?php if (strtolower($data->status) == 'diproses'): ?>
                                                            <span class="badge badge-pill badge-warning">Diproses</span>
                                                        <?php elseif (strtolower($data->status) == 'diterima'): ?>
                                                            <span class="badge badge-pill badge-primary">Diterima</span>
                                                        <?php elseif (strtolower($data->status) == 'ditolak'): ?>
                                                            <span class="badge badge-pill badge-danger">Ditolak</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-center">
                                                    <a data-toggle="modal" data-target="#detailModal<?= $data->id_permohonan;?>" data-placement="bottom" title="Detail Data" href="" class="btn btn-primary btn-sm"><i class="fa fa-info-circle fa-sm"></i></a>
                                                    <a data-toggle="modal" data-target="#delete<?= $data->id_permohonan;?>" data-placement="bottom" title="Hapus Data" href="<?php echo base_url()?>user/permohonan/hapus_data/" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-sm"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

         <!-- Modal Tambah-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title text-white text-center " id="exampleModalLabel" >Ajukan Permohonan</h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= $this->session->flashdata('message'); ?>
        <?php if ($this->session->flashdata('upload_errors')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('upload_errors'); ?>
            </div>
        <?php endif; ?>
        <?php echo form_open('user/permohonan/upload', ['enctype' => 'multipart/form-data',  'method' => 'post']); ?>
            <div class="form-group">
                <label for="">Nama Usaha</label>
                <input type="text" name="nama_usaha" class="form-control"  value="<?= set_value('nama_usaha');?>"> 
                <?= form_error('nama_usaha','<small class="text-danger pl-1">','</small>'); ?>
            </div> 
            <div class="form-group">
                <label for="">Pendapatan</label>
                <select class=" form-control" name="pendapatan" value="<?= set_value('pendapatan')?>">
                    <option>Kurang dari Rp 1.000.000</option>
                    <option>Rp 1.000.000 - Kurang dari Rp 1.500.000 </option>
                    <option>Rp 1.500.000 - Kurang dari Rp 2.000.000</option>
                    <option>Lebih dari Rp 2.000.000</option>  
                </select>
            </div>
            <div class="form-group">
                <label for="">Jumlah Tanggungan</label>
                <select class=" form-control" name="tanggungan" value="<?= set_value('tanggungan')?>">
                    <option>Lebih 4 orang</option>
                    <option>4 orang</option>
                    <option>3 orang</option>
                    <option>1-2 orang</option>  
                </select>
            </div>
            <div class="form-group">
                <label>Proposal</label>
                <input type="file" name="proposal" class="form-control">
                <?= form_error('proposal', '<small class="text-danger pl-1">', '</small>'); ?>
                <small class="font-italic">*Dokumen dalam format pdf</small>
            </div>
            <div class="form-group">
                <label>Surat Keterangan Usaha </label>
                <input type="file" name="sku" class="form-control">
                <?= form_error('sku', '<small class="text-danger pl-1">', '</small>'); ?>
                <small class="font-italic">*Dokumen dalam format pdf</small>
            </div>
            <div class="form-group">
                <label>Foto Kartu Keluarga</label>
                <input type="file" name="kk" class="form-control">
                <?= form_error('kk', '<small class="text-danger pl-1">', '</small>'); ?>
                <small class="font-italic">*Dokumen dalam format pdf, png, jpeg</small>
            </div>
            <div class="form-group">
                <label>Foto KTP</label>
                <input type="file" name="ktp" class="form-control">
                <?= form_error('ktp', '<small class="text-danger pl-1">', '</small>'); ?>
                <small class="font-italic">*Dokumen dalam format pdf, png, jpeg</small>
            </div>
             <input type="hidden" name="status" value="Diproses">
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>  
         <?php echo form_close(); ?>  
        </form>
      </div>
    </div>
  </div>
</div>     
<!-- End Modal Tambah  -->

  <!-- Modal Hapus-->
  <?php foreach ($permohonan as $data): ?>  
        <div class="modal fade" id="delete<?= $data->id_permohonan;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <a class="btn btn-primary" href="<?= base_url('user/permohonan/hapus/').$data->id_permohonan;?>">Ya</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
  <!-- End Modal Hapus-->

<!-- Modal Detail -->
<?php foreach($permohonan as $data): ?>
<div class="modal fade" id="detailModal<?= $data->id_permohonan;?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Detail Data Permohonan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-6"><strong>Nama Usaha</strong></div>
                <div class="col-6"><?= $data->nama_usaha; ?></div>
            </div>
            <div class="row">
                <div class="col-6"><strong>Pendapatan</strong></div>
                <div class="col-6"><?= $data->pendapatan; ?></div>
            </div>
            <div class="row">
                <div class="col-6"><strong>Tanggungan</strong></div>
                <div class="col-6"><?= $data->tanggungan; ?></div>
            </div>
            <div class="row">
                <div class="col-6"><strong>Proposal</strong></div>
                <div class="col-6">
                    <?php if (file_exists('./uploads/proposal/' . $data->proposal) && !empty($data->proposal)) : ?>
                          <a href=" <?php echo base_url() . 'uploads/proposal/' . $data->proposal; ?>" class="btn btn-info btn-sm">Lihat</a>
                    <?php else : ?>
                        <span class="badge badge-danger">Proposal tidak ditemukan</span>
                    <?php endif; ?>                
                </div>
            </div>
            <div class="row">
                <div class="col-6"><strong>Surat Keterangan Usaha</strong></div>
                <div class="col-6">
                    <?php if (file_exists('./uploads/sku/' . $data->sku) && !empty($data->sku)) : ?>
                          <a href=" <?php echo base_url() . 'uploads/sku/' . $data->sku; ?>" class="btn btn-info btn-sm">Lihat</a>
                    <?php else : ?>
                        <span class="badge badge-danger">SKU tidak ditemukan</span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6"><strong>Foto KK</strong></div>
                <div class="col-6">
                    <?php if (file_exists('./uploads/kk/' . $data->kk) && !empty($data->kk)) : ?>
                          <a href=" <?php echo base_url() . 'uploads/kk/' . $data->kk ?>" class="btn btn-info btn-sm">Lihat</a>
                    <?php else : ?>
                        <span class="badge badge-danger">Foto KK tidak ditemukan</span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6"><strong>Foto KTP</strong></div>
                <div class="col-6">
                    <?php if (file_exists('./uploads/ktp/' . $data->ktp) && !empty($data->ktp)) : ?>
                          <a href=" <?php echo base_url() . 'uploads/ktp/' . $data->ktp; ?>" class="btn btn-info btn-sm">Lihat</a>
                    <?php else : ?>
                        <span class="badge badge-danger">Foto KTP tidak ditemukan</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- End Modal Detail  -->
    
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script> -->
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
    <script>
        $(document).ready(function(){
    <?php if ($this->session->flashdata('upload_errors') || validation_errors() || !empty($this->session->flashdata('message'))) : ?>
        $('#exampleModal').modal('show');
    <?php endif; ?>
});
    </script>

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
 


               