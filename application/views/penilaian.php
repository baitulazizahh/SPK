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
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus fa-sm"></i></button>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>      Tambah data</button>    
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
        <h4 class="modal-title text-white text-center " id="exampleModalLabel" >Tambah Data Alternatif</h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?= $this->session->flashdata('message'); ?>
        <?php echo form_open ('alternatif/tambah_aksi'); ?>
            <div class="form-group">
                <label for="">ID Alternatif</label>
                <input type="text" name="id_alternatif2" class="form-control"  value="<?= set_value('id_alternatif2');?>"> 
                <?= form_error('id_alternatif2','<small class="text-danger pl-1">','</small>'); ?>
            </div>
            <div class="form-group">
                <label for="">Nama Alternatif</label>
                <input type="text" name="nama_alternatif" class="form-control" value="<?= set_value('nama_alternatif');?>"> 
                <?= form_error('nama_alternatif','<small class="text-danger pl-1">','</small>'); ?>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>  
         <?php echo form_close(); ?> 
        <!-- </form> -->
      </div>
    </div>
  </div>
</div>
  </div>
 <!-- Script open modal  -->
    <script>
        $(document).ready(function(){
            <?php if ($this->session->flashdata('modal_open')): ?>
                $('#exampleModal').modal('show');
            <?php endif; ?>
        });
    </script>
   