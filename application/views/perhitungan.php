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
                    
                    
                    <!-- Tabel Matriks Ternormalisasi -->
                    <?php 
                        // Inisialisasi array untuk menyimpan nilai total kuadrat dari setiap kolom c1 sampai c6
                        $sumSquares = array('c1' => 0, 'c2' => 0, 'c3' => 0, 'c4' => 0, 'c5' => 0, 'c6' => 0);

                        // Hitung total kuadrat dari setiap kolom
                        foreach ($penilaian as $p) {
                            $sumSquares['c1'] += pow($p->c1, 2);
                            $sumSquares['c2'] += pow($p->c2, 2);
                            $sumSquares['c3'] += pow($p->c3, 2);
                            $sumSquares['c4'] += pow($p->c4, 2);
                            $sumSquares['c5'] += pow($p->c5, 2);
                            $sumSquares['c6'] += pow($p->c6, 2);
                        }

                        // Ambil akar kuadrat dari setiap sumSquares
                        foreach ($sumSquares as $key => $value) {
                            $sumSquares[$key] = sqrt($value);
                        }

                        $no = 1;
                        ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-calculator text-successy"></i> Matriks Kinerja Ternormalisasi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="10" >
                                    <thead class="text-center bg-success text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Alternatif</th>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>C5</th>
                                            <th>C6</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (isset($nilai) && !empty($nilai)): ?>
                                        <?php foreach ($nilai as $n): ?>  
                                            <tr>
                                                <td class="text-center"><?php echo $no++; ?></td>
                                                <td class="text-center"><?php echo $n->nama_alternatif ?></td>
                                                <td class="text-center"><?php echo number_format($n->c1 / $sumSquares['c1'], 8); ?></td>
                                                <td class="text-center"><?php echo number_format($n->c2 / $sumSquares['c2'], 8); ?></td>
                                                <td class="text-center"><?php echo number_format($n->c3 / $sumSquares['c3'], 8); ?></td>
                                                <td class="text-center"><?php echo number_format($n->c4 / $sumSquares['c4'], 8); ?></td>
                                                <td class="text-center"><?php echo number_format($n->c5 / $sumSquares['c5'], 8); ?></td>
                                                <td class="text-center"><?php echo number_format($n->c6 / $sumSquares['c6'], 8); ?></td>
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
                

                <!-- Tabel Optimalisasi nilai atribut -->
                        <?php 
                            // Inisialisasi bobot
                            $bobot = array('c1' => 0.1, 'c2' => 0.1, 'c3' => 0.2, 'c4' => 0.3, 'c5' => 0.15, 'c6' => 0.15);
                            $no = 1;
                        ?>
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-calculator text-successy"></i> Optimalisasi Nilai Atribut</h6>
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
                                    <tbody>
                                    <?php if (isset($nilai) && !empty($nilai)): ?>
                                        <?php foreach ($nilai as $n): ?>  
                                            <tr>
                                                <td class="text-center"><?php echo $no++; ?></td>
                                                <td class="text-center"><?php echo $n->nama ?></td>
                                                <td class="text-center"><?php echo number_format(($n->c1 / $sumSquares['c1']) * $bobot['c1'], 8); ?></td>
                                                <td class="text-center"><?php echo number_format(($n->c2 / $sumSquares['c2']) * $bobot['c2'], 8); ?></td>
                                                <td class="text-center"><?php echo number_format(($n->c3 / $sumSquares['c3']) * $bobot['c3'], 8); ?></td>
                                                <td class="text-center"><?php echo number_format(($n->c4 / $sumSquares['c4']) * $bobot['c4'], 8); ?></td>
                                                <td class="text-center"><?php echo number_format(($n->c5 / $sumSquares['c5']) * $bobot['c5'], 8); ?></td>
                                                <td class="text-center"><?php echo number_format(($n->c6 / $sumSquares['c6']) * $bobot['c6'], 8); ?></td>          
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

                    <!-- Menghitung Nilai Yi -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-calculator text-successy"></i>Menghitung Nilai Y<small class="font-weight-bold">i</small></h6>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                            <form action="<?php echo site_url('perhitungan/simpanHasil'); ?>" method="post">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="10" >
                                    <thead class="text-center bg-success text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemohon</th>
                                            <th>Nilai Maximum</th>
                                            <th>Nilai Minimum</th>
                                            <th>Y<small class="font-weight-bold">i</small></th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($nilai) && !empty($nilai)): ?>
                                            <?php 
                                            $no=1;
                                            $yiData=[];
                                            foreach ($nilai as $n):  
                                                // Hitung nilai maximum (benefit)
                                                $benefit = (($n->c1 / $sumSquares['c1']) * $bobot['c1'])+ 
                                                (($n->c3 / $sumSquares['c3']) * $bobot['c3'])+ 
                                                (($n->c5 / $sumSquares['c5']) * $bobot['c5'])+ 
                                                (($n->c6 / $sumSquares['c6']) * $bobot['c6']);
                                          
      
                                                // Hitung nilai minimum (cost)
                                                $cost = (($n->c2 / $sumSquares['c2']) * $bobot['c2']) + (($n->c4 / $sumSquares['c4']) * $bobot['c4']);
                                                
                                                // Hitung nilai Yi
                                                $yi = $benefit - $cost;

                                                //Menyimpan data Yi ke dalam array
                                                $yiData[]=[
                                                    'id_alternatif' =>$n->id_alternatif,
                                                    'yi' => $yi
                                                ];

                                                //Simpan data ke session
                                                $this->session->set_userdata('yi_data', $yiData);
                                                
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $no++; ?></td>
                                                    <td class="text-center"><?php echo $n->nama_alternatif; ?></td>
                                                    <td class="text-center"><?php echo number_format($benefit, 8); ?></td>
                                                    <td class="text-center"><?php echo number_format($cost, 8); ?></td>
                                                    <td class="text-center"><?php echo number_format($yi, 8); ?></td>
                                                </tr>

                                                  <!-- Input hidden untuk mengirim data Yi ke controller -->
                                                <input type="hidden" name="yi_data[<?php echo $n->id_alternatif; ?>][id_alternatif]" value="<?php echo $n->id_alternatif; ?>">
                                                <input type="hidden" name="yi_data[<?php echo $n->id_alternatif; ?>][nilai]" value="<?php echo $yi; ?>">
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5" class="text-center">Data tidak ditemukan</td>
                                            </tr>
                                        <?php endif; ?>
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