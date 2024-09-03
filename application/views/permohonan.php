
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
                   
   
</div>
    
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="10" >
                                    <thead class="text-center bg-success text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemohon</th>
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
                                                    <td><?php echo $data->nama ?></td>
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
                                                    <a data-toggle="modal" data-target="#detailModal<?= $data->id_permohonan;?>" data-placement="bottom" title="Detail Data" class="btn btn-warning btn-sm"><i class="fa fa-info-circle fa-sm"></i></a>
                                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $data->id_permohonan; ?>"  data-nama="<?php echo $data->id_permohonan;  ?>"><i class="fa fa-plus fa-sm"></i></button>
                                                </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#viewProposalModal<?= $data->id_permohonan; ?>">Lihat</button>
                    <a href="<?= base_url('uploads/proposal/'.$data->proposal); ?>" target="_blank" class="btn btn-info btn-sm">Lihat</a>
                </div>
            </div>
            <div class="row">
                <div class="col-6"><strong>Surat Keterangan Usaha</strong></div>
                <div class="col-6">
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#viewSkuModal<?= $data->id_permohonan; ?>">Lihat</button>
                    <a href="<?= base_url('uploads/sku/'.$data->sku); ?>" target="_blank" class="btn btn-info btn-sm">Lihat</a>
                </div>
            </div>
            <div class="row">
                <div class="col-6"><strong>Foto KK</strong></div>
                <div class="col-6">
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#viewKkModal<?= $data->id_permohonan; ?>">Lihat</button>
                    <a href="<?= base_url('uploads/kk/'.$data->kk); ?>" target="_blank" class="btn btn-info btn-sm">Lihat</a>
                </div>
            </div>
            <div class="row">
                <div class="col-6"><strong>Foto KTP</strong></div>
                <div class="col-6">
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#viewKtpModal<?= $data->id_permohonan; ?>">Lihat</button>
                    <a href="<?= base_url('uploads/ktp/'.$data->ktp); ?>" target="_blank" class="btn btn-info btn-sm">Lihat</a>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- End Modal Detail  -->

 <!-- Modal Tambah-->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header bg-success">
           <h4 class="modal-title text-white text-center " id="exampleModalLabel" >Input Penilaian</h4>
           <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
        
         <!-- View: data_penilaian.php -->

         <div class="modal-body">
            <?php echo form_open_multipart('penilaian/tambah_aksi'); ?>
            <input type="hidden" name="id_alternatif" id="id_alternatif" value="">
            <input type="hidden" name="nama_alternatif" id="nama_alternatif" value="">
            <?php foreach ($kriteria as $k): ?>
                <div class="form-group">
                    <label for=""><?php echo $k->nama_kriteria; ?></label>
                    <select class="form-control" name="subkriteria_<?php echo $k->id_kriteria; ?>" required>
                        <option value="">--Pilih--</option>
                        <?php if (isset($subkriteria[$k->id])): ?>
                            <?php foreach ($subkriteria[$k->id] as $sub): ?>
                                <option value="<?php echo $sub->nilai; ?>"><?php echo $sub->nama_subkriteria; ?></option>
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
  <!-- End Modal Tambah --

<!-- Modal Proposal View -->
<?php foreach($permohonan as $data): ?>
<div class="modal fade" id="viewProposalModal<?= $data->id_permohonan; ?>" tabindex="-1" role="dialog" aria-labelledby="viewProposalModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewProposalModalLabel">Proposal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <embed src="<?= base_url('uploads/proposal/'.$data->proposal); ?>" type="application/pdf" width="100%" height="500px" />
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- End Modal Proposal -->

<!-- Modal SKU -->
<?php foreach($permohonan as $data): ?>
<div class="modal fade" id="viewSkuModal<?= $data->id_permohonan; ?>" tabindex="-1" role="dialog" aria-labelledby="viewSkuModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewSkuModalLabel">Surat Keterangan Usaha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <embed src="<?= base_url('uploads/sku/'.$data->sku); ?>" type="application/pdf" width="100%" height="500px" />
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- End Modal SKU  -->

<!-- Modal KK View -->
<?php foreach($permohonan as $data): ?>
<div class="modal fade" id="viewKkModal<?= $data->id_permohonan; ?>" tabindex="-1" role="dialog" aria-labelledby="viewKkModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewKkModalLabel">Foto KK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?= base_url('uploads/kk/'.$data->kk); ?>" class="img-fluid" />
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- End Modal KK -->

<!-- Modal KTP -->
<?php foreach($permohonan as $data): ?>
<div class="modal fade" id="viewKtpModal<?= $data->id_permohonan; ?>" tabindex="-1" role="dialog" aria-labelledby="viewKtpModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewKtpModalLabel">Foto KTP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?= base_url('uploads/ktp/'.$data->ktp); ?>" class="img-fluid" />
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
 <!-- End Modal KTP -->






    
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
 


               