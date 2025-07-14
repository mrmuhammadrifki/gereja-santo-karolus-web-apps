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

    <form action="<?= site_url('imamat/store') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Nama Lengkap Calon Imam</label>
            <input type="text" name="nama" class="form-control <?= isset($errors['nama']) ? 'is-invalid' : '' ?>"
                value="<?= old('nama') ?>">
            <?php if (isset($errors['nama'])): ?>
            <div class="invalid-feedback"><?= esc($errors['nama']) ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">Tempat Tahbisan</label>
                <input type="text" name="tempat_tahbisan"
                    class="form-control <?= isset($errors['tempat_tahbisan']) ? 'is-invalid' : '' ?>"
                    value="<?= old('tempat_tahbisan') ?>">
                <?php if (isset($errors['tempat_tahbisan'])): ?>
                <div class="invalid-feedback"><?= esc($errors['tempat_tahbisan']) ?></div>
                <?php endif ?>
            </div>
            <div class="col">
                <label class="form-label">Tanggal Tahbisan</label>
                <input type="date" name="tgl_tahbisan"
                    class="form-control <?= isset($errors['tgl_tahbisan']) ? 'is-invalid' : '' ?>"
                    value="<?= old('tgl_tahbisan') ?>">
                <?php if (isset($errors['tgl_tahbisan'])): ?>
                <div class="invalid-feedback"><?= esc($errors['tgl_tahbisan']) ?></div>
                <?php endif ?>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Uskup Penahbis</label>
            <input type="text" name="penahbis"
                class="form-control <?= isset($errors['penahbis']) ? 'is-invalid' : '' ?>"
                value="<?= old('penahbis') ?>">
            <?php if (isset($errors['penahbis'])): ?>
            <div class="invalid-feedback"><?= esc($errors['penahbis']) ?></div>
            <?php endif ?>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('imamat') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>