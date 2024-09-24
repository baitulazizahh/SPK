
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
        margin-top: 100px; /* Jarak antara topbar dan konten */  
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
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Pemohon</th>
                                            <th class="text-center">Jenis Usaha</th>
                                            <!-- <th>Pendapatan</th>
                                            <th>Tanggungan</th> -->
                                            <th class="text-center">Riwayat Bantuan</th>
                                            <th class="text-center">Waktu Pengajuan</th>
                                            <th class="text-center">Aksi</th>
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
                                                    <td><?php echo $data->nama_usaha ?></td>
                                                    <!-- <td><?php echo $data->pendapatan ?></td>
                                                    <td><?php echo $data->tanggungan ?></td> -->
                                                    <td><?php echo $data->riwayat_bantuan ?></td>
                                                    <td class="text-center"> <?php echo date('d F Y', strtotime($data->date_created)); ?></td>
                                                    <td class="text-center">
                                                        <!-- Tombol Detail untuk melihat modal -->
                                                        <a data-toggle="modal" data-target="#detailModal<?= $data->id_permohonan;?>" data-placement="bottom" title="Detail Data" class="btn btn-warning btn-sm">
                                                            <i class="fa fa-info-circle fa-sm"></i>
                                                        </a>

                                                        <!-- Cek apakah data penilaian sudah ada untuk id_permohonan ini -->
                                                        <?php if ($this->m_permohonan->is_penilaian_exist($data->id_permohonan)): ?>
                                                            <!-- Tombol Edit karena data sudah ada, jadi button tambah dinonaktifkan -->
                                                            <button class="btn btn-secondary btn-sm" disabled><i class="fa fa-plus fa-sm"></i></button>
                                                        <?php else: ?>
                                                            <!-- Tombol Tambah jika data belum ada, tapi hanya aktif jika semua checkbox di modal sudah dicentang -->
                                                            <!-- <button id="tambahButton_<?= $data->id_permohonan ?>" class="btn btn-primary btn-sm" disabled><i class="fa fa-plus fa-sm"></i></button> -->
                                                            <button class="btn btn-primary btn-sm" id="btnTambah_<?= $data->id_permohonan ?>" data-toggle="modal" data-target="#exampleModal" data-id="<?php $data->id_permohonan; ?>" disabled><i class="fa fa-plus fa-sm"></i></button>
                                                            <!-- <button class="btn btn-primary btn-sm" id="btnTambah_<?= $data->id_permohonan ?>" disabled>Tambah</button> -->

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
                        <div class="col-6"><strong>Riwayat Bantuan</strong></div>
                        <div class="col-6"><?= $data->riwayat_bantuan; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-6"><strong>Proposal</strong></div>
                        <div class="col-6">
                            <?php if (file_exists('./uploads/proposal/' . $data->proposal) && !empty($data->proposal)) : ?>
                                <a href=" <?php echo base_url() . 'uploads/proposal/' . $data->proposal; ?>" class="btn btn-info btn-sm">Lihat</a>
                                <input type="checkbox" id="verify_proposal_<?= $data->id_permohonan ?>" name="verify_proposal_<?= $data->id_permohonan ?>"> Verifikasi
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
                                <input type="checkbox" id="verify_sku_<?= $data->id_permohonan ?>" name="verify_sku_<?= $data->id_permohonan ?>"> Verifikasi
                            <?php else : ?>
                                <span class="badge badge-danger">Foto SKU tidak ditemukan</span>
                            <?php endif; ?>                
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6"><strong>Foto KK</strong></div>
                        <div class="col-6">
                            <?php if (file_exists('./uploads/kk/' . $data->kk) && !empty($data->kk)) : ?>
                                <a href=" <?php echo base_url() . 'uploads/kk/' . $data->kk; ?>" class="btn btn-info btn-sm">Lihat</a>
                                <input type="checkbox" id="verify_kk_<?= $data->id_permohonan ?>" name="verify_kk_<?= $data->id_permohonan ?>"> Verifikasi
                            <?php else : ?>
                                <span class="badge badge-danger"> Foto KK tidak ditemukan</span>
                            <?php endif; ?>                
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6"><strong>Foto KTP</strong></div>
                        <div class="col-6">
                            <?php if (file_exists('./uploads/ktp/' . $data->ktp) && !empty($data->ktp)) : ?>
                                <a href=" <?php echo base_url() . 'uploads/ktp/' . $data->ktp; ?>" class="btn btn-info btn-sm">Lihat</a>
                                <input type="checkbox" id="verify_ktp_<?= $data->id_permohonan ?>" name="verify_ktp_<?= $data->id_permohonan ?>"> Verifikasi
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
          <!-- Modal Tambah 2-->
       
        <?php foreach($permohonan as $data): ?>
        <div class="modal fade" id="exampleModal<?= $data->id_permohonan;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white text-center" id="exampleModalLabel">Input Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Jenis Usaha</label>
                        <input type="text" name="nama_usaha" class="form-control" value="<?= $data->nama_usaha;?>"> 
                    </div>       
                    <div class="form-group">
                        <label for="">Pendapatan</label>
                        <input type="text" name="pendapatan" class="form-control" value="<?= $data->pendapatan;?>"> 
                    </div>       
                    <div class="form-group">
                        <label for="">Tanggungan</label>
                        <input type="text" name="tanggungan" class="form-control" value="<?= $data->tanggungan;?>"> 
                    </div>      
                    <div class="form-group">
                        <label for="">Riwayat Bantuan</label>
                        <input type="text" name="riwayat_bantuan" class="form-control" value="<?= $data->riwayat_bantuan;?>"> 
                    </div>
                    <div class="form-group">
                        <label for="">Kelengkapan Berkas</label>
                        <input type="text" name="riwayat_bantuan" class="form-control" value="<?= $data->riwayat_bantuan;?>"> 
                    </div>
                    <div class="form-group">
                        <label for="">SKU</label>
                        <input type="text" name="riwayat_bantuan" class="form-control" value="<?= $data->sku;?>"> 
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php endforeach; ?>

        <!-- End Modal Tambah 2 -->


   
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
    
    <script>
        $(document).ready(function() {
    <?php foreach($permohonan as $data): ?>
        (function() {
            let checkboxes = [
                '#verify_proposal_<?= $data->id_permohonan ?>',
                '#verify_sku_<?= $data->id_permohonan ?>',
                '#verify_kk_<?= $data->id_permohonan ?>',
                '#verify_ktp_<?= $data->id_permohonan ?>'
            ];

            function checkAllChecked() {
                let allChecked = true;
                checkboxes.forEach(function(selector) {
                    console.log(selector + ' is checked: ' + $(selector).is(':checked')); // Debugging
                    if (!$(selector).is(':checked')) {
                        allChecked = false;
                    }
                });

                if (allChecked) {
                    console.log('All checked, enabling button');
                    $('#btnTambah_<?= $data->id_permohonan ?>').prop('disabled', false);
                } else {
                    console.log('Not all checked, disabling button');
                    $('#btnTambah_<?= $data->id_permohonan ?>').prop('disabled', true);
                }
            }

            checkboxes.forEach(function(selector) {
                $(selector).on('change', function() {
                    checkAllChecked();
                });
            });

            $('#detailModal<?= $data->id_permohonan ?>').on('shown.bs.modal', function () {
                checkAllChecked();
            });
        })();
    <?php endforeach; ?>
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