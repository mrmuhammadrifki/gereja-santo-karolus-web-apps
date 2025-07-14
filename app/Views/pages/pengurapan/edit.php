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

    <form action="<?= site_url('pengurapan/update/'.$pengurapan['id']) ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Nama Pasien</label>
            <input type="text" name="nama" class="form-control <?= isset($errors['nama']) ? 'is-invalid' : '' ?>"
                value="<?= old('nama', $pengurapan['nama']) ?>">
            <?php if (isset($errors['nama'])): ?>
            <div class="invalid-feedback"><?= esc($errors['nama']) ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3 row">
            <div class="col-md-4">
                <label class="form-label">Umur</label>
                <input type="number" name="umur" class="form-control <?= isset($errors['umur']) ? 'is-invalid' : '' ?>"
                    value="<?= old('umur', $pengurapan['umur']) ?>">
                <?php if (isset($errors['umur'])): ?>
                <div class="invalid-feedback"><?= esc($errors['umur']) ?></div>
                <?php endif ?>
            </div>
            <div class="col-md-8">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat"
                    class="form-control <?= isset($errors['alamat']) ? 'is-invalid' : '' ?>"
                    value="<?= old('alamat', $pengurapan['alamat']) ?>">
                <?php if (isset($errors['alamat'])): ?>
                <div class="invalid-feedback"><?= esc($errors['alamat']) ?></div>
                <?php endif ?>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Pengurapan</label>
            <input type="date" name="tgl_pengurapan"
                class="form-control <?= isset($errors['tgl_pengurapan']) ? 'is-invalid' : '' ?>"
                value="<?= old('tgl_pengurapan', $pengurapan['tgl_pengurapan']) ?>">
            <?php if (isset($errors['tgl_pengurapan'])): ?>
            <div class="invalid-feedback"><?= esc($errors['tgl_pengurapan']) ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Imam/Petugas</label>
            <input type="text" name="petugas" class="form-control <?= isset($errors['petugas']) ? 'is-invalid' : '' ?>"
                value="<?= old('petugas', $pengurapan['petugas']) ?>">
            <?php if (isset($errors['petugas'])): ?>
            <div class="invalid-feedback"><?= esc($errors['petugas']) ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Kondisi Kesehatan</label>
            <input type="text" name="kondisi" class="form-control <?= isset($errors['kondisi']) ? 'is-invalid' : '' ?>"
                value="<?= old('kondisi', $pengurapan['kondisi']) ?>">
            <?php if (isset($errors['kondisi'])): ?>
            <div class="invalid-feedback"><?= esc($errors['kondisi']) ?></div>
            <?php endif ?>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="<?= site_url('pengurapan') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>