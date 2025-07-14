<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKKModel extends Model
{
    protected $table = 'data_kk';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama_kk', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin',
        'alamat', 'telp', 'pekerjaan', 'rayon', 'status'
    ];
    protected $useTimestamps = true;

    protected $validationRules = [
        'nama_kk'        => 'required|min_length[3]',
        'tempat_lahir'   => 'required',
        'tanggal_lahir'  => 'required|valid_date[Y-m-d]',
        'jenis_kelamin'  => 'required|in_list[L,P]',
        'alamat'         => 'required',
        'telp'           => 'required|numeric',
        'pekerjaan'      => 'required',
        'rayon'          => 'required',
        'status'         => 'required',
    ];
}