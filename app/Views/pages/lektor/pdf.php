<!-- app/Views/pages/lektor/pdf.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?= esc($title) ?></title>
    <style>
    body {
        font-family: sans-serif;
        font-size: 12px;
        margin: 0;
        padding: 0
    }

    .kop-surat {
        text-align: center;
        border-bottom: 2px solid #000;
        padding-bottom: 6px;
        margin-bottom: 14px;
    }

    .kop-surat img {
        width: 50px;
        vertical-align: middle;
    }

    .kop-surat .header-text {
        display: inline-block;
        vertical-align: middle;
        text-align: center;
        line-height: 1.1;
        margin-left: 8px;
    }

    .kop-surat .header-text h3 {
        margin: 0;
        font-size: 13px;
        font-weight: bold;
    }

    .kop-surat .header-text p {
        margin: 2px 0 0;
        font-size: 9px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 4px
    }

    th,
    td {
        border: 1px solid #333;
        padding: 4px 6px;
    }

    th {
        background: #eee;
        font-size: 12px
    }

    td {
        font-size: 11px
    }
    </style>
</head>

<body>

    <div class="kop-surat">
        <img src="<?= $logoSrc ?>" alt="Logo Gereja">
        <div class="header-text">
            <h3>GEREJA KATOLIK – KEUSKUPAN SIBOLGA</h3>
            <h3>PAROKI SANTO PETRUS SIROMBU</h3>
            <h3>STASI ST. KAROLUS SIONOBANUA</h3>
            <p>Alamat: Sionobanua – Desa Sitolubanuafadoro – Kec. Moro’o –
                Kab. Nias Barat, Sumatera Utara</p>
        </div>
    </div>

    <h3 style="text-align:center; margin:0 0 8px"><?= esc($title) ?></h3>

    <table>
        <thead>
            <tr>
                <th style="width:4%">#</th>
                <th>Nama</th>
                <th style="width:18%">TTL</th>
                <th style="width:10%">JK</th>
                <th style="width:12%">Status</th>
                <th style="width:10%">Tahun Masuk</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lektor as $l): ?>
            <tr>
                <td><?= $l['id'] ?></td>
                <td><?= esc($l['nama']) ?></td>
                <td>
                    <?= esc($l['tempat_lahir']) ?>,
                    <?= date('d-m-Y', strtotime($l['tanggal_lahir'])) ?>
                </td>
                <td>
                    <?= $l['jenis_kelamin'] === 'L' ? 'Laki-Laki' : 'Perempuan' ?>
                </td>
                <td><?= esc($l['status']) ?></td>
                <td><?= esc($l['tahun_masuk']) ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</body>

</html>