<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h1><?= esc($title) ?></h1>

<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif ?>

<a href="<?= site_url('imamat/create') ?>" class="btn btn-primary mb-3">Tambah Imamat</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Calon Imam</th>
            <th>Tempat Tahbisan</th>
            <th>Tgl Tahbisan</th>
            <th>Uskup Penahbis</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($imamat as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= esc($row['nama']) ?></td>
            <td><?= esc($row['tempat_tahbisan']) ?></td>
            <td><?= esc($row['tgl_tahbisan']) ?></td>
            <td><?= esc($row['penahbis']) ?></td>
            <td>
                <a href="<?= site_url('imamat/edit/'.$row['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="<?= site_url('imamat/delete/'.$row['id']) ?>" onclick="return confirm('Hapus data ini?')"
                    class="btn btn-sm btn-danger">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>