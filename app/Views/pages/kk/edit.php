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

    <form action="<?= site_url('kk/update/' . $kk['id']) ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="nama_kk" class="form-label">Nama KK</label>
            <input type="text" name="nama_kk" id="nama_kk"
                class="form-control <?= isset($errors['nama_kk']) ? 'is-invalid' : '' ?>"
                value="<?= old('nama_kk', $kk['nama_kk']) ?>">
            <div class="invalid-feedback"><?= esc($errors['nama_kk'] ?? '') ?></div>
        </div>

        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir"
                class="form-control <?= isset($errors['tempat_lahir']) ? 'is-invalid' : '' ?>"
                value="<?= old('tempat_lahir', $kk['tempat_lahir']) ?>">
            <div class="invalid-feedback"><?= esc($errors['tempat_lahir'] ?? '') ?></div>
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                class="form-control <?= isset($errors['tanggal_lahir']) ? 'is-invalid' : '' ?>"
                value="<?= old('tanggal_lahir', $kk['tanggal_lahir']) ?>">
            <div class="invalid-feedback"><?= esc($errors['tanggal_lahir'] ?? '') ?></div>
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin"
                class="form-select <?= isset($errors['jenis_kelamin']) ? 'is-invalid' : '' ?>">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="L" <?= old('jenis_kelamin', $kk['jenis_kelamin']) === 'L' ? 'selected' : '' ?>>Laki-laki
                </option>
                <option value="P" <?= old('jenis_kelamin', $kk['jenis_kelamin']) === 'P' ? 'selected' : '' ?>>Perempuan
                </option>
            </select>
            <div class="invalid-feedback"><?= esc($errors['jenis_kelamin'] ?? '') ?></div>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control <?= isset($errors['alamat']) ? 'is-invalid' : '' ?>"
                rows="3"><?= old('alamat', $kk['alamat']) ?></textarea>
            <div class="invalid-feedback"><?= esc($errors['alamat'] ?? '') ?></div>
        </div>

        <div class="mb-3">
            <label for="telp" class="form-label">No. Telepon</label>
            <input type="text" name="telp" id="telp"
                class="form-control <?= isset($errors['telp']) ? 'is-invalid' : '' ?>"
                value="<?= old('telp', $kk['telp']) ?>">
            <div class="invalid-feedback"><?= esc($errors['telp'] ?? '') ?></div>
        </div>

        <div class="mb-3">
            <label for="pekerjaan" class="form-label">Pekerjaan</label>
            <input type="text" name="pekerjaan" id="pekerjaan"
                class="form-control <?= isset($errors['pekerjaan']) ? 'is-invalid' : '' ?>"
                value="<?= old('pekerjaan', $kk['pekerjaan']) ?>">
            <div class="invalid-feedback"><?= esc($errors['pekerjaan'] ?? '') ?></div>
        </div>

        <div class="mb-3">
            <label for="rayon" class="form-label">Rayon</label>
            <select name="rayon" id="rayon" class="form-select <?= isset($errors['rayon']) ? 'is-invalid' : '' ?>">
                <option value="">-- Pilih Rayon --</option>
                <?php foreach ($rayon as $r): ?>
                <option value="<?= esc($r['nama_rayon']) ?>"
                    <?= old('rayon', $kk['rayon']) === $r['nama_rayon'] ? 'selected' : '' ?>>
                    <?= esc($r['nama_rayon']) ?>
                </option>
                <?php endforeach ?>
            </select>
            <div class="invalid-feedback"><?= esc($errors['rayon'] ?? '') ?></div>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select <?= isset($errors['status']) ? 'is-invalid' : '' ?>">
                <option value="">-- Pilih Status --</option>
                <option value="Aktif" <?= old('status', $kk['status']) === 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                <option value="Tidak Aktif" <?= old('status', $kk['status']) === 'Tidak Aktif' ? 'selected' : '' ?>>
                    Tidak Aktif</option>
                <option value="Meninggal" <?= old('status', $kk['status']) === 'Meninggal' ? 'selected' : '' ?>>
                    Meninggal</option>
                <option value="Pindah" <?= old('status', $kk['status']) === 'Pindah' ? 'selected' : '' ?>>Pindah
                </option>
            </select>
            <div class="invalid-feedback"><?= esc($errors['status'] ?? '') ?></div>
        </div>


        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= site_url('kk') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>