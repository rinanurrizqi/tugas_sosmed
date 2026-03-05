<?php

namespace App\Controllers;
use App\Models\FacebookModel;

class Facebook extends BaseController
{
    protected $facebook;

    public function __construct()
    {
        $this->facebook = new FacebookModel();
    }

    public function index()
    {
        $data['facebook'] = $this->facebook->findAll();
        return view('facebook/index', $data);
    }

    public function create()
    {
        return view('facebook/form');
    }

    public function store()
    {
        // Validasi
        $rules = [
            'id_facebook' => [
                'rules' => 'required|is_unique[akun_facebook.id_facebook]|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'ID Facebook harus diisi',
                    'is_unique' => 'ID Facebook sudah digunakan',
                    'min_length' => 'ID Facebook minimal 3 karakter',
                    'max_length' => 'ID Facebook maksimal 20 karakter'
                ]
            ],
            'link_facebook' => [
                'rules' => 'required|valid_url|max_length[255]',
                'errors' => [
                    'required' => 'Link Facebook harus diisi',
                    'valid_url' => 'Link Facebook tidak valid',
                    'max_length' => 'Link Facebook terlalu panjang'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data
        $this->facebook->save([
            'id_facebook'   => $this->request->getPost('id_facebook'),
            'link_facebook' => $this->request->getPost('link_facebook'),
        ]);

        session()->setFlashdata('success', 'Data akun Facebook berhasil ditambahkan');
        return redirect()->to(base_url('facebook'));
    }

    public function edit($id)
    {
        $data['facebook'] = $this->facebook->find($id);
        
        if (empty($data['facebook'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }
        
        return view('facebook/form', $data);
    }

    public function update($id)
    {
        // Validasi
        $rules = [
            'link_facebook' => [
                'rules' => 'required|valid_url|max_length[255]',
                'errors' => [
                    'required' => 'Link Facebook harus diisi',
                    'valid_url' => 'Link Facebook tidak valid',
                    'max_length' => 'Link Facebook terlalu panjang'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->facebook->update($id, [
            'link_facebook' => $this->request->getPost('link_facebook')
        ]);

        session()->setFlashdata('success', 'Data akun Facebook berhasil diupdate');
        return redirect()->to(base_url('facebook'));
    }

    public function delete($id)
    {
        $this->facebook->delete($id);
        session()->setFlashdata('success', 'Data akun Facebook berhasil dihapus');
        return redirect()->to(base_url('facebook'));
    }
}