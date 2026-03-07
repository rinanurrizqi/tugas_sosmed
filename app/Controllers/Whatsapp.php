<?php

namespace App\Controllers;
use App\Models\WhatsappModel;

class Whatsapp extends BaseController
{
    protected $whatsapp;

    public function __construct()
    {
        $this->whatsapp = new WhatsappModel();
    }

    public function index()
    {
        $data['whatsapp'] = $this->whatsapp->findAll();
        return view('whatsapp/index', $data);
    }

    public function create()
    {
        return view('whatsapp/form');
    }

    public function store()
    {
        // Validasi
        $rules = [
            'id_wa' => [
                'rules' => 'required|is_unique[akun_wa.id_wa]|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'ID WhatsApp harus diisi',
                    'is_unique' => 'ID WhatsApp sudah digunakan',
                    'min_length' => 'ID WhatsApp minimal 3 karakter',
                    'max_length' => 'ID WhatsApp maksimal 20 karakter'
                ]
            ],
            'no_wa' => [
                'rules' => 'required|min_length[10]|max_length[15]',
                'errors' => [
                    'required' => 'Nomor WhatsApp harus diisi',
                    'min_length' => 'Nomor WhatsApp minimal 10 digit',
                    'max_length' => 'Nomor WhatsApp maksimal 15 digit'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data
        $this->whatsapp->save([
            'id_wa'   => $this->request->getPost('id_wa'),
            'no_wa' => $this->request->getPost('no_wa'),
        ]);

        session()->setFlashdata('success', 'Data akun WhatsApp berhasil ditambahkan');
        return redirect()->to(base_url('whatsapp'));
    }

    public function edit($id)
    {
        $data['whatsapp'] = $this->whatsapp->find($id);
        
        if (empty($data['whatsapp'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }
        
        return view('whatsapp/form', $data);
    }

    public function update($id)
    {
        // Validasi
        $rules = [
            'no_wa' => [
                'rules' => 'required|min_length[10]|max_length[15]',
                'errors' => [
                    'required' => 'Nomor WhatsApp harus diisi',
                    'min_length' => 'Nomor WhatsApp minimal 10 digit',
                    'max_length' => 'Nomor WhatsApp maksimal 15 digit'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->whatsapp->update($id, [
            'no_wa' => $this->request->getPost('no_wa')
        ]);

        session()->setFlashdata('success', 'Data akun WhatsApp berhasil diupdate');
        return redirect()->to(base_url('whatsapp'));
    }

    public function delete($id)
    {
        $this->whatsapp->delete($id);
        session()->setFlashdata('success', 'Data akun WhatsApp berhasil dihapus');
        return redirect()->to(base_url('whatsapp'));
    }
}