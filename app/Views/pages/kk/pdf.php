<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?= esc($title) ?></title>
    <style>
    body {
        font-family: sans-serif;
        font-size: 11px;
        margin: 0;
        padding: 0
    }

    .kop-surat {
        text-align: center;
        border-bottom: 2px solid #000;
        padding-bottom: 6px;
        margin-bottom: 12px;
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
        margin-left: 6px;
    }

    .kop-surat .header-text h3 {
        margin: 0;
        font-size: 12px;
        font-weight: bold
    }

    .kop-surat .header-text p {
        margin: 2px 0 0;
        font-size: 9px
    }

    h3.title {
        text-align: center;
        margin: 0 0 8px;
        font-size: 13px
    }

    table {
        width: 100%;
        border-collapse: collapse
    }

    th,
    td {
        border: 1px solid #333;
        padding: 4px 6px;
    }

    th {
        background: #eee;
        font-size: 11px
    }

    td {
        font-size: 10px
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
            <p>Alamat: Sionobanua – Desa Sitolubanuafadoro –
                Kec. Moro’o – Kab. Nias Barat, Sumatera Utara</p>
        </div>
    </div>

    <h3 class="title"><?= esc($title) ?></h3>

    <table>
        <thead>
            <tr>
                <th style="width:4%">#</th>
                <th>Nama KK</th>
                <th>TTL</th>
                <th>JK</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Pekerjaan</th>
                <th>Rayon</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kk as $r): ?>
            <tr>
                <td><?= $r['id'] ?></td>
                <td><?= esc($r['nama_kk']) ?></td>
                <td>
                    <?= esc($r['tempat_lahir']) ?>,
                    <?= date('d-m-Y', strtotime($r['tanggal_lahir'])) ?>
                </td>
                <td><?= $r['jenis_kelamin']==='L'?'Laki-Laki':'Perempuan' ?></td>
                <td><?= esc($r['alamat']) ?></td>
                <td><?= esc($r['telp']) ?></td>
                <td><?= esc($r['pekerjaan']) ?></td>
                <td><?= esc($r['rayon']) ?></td>
                <td><?= esc($r['status']) ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</body>

</html>