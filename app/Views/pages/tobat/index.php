<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h1><?= esc($title) ?></h1>

<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif ?>

<p>
    <a href="<?= site_url('tobat/create') ?>" class="btn btn-primary mb-3 me-2">Tambah Tobat</a>
    <a href="<?= site_url('tobat/pdf') ?>" target="_blank" class="btn btn-danger mb-3">
        <i class="fas fa-file-pdf"></i> Cetak PDF
    </a>
</p>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Tempat, Tgl</th>
            <th>Paroki Asal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tobat as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= esc($row['nama']) ?></td>
            <td><?= esc($row['tempat_tobat']) ?>, <?= esc($row['tgl_tobat']) ?></td>
            <td><?= esc($row['paroki_asal']) ?></td>
            <td>
                <a href="<?= site_url('tobat/edit/'.$row['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="<?= site_url('tobat/delete/'.$row['id']) ?>" onclick="return confirm('Hapus data ini?')"
                    class="btn btn-sm btn-danger">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>