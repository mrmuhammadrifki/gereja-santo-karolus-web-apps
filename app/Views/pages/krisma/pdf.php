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
        vertical-align: middle
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
        margin: 0 0 12px;
        font-size: 14px
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
        vertical-align: top
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
            <p>
                Alamat: Sionobanua – Desa Sitolubanuafadoro –
                Kec. Moro’o – Kab. Nias Barat, Sumatera Utara
            </p>
        </div>
    </div>

    <h3 class="title"><?= esc($title) ?></h3>

    <table>
        <thead>
            <tr>
                <th style="width:4%">#</th>
                <th>Nama Lengkap</th>
                <th style="width:20%">Tempat, Tgl Krisma</th>
                <th>Ortu</th>
                <th>Wali</th>
                <th>Petugas</th>
                <th>Paroki Asal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($krisma as $k): ?>
            <tr>
                <td><?= $k['id'] ?></td>
                <td><?= esc($k['nama']) ?></td>
                <td>
                    <?= esc($k['tempat_krisma']) ?>,
                    <?= date('d-m-Y', strtotime($k['tgl_krisma'])) ?>
                </td>
                <td><?= esc($k['ortu']) ?></td>
                <td><?= esc($k['wali']) ?></td>
                <td><?= esc($k['petugas']) ?></td>
                <td><?= esc($k['paroki_asal']) ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</body>

</html>