            <div class="container-fluid"> 

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Data Penilaian</h1>
                    </div>
                    
                    <!-- Tabel Perhitungan -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-calculator text-successy"></i> Data Penilaian</h6>
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
                                    <tbody  >
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
                                            <a data-toggle="modal" data-target="#exampleModal" data-placement="bottom" title="Detail Data" class="btn btn-danger btn-sm"><i class="fa fa-info-circle fa-sm"></i></a>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-id=""><i class="fa fa-plus fa-sm"></i></button>
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
<!-- /.container-fluid -->
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
   <!-- End Modal Tambah  -->

 <!-- Script open modal  -->
    <script>
        $(document).ready(function(){
            <?php if ($this->session->flashdata('modal_open')): ?>
                $('#exampleModal').modal('show');
            <?php endif; ?>
        });
    </script>
   