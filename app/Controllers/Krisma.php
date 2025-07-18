<?php

namespace App\Controllers;

use App\Models\KrismaModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;

class Krisma extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new KrismaModel();
    }

    public function index()
    {
        return view('pages/krisma/index', [
            'title'  => 'Data Krisma',
            'krisma' => $this->model->findAll(),
        ]);
    }

    public function create()
    {
        return view('pages/krisma/create', [
            'title' => 'Tambah Krisma',
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
        session()->setFlashdata('success', 'Data Krisma berhasil disimpan.');
        return redirect()->to('/krisma');
    }

    public function edit($id)
    {
        $row = $this->model->find($id);
        if (! $row) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }

        return view('pages/krisma/edit', [
            'title'  => 'Edit Krisma',
            'krisma' => $row,
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
        session()->setFlashdata('success', 'Data Krisma berhasil diupdate.');
        return redirect()->to('/krisma');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        session()->setFlashdata('success', 'Data Krisma berhasil dihapus.');
        return redirect()->to('/krisma');
    }

    public function pdf()
    {
        // Ambil semua data krisma
        $data = $this->model->findAll();

        // Embed logo (assets/img/logo_sh.png)
        $logoPath = FCPATH . 'assets/img/logo_sh.png';
        $logoData = base64_encode(file_get_contents($logoPath));
        $logoSrc  = 'data:image/png;base64,' . $logoData;

        // Render view PDF
        $html = view('pages/krisma/pdf', [
            'title'  => 'Daftar Krisma',
            'krisma' => $data,
            'logoSrc'=> $logoSrc,
        ]);

        // Generate PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();

        // Stream inline
        return $dompdf->stream('krisma.pdf', ['Attachment'=>0]);
    }
}