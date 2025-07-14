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

    <form action="<?= site_url('keuangan/store') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Jenis</label>
            <select name="jenis" class="form-select <?= isset($errors['jenis']) ? 'is-invalid' : '' ?>">
                <option value="">-- Pilih Jenis --</option>
                <option value="pemasukan" <?= old('jenis')==='pemasukan' ? 'selected' : '' ?>>Pemasukan</option>
                <option value="pengeluaran" <?= old('jenis')==='pengeluaran' ? 'selected' : '' ?>>Pengeluaran</option>
            </select>
            <?php if (isset($errors['jenis'])): ?>
            <div class="invalid-feedback"><?= esc($errors['jenis']) ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Nominal</label>
            <input type="number" step="1" name="harga"
                class="form-control <?= isset($errors['harga']) ? 'is-invalid' : '' ?>" value="<?= old('harga') ?>">
            <?php if (isset($errors['harga'])): ?>
            <div class="invalid-feedback"><?= esc($errors['harga']) ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori"
                class="form-control <?= isset($errors['kategori']) ? 'is-invalid' : '' ?>"
                value="<?= old('kategori') ?>">
            <?php if (isset($errors['kategori'])): ?>
            <div class="invalid-feedback"><?= esc($errors['kategori']) ?></div>
            <?php endif ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control <?= isset($errors['keterangan']) ? 'is-invalid' : '' ?>"
                rows="3"><?= old('keterangan') ?></textarea>
            <?php if (isset($errors['keterangan'])): ?>
            <div class="invalid-feedback"><?= esc($errors['keterangan']) ?></div>
            <?php endif ?>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('keuangan') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>