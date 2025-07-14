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

    <form action="<?= site_url('majelis/update/' . $majelis['id']) ?>" method="post">
        <?= csrf_field() ?>

        <!-- Nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama"
                class="form-control <?= isset($errors['nama']) ? 'is-invalid' : '' ?>"
                value="<?= old('nama', $majelis['nama']) ?>" placeholder="Masukkan nama majelis">
            <?php if (isset($errors['nama'])): ?>
            <div class="invalid-feedback"><?= esc($errors['nama']) ?></div>
            <?php endif ?>
        </div>

        <!-- Rayon -->
        <div class="mb-3">
            <label for="rayon" class="form-label">Rayon</label>
            <select name="rayon" id="rayon" class="form-select <?= isset($errors['rayon']) ? 'is-invalid' : '' ?>">
                <option value="">-- Pilih Rayon --</option>
                <?php foreach ($rayon as $r): ?>
                <option value="<?= esc($r['nama_rayon']) ?>"
                    <?= old('rayon', $majelis['rayon']) === $r['nama_rayon'] ? 'selected' : '' ?>>
                    <?= esc($r['nama_rayon']) ?>
                </option>
                <?php endforeach ?>
            </select>
            <?php if (isset($errors['rayon'])): ?>
            <div class="invalid-feedback"><?= esc($errors['rayon']) ?></div>
            <?php endif ?>
        </div>

        <!-- Jenis Kelamin -->
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin"
                class="form-select <?= isset($errors['jenis_kelamin']) ? 'is-invalid' : '' ?>">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="L" <?= old('jenis_kelamin', $majelis['jenis_kelamin']) === 'L' ? 'selected' : '' ?>>
                    Laki-laki</option>
                <option value="P" <?= old('jenis_kelamin', $majelis['jenis_kelamin']) === 'P' ? 'selected' : '' ?>>
                    Perempuan</option>
            </select>
            <?php if (isset($errors['jenis_kelamin'])): ?>
            <div class="invalid-feedback"><?= esc($errors['jenis_kelamin']) ?></div>
            <?php endif ?>
        </div>

        <!-- Tahun Masuk -->
        <div class="mb-3">
            <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
            <input type="number" name="tahun_masuk" id="tahun_masuk"
                class="form-control <?= isset($errors['tahun_masuk']) ? 'is-invalid' : '' ?>"
                value="<?= old('tahun_masuk', $majelis['tahun_masuk']) ?>" placeholder="Contoh: 2024">
            <?php if (isset($errors['tahun_masuk'])): ?>
            <div class="invalid-feedback"><?= esc($errors['tahun_masuk']) ?></div>
            <?php endif ?>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= site_url('majelis') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>