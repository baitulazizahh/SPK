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
                                            <th>Nama Alternatif</th>
                                            <th>Nilai</th>
                                            <th>Peringkat</th>
                                        </tr>   
                                    </thead>
                                    <tbody>
                                    <tr>
                                    <?php $no = 1; ?>
                                    <?php foreach ($hasil as $data): ?>  
                                        <tr>

                                            <td class="text-center"><?php echo $data->nama_alternatif ?></td>
                                            <td class="text-center"><?php echo $data->nilai ?></td>
                                            <td class="text-center"><?php echo $no++; ?></td> 

                                            

                                        </tr>
                                        <?php endforeach; ?>
                                                   
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->