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

    <form action="<?= site_url('tobat/store') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control <?= isset($errors['nama'])?'is-invalid':'' ?>"
                value="<?= old('nama') ?>">
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Tempat Penerimaan</label>
                <input type="text" name="tempat_tobat"
                    class="form-control <?= isset($errors['tempat_tobat'])?'is-invalid':'' ?>"
                    value="<?= old('tempat_tobat') ?>">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Tanggal Penerimaan</label>
                <input type="date" name="tgl_tobat"
                    class="form-control <?= isset($errors['tgl_tobat'])?'is-invalid':'' ?>"
                    value="<?= old('tgl_tobat') ?>">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Paroki / Sekolah Asal</label>
            <input type="text" name="paroki_asal"
                class="form-control <?= isset($errors['paroki_asal'])?'is-invalid':'' ?>"
                value="<?= old('paroki_asal') ?>">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('tobat') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>