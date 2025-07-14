<?php

namespace App\Controllers;

use App\Models\PerkawinanModel;
use CodeIgniter\Controller;

class Perkawinan extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new PerkawinanModel();
    }

    public function index()
    {
        return view('pages/perkawinan/index', [
            'title'      => 'Data Perkawinan',
            'perkawinan' => $this->model->findAll(),
        ]);
    }

    public function create()
    {
        return view('pages/perkawinan/create', ['title' => 'Tambah Perkawinan']);
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
        session()->setFlashdata('success', 'Data Perkawinan berhasil disimpan.');
        return redirect()->to('/perkawinan');
    }

    public function edit($id)
    {
        $row = $this->model->find($id);
        if (! $row) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }

        return view('pages/perkawinan/edit', [
            'title'      => 'Edit Perkawinan',
            'perkawinan' => $row,
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
        session()->setFlashdata('success', 'Data Perkawinan berhasil diupdate.');
        return redirect()->to('/perkawinan');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        session()->setFlashdata('success', 'Data Perkawinan berhasil dihapus.');
        return redirect()->to('/perkawinan');
    }
}