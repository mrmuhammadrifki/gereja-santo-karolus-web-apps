<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h1><?= esc($title) ?></h1>

<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif ?>

<a href="<?= site_url('perkawinan/create') ?>" class="btn btn-primary mb-3">Tambah Perkawinan</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Pria &amp; Wanita</th>
            <th>Tempat Nikah</th>
            <th>Petugas</th>
            <th>Saksi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($perkawinan as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td>
                <?= esc($row['nama_pria']) ?> &<br>
                <?= esc($row['nama_wanita']) ?>
            </td>
            <td>
                <?= esc($row['tempat_nikah']) ?>, <?= esc($row['tgl_nikah']) ?>
            </td>
            <td><?= esc($row['petugas']) ?></td>
            <td><?= esc($row['saksi']) ?></td>
            <td>
                <a href="<?= site_url('perkawinan/edit/'.$row['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="<?= site_url('perkawinan/delete/'.$row['id']) ?>" onclick="return confirm('Hapus data ini?')"
                    class="btn btn-sm btn-danger">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>