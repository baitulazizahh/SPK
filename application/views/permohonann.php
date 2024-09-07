
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
                        <h1 class="h3 mb-0 text-gray-800"> Data Permohonan</h1>
                    </div>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-list-alt text-successy"></i> Data Permohonan</h6>
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
                                                          <!-- Cek apakah data penilaian sudah ada untuk id_permohonan ini -->
                                                          <?php if ($this->m_permohonan->is_penilaian_exist($data->id_permohonan)): ?>
                                                              <!-- Tombol Edit karena data sudah ada -->
                                                              <button class="btn btn-secondary btn-sm" disabled><i class="fa fa-plus fa-sm"></i></button>
                                                          <?php else: ?>
                                                              <!-- Tombol Tambah jika data belum ada -->
                                                              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $data->id_permohonan; ?>"><i class="fa fa-plus fa-sm"></i></button>
                                                          <?php endif; ?>
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
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#viewProposalModal<?= $data->id_permohonan; ?>">Lihat</button>
                            <a href="<?= base_url('uploads/proposal/'.$data->proposal); ?>" target="_blank" class="btn btn-danger btn-sm">Lihat</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6"><strong>Surat Keterangan Usaha</strong></div>
                        <div class="col-6">
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#viewSkuModal<?= $data->id_permohonan; ?>">Lihat</button>
                            <a href="<?= base_url('uploads/sku/'.$data->sku); ?>" target="_blank" class="btn btn-danger btn-sm">Lihat</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6"><strong>Foto KK</strong></div>
                        <div class="col-6">
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#viewKkModal<?= $data->id_permohonan; ?>">Lihat</button>
                            <a href="<?= base_url('uploads/kk/'.$data->kk); ?>" target="_blank" class="btn btn-danger btn-sm">Lihat</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6"><strong>Foto KTP</strong></div>
                        <div class="col-6">
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#viewKtpModal<?= $data->id_permohonan; ?>">Lihat</button>
                            <a href="<?= base_url('uploads/ktp/'.$data->ktp); ?>" target="_blank" class="btn btn-danger btn-sm">Lihat</a>
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
                <div class="modal-body">
                    <?php echo form_open_multipart('permohonan/tambah_penilaian'); ?>
                    <input type="hidden" name="id_permohonan" id="id_permohonan" value="">
                    <?php foreach ($kriteria as $k): ?>
                        <div class="form-group">
                            <label for=""><?php echo $k->nama_kriteria; ?></label>
                            <select class="form-control" name="subkriteria_<?php echo $k->id_kriteria; ?>" required>
                                <option value="">--Pilih--</option>
                                <?php if (isset($subkriteria[$k->id])): ?>
                                    <?php foreach ($subkriteria[$k->id] as $sub): ?>
                                        <option value="<?php echo $sub->id_subkriteria.',' .$sub->nilai; ?>"><?php echo $sub->nama_subkriteria; ?></option>
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
        <!-- End Modal Tambah -->

        <!-- Modal Proposal View  -->
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
    <script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url() ?>assets/js/demo/datatables-demo.js"></script>


<script>
    $(document).ready(function() {
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Tombol yang diklik
            var idPermohonan = button.data('id'); // Ambil data-id dari tombol

            // Update nilai input hidden di dalam modal
            var modal = $(this);
            modal.find('#id_permohonan').val(idPermohonan);

            // Optional: Menampilkan nilai id_permohonan di dalam modal untuk debugging
            console.log("ID Permohonan yang diterima:", idPermohonan);
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