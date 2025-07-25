<?php

namespace App\Controllers;

use App\Models\ImamatModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;

class Imamat extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new ImamatModel();
    }

    public function index()
    {
        return view('pages/imamat/index', [
            'title'  => 'Data Imamat',
            'imamat' => $this->model->findAll(),
        ]);
    }

    public function create()
    {
        return view('pages/imamat/create', [
            'title' => 'Tambah Imamat',
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
        session()->setFlashdata('success', 'Data Imamat berhasil disimpan.');
        return redirect()->to('/imamat');
    }

    public function edit($id)
    {
        $row = $this->model->find($id);
        if (! $row) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }

        return view('pages/imamat/edit', [
            'title'  => 'Edit Imamat',
            'imamat' => $row,
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
        session()->setFlashdata('success', 'Data Imamat berhasil diupdate.');
        return redirect()->to('/imamat');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        session()->setFlashdata('success', 'Data Imamat berhasil dihapus.');
        return redirect()->to('/imamat');
    }

     public function pdf()
    {
        // Ambil semua data Imamat
        $data = $this->model->findAll();

        // Embed logo (assets/img/logo_sh.png)
        $logoPath = FCPATH . 'assets/img/logo_sh.png';
        $logoData = base64_encode(file_get_contents($logoPath));
        $logoSrc  = 'data:image/png;base64,' . $logoData;

        // Render view PDF
        $html = view('pages/imamat/pdf', [
            'title'   => 'Daftar Tahbisan Imamat',
            'imamat'  => $data,
            'logoSrc' => $logoSrc,
        ]);

        // Generate PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();

        // Stream inline
        return $dompdf->stream('imamat.pdf', ['Attachment' => 0]);
    }
}