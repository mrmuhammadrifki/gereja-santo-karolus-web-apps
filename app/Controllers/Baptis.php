<?php

namespace App\Controllers;

use App\Models\BaptisModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;

class Baptis extends Controller
{
    protected $baptisModel;

    public function __construct()
    {
        $this->baptisModel = new BaptisModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Data Baptis',
            'baptis' => $this->baptisModel->findAll(),
        ];
        return view('pages/baptis/index', $data);
    }

    public function create()
    {
        return view('pages/baptis/create', [
            'title' => 'Tambah Baptis',
        ]);
    }

    public function store()
    {
        if (! $this->validate(
            $this->baptisModel->validationRules,
            $this->baptisModel->validationMessages
        )) {
            return redirect()->back()
                             ->withInput()
                             ->with('errors', $this->validator->getErrors());
        }

        $this->baptisModel->save([
            'nama'         => $this->request->getPost('nama'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tgl_lahir'    => $this->request->getPost('tgl_lahir'),
            'ortu'         => $this->request->getPost('ortu'),
            'wali'         => $this->request->getPost('wali'),
            'tgl_bpt'      => $this->request->getPost('tgl_bpt'),
            'lokasi_bpt'   => $this->request->getPost('lokasi_bpt'),
            'petugas'      => $this->request->getPost('petugas'),
        ]);

        session()->setFlashdata('success', 'Data Baptis berhasil disimpan.');
        return redirect()->to('/baptis');
    }

    public function edit($id)
    {
        $row = $this->baptisModel->find($id);
        if (! $row) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Baptis tidak ditemukan.');
        }

        return view('pages/baptis/edit', [
            'title'  => 'Edit Baptis',
            'baptis' => $row,
        ]);
    }

    public function update($id)
    {
        if (! $this->validate(
            $this->baptisModel->validationRules,
            $this->baptisModel->validationMessages
        )) {
            return redirect()->back()
                             ->withInput()
                             ->with('errors', $this->validator->getErrors());
        }

        $this->baptisModel->update($id, [
            'nama'         => $this->request->getPost('nama'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tgl_lahir'    => $this->request->getPost('tgl_lahir'),
            'ortu'         => $this->request->getPost('ortu'),
            'wali'         => $this->request->getPost('wali'),
            'tgl_bpt'      => $this->request->getPost('tgl_bpt'),
            'lokasi_bpt'   => $this->request->getPost('lokasi_bpt'),
            'petugas'      => $this->request->getPost('petugas'),
        ]);

        session()->setFlashdata('success', 'Data Baptis berhasil diupdate.');
        return redirect()->to('/baptis');
    }

    public function delete($id)
    {
        $this->baptisModel->delete($id);
        session()->setFlashdata('success', 'Data Baptis berhasil dihapus.');
        return redirect()->to('/baptis');
    }

    public function pdf()
    {
        // Ambil semua data Baptis
        $baptis = $this->baptisModel->findAll();

        // Embed logo (assets/img/logo_sh.png)
        $logoPath = FCPATH . 'assets/img/logo_sh.png';
        $logoData = base64_encode(file_get_contents($logoPath));
        $logoSrc  = 'data:image/png;base64,' . $logoData;

        // Render view PDF
        $html = view('pages/baptis/pdf', [
            'title'   => 'Daftar Baptis',
            'baptis'  => $baptis,
            'logoSrc' => $logoSrc,
        ]);

        // Generate PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();

        // Stream inline
        return $dompdf->stream('baptis.pdf', ['Attachment'=>0]);
    }
}