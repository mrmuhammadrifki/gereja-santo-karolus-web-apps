<?php

namespace App\Models;

use CodeIgniter\Model;

class ImamatModel extends Model
{
    protected $table         = 'imamat';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'nama',
        'tempat_tahbisan',
        'tgl_tahbisan',
        'penahbis',
    ];
    protected $useTimestamps = true;

    protected $validationRules = [
        'nama'            => 'required|max_length[100]',
        'tempat_tahbisan' => 'required|max_length[150]',
        'tgl_tahbisan'    => 'required|valid_date',
        'penahbis'        => 'required|max_length[100]',
    ];

    protected $validationMessages = [
        'nama' => [
            'required'   => 'Nama lengkap calon imam harus diisi.',
            'max_length' => 'Maksimal 100 karakter.',
        ],
        'tempat_tahbisan' => [
            'required'   => 'Tempat tahbisan harus diisi.',
        ],
        'tgl_tahbisan' => [
            'required'   => 'Tanggal tahbisan harus diisi.',
        ],
        'penahbis' => [
            'required'   => 'Nama uskup penahbis harus diisi.',
        ],
    ];
}