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

    <form action="<?= site_url('baptis/update/'.$baptis['id']) ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama"
                class="form-control <?= isset($errors['nama']) ? 'is-invalid' : '' ?>"
                value="<?= old('nama', $baptis['nama']) ?>">
            <?php if (isset($errors['nama'])): ?>
            <div class="invalid-feedback"><?= esc($errors['nama']) ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir"
                class="form-control <?= isset($errors['tempat_lahir']) ? 'is-invalid' : '' ?>"
                value="<?= old('tempat_lahir', $baptis['tempat_lahir']) ?>">
            <?php if (isset($errors['tempat_lahir'])): ?>
            <div class="invalid-feedback"><?= esc($errors['tempat_lahir']) ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir"
                class="form-control <?= isset($errors['tgl_lahir']) ? 'is-invalid' : '' ?>"
                value="<?= old('tgl_lahir', $baptis['tgl_lahir']) ?>">
            <?php if (isset($errors['tgl_lahir'])): ?>
            <div class="invalid-feedback"><?= esc($errors['tgl_lahir']) ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label for="ortu" class="form-label">Nama Ortu</label>
            <input type="text" name="ortu" id="ortu"
                class="form-control <?= isset($errors['ortu']) ? 'is-invalid' : '' ?>"
                value="<?= old('ortu', $baptis['ortu']) ?>">
            <?php if (isset($errors['ortu'])): ?>
            <div class="invalid-feedback"><?= esc($errors['ortu']) ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label for="wali" class="form-label">Nama Wali</label>
            <input type="text" name="wali" id="wali"
                class="form-control <?= isset($errors['wali']) ? 'is-invalid' : '' ?>"
                value="<?= old('wali', $baptis['wali']) ?>">
            <?php if (isset($errors['wali'])): ?>
            <div class="invalid-feedback"><?= esc($errors['wali']) ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label for="tgl_bpt" class="form-label">Tanggal Baptis</label>
            <input type="date" name="tgl_bpt" id="tgl_bpt"
                class="form-control <?= isset($errors['tgl_bpt']) ? 'is-invalid' : '' ?>"
                value="<?= old('tgl_bpt', $baptis['tgl_bpt']) ?>">
            <?php if (isset($errors['tgl_bpt'])): ?>
            <div class="invalid-feedback"><?= esc($errors['tgl_bpt']) ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label for="lokasi_bpt" class="form-label">Lokasi Baptis</label>
            <input type="text" name="lokasi_bpt" id="lokasi_bpt"
                class="form-control <?= isset($errors['lokasi_bpt']) ? 'is-invalid' : '' ?>"
                value="<?= old('lokasi_bpt', $baptis['lokasi_bpt']) ?>">
            <?php if (isset($errors['lokasi_bpt'])): ?>
            <div class="invalid-feedback"><?= esc($errors['lokasi_bpt']) ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label for="petugas" class="form-label">Petugas</label>
            <input type="text" name="petugas" id="petugas"
                class="form-control <?= isset($errors['petugas']) ? 'is-invalid' : '' ?>"
                value="<?= old('petugas', $baptis['petugas']) ?>">
            <?php if (isset($errors['petugas'])): ?>
            <div class="invalid-feedback"><?= esc($errors['petugas']) ?></div>
            <?php endif ?>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="<?= site_url('baptis') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>