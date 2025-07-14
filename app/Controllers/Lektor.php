<?php

namespace App\Controllers;

use App\Models\LektorModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;

class Lektor extends Controller
{
    protected $lektorModel;

    public function __construct()
    {
        $this->lektorModel = new LektorModel();
    }

    public function index()
    {
        return view('pages/lektor/index', [
            'title'  => 'Data Lektor',
            'lektor' => $this->lektorModel->findAll(),
        ]);
    }

    public function create()
    {
        return view('pages/lektor/create', ['title' => 'Tambah Lektor']);
    }

   public function store()
    {
       if (! $this->validate($this->lektorModel->validationRules, $this->lektorModel->validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->lektorModel->save([
            'nama'            => $this->request->getPost('nama'),
            'tempat_lahir'    => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'   => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin'   => $this->request->getPost('jenis_kelamin'),
            'status'          => $this->request->getPost('status'),
            'tahun_masuk'     => $this->request->getPost('tahun_masuk'),
        ]);

        session()->setFlashdata('success', 'Lektor berhasil ditambahkan.');
        return redirect()->to('/lektor');
    }

    public function edit($id)
    {
        $data = $this->lektorModel->find($id);
        if (! $data) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Lektor tidak ditemukan');
        }
        return view('pages/lektor/edit', [
            'title'  => 'Edit Lektor',
            'lektor' => $data,
        ]);
    }

    public function update($id)
{
     if (! $this->validate($this->lektorModel->validationRules, $this->lektorModel->validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

    $this->lektorModel->update($id, [
        'nama'            => $this->request->getPost('nama'),
        'tempat_lahir'    => $this->request->getPost('tempat_lahir'),
        'tanggal_lahir'   => $this->request->getPost('tanggal_lahir'),
        'jenis_kelamin'   => $this->request->getPost('jenis_kelamin'),
        'status'          => $this->request->getPost('status'),
        'tahun_masuk'     => $this->request->getPost('tahun_masuk'),
    ]);

    session()->setFlashdata('success', 'Lektor berhasil diupdate.');
    return redirect()->to('/lektor');
}

    public function delete($id)
    {
        $this->lektorModel->delete($id);
        session()->setFlashdata('success', 'Lektor berhasil dihapus.');
        return redirect()->to('/lektor');
    }

     public function pdf()
    {
        // Ambil semua data Lektor
        $lektor = $this->lektorModel->findAll();

        // Embed logo sebagai Base64
        $logoPath = FCPATH . 'assets/img/logo_sh.png';
        $logoData = base64_encode(file_get_contents($logoPath));
        $logoSrc  = 'data:image/png;base64,' . $logoData;

        // Render HTML view khusus PDF
        $html = view('pages/lektor/pdf', [
            'title'   => 'Daftar Lektor',
            'lektor'  => $lektor,
            'logoSrc' => $logoSrc,
        ]);

        // Generate PDF dengan Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Stream inline ke browser
        return $dompdf->stream('lektor.pdf', ['Attachment' => 0]);
    }
}