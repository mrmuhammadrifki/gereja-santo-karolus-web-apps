<?php

namespace App\Models;

use CodeIgniter\Model;

class PengurapanModel extends Model
{
    protected $table         = 'pengurapan';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'nama',
        'umur',
        'alamat',
        'tgl_pengurapan',
        'petugas',
        'kondisi',
    ];
    protected $useTimestamps = true;

    protected $validationRules = [
        'nama'           => 'required|max_length[100]',
        'umur'           => 'required|integer|greater_than[0]',
        'alamat'         => 'required|max_length[255]',
        'tgl_pengurapan' => 'required|valid_date',
        'petugas'        => 'required|max_length[100]',
        'kondisi'        => 'required|max_length[255]',
    ];

    protected $validationMessages = [
        'nama' => [
            'required'   => 'Nama lengkap harus diisi.',
            'max_length' => 'Maksimal 100 karakter.',
        ],
        'umur' => [
            'required'     => 'Umur harus diisi.',
            'integer'      => 'Umur harus berupa angka.',
            'greater_than' => 'Umur harus lebih dari 0.',
        ],
        'alamat' => [
            'required'   => 'Alamat harus diisi.',
            'max_length' => 'Maksimal 255 karakter.',
        ],
        'tgl_pengurapan' => [
            'required' => 'Tanggal pengurapan harus diisi.',
        ],
        'petugas' => [
            'required'   => 'Nama imam/petugas harus diisi.',
            'max_length' => 'Maksimal 100 karakter.',
        ],
        'kondisi' => [
            'required'   => 'Kondisi kesehatan harus diisi.',
            'max_length' => 'Maksimal 255 karakter.',
        ],
    ];
}