<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <div class="logo-header d-flex align-items-center justify-content-between px-3" data-background-color="dark"
            style="height: 60px;">
            <button id="mobile-menu-toggle" class="btn btn-link text-white d-lg-none me-2">
                <i class="fas fa-bars fa-lg"></i>
            </button>
            <div class="d-flex align-items-center">
                <a href="<?= site_url('dashboard') ?>" class="logo text-white text-decoration-none">
                    <p class="m-0" style="font-family: Raleway; font-weight: 500;">Gereja Santo Karolus</p>
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
                        <i class="fas fa-home text-white"></i>
                        <p class="text-white">Dashboard</p>
                    </a>
                </li>
                <li class="nav-section px-3">
                    <hr>
                </li>
                <!-- Master Data -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#master">
                        <i class="fas fa-book text-white"></i>
                        <p class="text-white">Master Data <span class="caret text-white"></span></p>
                    </a>
                    <div class="collapse" id="master">
                        <ul class="nav nav-collapse">
                            <li><a href="<?= site_url('lektor') ?>"><span class="sub-item text-white">Lektor</span></a>
                            </li>
                            <li><a href="<?= site_url('rayon') ?>"><span class="sub-item text-white">Rayon</span></a>
                            </li>
                            <li><a href="<?= site_url('majelis') ?>"><span
                                        class="sub-item text-white">Majelis</span></a></li>
                            <li><a href="<?= site_url('kk') ?>"><span class="sub-item text-white">Data KK</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Data Induk -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#induk">
                        <i class="fas fa-file text-white"></i>
                        <p class="text-white">Data Induk <span class="caret text-white"></span></p>
                    </a>
                    <div class="collapse" id="induk">
                        <ul class="nav nav-collapse">
                            <li><a href="<?= site_url('jemaat') ?>"><span class="sub-item text-white">Jemaat</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Sakramen -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#sakramen">
                        <i class="fas fa-layer-group text-white"></i>
                        <p class="text-white">Sakramen <span class="caret text-white"></span></p>
                    </a>
                    <div class="collapse" id="sakramen">
                        <ul class="nav nav-collapse">
                            <?php foreach (['Baptis','Ekaristi','Imamat','Perkawinan','Krisma','Tobat','Pengurapan'] as $s): ?>
                            <li><a href="<?= site_url(strtolower($s)) ?>"><span
                                        class="sub-item text-white"><?= $s ?></span></a>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </li>
                <!-- Keuangan -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#money">
                        <i class="fas fa-money-bill text-white"></i>
                        <p class="text-white">Keuangan <span class="caret text-white"></span></p>
                    </a>
                    <div class="collapse" id="money">
                        <ul class="nav nav-collapse">
                            <li><a href="<?= site_url('keuangan') ?>"><span
                                        class="sub-item text-white">Transaksi</span></a></li>
                        </ul>
                    </div>
                </li>
                <!-- User -->
                <li class="nav-item">
                    <a href="<?= site_url('user') ?>">
                        <i class="fas fa-user-plus text-white"></i>
                        <p class="text-white">User</p>
                    </a>
                </li>
                <li class="nav-section px-3">
                    <hr>
                </li>
                <!-- Logout -->
                <li class="nav-item">
                    <a href="<?= site_url('logout') ?>">
                        <i class="fas fa-arrow-circle-left text-white"></i>
                        <p class="text-white">Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>