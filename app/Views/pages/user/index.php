<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h1><?= esc($title) ?></h1>

<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif ?>

<a href="<?= site_url('user/create') ?>" class="btn btn-primary mb-3">Tambah User</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= esc($u['username']) ?></td>
            <td>
                <a href="<?= site_url('user/edit/'.$u['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="<?= site_url('user/delete/'.$u['id']) ?>" onclick="return confirm('Hapus user?')"
                    class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>