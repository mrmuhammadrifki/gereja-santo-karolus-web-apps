<?php

namespace App\Controllers;

use App\Models\EkaristiModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;

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

    public function pdf()
    {
        // Ambil semua data ekaristi
        $data = $this->model->findAll();

        // Embed logo (assets/img/logo_sh.png)
        $logoPath = FCPATH . 'assets/img/logo_sh.png';
        $logoData = base64_encode(file_get_contents($logoPath));
        $logoSrc  = 'data:image/png;base64,' . $logoData;

        // Render view PDF
        $html = view('pages/ekaristi/pdf', [
            'title'    => 'Daftar Ekaristi',
            'ekaristi' => $data,
            'logoSrc'  => $logoSrc,
        ]);

        // Generate PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();

        // Tampilkan inline di browser
        return $dompdf->stream('ekaristi.pdf', ['Attachment' => 0]);
    }
}