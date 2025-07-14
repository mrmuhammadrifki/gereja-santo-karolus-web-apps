<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h1><?= esc($title) ?></h1>

<?php $errors = session()->getFlashdata('errors') ?? []; ?>
<?php if ($errors): ?>
<div class="alert alert-danger">
    <ul class="mb-0">
        <?php foreach ($errors as $err): ?>
        <li><?= esc($err) ?></li>
        <?php endforeach ?>
    </ul>
</div>
<?php endif ?>

<form action="<?= site_url('user/store') ?>" method="post">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" value="<?= old('username') ?>"
            class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>">
        <?php if (isset($errors['username'])): ?>
        <div class="invalid-feedback"><?= esc($errors['username']) ?></div>
        <?php endif ?>
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password"
            class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>">
        <?php if (isset($errors['password'])): ?>
        <div class="invalid-feedback"><?= esc($errors['password']) ?></div>
        <?php endif ?>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= site_url('user') ?>" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection() ?>