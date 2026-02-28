<?php

namespace App\Controllers;
use App\Models\InstagramModel;

class Instagram extends BaseController
{
    protected $instagram;

    public function __construct()
    {
        $this->instagram = new InstagramModel();
    }

    public function index()
    {
        $data['instagram'] = $this->instagram->findAll();
        return view('instagram/index', $data);
    }

    public function create()
    {
        return view('instagram/form');
    }

    public function store()
    {
        // Validasi
        $rules = [
            'id_instagram' => [
                'rules' => 'required|is_unique[akun_instagram.id_instagram]|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'ID Instagram harus diisi',
                    'is_unique' => 'ID Instagram sudah digunakan',
                    'min_length' => 'ID Instagram minimal 3 karakter',
                    'max_length' => 'ID Instagram maksimal 20 karakter'
                ]
            ],
            'link_instagram' => [
                'rules' => 'required|valid_url|max_length[255]',
                'errors' => [
                    'required' => 'Link Instagram harus diisi',
                    'valid_url' => 'Link Instagram tidak valid',
                    'max_length' => 'Link Instagram terlalu panjang'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan dengan ID
        $this->instagram->save([
            'id_instagram' => $this->request->getPost('id_instagram'),
            'link_instagram' => $this->request->getPost('link_instagram')
        ]);

        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('instagram'));
    }

    public function edit($id)
    {
        $data['instagram'] = $this->instagram->find($id);
        
        if (empty($data['instagram'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }
        
        return view('instagram/form', $data);
    }

    public function update($id)
    {
        // Validasi
        $rules = [
            'link_instagram' => [
                'rules' => 'required|valid_url|max_length[255]',
                'errors' => [
                    'required' => 'Link Instagram harus diisi',
                    'valid_url' => 'Link Instagram tidak valid',
                    'max_length' => 'Link Instagram terlalu panjang'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->instagram->update($id, [
            'link_instagram' => $this->request->getPost('link_instagram')
        ]);

        session()->setFlashdata('success', 'Data berhasil diupdate');
        return redirect()->to(base_url('instagram'));
    }

    public function delete($id)
    {
        $this->instagram->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('instagram'));
    }
}