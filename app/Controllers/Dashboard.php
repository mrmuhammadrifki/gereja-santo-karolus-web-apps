<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RayonModel;
use App\Models\DataKKModel;
use App\Models\JemaatModel;
use App\Models\BaptisModel;
use App\Models\KrismaModel;
use App\Models\EkaristiModel;
use App\Models\TobatModel;
use App\Models\PengurapanModel;
use App\Models\ImamatModel;
use App\Models\PerkawinanModel;
use App\Models\LektorModel;
use App\Models\MajelisModel;
use App\Models\UserModel;
use App\Models\KeuanganModel;

class Dashboard extends BaseController
{
       public function __construct()
    {
        // Cek apakah user sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Please login first');
        }
    }

      public function index()
    {
        $metrics = [
            [
                'label' => 'Rayon',
                'count' => (new RayonModel())->countAll(),
                'icon'  => 'fa-map-marker-alt',
                'url'   => site_url('rayon'),
                'color' => 'info',
            ],
            [
                'label' => 'KK',
                'count' => (new DataKKModel())->countAll(),
                'icon'  => 'fa-users',
                'url'   => site_url('kk'),
                'color' => 'primary',
            ],
            [
                'label' => 'Jemaat',
                'count' => (new JemaatModel())->countAll(),
                'icon'  => 'fa-user-friends',
                'url'   => site_url('jemaat'),
                'color' => 'success',
            ],
            [
                'label' => 'Baptis',
                'count' => (new BaptisModel())->countAll(),
                'icon'  => 'fa-tint',     
                'url'   => site_url('baptis'),
                'color' => 'secondary',
            ],
            [
                'label' => 'Krisma',
                'count' => (new KrismaModel())->countAll(),
                'icon'  => 'fa-hands-helping',
                'url'   => site_url('krisma'),
                'color' => 'warning',
            ],
            [
                'label' => 'Ekaristi',
                'count' => (new EkaristiModel())->countAll(),
                'icon'  => 'fa-church',
                'url'   => site_url('ekaristi'),
                'color' => 'danger',
            ],
            [
                'label' => 'Tobat',
                'count' => (new TobatModel())->countAll(),
                'icon'  => 'fa-hands',
                'url'   => site_url('tobat'),
                'color' => 'dark',
            ],
            [
                'label' => 'Pengurapan',
                'count' => (new PengurapanModel())->countAll(),
                'icon'  => 'fa-hand-holding',
                'url'   => site_url('pengurapan'),
                'color' => 'info',
            ],
            [
                'label' => 'Imamat',
                'count' => (new ImamatModel())->countAll(),
                'icon'  => 'fa-user-md',    
                'url'   => site_url('imamat'),
                'color' => 'primary',
            ],
            [
                'label' => 'Perkawinan',
                'count' => (new PerkawinanModel())->countAll(),
                 'icon'  => 'fa-heart', 
                'url'   => site_url('perkawinan'),
                'color' => 'success',
            ],
            [
                'label' => 'Lektor',
                'count' => (new LektorModel())->countAll(),
                'icon'  => 'fa-book-open',
                'url'   => site_url('lektor'),
                'color' => 'secondary',
            ],
            [
                'label' => 'Majelis',
                'count' => (new MajelisModel())->countAll(),
                'icon'  => 'fa-users-cog',
                'url'   => site_url('majelis'),
                'color' => 'warning',
            ],
            [
                'label' => 'Users',
                'count' => (new UserModel())->countAll(),
                'icon'  => 'fa-user',
                'url'   => site_url('user'),
                'color' => 'danger',
            ],
            [
                'label' => 'Transaksi',
                'count' => (new KeuanganModel())->countAll(),
                'icon'  => 'fa-wallet',
                'url'   => site_url('keuangan'),
                'color' => 'dark',
            ],
        ];

        return view('dashboard', [
            'title'   => 'Dashboard',
            'metrics' => $metrics,
        ]);
    }
}