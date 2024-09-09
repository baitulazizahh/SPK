<div class="container-fluid"> 

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-chart-bar  text-successy"></i> Data Hasil Akhir</h6>
                        </div>
                        
                        <div class="card-body">
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
                                            <td class="text-center"><?php echo $h->hasil ?></td>
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