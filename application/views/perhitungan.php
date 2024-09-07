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
                                    </tbody>
                                </table>
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
                            </div>
                        </div>
                    </div>
                    <!-- End Matriks Normalisasi -->


                    <!-- Bobot Kriteria -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-calculator text-success"></i> Bobot Kriteria</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="10">
                                    <thead class="text-center bg-success text-white">
                                        <tr>
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
                                        // Initialize variables to store bobot values
                                        $bobot = [
                                            'C1' => 'N/A',
                                            'C2' => 'N/A',
                                            'C3' => 'N/A',
                                            'C4' => 'N/A',
                                            'C5' => 'N/A',
                                            'C6' => 'N/A'
                                        ];

                                        // Populate the bobot values from the data array
                                        foreach ($bobot_kriteria as $item) {
                                            $bobot[$item['id_kriteria']] = number_format($item['bobot'], 2);
                                        }
                                        ?>
                                        <tr class="text-center">
                                            <td><?php echo $bobot['C1']; ?></td>
                                            <td><?php echo $bobot['C2']; ?></td>
                                            <td><?php echo $bobot['C3']; ?></td>
                                            <td><?php echo $bobot['C4']; ?></td>
                                            <td><?php echo $bobot['C5']; ?></td>
                                            <td><?php echo $bobot['C6']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Bobot Kriteria -->

                    
                     <!-- Matriks Normalisasi -->
                     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-calculator text-success"></i> Bobot Matriks Normalisasi</h6>
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
                                        
                                        <tr class="bg-light">
                                            <td class="text-center font-weight-bold">0</td>
                                            <td class="font-weight-bold">Alternatif Optimal</td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(($bobot['C1']* (4 / $totalC1)), 5); ?></td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(($bobot['C2'] * (1 / $totalC2)), 5); ?></td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(($bobot['C3'] * (4 / $totalC3)), 5); ?></td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(($bobot['C4']* (1 / $totalC4)), 5); ?></td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(($bobot['C5'] * (4 / $totalC5)), 5); ?></td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(($bobot['C6'] * (4 / $totalC6)), 5); ?></td>
                                        </tr>
                                         <!-- Baris Penilaian Normalisasi -->
                                      <?php 
                                      $no=1;
                                      ?>
                                        <?php if (isset($penilaian) && !empty($penilaian)): ?>
                                            <?php foreach ($penilaian as $p): ?>  
                                                <tr>
                                                    <td class="text-center"><?php echo $no++; ?></td>
                                                    <td><?php echo $p->nama; ?></td>
                                                    <td class="text-center"><?php echo number_format(($bobot['C1'] * ($p->c1 / $totalC1)), 5); ?></td>
                                                    <td class="text-center"><?php echo number_format(($bobot['C2'] * ($p->c2 / $totalC2)), 5); ?></td>
                                                    <td class="text-center"><?php echo number_format(($bobot['C3'] * ($p->c3 / $totalC3)), 5); ?></td>
                                                    <td class="text-center"><?php echo number_format(($bobot['C4'] * ($p->c4 / $totalC4)), 5); ?></td>
                                                    <td class="text-center"><?php echo number_format(($bobot['C5'] * ($p->c5 / $totalC5)), 5); ?></td>
                                                    <td class="text-center"><?php echo number_format(($bobot['C6'] * ($p->c6 / $totalC6)), 5); ?></td>
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
                                        <!-- End Matriks Normalisasi -->
                                               
                <!-- /.container-fluid -->