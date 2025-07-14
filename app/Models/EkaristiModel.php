<?php

namespace App\Models;

use CodeIgniter\Model;

class EkaristiModel extends Model
{
    protected $table         = 'ekaristi';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'nama',
        'tempat_komuni',
        'tgl_komuni',
        'paroki_asal',
        'petugas',
    ];
    protected $useTimestamps = true;

    protected $validationRules = [
        'nama'           => 'required|max_length[100]',
        'tempat_komuni'  => 'required|max_length[150]',
        'tgl_komuni'     => 'required|valid_date',
        'paroki_asal'    => 'required|max_length[150]',
        'petugas'        => 'required|max_length[100]',
    ];

    protected $validationMessages = [
        'nama' => [
            'required'   => 'Nama lengkap harus diisi.',
            'max_length' => 'Maksimal 100 karakter.',
        ],
        'tempat_komuni' => [
            'required'   => 'Tempat penerimaan komuni harus diisi.',
        ],
        'tgl_komuni' => [
            'required'   => 'Tanggal penerimaan komuni harus diisi.',
        ],
        'paroki_asal' => [
            'required'   => 'Paroki/sekolah asal harus diisi.',
        ],
        'petugas' => [
            'required'   => 'Nama imam/petugas harus diisi.',
        ],
    ];
}