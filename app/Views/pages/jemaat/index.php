<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2><?= esc($title) ?></h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama KK</th>
                <th>Alamat</th>
                <th>Rayon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kk as $i => $k): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= esc($k['nama_kk']) ?></td>
                <td><?= esc($k['alamat']) ?></td>
                <td><?= esc($k['rayon']) ?></td>
                <td>
                    <a href="<?= site_url('jemaat/detail/' . $k['id']) ?>" class="btn btn-sm btn-info">Lihat Anggota</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>