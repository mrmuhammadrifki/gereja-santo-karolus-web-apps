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

    <form action="<?= site_url('perkawinan/update/'.$perkawinan['id']) ?>" method="post">
        <?= csrf_field() ?>

        <div class="row">
            <div class="col-md-6">
                <h5>Mempelai Pria</h5>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama_pria"
                        class="form-control <?= isset($errors['nama_pria'])?'is-invalid':'' ?>"
                        value="<?= old('nama_pria',$perkawinan['nama_pria']) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lhr_pria"
                        class="form-control <?= isset($errors['tempat_lhr_pria'])?'is-invalid':'' ?>"
                        value="<?= old('tempat_lhr_pria',$perkawinan['tempat_lhr_pria']) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tgl Lahir</label>
                    <input type="date" name="tgl_lhr_pria"
                        class="form-control <?= isset($errors['tgl_lhr_pria'])?'is-invalid':'' ?>"
                        value="<?= old('tgl_lhr_pria',$perkawinan['tgl_lhr_pria']) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Paroki Asal</label>
                    <input type="text" name="paroki_pria"
                        class="form-control <?= isset($errors['paroki_pria'])?'is-invalid':'' ?>"
                        value="<?= old('paroki_pria',$perkawinan['paroki_pria']) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ortu</label>
                    <input type="text" name="ortu_pria"
                        class="form-control <?= isset($errors['ortu_pria'])?'is-invalid':'' ?>"
                        value="<?= old('ortu_pria',$perkawinan['ortu_pria']) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Status Baptis/Krisma</label>
                    <input type="text" name="status_pria"
                        class="form-control <?= isset($errors['status_pria'])?'is-invalid':'' ?>"
                        value="<?= old('status_pria',$perkawinan['status_pria']) ?>">
                </div>
            </div>

            <div class="col-md-6">
                <h5>Mempelai Wanita</h5>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama_wanita"
                        class="form-control <?= isset($errors['nama_wanita'])?'is-invalid':'' ?>"
                        value="<?= old('nama_wanita',$perkawinan['nama_wanita']) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lhr_wanita"
                        class="form-control <?= isset($errors['tempat_lhr_wanita'])?'is-invalid':'' ?>"
                        value="<?= old('tempat_lhr_wanita',$perkawinan['tempat_lhr_wanita']) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tgl Lahir</label>
                    <input type="date" name="tgl_lhr_wanita"
                        class="form-control <?= isset($errors['tgl_lhr_wanita'])?'is-invalid':'' ?>"
                        value="<?= old('tgl_lhr_wanita',$perkawinan['tgl_lhr_wanita']) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Paroki Asal</label>
                    <input type="text" name="paroki_wanita"
                        class="form-control <?= isset($errors['paroki_wanita'])?'is-invalid':'' ?>"
                        value="<?= old('paroki_wanita',$perkawinan['paroki_wanita']) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ortu</label>
                    <input type="text" name="ortu_wanita"
                        class="form-control <?= isset($errors['ortu_wanita'])?'is-invalid':'' ?>"
                        value="<?= old('ortu_wanita',$perkawinan['ortu_wanita']) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Status Baptis/Krisma</label>
                    <input type="text" name="status_wanita"
                        class="form-control <?= isset($errors['status_wanita'])?'is-invalid':'' ?>"
                        value="<?= old('status_wanita',$perkawinan['status_wanita']) ?>">
                </div>
            </div>
        </div>

        <h5 class="mt-4">Detil Pernikahan</h5>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Tempat Pernikahan</label>
                <input type="text" name="tempat_nikah"
                    class="form-control <?= isset($errors['tempat_nikah'])?'is-invalid':'' ?>"
                    value="<?= old('tempat_nikah',$perkawinan['tempat_nikah']) ?>">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Tanggal Pernikahan</label>
                <input type="date" name="tgl_nikah"
                    class="form-control <?= isset($errors['tgl_nikah'])?'is-invalid':'' ?>"
                    value="<?= old('tgl_nikah',$perkawinan['tgl_nikah']) ?>">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Imam/Petugas</label>
            <input type="text" name="petugas" class="form-control <?= isset($errors['petugas'])?'is-invalid':'' ?>"
                value="<?= old('petugas',$perkawinan['petugas']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Saksi Pernikahan</label>
            <input type="text" name="saksi" class="form-control <?= isset($errors['saksi'])?'is-invalid':'' ?>"
                value="<?= old('saksi',$perkawinan['saksi']) ?>">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="<?= site_url('perkawinan') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>