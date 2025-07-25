<?php

namespace App\Controllers;

use App\Models\KeuanganModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;

class Keuangan extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new KeuanganModel();
    }

    public function index()
    {
        return view('pages/keuangan/index', [
            'title'    => 'Data Keuangan',
            'records'  => $this->model->findAll(),
        ]);
    }

    public function create()
    {
        return view('pages/keuangan/create', [
            'title' => 'Tambah Transaksi',
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
        session()->setFlashdata('success', 'Transaksi berhasil disimpan.');
        return redirect()->to('/keuangan');
    }

    public function edit($id)
    {
        $row = $this->model->find($id);
        if (! $row) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Transaksi tidak ditemukan.');
        }

        return view('pages/keuangan/edit', [
            'title'    => 'Edit Transaksi',
            'record'   => $row,
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
        session()->setFlashdata('success', 'Transaksi berhasil diupdate.');
        return redirect()->to('/keuangan');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        session()->setFlashdata('success', 'Transaksi berhasil dihapus.');
        return redirect()->to('/keuangan');
    }

     public function pdf()
    {
        // Ambil semua transaksi
        $records = $this->model->orderBy('created_at','ASC')->findAll();

        // Hitung total pemasukan & pengeluaran
        $totalIn  = 0;
        $totalOut = 0;
        foreach ($records as $r) {
            if ($r['jenis'] === 'pemasukan') {
                $totalIn += (float)$r['harga'];
            } else {
                $totalOut += (float)$r['harga'];
            }
        }
        $saldo = $totalIn - $totalOut;

        // Embed logo
        $logoPath = FCPATH . 'assets/img/logo_sh.png';
        $logoData = base64_encode(file_get_contents($logoPath));
        $logoSrc  = 'data:image/png;base64,' . $logoData;

        // Render view PDF
        $html = view('pages/keuangan/pdf', [
            'title'      => 'Laporan Keuangan',
            'records'    => $records,
            'totalIn'    => $totalIn,
            'totalOut'   => $totalOut,
            'saldo'      => $saldo,
            'logoSrc'    => $logoSrc,
        ]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();

        return $dompdf->stream('laporan_keuangan.pdf', ['Attachment' => 0]);
    }
}