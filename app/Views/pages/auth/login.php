<?= $this->include('layouts/header'); ?>
<div class="container-fluid d-flex flex-column justify-content-center align-items-center" style="height: 100vh; ">
    <p class="h4 mb-5">Selamat Datang di Gereja Santo Karolus</p>
    <div class="card" style="width: 400px;">
        <div class="card-header text-center">
            <h4>Login</h4>
        </div>
        <div class="card-body">
            <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
            <?php endif; ?>
            <form method="POST" action="<?= site_url('auth/authenticate'); ?>">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-user-circle"></i>
                        </span>
                        <input type="text" class="form-control" id="username" name="username" required
                            placeholder="Masukkan username-mu">
                    </div>

                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-key"></i>
                        </span>
                        <input type="password" class="form-control" id="password" name="password" required
                            placeholder="Masukkan password-mu">
                    </div>

                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer'); ?>