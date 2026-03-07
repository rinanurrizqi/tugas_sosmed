<?php

namespace App\Controllers;
use App\Models\EmailModel;

class Email extends BaseController
{
    protected $email;

    public function __construct()
    {
        $this->email = new EmailModel();
    }

    public function index()
    {
        $data['email'] = $this->email->findAll();
        return view('email/index', $data);
    }

    public function create()
    {
        return view('email/form');
    }

    public function store()
    {
        // Validasi
        $rules = [
            'id_email' => [
                'rules' => 'required|is_unique[alamat_email.id_email]|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'ID Email harus diisi',
                    'is_unique' => 'ID Email sudah digunakan',
                    'min_length' => 'ID Email minimal 3 karakter',
                    'max_length' => 'ID Email maksimal 20 karakter'
                ]
            ],
            'alamat_email' => [
                'rules' => 'required|valid_email|max_length[255]',
                'errors' => [
                    'required' => 'Alamat Email harus diisi',
                    'valid_email' => 'Alamat Email tidak valid',
                    'max_length' => 'Alamat Email terlalu panjang'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data
        try {
            $this->email->save([
                'id_email'     => $this->request->getPost('id_email'),
                'alamat_email' => $this->request->getPost('alamat_email'),
            ]);
            session()->setFlashdata('success', 'Data akun Email berhasil ditambahkan');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }

        return redirect()->to(base_url('email'));
    }

    public function edit($id)
    {
        $data['email'] = $this->email->find($id);
        
        if (empty($data['email'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }
        
        return view('email/form', $data);
    }

    public function update($id)
    {
        // Validasi
        $rules = [
            'alamat_email' => [
                'rules' => 'required|valid_email|max_length[255]',
                'errors' => [
                    'required' => 'Alamat Email harus diisi',
                    'valid_email' => 'Alamat Email tidak valid',
                    'max_length' => 'Alamat Email terlalu panjang'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $this->email->update($id, [
                'alamat_email' => $this->request->getPost('alamat_email')
            ]);
            session()->setFlashdata('success', 'Data akun Email berhasil diupdate');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Gagal mengupdate data: ' . $e->getMessage());
        }

        return redirect()->to(base_url('email'));
    }

    public function delete($id)
    {
        try {
            $this->email->delete($id);
            session()->setFlashdata('success', 'Data akun Email berhasil dihapus');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
        return redirect()->to(base_url('email'));
    }
}