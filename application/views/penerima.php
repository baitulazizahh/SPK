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
            text-align: center;
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
            display: flex;
            flex-direction: column; /* Stack items vertically */
            align-items: flex; /* Align items to the end of the container */
            text-align: left; /* Align text to the right */
            margin-top: 40px; /* Remove default margin if needed */
            padding-left: 540px; 
        }
        .signature p {
            margin: 0; /* Remove default margin for p elements */
            line-height: 1.5; /* Adjust line height for better readability */
        }
        @media print {
            .no-print {
                display: none;
            }
        }
        .header {
        display: flex;
        align-items: center; /* Vertically center items */
        padding: 10px; /* Optional: Adds padding around the content */
        position: relative; /* Allow positioning of the line absolutely */
    }
    .header .image-container {
      
    }
    .header .text-container {
        flex: 1; /* Allow the text container to take up remaining space */
        display: flex;
        flex-direction: column; /* Stack text vertically */
        align-items: center; /* Center text horizontally */
        justify-content: center; /* Center text vertically */
        position: relative; /* Allow positioning of the line inside this container */
    }
    .header h2 {
        margin: 0; /* Remove default margin */
        font-size: 18px; /* Adjust font size as needed */
        text-align: center; /* Center text horizontally */
    }
    .header p {
        margin: 0; /* Remove default margin */
        font-size: 14px; /* Adjust font size as needed */
        text-align: center; /* Center text horizontally */
    }
    .header .line {
        position: absolute; /* Position the line absolutely within the text container */
        bottom: 0; /* Position the line below the text container */
        left: 0; /* Align the line with the left edge of the text container */
        width: 100%; /* Make the line span the full width of the text container */
        border-bottom: 2px solid #000; /* Add the line with a solid border */
    }
    p{
        font-size : 12px;
        text-align: justify;
    }
    
    </style>
</head>
<body>
    <div id="content">

    </div>

    <div class="header">
        <div class="image-container">
            <img src="<?php echo base_url() ?>/assets/img/Baznas.png" class="brand-image" width="60" height="50">
        </div>
        <div class="text-container">
            <h2>BADAN AMIL ZAKAT NASIONAL KABUPATEN PADANG PARIAMAN</h2>
            <p>Simpang Balai Basuo Nagari Kapalo Koto Kec. Nan Sabaris 25571</p>
        </div>
        <div class="line"></div> <!-- The horizontal line -->
        <div>
            
        </div>
    </div>
    <h3 style="text-align: center;"> Laporan Hasil Akhir Penerima Bantuan Modal Usaha Tahun  <?= $selected_year ?></h3>
    <p>Berdasarkan hasil perhitungan menggunakan sistem pendukung keputusan untuk menentukan penerima bantuan modal 
        bagi pelaku usaha mikro pada Badan Amil Zakat Nasional Kabupaten Padang Pariaman
        Menggunakan Metode Additive Ratio Assessment (ARAS), berikut adalah nama-nama penerima yang direkomendasikan untuk menerima bantuan:
    </p>
   

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No.</th> <!-- Lebar 5% -->
                <th style="width: 40%; ">Nama</th> <!-- Lebar 40% -->
                <th style="width: 35%;">Nilai</th> <!-- Lebar 30% -->
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;
                foreach($hasil as $row):
                    if($row->status == 'Diterima'): // Filter hanya yang berstatus 'Diterima'
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td style="text-align: left;"><?= $row->nama; ?></td>
                        <td><?= $row->hasil; ?></td>
                    </tr>
                    <?php endif;
            endforeach;
            ?>
        </tbody>
    </table>

    <div class="signature">
        <p>Nan Sabaris, <?= date('d M Y'); ?></p>
        <p>Mengetahui,<br>Kepala BAZNAS Padang Pariaman</p>
        <br><br>
        <p><b>Dr. H. Rahmat Tk Sulaiman, MM</b></p>
    </div>
<script type="text/javascript">
window.print();
</script>           
</body>
</html>
