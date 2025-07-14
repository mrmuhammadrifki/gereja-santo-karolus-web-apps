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

    <form action="<?= site_url('perkawinan/store') ?>" method="post">
        <?= csrf_field() ?>

        <div class="row">
            <div class="col-md-6">
                <h5>Mempelai Pria</h5>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama_pria"
                        class="form-control <?= isset($errors['nama_pria'])?'is-invalid':'' ?>"
                        value="<?= old('nama_pria') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lhr_pria"
                        class="form-control <?= isset($errors['tempat_lhr_pria'])?'is-invalid':'' ?>"
                        value="<?= old('tempat_lhr_pria') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tgl Lahir</label>
                    <input type="date" name="tgl_lhr_pria"
                        class="form-control <?= isset($errors['tgl_lhr_pria'])?'is-invalid':'' ?>"
                        value="<?= old('tgl_lhr_pria') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Paroki Asal</label>
                    <input type="text" name="paroki_pria"
                        class="form-control <?= isset($errors['paroki_pria'])?'is-invalid':'' ?>"
                        value="<?= old('paroki_pria') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ortu</label>
                    <input type="text" name="ortu_pria"
                        class="form-control <?= isset($errors['ortu_pria'])?'is-invalid':'' ?>"
                        value="<?= old('ortu_pria') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Status Baptis/Krisma</label>
                    <input type="text" name="status_pria"
                        class="form-control <?= isset($errors['status_pria'])?'is-invalid':'' ?>"
                        value="<?= old('status_pria') ?>">
                </div>
            </div>

            <div class="col-md-6">
                <h5>Mempelai Wanita</h5>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama_wanita"
                        class="form-control <?= isset($errors['nama_wanita'])?'is-invalid':'' ?>"
                        value="<?= old('nama_wanita') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lhr_wanita"
                        class="form-control <?= isset($errors['tempat_lhr_wanita'])?'is-invalid':'' ?>"
                        value="<?= old('tempat_lhr_wanita') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tgl Lahir</label>
                    <input type="date" name="tgl_lhr_wanita"
                        class="form-control <?= isset($errors['tgl_lhr_wanita'])?'is-invalid':'' ?>"
                        value="<?= old('tgl_lhr_wanita') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Paroki Asal</label>
                    <input type="text" name="paroki_wanita"
                        class="form-control <?= isset($errors['paroki_wanita'])?'is-invalid':'' ?>"
                        value="<?= old('paroki_wanita') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ortu</label>
                    <input type="text" name="ortu_wanita"
                        class="form-control <?= isset($errors['ortu_wanita'])?'is-invalid':'' ?>"
                        value="<?= old('ortu_wanita') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Status Baptis/Krisma</label>
                    <input type="text" name="status_wanita"
                        class="form-control <?= isset($errors['status_wanita'])?'is-invalid':'' ?>"
                        value="<?= old('status_wanita') ?>">
                </div>
            </div>
        </div>

        <h5 class="mt-4">Detil Pernikahan</h5>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Tempat Pernikahan</label>
                <input type="text" name="tempat_nikah"
                    class="form-control <?= isset($errors['tempat_nikah'])?'is-invalid':'' ?>"
                    value="<?= old('tempat_nikah') ?>">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Tanggal Pernikahan</label>
                <input type="date" name="tgl_nikah"
                    class="form-control <?= isset($errors['tgl_nikah'])?'is-invalid':'' ?>"
                    value="<?= old('tgl_nikah') ?>">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Imam/Petugas</label>
            <input type="text" name="petugas" class="form-control <?= isset($errors['petugas'])?'is-invalid':'' ?>"
                value="<?= old('petugas') ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Saksi Pernikahan</label>
            <input type="text" name="saksi" class="form-control <?= isset($errors['saksi'])?'is-invalid':'' ?>"
                value="<?= old('saksi') ?>">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('perkawinan') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>