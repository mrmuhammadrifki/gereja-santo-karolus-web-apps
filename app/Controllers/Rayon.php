<?php

namespace App\Controllers;

use App\Models\RayonModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;

class Rayon extends Controller
{
    protected $rayonModel;

    public function __construct()
    {
        $this->rayonModel = new RayonModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Rayon',
            'rayon' => $this->rayonModel->findAll(),
        ];
        return view('pages/rayon/index', $data);
    }

    public function create()
    {
        return view('pages/rayon/create', ['title' => 'Tambah Rayon']);
    }

    public function store()
    {
        if (! $this->validate($this->rayonModel->validationRules, $this->rayonModel->validationMessages)) {
            return redirect()->back()->withInput();
        }

        $this->rayonModel->save([
            'nama_rayon' => $this->request->getPost('nama_rayon'),
        ]);

        session()->setFlashdata('success', 'Rayon berhasil ditambahkan.');
        return redirect()->to('/rayon');
    }

    public function edit($id)
    {
        $rayon = $this->rayonModel->find($id);
        if (! $rayon) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Rayon tidak ditemukan');
        }
        return view('pages/rayon/edit', [
            'title' => 'Edit Rayon',
            'rayon' => $rayon,
        ]);
    }

    public function update($id)
    {
        if (! $this->validate($this->rayonModel->validationRules, $this->rayonModel->validationMessages)) {
            return redirect()->back()->withInput();
        }

        $this->rayonModel->update($id, [
            'nama_rayon' => $this->request->getPost('nama_rayon'),
        ]);

        session()->setFlashdata('success', 'Rayon berhasil diupdate.');
        return redirect()->to('/rayon');
    }

    public function delete($id)
    {
        $this->rayonModel->delete($id);
        session()->setFlashdata('success', 'Rayon berhasil dihapus.');
        return redirect()->to('/rayon');
    }

     public function pdf()
    {
        // Ambil semua data
        $rayon = $this->rayonModel->findAll();

        // path logo di public/images/logo.png
        $logoPath = FCPATH . 'assets/img/logo_sh.png';
        $logoData = base64_encode(file_get_contents($logoPath));
        $logoSrc  = 'data:image/png;base64,' . $logoData;

        // Render view khusus PDF
        $html = view('pages/rayon/pdf', [
            'rayon' => $rayon,
            'title' => 'Daftar Rayon',
            'logoSrc' => $logoSrc,
        ]);

        // Inisialisasi Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Stream ke browser, Attachment=0 agar inline
        return $dompdf->stream('rayon.pdf', ['Attachment' => 0]);
    }
}