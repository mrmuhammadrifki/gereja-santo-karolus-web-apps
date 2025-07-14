<?php

namespace App\Models;

use CodeIgniter\Model;

class MajelisModel extends Model
{
    protected $table            = 'majelis';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama', 'rayon', 'jenis_kelamin', 'tahun_masuk'];
    protected $useTimestamps    = true;

    protected $validationRules = [
        'nama'          => 'required|min_length[3]',
        'rayon'         => 'required',
        'jenis_kelamin' => 'required|in_list[L,P]',
        'tahun_masuk'   => 'required|numeric|exact_length[4]',
    ];

    protected $validationMessages = [
        'tahun_masuk' => [
            'exact_length' => 'Masukkan tahun 4 digit, contoh: 2025.',
        ],
    ];
}