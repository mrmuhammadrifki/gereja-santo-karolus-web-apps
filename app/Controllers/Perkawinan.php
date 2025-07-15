<?php

namespace App\Controllers;

use App\Models\PerkawinanModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;

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

     public function pdf()
    {
        // Ambil semua data
        $data = $this->model->findAll();

        // Embed logo (assets/img/logo_sh.png)
        $logoPath = FCPATH . 'assets/img/logo_sh.png';
        $logoData = base64_encode(file_get_contents($logoPath));
        $logoSrc  = 'data:image/png;base64,' . $logoData;

        // Render view PDF
        $html = view('pages/perkawinan/pdf', [
            'title'      => 'Daftar Perkawinan',
            'perkawinan' => $data,
            'logoSrc'    => $logoSrc,
        ]);

        // Generate PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();

        // Stream inline
        return $dompdf->stream('perkawinan.pdf', ['Attachment' => 0]);
    }
}