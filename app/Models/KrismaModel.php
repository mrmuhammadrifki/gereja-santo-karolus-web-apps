<?php

namespace App\Models;

use CodeIgniter\Model;

class KrismaModel extends Model
{
    protected $table         = 'krisma';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'nama', 'tempat_krisma', 'tgl_krisma',
        'ortu', 'wali', 'petugas', 'paroki_asal',
    ];
    protected $useTimestamps = true;

    protected $validationRules = [
        'nama'          => 'required|max_length[100]',
        'tempat_krisma' => 'required|max_length[150]',
        'tgl_krisma'    => 'required|valid_date',
        'ortu'          => 'required|max_length[100]',
        'wali'          => 'required|max_length[100]',
        'petugas'       => 'required|max_length[100]',
        'paroki_asal'   => 'required|max_length[150]',
    ];

    protected $validationMessages = [
        'nama' => [
            'required'   => 'Nama lengkap harus diisi.',
            'max_length' => 'Maksimal 100 karakter.',
        ],
        'tempat_krisma' => [
            'required'   => 'Tempat krisma harus diisi.',
        ],
        'tgl_krisma' => [
            'required' => 'Tanggal krisma harus diisi.',
        ],
    ];
}