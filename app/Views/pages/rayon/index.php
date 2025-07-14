<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h1><?= esc($title) ?></h1>

<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif ?>

<p>
    <a href="<?= site_url('rayon/create') ?>" class="btn btn-primary me-2">Tambah Rayon</a>
    <a href="<?= site_url('rayon/pdf') ?>" target="_blank" class="btn btn-danger">
        <i class="fas fa-file-pdf"></i> Cetak PDF
    </a>
</p>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Rayon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rayon as $r): ?>
        <tr>
            <td><?= $r['id'] ?></td>
            <td><?= esc($r['nama_rayon']) ?></td>
            <td>
                <a href="<?= site_url('rayon/edit/'.$r['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="<?= site_url('rayon/delete/'.$r['id']) ?>" class="btn btn-sm btn-danger"
                    onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>