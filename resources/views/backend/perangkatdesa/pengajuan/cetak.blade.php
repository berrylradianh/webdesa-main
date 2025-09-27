<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Surat</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            line-height: 1.6;
        }

        .kop {
            text-align: center;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .content {
            margin: 0 40px;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="kop">
        <h2>PEMERINTAH DESA CONTOH</h2>
        <p>Alamat Desa, Kecamatan, Kabupaten</p>
        <p><strong>Surat Keterangan</strong></p>
    </div>

    <div class="content">
        <p>Yang bertanda tangan di bawah ini, Perangkat Desa menyatakan bahwa:</p>
        <p><strong>Nama:</strong> {{ $pengajuan->warga->username ?? '-' }}</p>
        <p><strong>Template Surat:</strong> {{ $pengajuan->template->name ?? '-' }}</p>
        <p><strong>Keterangan:</strong> {{ $pengajuan->keperluan ?? '-' }}</p>

        <br><br>
        <p style="text-align: right;">
            {{ now()->translatedFormat('d F Y') }} <br>
            Perangkat Desa
        </p>
        <br><br>
        <p style="text-align: right;">_____________________</p>
    </div>
</body>

</html>