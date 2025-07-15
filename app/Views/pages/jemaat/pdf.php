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
        border-collapse: collapse;
        margin-bottom: 12px
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
            <p>
                Alamat: Sionobanua – Desa Sitolubanuafadoro –
                Kec. Moro’o – Kab. Nias Barat, Sumatera Utara
            </p>
        </div>
    </div>

    <h3 class="title"><?= esc($title) ?></h3>

    <!-- Info Kepala Keluarga -->
    <table>
        <tr>
            <th style="width:25%">Nama KK</th>
            <td><?= esc($kk['nama_kk']) ?></td>
        </tr>
        <tr>
            <th>TTL</th>
            <td>
                <?= esc($kk['tempat_lahir']) ?>,
                <?= date('d-m-Y', strtotime($kk['tanggal_lahir'])) ?>
            </td>
        </tr>
        <tr>
            <th>JK</th>
            <td><?= $kk['jenis_kelamin']==='L'?'Laki-Laki':'Perempuan' ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?= esc($kk['alamat']) ?></td>
        </tr>
        <tr>
            <th>Telp</th>
            <td><?= esc($kk['telp']) ?></td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <td><?= esc($kk['pekerjaan']) ?></td>
        </tr>
        <tr>
            <th>Rayon</th>
            <td><?= esc($kk['rayon']) ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?= esc($kk['status']) ?></td>
        </tr>
    </table>

    <!-- Daftar Anggota -->
    <table>
        <thead>
            <tr>
                <th style="width:4%">#</th>
                <th>Nama</th>
                <th>TTL</th>
                <th>JK</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Pekerjaan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anggota as $idx => $a): ?>
            <tr>
                <td><?= $idx + 1 ?></td>
                <td><?= esc($a['nama']) ?></td>
                <td>
                    <?= esc($a['tempat_lahir']) ?>,
                    <?= date('d-m-Y', strtotime($a['tanggal_lahir'])) ?>
                </td>
                <td><?= $a['jenis_kelamin']==='L'?'Laki-Laki':'Perempuan' ?></td>
                <td><?= esc($a['alamat']) ?></td>
                <td><?= esc($a['telp']) ?></td>
                <td><?= esc($a['pekerjaan']) ?></td>
                <td><?= esc($a['status']) ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</body>

</html>