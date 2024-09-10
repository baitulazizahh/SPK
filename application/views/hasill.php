<div class="container-fluid"> 
    <!-- DataTales Example -->
    <div class="card shadow mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">
                <i class="fas fa-fw fa-chart-bar text-success"></i> Data Penerima
            </h6>
        </div>
        <div class="card-body">
            <!-- Dropdown Pilihan Tahun Periode -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="tahun_periode" class="form-label">Pilih Tahun Periode</label>
                    <form method="post" action="<?= base_url('hasil/index2'); ?>" class="d-flex align-items-end">
                        <select class="form-control me-3" id="tahun_periode" name="tahun_periode" required>
                            <option value="">-- Pilih Tahun --</option>
                            <?php foreach ($years as $year): ?>
                                <option value="<?= $year->year ?>" <?= set_select('tahun_periode', $year->year, $selected_year == $year->year ? true : false); ?>><?= $year->year ?></option>
                            <?php endforeach; ?>
                        </select> 
                        <div class="text-white"> jar</div>
                        <button type="submit" class="btn btn-primary btn-sm ">Tampilkan</button>
                    </form>
                </div>
            </div>
            <div>
            <!-- Tampilkan data hanya jika tahun dipilih -->
            <?php if (isset($selected_year)): ?>
                <h6 id="judul-laporan" class="font-weight-bold text-center mb-3 mt-4">DATA LAPORAN TAHUN <?= $selected_year ?></h6>
                <div class="d-flex justify-content-end mb-3">
                <a href="<?= site_url('hasil/print2?year=' . $selected_year); ?>" class="btn btn-secondary btn-sm" target="_blank">Cetak Laporan</a>
                </div>
                </div>

                <!-- Tabel Data Hasil -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center bg-success text-white">
                            <tr>
                                <th>Nama Pemohon</th>
                                <th>Nilai</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($hasil)): ?>
                                <?php foreach ($hasil as $h): ?>
                                    <?php if (strtolower($h->status) == 'diterima'): // Menampilkan hanya status 'Diterima' ?>
                                        <tr>
                                            <td class="text-center"><?= $h->nama; ?></td>
                                            <td class="text-center"><?= number_format($h->hasil, 5); ?></td>
                                            <td class="text-center">
                                                <span class="badge badge-pill badge-primary">Diterima</span>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center">Tidak ada data untuk tahun ini</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<script>
    document.getElementById('btn-cetak').addEventListener('click', function() {
        // Buat variabel yang berisi elemen tabel yang akan dicetak
        var printContents = document.getElementById('dataTable').outerHTML;
        
        // Buat jendela baru
        var printWindow = window.open('', '', 'height=600,width=800');
        
        // Tambahkan style dan isi tabel ke dalam jendela baru
        // printWindow.document.write('<html><head><title>Cetak Laporan</title>');
        printWindow.document.write('<style>');
        printWindow.document.write('table {width: 100%;border-collapse: collapse;}');
        printWindow.document.write('table, th, td {border: 1px solid black;padding: 8px;text-align: center;}');
        printWindow.document.write('th {background-color: #4CAF50;color: white;}');
        printWindow.document.write('</style>');
        printWindow.document.write('</head><body>');

        // Menulis kop surat dengan logo di samping kiri
        printWindow.document.write('<div class="header">');
        printWindow.document.write('<img src="http://localhost/spk/assets/img/logo.png" alt="Logo" class="logo" style="width: 100px;">'); // Ganti dengan path ke logo Anda
        printWindow.document.write('<div>');
        printWindow.document.write('<h4 style="margin-bottom: 5px; font-weight: bold;">BADAN AMIL ZAKAT NASIONAL KABUPATEN PADANG PARIAMAN</h4>');
        printWindow.document.write('<p style="margin-top: 0;">Jl. Contoh Alamat No. 123, Padang Pariaman</p>');
        printWindow.document.write('</div>');
        printWindow.document.write('</div>');

        printWindow.document.write(printContents);
        
        printWindow.document.write('</body></html>');
        
        // Tutup dan cetak isi dari jendela baru
        printWindow.document.close();
        printWindow.print();
    });
</script>
