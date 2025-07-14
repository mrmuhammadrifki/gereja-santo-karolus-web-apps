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

    <form action="<?= site_url('ekaristi/update/'.$ekaristi['id']) ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control <?= isset($errors['nama']) ? 'is-invalid' : '' ?>"
                value="<?= old('nama', $ekaristi['nama']) ?>">
            <?php if (isset($errors['nama'])): ?>
            <div class="invalid-feedback"><?= esc($errors['nama']) ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">Tempat Komuni</label>
                <input type="text" name="tempat_komuni"
                    class="form-control <?= isset($errors['tempat_komuni']) ? 'is-invalid' : '' ?>"
                    value="<?= old('tempat_komuni', $ekaristi['tempat_komuni']) ?>">
                <?php if (isset($errors['tempat_komuni'])): ?>
                <div class="invalid-feedback"><?= esc($errors['tempat_komuni']) ?></div>
                <?php endif ?>
            </div>
            <div class="col">
                <label class="form-label">Tanggal Komuni</label>
                <input type="date" name="tgl_komuni"
                    class="form-control <?= isset($errors['tgl_komuni']) ? 'is-invalid' : '' ?>"
                    value="<?= old('tgl_komuni', $ekaristi['tgl_komuni']) ?>">
                <?php if (isset($errors['tgl_komuni'])): ?>
                <div class="invalid-feedback"><?= esc($errors['tgl_komuni']) ?></div>
                <?php endif ?>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Paroki/Sekolah Asal</label>
            <input type="text" name="paroki_asal"
                class="form-control <?= isset($errors['paroki_asal']) ? 'is-invalid' : '' ?>"
                value="<?= old('paroki_asal', $ekaristi['paroki_asal']) ?>">
            <?php if (isset($errors['paroki_asal'])): ?>
            <div class="invalid-feedback"><?= esc($errors['paroki_asal']) ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Imam/Petugas</label>
            <input type="text" name="petugas" class="form-control <?= isset($errors['petugas']) ? 'is-invalid' : '' ?>"
                value="<?= old('petugas', $ekaristi['petugas']) ?>">
            <?php if (isset($errors['petugas'])): ?>
            <div class="invalid-feedback"><?= esc($errors['petugas']) ?></div>
            <?php endif ?>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="<?= site_url('ekaristi') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>