<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        td {
            text-align: center;
        }
        .header {
            text-align: center;
        }
        .signature {
            text-align: right;
            margin-top: 50px;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="path/to/logo.png" alt="Logo" style="width: 100px;">
        <h2>DINAS KOPERASI USAHA KECIL DAN MENENGAH KOTA PADANG</h2>
        <p>Jl. Ujung Gurun, Kec. Padang Barat, Kota Padang, Sumatera Barat 25114</p>
        <hr>
    </div>

    <h3 style="text-align: center;">Laporan Bantuan Alat Produksi Untuk Usaha Mikro Tahun 2024</h3>
    <p style="text-align: center;">Pada periode 2024, berikut adalah daftar nama pemohon:</p>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Nilai</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            foreach($hasil as $row): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->nama; ?></td>
                    <td><?= $row->nilai; ?></td>
                    <td><?= $row->status; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="signature">
        <p>Padang, <?= date('d M Y'); ?></p>
        <p>Mengetahui,<br>Kepala Dinas Koperasi UKM Kota Padang</p>
        <br><br>
        <p><b>Ferri Erviyan Rinaldy</b></p>
    </div>

    <!-- Button cetak -->
    <button onclick="window.print();" class="no-print">Cetak Laporan</button>

</body>
</html>
