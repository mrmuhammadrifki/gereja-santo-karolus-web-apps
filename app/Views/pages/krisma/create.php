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

    <form action="<?= site_url('krisma/store') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control <?= isset($errors['nama']) ? 'is-invalid' : '' ?>"
                value="<?= old('nama') ?>">
            <?php if (isset($errors['nama'])): ?>
            <div class="invalid-feedback"><?= esc($errors['nama']) ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">Tempat Krisma</label>
                <input type="text" name="tempat_krisma"
                    class="form-control <?= isset($errors['tempat_krisma']) ? 'is-invalid' : '' ?>"
                    value="<?= old('tempat_krisma') ?>">
                <?php if (isset($errors['tempat_krisma'])): ?>
                <div class="invalid-feedback"><?= esc($errors['tempat_krisma']) ?></div>
                <?php endif ?>
            </div>
            <div class="col">
                <label class="form-label">Tanggal Krisma</label>
                <input type="date" name="tgl_krisma"
                    class="form-control <?= isset($errors['tgl_krisma']) ? 'is-invalid' : '' ?>"
                    value="<?= old('tgl_krisma') ?>">
                <?php if (isset($errors['tgl_krisma'])): ?>
                <div class="invalid-feedback"><?= esc($errors['tgl_krisma']) ?></div>
                <?php endif ?>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Ortu</label>
            <input type="text" name="ortu" class="form-control <?= isset($errors['ortu']) ? 'is-invalid' : '' ?>"
                value="<?= old('ortu') ?>">
            <?php if (isset($errors['ortu'])): ?>
            <div class="invalid-feedback"><?= esc($errors['ortu']) ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Wali (Sponsor)</label>
            <input type="text" name="wali" class="form-control <?= isset($errors['wali']) ? 'is-invalid' : '' ?>"
                value="<?= old('wali') ?>">
            <?php if (isset($errors['wali'])): ?>
            <div class="invalid-feedback"><?= esc($errors['wali']) ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Uskup/Imam (Petugas)</label>
            <input type="text" name="petugas" class="form-control <?= isset($errors['petugas']) ? 'is-invalid' : '' ?>"
                value="<?= old('petugas') ?>">
            <?php if (isset($errors['petugas'])): ?>
            <div class="invalid-feedback"><?= esc($errors['petugas']) ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Paroki Asal</label>
            <input type="text" name="paroki_asal"
                class="form-control <?= isset($errors['paroki_asal']) ? 'is-invalid' : '' ?>"
                value="<?= old('paroki_asal') ?>">
            <?php if (isset($errors['paroki_asal'])): ?>
            <div class="invalid-feedback"><?= esc($errors['paroki_asal']) ?></div>
            <?php endif ?>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('krisma') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>