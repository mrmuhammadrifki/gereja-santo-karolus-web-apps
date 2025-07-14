<?php

namespace App\Controllers;

use App\Models\EkaristiModel;
use CodeIgniter\Controller;

class Ekaristi extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new EkaristiModel();
    }

    public function index()
    {
        return view('pages/ekaristi/index', [
            'title'    => 'Data Ekaristi',
            'ekaristi' => $this->model->findAll(),
        ]);
    }

    public function create()
    {
        return view('pages/ekaristi/create', [
            'title' => 'Tambah Ekaristi',
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
        session()->setFlashdata('success', 'Data Ekaristi berhasil disimpan.');
        return redirect()->to('/ekaristi');
    }

    public function edit($id)
    {
        $row = $this->model->find($id);
        if (! $row) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }

        return view('pages/ekaristi/edit', [
            'title'   => 'Edit Ekaristi',
            'ekaristi'=> $row,
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
        session()->setFlashdata('success', 'Data Ekaristi berhasil diupdate.');
        return redirect()->to('/ekaristi');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        session()->setFlashdata('success', 'Data Ekaristi berhasil dihapus.');
        return redirect()->to('/ekaristi');
    }
}