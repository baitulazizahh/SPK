<div class="container-fluid"> 

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Data Perhitungan</h1>
                    </div>
                    
                   <!-- Tabel Perhitungan -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-calculator text-success"></i> Matriks Keputusan</h6>
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
                                        <?php 
                                        $no = 1; 
                                        $totalC1 = 4; // Awalnya dari A0
                                        $totalC2 = 1;
                                        $totalC3 = 4;
                                        $totalC4 = 1;
                                        $totalC5 = 4;
                                        $totalC6 = 4;
                                        ?>

                                         <!-- Baris Total -->
                                        <tr class="bg-light">
                                            <td class="text-center font-weight-bold">0</td>
                                            <td class=" font-weight-bold">Alternatif Optimal</td>
                                            <td class="text-center font-weight-bold">4</td>
                                            <td class="text-center font-weight-bold">1</td>
                                            <td class="text-center font-weight-bold">4</td>
                                            <td class="text-center font-weight-bold">1</td>
                                            <td class="text-center font-weight-bold">4</td>
                                            <td class="text-center font-weight-bold">4</td>
                                        </tr>

                                        <!-- Baris Penilaian -->
                                        <?php if (isset($penilaian) && !empty($penilaian)): ?>
                                            <?php foreach ($penilaian as $p): ?>  
                                                <tr>
                                                    <td class="text-center"><?php echo $no++; ?></td>
                                                    <td><?php echo $p->nama; ?></td>
                                                    <td class="text-center"><?php echo $p->c1; ?></td>
                                                    <td class="text-center"><?php echo $p->c2; ?></td>
                                                    <td class="text-center"><?php echo $p->c3; ?></td>
                                                    <td class="text-center"><?php echo $p->c4; ?></td>
                                                    <td class="text-center"><?php echo $p->c5; ?></td>
                                                    <td class="text-center"><?php echo $p->c6; ?></td>
                                                </tr>

                                                <?php
                                                // Menambahkan nilai ke total masing-masing kolom
                                                $totalC1 += $p->c1;
                                                $totalC2 += $p->c2;
                                                $totalC3 += $p->c3;
                                                $totalC4 += $p->c4;
                                                $totalC5 += $p->c5;
                                                $totalC6 += $p->c6;
                                                ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="8" class="text-center">Data tidak ditemukan</td>
                                            </tr>
                                        <?php endif; ?>

                                        <!-- Baris Total -->
                                        <!-- <tr class="bg-light">
                                            <td class="text-center font-weight-bold" colspan="2">Total</td>
                                            <td class="text-center font-weight-bold"><?php echo $totalC1; ?></td>
                                            <td class="text-center font-weight-bold"><?php echo $totalC2; ?></td>
                                            <td class="text-center font-weight-bold"><?php echo $totalC3; ?></td>
                                            <td class="text-center font-weight-bold"><?php echo $totalC4; ?></td>
                                            <td class="text-center font-weight-bold"><?php echo $totalC5; ?></td>
                                            <td class="text-center font-weight-bold"><?php echo $totalC6; ?></td>
                                        </tr> -->
                                    </tbody>
                                </table>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-secondary btn-sm">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Matriks Normalisasi -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-calculator text-success"></i> Normalisasi Matriks Keputusan</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="10">
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
                                        <?php 
                                        $no = 1; 

                                        
                                        // Total dari setiap kolom berdasarkan hasil matriks keputusan
                                        $totalC1 = 38; // Ini berasal dari total C1 pada matriks sebelumnya
                                        $totalC2 = 4.25;
                                        $totalC3 = 30;
                                        $totalC4 = 5.667;
                                        $totalC5 = 34;
                                        $totalC6 = 41;
                                        ?>

                                        <!-- Baris Alternatif Optimal (A0) -->
                                        <tr class="bg-light">
                                            <td class="text-center font-weight-bold">0</td>
                                            <td class="font-weight-bold">Alternatif Optimal</td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(4 / $totalC1, 5); ?></td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(1 / $totalC2, 5); ?></td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(4 / $totalC3, 5); ?></td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(1 / $totalC4, 5); ?></td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(4 / $totalC5, 5); ?></td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(4 / $totalC6, 5); ?></td>
                                        </tr>

                                        <!-- Baris Penilaian Normalisasi -->
                                        <?php if (isset($penilaian) && !empty($penilaian)): ?>
                                            <?php foreach ($penilaian as $p): ?>  
                                                <tr>
                                                    <td class="text-center"><?php echo $no++; ?></td>
                                                    <td><?php echo $p->nama; ?></td>
                                                    <td class="text-center"><?php echo number_format($p->c1 / $totalC1, 5); ?></td>
                                                    <td class="text-center"><?php echo number_format($p->c2 / $totalC2, 5); ?></td>
                                                    <td class="text-center"><?php echo number_format($p->c3 / $totalC3, 5); ?></td>
                                                    <td class="text-center"><?php echo number_format($p->c4 / $totalC4, 5); ?></td>
                                                    <td class="text-center"><?php echo number_format($p->c5 / $totalC5, 5); ?></td>
                                                    <td class="text-center"><?php echo number_format($p->c6 / $totalC6, 5); ?></td>
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
                    <!-- End Matriks Normalisasi -->

                    
                    <!-- Mormalisasi Matriks -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-calculator text-success"></i> Normalisasi Matriks Keputusan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="10">
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
                                        <?php
                                        // Inisialisasi total kolom untuk normalisasi
                                        $totalC1 = $totalC2 = $totalC3 = $totalC4 = $totalC5 = $totalC6 = 0;

                                        // Menghitung total setiap kolom
                                        if (isset($penilaian) && !empty($penilaian)) {
                                            foreach ($penilaian as $p) {
                                                $totalC1 += $p->c1;
                                                $totalC2 += $p->c2;
                                                $totalC3 += $p->c3;
                                                $totalC4 += $p->c4;
                                                $totalC5 += $p->c5;
                                                $totalC6 += $p->c6;
                                            }
                                        }

                                        // Tampilkan data normalisasi
                                        if (isset($penilaian) && !empty($penilaian)): 
                                            $no = 1;
                                            foreach ($penilaian as $p): 
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $no++; ?></td>
                                                <td><?php echo $p->nama; ?></td>
                                                <td class="text-center"><?php echo round($p->c1 / $totalC1, 4); ?></td> <!-- Normalisasi C1 -->
                                                <td class="text-center"><?php echo round($p->c2 / $totalC2, 4); ?></td> <!-- Normalisasi C2 -->
                                                <td class="text-center"><?php echo round($p->c3 / $totalC3, 4); ?></td> <!-- Normalisasi C3 -->
                                                <td class="text-center"><?php echo round($p->c4 / $totalC4, 4); ?></td> <!-- Normalisasi C4 -->
                                                <td class="text-center"><?php echo round($p->c5 / $totalC5, 4); ?></td> <!-- Normalisasi C5 -->
                                                <td class="text-center"><?php echo round($p->c6 / $totalC6, 4); ?></td> <!-- Normalisasi C6 -->
                                            </tr>
                                        <?php 
                                            endforeach; 
                                        else: ?>
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