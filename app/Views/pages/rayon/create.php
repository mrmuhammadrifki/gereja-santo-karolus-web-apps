<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2><?= esc($title) ?></h2>

    <?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach (session('errors') as $error): ?>
            <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
    <?php endif ?>

    <form action="<?= site_url('rayon/store') ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="nama_rayon" class="form-label">Nama Rayon</label>
            <input type="text" name="nama_rayon" id="nama_rayon"
                class="form-control <?= isset(session('errors')['nama_rayon']) ? 'is-invalid' : '' ?>"
                value="<?= old('nama_rayon') ?>" placeholder="Masukkan nama rayon…">
            <?php if (isset(session('errors')['nama_rayon'])): ?>
            <div class="invalid-feedback">
                <?= session('errors')['nama_rayon'] ?>
            </div>
            <?php endif ?>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('rayon') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>