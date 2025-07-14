<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <div class="logo-header d-flex align-items-center justify-content-between px-3" data-background-color="dark"
            style="height: 60px;">
            <div class="d-flex align-items-center">
                <a href="<?= site_url('dashboard') ?>" class="logo text-white text-decoration-none">
                    <p class="m-0" style="font-family: Raleway; font-weight: 500;">Gereja Santo Harolus</p>
                </a>
            </div>
            <div class="d-flex align-items-center">
                <button class="btn btn-toggle toggle-sidebar me-2">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="topbar-toggler more">
                    <i class="gg-more-vertical-alt"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="<?= site_url('dashboard') ?>">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section px-3">
                    <hr>
                </li>
                <!-- Master Data -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#master">
                        <i class="fas fa-book"></i>
                        <p>Master Data <span class="caret"></span></p>
                    </a>
                    <div class="collapse" id="master">
                        <ul class="nav nav-collapse">
                            <li><a href="<?= site_url('lektor') ?>"><span class="sub-item">Lektor</span></a></li>
                            <li><a href="<?= site_url('rayon') ?>"><span class="sub-item">Rayon</span></a></li>
                            <li><a href="<?= site_url('majelis') ?>"><span class="sub-item">Majelis</span></a></li>
                            <li><a href="<?= site_url('kk') ?>"><span class="sub-item">Data KK</span></a></li>
                        </ul>
                    </div>
                </li>
                <!-- Data Induk -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#induk">
                        <i class="fas fa-file"></i>
                        <p>Data Induk <span class="caret"></span></p>
                    </a>
                    <div class="collapse" id="induk">
                        <ul class="nav nav-collapse">
                            <li><a href="<?= site_url('jemaat') ?>"><span class="sub-item">Jemaat</span></a></li>
                        </ul>
                    </div>
                </li>
                <!-- Sakramen -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#sakramen">
                        <i class="fas fa-layer-group"></i>
                        <p>Sakramen <span class="caret"></span></p>
                    </a>
                    <div class="collapse" id="sakramen">
                        <ul class="nav nav-collapse">
                            <?php foreach (['Baptis','Ekaristi','Imamat','Perkawinan','Krisma','Tobat','Pengurapan'] as $s): ?>
                            <li><a href="<?= site_url(strtolower($s)) ?>"><span class="sub-item"><?= $s ?></span></a>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </li>
                <!-- Keuangan -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#money">
                        <i class="fas fa-money-bill"></i>
                        <p>Keuangan <span class="caret"></span></p>
                    </a>
                    <div class="collapse" id="money">
                        <ul class="nav nav-collapse">
                            <li><a href="<?= site_url('keuangan') ?>"><span class="sub-item">Transaksi</span></a></li>
                        </ul>
                    </div>
                </li>
                <!-- Cetak -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#print">
                        <i class="fas fa-print"></i>
                        <p>Cetak <span class="caret"></span></p>
                    </a>
                    <div class="collapse" id="print">
                        <ul class="nav nav-collapse">
                            <li><a href="<?= site_url('print/jemaat') ?>"><span class="sub-item">Jemaat</span></a></li>
                            <li><a href="<?= site_url('print/keuangan') ?>"><span class="sub-item">Laporan
                                        Keuangan</span></a></li>
                        </ul>
                    </div>
                </li>
                <!-- User -->
                <li class="nav-item">
                    <a href="<?= site_url('user') ?>">
                        <i class="fas fa-user-plus"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-section px-3">
                    <hr>
                </li>
                <!-- Logout -->
                <li class="nav-item">
                    <a href="<?= site_url('logout') ?>">
                        <i class="fas fa-arrow-circle-left"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>