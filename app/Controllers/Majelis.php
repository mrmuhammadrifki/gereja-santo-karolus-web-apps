<?php

namespace App\Controllers;

use App\Models\MajelisModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;

class Majelis extends Controller
{
    protected $majelisModel;

    public function __construct()
    {
        $this->majelisModel = new MajelisModel();
    }

    public function index()
    {
        return view('pages/majelis/index', [
            'title'   => 'Data Majelis',
            'majelis' => $this->majelisModel->findAll(),
        ]);
    }

   public function create()
{
    $rayonModel = new \App\Models\RayonModel();
    $data = [
        'title' => 'Tambah Majelis',
        'rayon' => $rayonModel->findAll(),
    ];
    return view('pages/majelis/create', $data);
}

    public function store()
    {
        if (! $this->validate($this->majelisModel->validationRules, $this->majelisModel->validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->majelisModel->save($this->request->getPost());
        session()->setFlashdata('success', 'Majelis berhasil ditambahkan.');
        return redirect()->to('/majelis');
    }

    public function edit($id)
{
    $dataMajelis = $this->majelisModel->find($id);
    if (! $dataMajelis) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Majelis tidak ditemukan');
    }

    $rayonModel = new \App\Models\RayonModel();
    return view('pages/majelis/edit', [
        'title'   => 'Edit Majelis',
        'majelis' => $dataMajelis,
        'rayon'   => $rayonModel->findAll(),
    ]);
}


    public function update($id)
    {
        if (! $this->validate($this->majelisModel->validationRules, $this->majelisModel->validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->majelisModel->update($id, $this->request->getPost());
        session()->setFlashdata('success', 'Majelis berhasil diupdate.');
        return redirect()->to('/majelis');
    }

    public function delete($id)
    {
        $this->majelisModel->delete($id);
        session()->setFlashdata('success', 'Majelis berhasil dihapus.');
        return redirect()->to('/majelis');
    }

    public function pdf()
    {
        // Ambil data
        $majelis = $this->majelisModel->findAll();

        // Embed logo (assets/img/logo_sh.png)
        $logoPath = FCPATH . 'assets/img/logo_sh.png';
        $logoData = base64_encode(file_get_contents($logoPath));
        $logoSrc  = 'data:image/png;base64,' . $logoData;

        // Render view PDF
        $html = view('pages/majelis/pdf', [
            'title'    => 'Daftar Majelis',
            'majelis'  => $majelis,
            'logoSrc'  => $logoSrc,
        ]);

        // Generate PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();

        // Tampilkan inline
        return $dompdf->stream('majelis.pdf', ['Attachment'=>0]);
    }
}