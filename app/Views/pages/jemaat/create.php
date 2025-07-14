<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?php $errors = session()->getFlashdata('errors') ?? []; ?>

<div class="container mt-4">
    <h2><?= esc($title) ?></h2>

    <form action="<?= site_url('jemaat/store') ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="id_kk" value="<?= esc($id_kk) ?>">

        <?php $fields = ['nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'telp', 'pekerjaan', 'rayon', 'status']; ?>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control <?= isset($errors['nama']) ? 'is-invalid' : '' ?>"
                value="<?= old('nama') ?>">
            <div class="invalid-feedback"><?= esc($errors['nama'] ?? '') ?></div>
        </div>

        <div class="mb-3">
            <label class="form-label">Tempat Lahir</label>
            <input type="text" name="tempat_lahir"
                class="form-control <?= isset($errors['tempat_lahir']) ? 'is-invalid' : '' ?>"
                value="<?= old('tempat_lahir') ?>">
            <div class="invalid-feedback"><?= esc($errors['tempat_lahir'] ?? '') ?></div>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir"
                class="form-control <?= isset($errors['tanggal_lahir']) ? 'is-invalid' : '' ?>"
                value="<?= old('tanggal_lahir') ?>">
            <div class="invalid-feedback"><?= esc($errors['tanggal_lahir'] ?? '') ?></div>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select <?= isset($errors['jenis_kelamin']) ? 'is-invalid' : '' ?>">
                <option value="">-- Pilih --</option>
                <option value="L" <?= old('jenis_kelamin') === 'L' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="P" <?= old('jenis_kelamin') === 'P' ? 'selected' : '' ?>>Perempuan</option>
            </select>
            <div class="invalid-feedback"><?= esc($errors['jenis_kelamin'] ?? '') ?></div>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat"
                class="form-control <?= isset($errors['alamat']) ? 'is-invalid' : '' ?>"><?= old('alamat') ?></textarea>
            <div class="invalid-feedback"><?= esc($errors['alamat'] ?? '') ?></div>
        </div>

        <div class="mb-3">
            <label class="form-label">No. Telepon</label>
            <input type="text" name="telp" class="form-control <?= isset($errors['telp']) ? 'is-invalid' : '' ?>"
                value="<?= old('telp') ?>">
            <div class="invalid-feedback"><?= esc($errors['telp'] ?? '') ?></div>
        </div>

        <div class="mb-3">
            <label class="form-label">Pekerjaan</label>
            <input type="text" name="pekerjaan"
                class="form-control <?= isset($errors['pekerjaan']) ? 'is-invalid' : '' ?>"
                value="<?= old('pekerjaan') ?>">
            <div class="invalid-feedback"><?= esc($errors['pekerjaan'] ?? '') ?></div>
        </div>

        <div class="mb-3">
            <label class="form-label">Rayon</label>
            <select name="rayon" class="form-select <?= isset($errors['rayon']) ? 'is-invalid' : '' ?>">
                <option value="">-- Pilih Rayon --</option>
                <?php foreach ($rayon as $r): ?>
                <option value="<?= esc($r['nama_rayon']) ?>" <?= old('rayon') === $r['nama_rayon'] ? 'selected' : '' ?>>
                    <?= esc($r['nama_rayon']) ?>
                </option>
                <?php endforeach ?>
            </select>
            <div class="invalid-feedback"><?= esc($errors['rayon'] ?? '') ?></div>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select <?= isset($errors['status']) ? 'is-invalid' : '' ?>">
                <option value="">-- Pilih Status --</option>
                <?php foreach (['Aktif', 'Tidak Aktif', 'Meninggal', 'Pindah'] as $s): ?>
                <option value="<?= $s ?>" <?= old('status') === $s ? 'selected' : '' ?>><?= $s ?></option>
                <?php endforeach ?>
            </select>
            <div class="invalid-feedback"><?= esc($errors['status'] ?? '') ?></div>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('jemaat/detail/' . $id_kk) ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>