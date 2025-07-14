<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2><?= esc($title) ?></h2>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif ?>

    <p>
        <a href="<?= site_url('majelis/create') ?>" class="btn btn-primary mb-3 me-3">Tambah Majelis</a>
        <a href="<?= site_url('majelis/pdf') ?>" target="_blank" class="btn btn-danger mb-3">
            <i class="fas fa-file-pdf"></i> Cetak PDF
        </a>

    </p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Rayon</th>
                <th>JK</th>
                <th>Tahun Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($majelis as $m): ?>
            <tr>
                <td><?= $m['id'] ?></td>
                <td><?= esc($m['nama']) ?></td>
                <td><?= esc($m['rayon']) ?></td>
                <td><?= esc($m['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan') ?></td>
                <td><?= esc($m['tahun_masuk']) ?></td>
                <td>
                    <a href="<?= site_url('majelis/edit/'.$m['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= site_url('majelis/delete/'.$m['id']) ?>" class="btn btn-sm btn-danger"
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