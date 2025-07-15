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

    .kop {
        text-align: center;
        border-bottom: 2px solid #000;
        padding-bottom: 6px;
        margin-bottom: 12px
    }

    .kop img {
        width: 50px;
        vertical-align: middle
    }

    .kop .text {
        display: inline-block;
        vertical-align: middle;
        text-align: center;
        margin-left: 6px;
        line-height: 1.1
    }

    .kop .text h3 {
        margin: 0;
        font-size: 12px;
        font-weight: bold
    }

    .kop .text p {
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
        font-size: 11px
    }

    td {
        font-size: 10px
    }

    .summary td {
        font-weight: bold;
    }
    </style>
</head>

<body>

    <div class="kop">
        <img src="<?= $logoSrc ?>" alt="Logo">
        <div class="text">
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
                <th>Jenis</th>
                <th>Kategori</th>
                <th>Keterangan</th>
                <th style="width:15%">Nominal</th>
                <th style="width:15%">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $idx => $r): ?>
            <tr>
                <td><?= $idx+1 ?></td>
                <td><?= esc(ucfirst($r['jenis'])) ?></td>
                <td><?= esc($r['kategori']) ?></td>
                <td><?= esc($r['keterangan']) ?></td>
                <td style="text-align:right"><?= number_format($r['harga'],2,',','.') ?></td>
                <td><?= date('d-m-Y', strtotime($r['created_at'])) ?></td>
            </tr>
            <?php endforeach ?>
            <!-- Summary -->
            <tr class="summary">
                <td colspan="4">Total Pemasukan</td>
                <td colspan="2" style="text-align:right"><?= number_format($totalIn,2,',','.') ?></td>
            </tr>
            <tr class="summary">
                <td colspan="4">Total Pengeluaran</td>
                <td colspan="2" style="text-align:right"><?= number_format($totalOut,2,',','.') ?></td>
            </tr>
            <tr class="summary">
                <td colspan="4">Saldo</td>
                <td colspan="2" style="text-align:right"><?= number_format($saldo,2,',','.') ?></td>
            </tr>
        </tbody>
    </table>

</body>

</html>