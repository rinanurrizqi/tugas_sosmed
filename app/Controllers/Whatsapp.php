<?php

namespace App\Controllers;

use App\Models\WhatsappModel;

class Whatsapp extends BaseController
{
    protected $whatsappModel;
    
    public function __construct()
    {
        $this->whatsappModel = new WhatsappModel();
    }
    
    // Halaman index - menampilkan semua data
    public function index()
    {
        $data = [
            'title' => 'Data Akun WhatsApp',
            'whatsapp' => $this->whatsappModel->getAllWa()
        ];
        
        return view('whatsapp/index', $data);
    }
    
    // Halaman form tambah data
    public function create()
    {
        $data = [
            'title' => 'Tambah Akun WhatsApp',
            'validation' => \Config\Services::validation()
        ];
        
        return view('whatsapp/create', $data);
    }
    
   // Proses simpan data
    public function save()
{
    // Validasi input
    if (!$this->validate([
        'no_wa' => [
            'rules' => 'required|is_unique[akun_wa.no_wa]',
            'errors' => [
                'required' => 'Nomor WhatsApp harus diisi',
                'is_unique' => 'Nomor WhatsApp ini sudah terdaftar'
            ]
        ]
    ])) {
        return redirect()->back()->withInput()->with('error', 'Validasi gagal, periksa kembali input Anda');
    }

    // Simpan data
    $this->whatsappModel->save([
        'no_wa' => $this->request->getVar('no_wa')
    ]);

    session()->setFlashdata('success', 'Data akun WhatsApp berhasil ditambahkan');
    return redirect()->to('/whatsapp');
}
    
    // Halaman form edit
   public function edit($id)
{
    $model = new \App\Models\WhatsappModel();

    $data['whatsapp'] = $model->getWaById($id);

    if (!$data['whatsapp']) {
        return redirect()->to('/whatsapp')->with('error', 'Data tidak ditemukan');
    }

    return view('whatsapp/edit', $data);
}
    
    // Proses update data
    public function update($id)
    {
        // Cek data
        $dataLama = $this->whatsappModel->getWaById($id);
        
        // Jika nomor berubah, validasi unique
        $ruleLink = 'required|valid_url_strict';
        if ($dataLama['no_wa'] != $this->request->getVar('no_wa')) {
            $ruleLink .= '|is_unique[akun_wa.no_wa]';
        }
        
        // Validasi input
    if (!$this->validate([
        'no_wa' => [
            'rules' => 'required|is_unique[akun_wa.no_wa]',
            'errors' => [
                'required' => 'Nomor WhatsApp harus diisi',
                'is_unique' => 'Nomor WhatsApp ini sudah terdaftar'
            ]
        ]
    ])) {
        return redirect()->back()->withInput()->with('error', 'Validasi gagal, periksa kembali input Anda');
    }
        
        // Update data
        $this->whatsappModel->update($id, [
            'no_wa' => $this->request->getVar('no_wa')
        ]);
        
        session()->setFlashdata('success', 'Data akun WhatsApp berhasil diupdate');
        return redirect()->to('/whatsapp');
    }
    
    // Hapus data
    public function delete($id)
    {
        // Cek data
        $whatsapp = $this->whatsappModel->getWaById($id);
        
        if ($whatsapp) {
            $this->whatsappModel->delete($id);
            session()->setFlashdata('success', 'Data akun WhatsApp berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Data tidak ditemukan');
        }
        
        return redirect()->to('/whatsapp');
    }
}