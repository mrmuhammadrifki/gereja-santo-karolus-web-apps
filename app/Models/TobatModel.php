<?php

namespace App\Models;

use CodeIgniter\Model;

class TobatModel extends Model
{
    protected $table         = 'tobat';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'nama',
        'tempat_tobat',
        'tgl_tobat',
        'paroki_asal',
    ];
    protected $useTimestamps = true;

    protected $validationRules = [
        'nama'         => 'required|max_length[100]',
        'tempat_tobat' => 'required|max_length[150]',
        'tgl_tobat'    => 'required|valid_date',
        'paroki_asal'  => 'required|max_length[150]',
    ];

    protected $validationMessages = [
        'nama' => [
            'required'   => 'Nama lengkap harus diisi.',
            'max_length' => 'Maksimal 100 karakter.',
        ],
        'tempat_tobat' => [
            'required'   => 'Tempat penerimaan sakramen harus diisi.',
        ],
        'tgl_tobat' => [
            'required'   => 'Tanggal penerimaan harus diisi.',
        ],
        'paroki_asal' => [
            'required'   => 'Paroki/sekolah asal harus diisi.',
        ],
    ];
}