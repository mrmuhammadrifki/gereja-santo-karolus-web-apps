<?php

namespace App\Controllers;

use App\Models\JemaatModel;
use App\Models\DataKKModel;
use App\Models\RayonModel;

class Jemaat extends BaseController
{
    protected $jemaatModel;

    public function __construct()
    {
        $this->jemaatModel = new JemaatModel();
    }

    public function index()
    {
        $kkModel = new DataKKModel();
        $kk = $kkModel->findAll();

        return view('pages/jemaat/index', [
            'title' => 'Data Jemaat',
            'kk'    => $kk,
        ]);
    }

    public function detail($id_kk)
    {
        $kkModel = new DataKKModel();
        $kk = $kkModel->find($id_kk);

        if (! $kk) throw new \CodeIgniter\Exceptions\PageNotFoundException('Data KK tidak ditemukan');

        $jemaat = $this->jemaatModel->where('id_kk', $id_kk)->findAll();

        return view('pages/jemaat/detail', [
            'title'  => 'Anggota Jemaat - ' . $kk['nama_kk'],
            'kk'     => $kk,
            'jemaat' => $jemaat,
        ]);
    }

    public function create($id_kk)
    {
        $rayon = (new RayonModel())->findAll();
        return view('pages/jemaat/create', [
            'title'  => 'Tambah Anggota Jemaat',
            'id_kk'  => $id_kk,
            'rayon'  => $rayon,
        ]);
    }

    public function store()
    {
        if (! $this->validate((new JemaatModel())->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->jemaatModel->save($this->request->getPost());
        return redirect()->to('/jemaat/detail/' . $this->request->getPost('id_kk'))
                         ->with('success', 'Anggota jemaat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $anggota = $this->jemaatModel->find($id);
        if (! $anggota) throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');

        $rayon = (new RayonModel())->findAll();
        return view('pages/jemaat/edit', [
            'title'   => 'Edit Anggota Jemaat',
            'jemaat'  => $anggota,
            'rayon'   => $rayon,
        ]);
    }

    public function update($id)
    {
        if (! $this->validate((new JemaatModel())->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->jemaatModel->update($id, $this->request->getPost());
        return redirect()->to('/jemaat/detail/' . $this->request->getPost('id_kk'))
                         ->with('success', 'Data jemaat berhasil diperbarui.');
    }

    public function delete($id)
    {
        $jemaat = $this->jemaatModel->find($id);
        $id_kk = $jemaat['id_kk'];
        $this->jemaatModel->delete($id);

        return redirect()->to('/jemaat/detail/' . $id_kk)
                         ->with('success', 'Anggota jemaat berhasil dihapus.');
    }
}