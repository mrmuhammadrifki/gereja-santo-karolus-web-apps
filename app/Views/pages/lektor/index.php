<!-- app/Views/pages/lektor/index.php -->
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2><?= esc($title) ?></h2>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif ?>

    <p class="mb-3"><a href="<?= site_url('lektor/create') ?>" class="btn btn-primary me-3">Tambah Lektor</a><a
            href="<?= site_url('lektor/pdf') ?>" target="_blank" class="btn btn-danger">
            <i class="fas fa-file-pdf"></i> Cetak PDF
        </a></p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>JK</th>
                <th>Status</th>
                <th>Tahun Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lektor as $l): ?>
            <tr>
                <td><?= $l['id'] ?></td>
                <td><?= esc($l['nama']) ?></td>
                <td><?= esc($l['tempat_lahir']) ?></td>
                <td><?= esc($l['tanggal_lahir']) ?></td>
                <td><?= esc($l['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan') ?></td>
                <td><?= esc($l['status']) ?></td>
                <td><?= esc($l['tahun_masuk']) ?></td>
                <td>
                    <a href="<?= site_url('lektor/edit/'.$l['id']) ?>" class="btn btn-sm btn-warning mb-2">Edit</a>
                    <a href="<?= site_url('lektor/delete/'.$l['id']) ?>" class="btn btn-sm btn-danger"
                        onclick="return confirm('Yakin ingin hapus?')">
                        Hapus
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>