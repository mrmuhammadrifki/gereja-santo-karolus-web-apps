<?php

namespace App\Controllers;

use App\Models\TobatModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;

class Tobat extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new TobatModel();
    }

    public function index()
    {
        return view('pages/tobat/index', [
            'title' => 'Data Sakramen Tobat',
            'tobat' => $this->model->findAll(),
        ]);
    }

    public function create()
    {
        return view('pages/tobat/create', [
            'title' => 'Tambah Tobat',
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
        session()->setFlashdata('success', 'Data Tobat berhasil disimpan.');
        return redirect()->to('/tobat');
    }

    public function edit($id)
    {
        $row = $this->model->find($id);
        if (! $row) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }
        return view('pages/tobat/edit', [
            'title' => 'Edit Tobat',
            'tobat' => $row,
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
        session()->setFlashdata('success', 'Data Tobat berhasil diupdate.');
        return redirect()->to('/tobat');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        session()->setFlashdata('success', 'Data Tobat berhasil dihapus.');
        return redirect()->to('/tobat');
    }

    public function pdf()
    {
        // Ambil semua data Tobat
        $data = $this->model->findAll();

        // Embed logo (assets/img/logo_sh.png)
        $logoPath = FCPATH . 'assets/img/logo_sh.png';
        $logoData = base64_encode(file_get_contents($logoPath));
        $logoSrc  = 'data:image/png;base64,' . $logoData;

        // Render view PDF
        $html = view('pages/tobat/pdf', [
            'title'   => 'Daftar Sakramen Tobat',
            'tobat'   => $data,
            'logoSrc' => $logoSrc,
        ]);

        // Generate PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();

        // Stream inline
        return $dompdf->stream('tobat.pdf', ['Attachment' => 0]);
    }
}