<!-- app/Views/pages/lektor/create.php -->
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?php $errors = session()->getFlashdata('errors') ?? []; ?>

<div class="container mt-4">
    <h2><?= esc($title) ?></h2>

    <?php if ($errors): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $err): ?>
            <li><?= esc($err) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
    <?php endif ?>

    <form action="<?= site_url('lektor/store') ?>" method="post">
        <?= csrf_field() ?>

        <!-- Nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama"
                class="form-control <?= isset($errors['nama']) ? 'is-invalid' : '' ?>" value="<?= old('nama') ?>"
                placeholder="Masukkan nama lektor">
            <?php if (isset($errors['nama'])): ?>
            <div class="invalid-feedback"><?= esc($errors['nama']) ?></div>
            <?php endif ?>
        </div>

        <!-- Tempat Lahir -->
        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir"
                class="form-control <?= isset($errors['tempat_lahir']) ? 'is-invalid' : '' ?>"
                value="<?= old('tempat_lahir') ?>" placeholder="Masukkan tempat lahir">
            <?php if (isset($errors['tempat_lahir'])): ?>
            <div class="invalid-feedback"><?= esc($errors['tempat_lahir']) ?></div>
            <?php endif ?>
        </div>

        <!-- Tanggal Lahir -->
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                class="form-control <?= isset($errors['tanggal_lahir']) ? 'is-invalid' : '' ?>"
                value="<?= old('tanggal_lahir') ?>">
            <?php if (isset($errors['tanggal_lahir'])): ?>
            <div class="invalid-feedback"><?= esc($errors['tanggal_lahir']) ?></div>
            <?php endif ?>
        </div>

        <!-- Jenis Kelamin -->
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin"
                class="form-select <?= isset($errors['jenis_kelamin']) ? 'is-invalid' : '' ?>">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="L" <?= old('jenis_kelamin') === 'L' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="P" <?= old('jenis_kelamin') === 'P' ? 'selected' : '' ?>>Perempuan</option>
            </select>
            <?php if (isset($errors['jenis_kelamin'])): ?>
            <div class="invalid-feedback"><?= esc($errors['jenis_kelamin']) ?></div>
            <?php endif ?>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select <?= isset($errors['status']) ? 'is-invalid' : '' ?>">
                <option value="">-- Pilih Status --</option>
                <option value="Aktif" <?= old('status') === 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                <option value="Tidak Aktif" <?= old('status') === 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif
                </option>
            </select>
            <?php if (isset($errors['status'])): ?>
            <div class="invalid-feedback"><?= esc($errors['status']) ?></div>
            <?php endif ?>
        </div>

        <!-- Tahun Masuk -->
        <div class="mb-3">
            <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
            <input type="number" name="tahun_masuk" id="tahun_masuk"
                class="form-control <?= isset($errors['tahun_masuk']) ? 'is-invalid' : '' ?>"
                value="<?= old('tahun_masuk') ?>" placeholder="Contoh: 2023">
            <?php if (isset($errors['tahun_masuk'])): ?>
            <div class="invalid-feedback"><?= esc($errors['tahun_masuk']) ?></div>
            <?php endif ?>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('lektor') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>