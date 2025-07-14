<?php

namespace App\Models;

use CodeIgniter\Model;

class PerkawinanModel extends Model
{
    protected $table         = 'perkawinan';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'nama_pria','tempat_lhr_pria','tgl_lhr_pria','paroki_pria','ortu_pria',
        'nama_wanita','tempat_lhr_wanita','tgl_lhr_wanita','paroki_wanita','ortu_wanita',
        'tempat_nikah','tgl_nikah','petugas','status_pria','status_wanita','saksi',
    ];
    protected $useTimestamps = true;

    protected $validationRules = [
        'nama_pria'         => 'required|max_length[100]',
        'tempat_lhr_pria'   => 'required|max_length[100]',
        'tgl_lhr_pria'      => 'required|valid_date',
        'paroki_pria'       => 'required|max_length[150]',
        'ortu_pria'         => 'required|max_length[150]',

        'nama_wanita'       => 'required|max_length[100]',
        'tempat_lhr_wanita' => 'required|max_length[100]',
        'tgl_lhr_wanita'    => 'required|valid_date',
        'paroki_wanita'     => 'required|max_length[150]',
        'ortu_wanita'       => 'required|max_length[150]',

        'tempat_nikah'      => 'required|max_length[150]',
        'tgl_nikah'         => 'required|valid_date',
        'petugas'           => 'required|max_length[100]',
        'status_pria'       => 'required|max_length[50]',
        'status_wanita'     => 'required|max_length[50]',
        'saksi'             => 'required|max_length[255]',
    ];

    protected $validationMessages = [
        'nama_pria' => [
            'required'   => 'Nama mempelai pria harus diisi.',
            'max_length' => 'Maksimal 100 karakter.',
        ],
        'tgl_lhr_pria' => [
            'required' => 'Tanggal lahir pria harus diisi.',
        ],
    ];
}