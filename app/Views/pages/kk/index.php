<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2><?= esc($title) ?></h2>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif ?>

    <p><a href="<?= site_url('kk/create') ?>" class="btn btn-primary mb-3 me-3">Tambah KK</a><a
            href="<?= site_url('kk/pdf') ?>" target="_blank" class="btn btn-danger mb-3">
            <i class="fas fa-file-pdf"></i> Cetak PDF
        </a>
    </p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama KK</th>
                <th>TTL</th>
                <th>JK</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Rayon</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kk as $k): ?>
            <tr>
                <td><?= $k['id'] ?></td>
                <td><?= esc($k['nama_kk']) ?></td>
                <td><?= esc($k['tempat_lahir']) ?>, <?= esc($k['tanggal_lahir']) ?></td>
                <td><?= esc($k['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan') ?></td>
                <td><?= esc($k['alamat']) ?></td>
                <td><?= esc($k['telp']) ?></td>
                <td><?= esc($k['rayon']) ?></td>
                <td><?= esc($k['status']) ?></td>
                <td>
                    <a href="<?= site_url('kk/edit/'.$k['id']) ?>" class="btn btn-sm btn-warning mb-2">Edit</a>
                    <a href="<?= site_url('kk/delete/'.$k['id']) ?>" class="btn btn-sm btn-danger"
                        onclick="return confirm('Hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>