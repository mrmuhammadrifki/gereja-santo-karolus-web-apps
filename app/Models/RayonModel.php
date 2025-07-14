<?php

namespace App\Models;

use CodeIgniter\Model;

class RayonModel extends Model
{
    protected $table      = 'rayon';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_rayon'];
    protected $useTimestamps = true; 

    protected $validationRules = [
        'nama_rayon' => 'required|min_length[3]|max_length[100]',
    ];
    protected $validationMessages = [
        'nama_rayon' => [
            'required'   => 'Nama Rayon harus diisi.',
            'min_length' => 'Minimal 3 karakter.',
        ],
    ];
}