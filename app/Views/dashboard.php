<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h1 class="mb-4"><?= esc($title) ?></h1>

<div class="row row-cols-1 row-cols-md-4 g-4">
    <?php foreach ($metrics as $m): ?>
    <div class="col">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body text-center">
                <i class="fas <?= $m['icon'] ?> fa-2x text-<?= $m['color'] ?> mb-3"></i>
                <h5 class="card-title"><?= esc($m['label']) ?></h5>
                <p class="display-6"><?= esc($m['count']) ?></p>
                <a href="<?= $m['url'] ?>" class="btn btn-<?= $m['color'] ?> btn-sm">
                    Lihat detail
                </a>
            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>

<?= $this->endSection() ?>