
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPK Bantuan</title>

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
    .modal-body .row {
        margin-bottom: 15px; /* Memberi jarak antara setiap baris */
    }
    .modal-body strong {
        font-weight: 600; /* Mempertebal label */
    }
    .btn-info.btn-sm {
        padding: 3px 10px; /* Ukuran tombol kecil */
        font-size: 12px;   /* Ukuran teks kecil */
    }
    #content {
        margin-top: 100px; /* Jarak antara topbar dan konten */  
    }
</style>

</head>

<body id="page-top">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                
                <div class="container-fluid"> 

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Data Perhitungan</h1>
                    </div>
                     <!-- DataTales Example -->
                     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-list-alt text-successy"></i> Proses Perhitungan</h6>
                        </div>
                        
                        <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="tahun_periode" class="form-label">Pilih Tahun Periode</label>
                                <form method="post" action="<?= base_url('perhitungan/index'); ?>" class="d-flex align-items-end">
                                <select class="form-control me-3" id="tahun_periode" name="tahun_periode" required>
                                    <option value="">-- Pilih Tahun --</option>
                                    <?php foreach ($years as $year): ?>
                                        <option value="<?= $year->year ?>" <?= set_select('tahun_periode', $year->year, $selected_year == $year->year ? true : false); ?>><?= $year->year ?></option>
                                    <?php endforeach; ?>
                                </select>
                                    <button type="submit" class="btn btn-primary btn-sm  ml-4">Pilih</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>

                    
                    <!-- Matriks Keputusan-->
                    <?php if (isset($selected_year)): ?>
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
                                            <th class="text-center align-middle">Jenis Usaha</th>
                                            <th class="text-center align-middle">Riwayat Bantuan</th>
                                            <th class="text-center align-middle">Tanggungan</th>
                                            <th class="text-center align-middle">Pendapatan</th>
                                            <th class="text-center align-middle">Status Usaha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1; 
                                        $totalC1 = 4; 
                                        $totalC2 = 1;
                                        $totalC3 = 4;
                                        $totalC4 = 1;
                                        $totalC5 = 1;
                                        ?>

                                         <!-- Baris Total -->
                                        <tr class="bg-light">
                                            <td class="text-center font-weight-bold">-</td>
                                            <td class=" font-weight-bold">Alternatif Optimal</sub></td>
                                            <td class="text-center font-weight-bold">4</td>
                                            <td class="text-center font-weight-bold">1</td>
                                            <td class="text-center font-weight-bold">4</td>
                                            <td class="text-center font-weight-bold">1</td>
                                            <td class="text-center font-weight-bold">1</td>
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
                                                </tr>

                                                <?php
                                                // Menambahkan nilai ke total masing-masing kolom
                                                $totalC1 += $p->c1;
                                                $totalC2 += 1 / $p->c2;
                                                $totalC3 += $p->c3;
                                                $totalC4 += 1 / $p->c4;
                                                $totalC5 += 1 / $p->c5;
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
                    
                    <!-- End Matriks Keputusan -->

                    <!-- Normalisasi Matriks Keputusan-->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-calculator text-successy"></i> Normalisasi Matriks Keputusan</h6>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="10" >
                                <thead class="text-center bg-success text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemohon</th>
                                            <th class="text-center align-middle">Jenis Usaha</th>
                                            <th class="text-center align-middle">Riwayat Bantuan</th>
                                            <th class="text-center align-middle">Tanggungan</th>
                                            <th class="text-center align-middle">Pendapatan</th>
                                            <th class="text-center align-middle">Status Usaha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1; 

                                        ?>

                                        <!-- Baris Alternatif Optimal (A0) -->
                                        <tr class="bg-light">
                                            <td class="text-center font-weight-bold">-</td>
                                            <td class="font-weight-bold">Alternatif Optimal</td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(4 / $totalC1, 5); ?></td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(1 / $totalC2, 5); ?></td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(4 / $totalC3, 5); ?></td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(1 / $totalC4, 5); ?></td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(1 / $totalC5, 5); ?></td>
                                        </tr>
                                        
                                        <!-- Baris Penilaian Normalisasi -->
                                        <?php if (isset($penilaian) && !empty($penilaian)): ?>
                                            <?php foreach ($penilaian as $p): ?> 
                                                <?php
                                                // Menambahkan nilai ke total masing-masing kolom
                                               
                                                $nilai_C2 = 1/$p->c2 ;
                                                $nilai_C4 = 1/$p->c4 ;
                                                $nilai_C5 = 1/$p->c5 ;
                                               
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $no++; ?></td>
                                                    <td><?php echo $p->nama; ?></td>
                                                    <td class="text-center"><?php echo number_format($p->c1 / $totalC1, 5); ?></td>
                                                    <td class="text-center"><?php echo number_format($nilai_C2/ $totalC2, 5); ?></td>
                                                    <td class="text-center"><?php echo number_format($p->c3 / $totalC3, 5); ?></td>
                                                    <td class="text-center"><?php echo number_format($nilai_C4 / $totalC4, 5); ?></td>
                                                    <td class="text-center"><?php echo number_format($nilai_C5 / $totalC5, 5); ?></td> 
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
                    <!-- End Normalisasi Matriks Keputusan -->


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
                                            <th class="text-center align-middle">Jenis Usaha</th>
                                            <th class="text-center align-middle">Riwayat Bantuan</th>
                                            <th class="text-center align-middle">Tanggungan</th>
                                            <th class="text-center align-middle">Pendapatan</th>
                                            <th class="text-center align-middle">Status Usaha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Initialize variables to store bobot values
                                        $bobot = [
                                            'K001' => 'N/A',
                                            'K002' => 'N/A',
                                            'K003' => 'N/A',
                                            'K004' => 'N/A',
                                            'K005' => 'N/A'    
                                        ];

                                        // Populate the bobot values from the data array
                                        foreach ($bobot_kriteria as $item) {
                                            $bobot[$item['id_kriteria']] = number_format($item['bobot'], 2);
                                        }
                                        ?>
                                        <tr class="text-center">
                                            <td><?php echo $bobot['K001']; ?></td>
                                            <td><?php echo $bobot['K002']; ?></td>
                                            <td><?php echo $bobot['K003']; ?></td>
                                            <td><?php echo $bobot['K004']; ?></td>
                                            <td><?php echo $bobot['K005']; ?></td>
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
                                <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="10">
                                    <thead class="text-center bg-success text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemohon</th>
                                            <th class="text-center align-middle">Jenis Usaha</th>
                                            <th class="text-center align-middle">Riwayat Bantuan</th>
                                            <th class="text-center align-middle">Tanggungan</th>
                                            <th class="text-center align-middle">Pendapatan</th>
                                            <th class="text-center align-middle">Status Usaha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr class="bg-light">
                                            <td class="text-center font-weight-bold">-</td>
                                            <td class="font-weight-bold">Alternatif Optimal</td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(($bobot['K001']* (4 / $totalC1)), 5); ?></td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(($bobot['K002'] * (1 / $totalC2)), 5); ?></td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(($bobot['K003'] * (4 / $totalC3)), 5); ?></td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(($bobot['K004']* (1 / $totalC4)), 5); ?></td>
                                            <td class="text-center font-weight-bold"><?php echo number_format(($bobot['K005'] * (1 / $totalC5)), 5); ?></td>
                                        </tr>
                                         <!-- Baris Penilaian Normalisasi -->
                                      <?php 
                                      $no=1;
                                      ?>
                                        <?php if (isset($penilaian) && !empty($penilaian)): ?>
                                            <?php foreach ($penilaian as $p): ?> 
                                                <?php
                                                // Normalisasi Matriks Cost
                                                $nilai_C2 = 1/$p->c2 ;
                                                $nilai_C4 = 1/$p->c4 ;
                                                $nilai_C5 = 1/$p->c5 ;
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $no++; ?></td>
                                                    <td><?php echo $p->nama; ?></td>
                                                    <td class="text-center"><?php echo number_format(($bobot['K001'] * ($p->c1 / $totalC1)), 5); ?></td>
                                                    <td class="text-center"><?php echo number_format(($bobot['K002'] * ($nilai_C2 / $totalC2)), 5); ?></td>
                                                    <td class="text-center"><?php echo number_format(($bobot['K003'] * ($p->c3 / $totalC3)), 5); ?></td>
                                                    <td class="text-center"><?php echo number_format(($bobot['K004'] * ($nilai_C4 / $totalC4)), 5); ?></td>
                                                    <td class="text-center"><?php echo number_format(($bobot['K005'] * ($nilai_C5 / $totalC5)), 5); ?></td>
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


                     <!-- Nilai utilitas -->
                     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-calculator text-success"></i> Nilai Utilitas (Si)</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="10">
                                    <thead class="text-center bg-success text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemohon</th>
                                            <th>Penjumlahan</th>
                                            <th>Total Nilai (Si)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1; 
                                        ?>

                                        <!-- Baris Alternatif Optimal (A0) -->
                                        <tr class="bg-light">
                                            <td class="text-center font-weight-bold">-</td>
                                            <td class="font-weight-bold">Alternatif Optimal</td>
                                            <td class="text-center font-weight-bold">
                                                SUM(
                                                <?php 
                                                echo number_format(($bobot['K001'] * (4 / $totalC1)), 5) . " + " .
                                                    number_format(($bobot['K002'] * (1 / $totalC2)), 5) . " + " .
                                                    number_format(($bobot['K003'] * (4 / $totalC3)), 5) . " + " .
                                                    number_format(($bobot['K004'] * (1 / $totalC4)), 5) . " + " .
                                                    number_format(($bobot['K005'] * (1 / $totalC5)), 5);
                                                ?>)
                                            </td>
                                            <td class="text-center font-weight-bold">
                                                <?php 
                                                $total_optimal = 
                                                    ($bobot['K001'] * (4 / $totalC1)) +
                                                    ($bobot['K002'] * (1 / $totalC2)) +
                                                    ($bobot['K003'] * (4 / $totalC3)) +
                                                    ($bobot['K004'] * (1 / $totalC4)) +
                                                    ($bobot['K005'] * (1 / $totalC5));

                                                echo number_format($total_optimal, 5); 
                                                ?>
                                            </td>
                                        </tr>

                                        <!-- Baris Penilaian Normalisasi -->
                                        <?php if (isset($penilaian) && !empty($penilaian)): ?>
                                            <?php foreach ($penilaian as $p): ?>  
                                                <?php
                                                // Normalisasi Matriks Cost
                                                $nilai_C2 = 1/$p->c2 ;
                                                $nilai_C4 = 1/$p->c4 ;
                                                $nilai_C5 = 1/$p->c5 ;
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $no++; ?></td>
                                                    <td><?php echo $p->nama; ?></td>
                                                    <td class="text-center">
                                                        SUM(
                                                        <?php 
                                                        echo number_format(($bobot['K001'] * ($p->c1 / $totalC1)), 5) . " + " .
                                                            number_format(($bobot['K002'] * ($nilai_C2 / $totalC2)), 5) . " + " .
                                                            number_format(($bobot['K003'] * ($p->c3 / $totalC3)), 5) . " + " .
                                                            number_format(($bobot['K004'] * ($nilai_C4 / $totalC4)), 5) . " + " .
                                                            number_format(($bobot['K005'] * ($nilai_C5/ $totalC5)), 5);
                                                        ?>)
                                                    </td>
                                                    <td class="text-center">
                                                        <?php 
                                                        $total_nilai = 
                                                            ($bobot['K001'] * ($p->c1 / $totalC1)) +
                                                            ($bobot['K002'] * ($nilai_C2 / $totalC2)) +
                                                            ($bobot['K003'] * ($p->c3 / $totalC3)) +
                                                            ($bobot['K004'] * ($nilai_C4 / $totalC4)) +
                                                            ($bobot['K005'] * ($nilai_C5 / $totalC5));

                                                        echo number_format($total_nilai, 5);
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4" class="text-center">Data tidak ditemukan</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Nilai Akhir -->


                    <!-- Nilai Akhir dan Perangkingan -->
                    <form id="form-perhitungan" action="<?= base_url('perhitungan/simpanHasil') ?>" method="POST">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-calculator text-success"></i> Hasil Akhir dan Perangkingan</h6>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable5" width="100%" cellspacing="10">
                                        <thead class="text-center bg-success text-white">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pemohon</th>
                                                <th>Nilai Si</th>
                                                <th>Nilai Ki</th>
                                                <th>Ranking</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no = 1; 

                                            // Menghitung nilai optimal S_0
                                            $S0 = 
                                                ($bobot['K001'] * (4 / $totalC1)) +
                                                ($bobot['K002'] * (1 / $totalC2)) +
                                                ($bobot['K003'] * (4 / $totalC3)) +
                                                ($bobot['K004'] * (1 / $totalC4)) +
                                                ($bobot['K005'] * (1 / $totalC5));

                                            // Inisialisasi array untuk menyimpan nilai Ki dan ranking
                                            $data_ranking = [];

                                            // Looping data penilaian
                                            if (isset($penilaian) && !empty($penilaian)) {
                                                foreach ($penilaian as $p) {
                                                    // Normalisasi Matriks Cost
                                                    $nilai_C2 = 1/$p->c2 ;
                                                    $nilai_C4 = 1/$p->c4 ;
                                                    $nilai_C5 = 1/$p->c5 ;

                                                    // Menghitung Si
                                                    $Si = 
                                                        ($bobot['K001'] * ($p->c1 / $totalC1)) +
                                                        ($bobot['K002'] * ($nilai_C2 / $totalC2)) +
                                                        ($bobot['K003'] * ($p->c3 / $totalC3)) +
                                                        ($bobot['K004'] * ($nilai_C4 / $totalC4)) +
                                                        ($bobot['K005'] * ($nilai_C5 / $totalC5));

                                                    // Menghitung Ki
                                                    $Ki = $Si / $S0;

                                                    // Simpan data ke array ranking
                                                    $data_ranking[] = [
                                                        'id_permohonan' => $p->id_permohonan,
                                                        'nama' => $p->nama,
                                                        'Si' => $Si,
                                                        'Ki' => $Ki
                                                    ];
                                                }

                                                // Mengurutkan data ranking berdasarkan nilai Ki tertinggi
                                                usort($data_ranking, function ($a, $b) {
                                                    return $b['Ki'] <=> $a['Ki'];
                                                });

                                                // Menampilkan baris S0 dengan background 'bg-light'
                                                echo "<tr class='bg-light font-weight-bold'>";
                                                echo "<td class='text-center font-weight-bold'>-</td>";
                                                echo "<td class='font-weight-bold'>Optimal S<sub>0</sub></td>";
                                                echo "<td class='text-center font-weight-bold'>" . number_format($S0, 5) . "</td>";
                                                echo "<td class='text-center font-weight-bold'>" . number_format($S0/$S0, 5) . "</td>";
                                                echo "<td class='text-center font-weight-bold'>-</td>";
                                                echo "</tr>";

                                                // Menampilkan data yang sudah diurutkan
                                                foreach ($data_ranking as $key => $row) {
                                                    echo "<tr>";
                                                    echo "<td class='text-center'>" . ($key + 1) . "</td>";
                                                    echo "<td>" . $row['nama'] . "</td>";
                                                    echo "<td class='text-center'>" . number_format($row['Si'], 5) . "</td>";
                                                    echo "<td class='text-center'>" . number_format($row['Ki'], 5) . "</td>";
                                                    echo "<td class='text-center'>" . ($key + 1) . "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='5' class='text-center'>Data tidak ditemukan</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <!-- Tombol di bawah tabel -->
                                    <div class="text-center mt-3">
                                        <div class="d-inline-block">
                                            <button type="submit" class="btn btn-success btn-sm">Simpan Data</button>
                                        </div>
                                        <div class="d-inline-block">
                                            <button type="button" class="btn btn-primary btn-sm" onclick="submitFinish()">Finish</button>
                                                <script>
                                                    function submitFinish() {
                                                        document.getElementById('form-perhitungan').action = "<?= base_url('perhitungan/simpanPenerima') ?>";
                                                        document.getElementById('form-perhitungan').submit();
                                                    }
                                                </script>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        <!-- Input hidden untuk mengirim data ranking -->
                        <?php
                            foreach ($data_ranking as $row) {
                                echo "<input type='hidden' name='id_permohonan[]' value='" . $row['id_permohonan'] . "'>";
                                echo "<input type='hidden' name='Ki[]' value='" . $row['Ki'] . "'>";
                            }
                        ?>
                    </form>
                    <!-- End -->
                    
                    <?php endif; ?>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        <!-- End of Content Wrapper -->
    </div>
   
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url() ?>assets/js/demo/datatables-demo.js"></script>
      <!-- Inisialisasi DataTable untuk kedua tabel -->
      <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();   
            $('#dataTable2').DataTable();  
            $('#dataTable3').DataTable(); 
            $('#dataTable4').DataTable(); 
            $('#dataTable5').DataTable(); 
        });
    </script>
</body>

</html>
    