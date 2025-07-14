<?php

namespace App\Models;

use CodeIgniter\Model;

class JemaatModel extends Model
{
    protected $table = 'jemaat';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_kk', 'nama', 'tempat_lahir', 'tanggal_lahir',
        'jenis_kelamin', 'alamat', 'telp', 'pekerjaan', 'rayon', 'status'
    ];
    protected $useTimestamps = true;

    protected $validationRules = [
        'nama'          => 'required|min_length[3]',
        'tempat_lahir'  => 'required',
        'tanggal_lahir' => 'required|valid_date[Y-m-d]',
        'jenis_kelamin' => 'required|in_list[L,P]',
        'alamat'        => 'required',
        'telp'          => 'required|numeric',
        'pekerjaan'     => 'required',
        'rayon'         => 'required',
        'status'        => 'required|in_list[Aktif,Tidak Aktif,Meninggal,Pindah]',
    ];
}