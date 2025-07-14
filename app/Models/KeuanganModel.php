<?php

namespace App\Models;

use CodeIgniter\Model;

class KeuanganModel extends Model
{
    protected $table         = 'keuangan';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'jenis',
        'harga',
        'kategori',
        'keterangan',
    ];
    protected $useTimestamps = true;

    protected $validationRules = [
        'jenis'      => 'required|in_list[pemasukan,pengeluaran]',
        'harga'      => 'required|decimal',
        'kategori'   => 'required|max_length[100]',
        'keterangan' => 'max_length[255]',
    ];

    protected $validationMessages = [
        'jenis' => [
            'required'   => 'Jenis transaksi harus dipilih.',
            'in_list'    => 'Jenis harus pemasukan atau pengeluaran.',
        ],
        'harga' => [
            'required' => 'Nominal harus diisi.',
            'decimal'  => 'Nominal harus berupa angka.',
        ],
        'kategori' => [
            'required'   => 'Kategori harus diisi.',
            'max_length' => 'Maksimal 100 karakter.',
        ],
    ];
}