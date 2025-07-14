<?php

    // app/Models/UserModel.php
    namespace App\Models;

    use CodeIgniter\Model;

    class UserModel extends Model
    {
        protected $table      = 'users';
        protected $primaryKey = 'id';

        protected $returnType     = 'array';
        protected $useTimestamps  = true;  // Mengaktifkan timestamps
        protected $createdField   = 'created_at';
        protected $updatedField   = 'updated_at';

        protected $allowedFields = ['username', 'password'];

        // Validasi username dan password
        protected $validationRules = [
            'username' => 'required|alpha_numeric|min_length[3]|max_length[100]',
            'password' => 'required|min_length[8]|max_length[255]',
        ];

        // Hash password sebelum disimpan
        protected $beforeInsert = ['hashPassword'];
        protected $beforeUpdate = ['hashPassword'];

        // Fungsi untuk meng-hash password
        protected function hashPassword(array $data)
        {
            if (isset($data['data']['password'])) {
                $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
            }
            return $data;
        }

        // Menemukan pengguna berdasarkan username
        public function getUserByUsername($username)
        {
            return $this->where('username', $username)->first();
        }
    }