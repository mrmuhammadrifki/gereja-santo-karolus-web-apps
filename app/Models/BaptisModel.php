<?php

namespace App\Models;

use CodeIgniter\Model;

class BaptisModel extends Model
{
    protected $table         = 'baptis';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'ortu',
        'wali',
        'tgl_bpt',
        'lokasi_bpt',
        'petugas',
    ];
    protected $useTimestamps = true;

    protected $validationRules = [
        'nama'          => 'required|max_length[100]',
        'tempat_lahir'  => 'required|max_length[100]',
        'tgl_lahir'     => 'required|valid_date',
        'ortu'          => 'required|max_length[100]',
        'wali'          => 'required|max_length[100]',
        'tgl_bpt'       => 'required|valid_date',
        'lokasi_bpt'    => 'required|max_length[150]',
        'petugas'       => 'required|max_length[100]',
    ];

    protected $validationMessages = [
        'nama' => [
            'required'   => 'Nama harus diisi.',
            'max_length' => 'Maksimal 100 karakter.',
        ],
        'tempat_lahir' => [
            'required' => 'Tempat lahir harus diisi.',
        ],
        'tgl_lahir' => [
            'required' => 'Tanggal lahir harus diisi.',
        ],
        // Tambahkan pesan lain jika diperlukan
    ];
}