<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h1><?= esc($title) ?></h1>

<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif ?>

<a href="<?= site_url('pengurapan/create') ?>" class="btn btn-primary mb-3">Tambah Pengurapan</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th>Tgl Pengurapan</th>
            <th>Petugas</th>
            <th>Kondisi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pengurapan as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= esc($row['nama']) ?></td>
            <td><?= esc($row['umur']) ?></td>
            <td><?= esc($row['alamat']) ?></td>
            <td><?= esc($row['tgl_pengurapan']) ?></td>
            <td><?= esc($row['petugas']) ?></td>
            <td><?= esc($row['kondisi']) ?></td>
            <td>
                <a href="<?= site_url('pengurapan/edit/'.$row['id']) ?>" class="btn btn-sm btn-warning mb-2">Edit</a>
                <a href="<?= site_url('pengurapan/delete/'.$row['id']) ?>" onclick="return confirm('Hapus data ini?')"
                    class="btn btn-sm btn-danger">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>