<!-- app/Views/pages/perkawinan/pdf.php -->
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

    h4.section {
        margin: 12px 0 6px;
        font-size: 13px;
        text-decoration: underline
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 8px
    }

    th,
    td {
        border: 1px solid #333;
        padding: 4px 6px;
        vertical-align: top
    }

    th {
        background: #eee;
        font-size: 11px;
        width: 30%
    }

    td {
        font-size: 11px
    }

    .page-break {
        page-break-after: always;
    }
    </style>
</head>

<body>

    <!-- Kop Surat -->
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

    <?php foreach ($perkawinan as $idx => $p): ?>
    <!-- Mempelai Pria -->
    <h4 class="section">Mempelai Pria</h4>
    <table>
        <tr>
            <th>Nama</th>
            <td><?= esc($p['nama_pria']) ?></td>
        </tr>
        <tr>
            <th>Tempat, Tgl Lahir</th>
            <td>
                <?= esc($p['tempat_lhr_pria']) ?>,
                <?= date('d-m-Y', strtotime($p['tgl_lhr_pria'])) ?>
            </td>
        </tr>
        <tr>
            <th>Paroki Asal</th>
            <td><?= esc($p['paroki_pria']) ?></td>
        </tr>
        <tr>
            <th>Orang Tua</th>
            <td><?= esc($p['ortu_pria']) ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?= esc($p['status_pria']) ?></td>
        </tr>
    </table>

    <!-- Mempelai Wanita -->
    <h4 class="section">Mempelai Wanita</h4>
    <table>
        <tr>
            <th>Nama</th>
            <td><?= esc($p['nama_wanita']) ?></td>
        </tr>
        <tr>
            <th>Tempat, Tgl Lahir</th>
            <td>
                <?= esc($p['tempat_lhr_wanita']) ?>,
                <?= date('d-m-Y', strtotime($p['tgl_lhr_wanita'])) ?>
            </td>
        </tr>
        <tr>
            <th>Paroki Asal</th>
            <td><?= esc($p['paroki_wanita']) ?></td>
        </tr>
        <tr>
            <th>Orang Tua</th>
            <td><?= esc($p['ortu_wanita']) ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?= esc($p['status_wanita']) ?></td>
        </tr>
    </table>

    <!-- Detail Acara Pernikahan -->
    <h4 class="section">Detail Acara Pernikahan</h4>
    <table>
        <tr>
            <th>Tempat Pernikahan</th>
            <td><?= esc($p['tempat_nikah']) ?></td>
        </tr>
        <tr>
            <th>Tanggal Pernikahan</th>
            <td><?= date('d-m-Y', strtotime($p['tgl_nikah'])) ?></td>
        </tr>
        <tr>
            <th>Petugas/Imam</th>
            <td><?= esc($p['petugas']) ?></td>
        </tr>
        <tr>
            <th>Saksi</th>
            <td><?= esc($p['saksi']) ?></td>
        </tr>
    </table>

    <?php if ($idx < count($perkawinan) - 1): ?>
    <div class="page-break"></div>
    <?php endif; ?>
    <?php endforeach; ?>

</body>

</html>