
<div class="container-fluid"> 

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Data Permohonan</h1>
                        
                        <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>      Tambah data</button> -->
                    </div>
                    
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
                                            <th>Status</th>
                                            <th>Detail Permohonan</th>
                                        </tr>
                                       
                                    </thead>
                                    <tbody>
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
                                                <!-- <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> -->
                                                <a data-toggle="modal" data-target="" data-placement="bottom" title="Update Data" href="<?php echo base_url()?>admin/update_data/" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
                                                <a data-toggle="modal" data-target="" data-placement="bottom" title="Hapus Data" href="<?php echo base_url()?>admin/hapus_data/" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-sm"></i></a>
                                                <!-- <td onclick="javascript: return confirm('Yakin menghapus data?')"><?php echo anchor ('admin/hapus/'.$data->id,'<div class="btn btn-danger btn-sm "><i class="fa fa-trash "></i></div>')  ?></td> -->
                                            </td>

                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
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
        <?php echo form_open ('alternatif/tambah_aksi'); ?>
            <div class="form-group">
                <label for="">Nama Usaha</label>
                <input type="text" name="id_alternatif2" class="form-control"  value="<?= set_value('id_alternatif2');?>"> 
                <?= form_error('id_alternatif2','<small class="text-danger pl-1">','</small>'); ?>
            </div> 
            <div class="form-group">
                <label for="">Pendapatan</label>
                <select class=" form-control" name="jenis_kriteria" value="<?= $data->jenis_kriteria;?>">
                    <option>Kurang dari Rp 1.000.000</option>
                    <option>Rp 1.000.000 - Kurang dari Rp 1.500.000 </option>
                    <option>Rp 1.500.000 - Kurang dari Rp 2.000.000</option>
                    <option>Lebih dari Rp 2.000.000</option>  
                </select>
            </div>
            <div class="form-group">
                <label for="">Jumlah Tanggungan</label>
                <select class=" form-control" name="jenis_kriteria" value="<?= $data->jenis_kriteria;?>">
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
                <small class="text-danger font-italic">*Dokumen dalam format pdf</small>
            </div>
            <div class="form-group">
                <label>Surat Keterangan Usaha </label>
                <input type="file" name="sku" class="form-control">
                <?= form_error('sku', '<small class="text-danger pl-1">', '</small>'); ?>
                <small class="text-danger font-italic">*Dokumen dalam format pdf</small>
            </div>
            <div class="form-group">
                <label>Foto Kartu Keluarga</label>
                <input type="file" name="kk" class="form-control">
                <?= form_error('kk', '<small class="text-danger pl-1">', '</small>'); ?>
                <small class="text-danger font-italic">*Dokumen dalam format pdf, png, jpeg</small>
            </div>
            <div class="form-group">
                <label>Foto KTP</label>
                <input type="file" name="ktp" class="form-control">
                <?= form_error('ktp', '<small class="text-danger pl-1">', '</small>'); ?>
                <small class="text-danger font-italic">*Dokumen dalam format pdf, png, jpeg</small>
            </div>
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
<html>


</html>

    
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
 


               