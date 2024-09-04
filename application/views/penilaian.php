<div class="container-fluid"> 

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Data Perhitungan</h1>
                    </div>
                    
                    <!-- Tabel Perhitungan -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-calculator text-successy"></i> Matriks Keputusan</h6>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="10" >
                                    <thead class="text-center bg-success text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemohon</th>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>C5</th>
                                            <th>C6</th>
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
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="8" class="text-center">Data tidak ditemukan</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-secondary btn-sm">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                                          

                                                
                                          
                                      
                                    </tbody>
                                </table>
                                <!-- Tombol Next untuk melanjutkan -->
                                <div class="text-right">
                                    <button type="submit" class="btn btn-secondary btn-sm">Next</button>
                                </div>                                  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                <!-- /.container-fluid -->