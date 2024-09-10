<div class="container-fluid"> 

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-chart-bar  text-successy"></i> Data Hasil Akhir</h6>
                        </div>
                        
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="tahun_periode" class="form-label">Pilih Tahun Periode</label>
                                    <select class="form-control" id="tahun_periode" name="tahun_periode">
                                        <option value="">-- Pilih Tahun --</option>
                                        <?php foreach ($years as $year): ?>
                                            <option value="<?= $year->year ?>"><?= $year->year ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>   
                            </div>
                        <div>
                        <h6 class="text-center font-weight-bold">DATA LAPORAN TAHUN 2024</h6>
                        <button type="button" class="btn btn-secondary btn-sm">Cetak Laporan</button>
                        <br><br>
                        </div>
                        
                            <div class="table-responsive"> 
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="10" >
                                    <thead class="text-center bg-success text-white">
                                        <tr>
                                            <th>Nama Pemohon</th>
                                            <th>Nilai</th>
                                            <th>Status</th>
                                        </tr>   
                                    </thead>
                                    <tbody>
                                    <tr>
                                    <?php $no = 1; ?>
                                    <?php foreach ($hasil as $h): ?>  
                                        <tr>

                                            <td class="text-center"><?php echo $h->nama ?></td>
                                            <td class="text-center"><?php echo number_format($h->hasil, 5); ?></td>
                                            <td class="text-center">
                                            <?php if (strtolower($h->status) == 'diproses'): ?>
                                                <span class="badge badge-pill badge-warning">Diproses</span>
                                            <?php elseif (strtolower($h->status) == 'diterima'): ?>
                                                <span class="badge badge-pill badge-primary">Diterima</span>
                                            <?php elseif (strtolower($h->status) == 'ditolak'): ?>
                                                <span class="badge badge-pill badge-danger">Ditolak</span>
                                            <?php endif; ?>
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

<script>
    document.getElementById('tahun_periode').addEventListener('change', function() {
        var selectedYear = this.value;
        window.location.href = "<?= base_url('controller/index?tahun=') ?>" + selectedYear;
    });
</script>