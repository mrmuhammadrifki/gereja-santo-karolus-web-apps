<?php

namespace App\Controllers;

use App\Models\DataKKModel;
use App\Models\RayonModel;
use Dompdf\Dompdf;

class DataKK extends BaseController
{
    protected $kkModel;

    public function __construct()
    {
        $this->kkModel = new DataKKModel();
    }

    public function index()
    {
        return view('pages/kk/index', [
            'title' => 'Data KK',
            'kk'    => $this->kkModel->findAll(),
        ]);
    }

    public function create()
    {
        $rayon = (new RayonModel())->findAll();
        return view('pages/kk/create', [
            'title' => 'Tambah Data KK',
            'rayon' => $rayon,
        ]);
    }

    public function store()
    {
        if (! $this->validate($this->kkModel->validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->kkModel->save($this->request->getPost());
        session()->setFlashdata('success', 'Data KK berhasil ditambahkan.');
        return redirect()->to('/kk');
    }

    public function edit($id)
    {
        $data = $this->kkModel->find($id);
        if (! $data) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Data KK tidak ditemukan");
        }

        return view('pages/kk/edit', [
            'title' => 'Edit Data KK',
            'kk'    => $data,
            'rayon' => (new RayonModel())->findAll(),
        ]);
    }

    public function update($id)
    {
        if (! $this->validate($this->kkModel->validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->kkModel->update($id, $this->request->getPost());
        session()->setFlashdata('success', 'Data KK berhasil diperbarui.');
        return redirect()->to('/kk');
    }

    public function delete($id)
    {
        $this->kkModel->delete($id);
        session()->setFlashdata('success', 'Data KK berhasil dihapus.');
        return redirect()->to('/kk');
    }

    public function pdf()
    {
        // Ambil semua Data KK
        $kk = $this->kkModel->findAll();

        // Embed logo (assets/img/logo_sh.png)
        $logoPath = FCPATH . 'assets/img/logo_sh.png';
        $logoData = base64_encode(file_get_contents($logoPath));
        $logoSrc  = 'data:image/png;base64,' . $logoData;

        // Render view PDF
        $html = view('pages/kk/pdf', [
            'title'   => 'Daftar KK',
            'kk'      => $kk,
            'logoSrc' => $logoSrc,
        ]);

        // Generate PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();

        // Tampilkan inline
        return $dompdf->stream('kk.pdf', ['Attachment'=>0]);
    }
}