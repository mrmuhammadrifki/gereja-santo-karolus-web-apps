<?php

namespace App\Models;

use CodeIgniter\Model;

class LektorModel extends Model
{
    protected $table         = 'lektor';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['nama','tempat_lahir', 'tanggal_lahir', 'jenis_kelamin','status','tahun_masuk'];
    protected $useTimestamps = true;

    protected $validationRules = [
        'nama'           => 'required|min_length[3]',
        'tempat_lahir'   => 'required|max_length[150]',
        'tanggal_lahir'  => 'required|valid_date[Y-m-d]',
        'jenis_kelamin'  => 'required|in_list[L,P]',
        'status'         => 'required|in_list[Aktif,Tidak Aktif]',
        'tahun_masuk'    => 'required|numeric|exact_length[4]',
    ];

    protected $validationMessages = [
        'nama' => [
            'required'   => 'Nama harus diisi.',
            'min_length' => 'Minimal 3 karakter.',
        ],
        'tahun_masuk' => [
            'exact_length' => 'Masukkan tahun 4 digit, misal 2023.',
        ],
    ];
}