<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2><?= esc($title) ?></h2>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif ?>

    <p>
        <a href="<?= site_url('jemaat/create/' . $kk['id']) ?>" class="btn btn-primary mb-3 me-2">Tambah Anggota</a>
        <a href="<?= site_url('jemaat/pdf/'.$kk['id']) ?>" target="_blank" class="btn btn-danger mb-3">
            <i class="fas fa-file-pdf"></i> Cetak PDF
        </a>
    </p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>TTL</th>
                <th>JK</th>
                <th>Telp</th>
                <th>Rayon</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jemaat as $i => $j): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= esc($j['nama']) ?></td>
                <td><?= esc($j['tempat_lahir']) ?>, <?= esc($j['tanggal_lahir']) ?></td>
                <td><?= $j['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                <td><?= esc($j['telp']) ?></td>
                <td><?= esc($j['rayon']) ?></td>
                <td><?= esc($j['status']) ?></td>
                <td>
                    <a href="<?= site_url('jemaat/edit/' . $j['id']) ?>" class="btn btn-warning btn-sm mb-2">Edit</a>
                    <a href="<?= site_url('jemaat/delete/' . $j['id']) ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>