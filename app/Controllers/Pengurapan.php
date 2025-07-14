<?php

namespace App\Controllers;

use App\Models\PengurapanModel;
use CodeIgniter\Controller;

class Pengurapan extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new PengurapanModel();
    }

    public function index()
    {
        return view('pages/pengurapan/index', [
            'title'      => 'Data Pengurapan Orang Sakit',
            'pengurapan' => $this->model->findAll(),
        ]);
    }

    public function create()
    {
        return view('pages/pengurapan/create', [
            'title' => 'Tambah Pengurapan'
        ]);
    }

    public function store()
    {
        if (! $this->validate(
            $this->model->validationRules,
            $this->model->validationMessages
        )) {
            return redirect()->back()
                             ->withInput()
                             ->with('errors', $this->validator->getErrors());
        }

        $this->model->save($this->request->getPost());
        session()->setFlashdata('success', 'Data pengurapan berhasil disimpan.');
        return redirect()->to('/pengurapan');
    }

    public function edit($id)
    {
        $row = $this->model->find($id);
        if (! $row) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }

        return view('pages/pengurapan/edit', [
            'title'      => 'Edit Pengurapan',
            'pengurapan' => $row,
        ]);
    }

    public function update($id)
    {
        if (! $this->validate(
            $this->model->validationRules,
            $this->model->validationMessages
        )) {
            return redirect()->back()
                             ->withInput()
                             ->with('errors', $this->validator->getErrors());
        }

        $this->model->update($id, $this->request->getPost());
        session()->setFlashdata('success', 'Data pengurapan berhasil diupdate.');
        return redirect()->to('/pengurapan');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        session()->setFlashdata('success', 'Data pengurapan berhasil dihapus.');
        return redirect()->to('/pengurapan');
    }
}