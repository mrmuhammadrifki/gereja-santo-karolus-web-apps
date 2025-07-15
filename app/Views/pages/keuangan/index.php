<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h1><?= esc($title) ?></h1>

<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif ?>

<p>
    <a href="<?= site_url('keuangan/create') ?>" class="btn btn-primary mb-3 me-2">Tambah Transaksi</a>
    <a href="<?= site_url('keuangan/pdf') ?>" target="_blank" class="btn btn-danger mb-3">
        <i class="fas fa-file-pdf"></i> Cetak Laporan
    </a>
</p>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Jenis</th>
            <th>Nominal</th>
            <th>Kategori</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($records as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= esc($row['jenis']) ?></td>
            <td><?= number_format($row['harga'],2,',','.') ?></td>
            <td><?= esc($row['kategori']) ?></td>
            <td><?= esc($row['keterangan']) ?></td>
            <td>
                <a href="<?= site_url('keuangan/edit/'.$row['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="<?= site_url('keuangan/delete/'.$row['id']) ?>"
                    onclick="return confirm('Hapus transaksi ini?')" class="btn btn-sm btn-danger">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>