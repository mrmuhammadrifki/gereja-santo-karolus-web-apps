<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel2;

class User extends Controller
{
    protected $userModel;

    public function __construct()
    {
        helper(['form']);
        $this->userModel = new UserModel2();
    }

    // INDEX: Tampil semua user
    public function index()
    {
        return view('pages/user/index', [
            'title' => 'Data User',
            'users' => $this->userModel->findAll(),
        ]);
    }

    // CREATE: Form tambah user
    public function create()
    {
        return view('pages/user/create', [
            'title' => 'Tambah User',
        ]);
    }

    // STORE: Simpan user baru
    public function store()
    {
        if (! $this->validate($this->userModel->validationRules)) {
            return redirect()->back()
                             ->withInput()
                             ->with('errors', $this->validator->getErrors());
        }

        $this->userModel->save($this->request->getPost());
        session()->setFlashdata('success', 'User berhasil ditambahkan.');
        return redirect()->to('/user');
    }

    // EDIT: Form edit user
    public function edit($id)
    {
        $user = $this->userModel->find($id);
        if (! $user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User tidak ditemukan');
        }

        return view('pages/user/edit', [
            'title' => 'Edit User',
            'user'  => $user,
        ]);
    }

    public function update($id)
    {
        // Ambil input
        $post = $this->request->getPost();

        // Bangun rule dinamis
        $rules = [];
        if (isset($post['username']) && $post['username'] !== '') {
            $rules['username'] = 'alpha_numeric|min_length[3]|max_length[100]';
        }
        if (isset($post['password']) && $post['password'] !== '') {
            $rules['password'] = 'min_length[8]|max_length[255]';
        }

        // Kalau tidak ada field diubah, langsung kembali
        if (empty($rules)) {
            return redirect()->to('/user');
        }

        // Validasi
        if (! $this->validate($rules)) {
            return redirect()->back()
                             ->withInput()
                             ->with('errors', $this->validator->getErrors());
        }

        // Siapkan data untuk disimpan (Model akan hash password via beforeUpdate)
        $data = ['id' => $id];
        if (isset($post['username']) && $post['username'] !== '') {
            $data['username'] = $post['username'];
        }
        if (isset($post['password']) && $post['password'] !== '') {
            $data['password'] = $post['password'];
        }

        $this->userModel->save($data);
        session()->setFlashdata('success', 'User berhasil diupdate.');
        return redirect()->to('/user');
    }
    
    // DELETE: Hapus user
    public function delete($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata('success', 'User berhasil dihapus.');
        return redirect()->to('/user');
    }
}