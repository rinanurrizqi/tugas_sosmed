<?php

namespace App\Controllers;
use App\Models\TiktokModel;

class Tiktok extends BaseController
{
    protected $tiktok;

    public function __construct()
    {
        $this->tiktok = new TiktokModel();
    }

    public function index()
    {
        $data['tiktok'] = $this->tiktok->findAll();
        return view('tiktok/index', $data);
    }

    public function create()
    {
        return view('tiktok/form');
    }

    public function store()
    {
        // Validasi
        $rules = [
            'id_tiktok' => [
                'rules' => 'required|is_unique[akun_tiktok.id_tiktok]|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'ID TikTok harus diisi',
                    'is_unique' => 'ID TikTok sudah digunakan',
                    'min_length' => 'ID TikTok minimal 3 karakter',
                    'max_length' => 'ID TikTok maksimal 20 karakter'
                ]
            ],
            'link_tiktok' => [
                'rules' => 'required|valid_url|max_length[255]',
                'errors' => [
                    'required' => 'Link TikTok harus diisi',
                    'valid_url' => 'Link TikTok tidak valid',
                    'max_length' => 'Link TikTok terlalu panjang'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data
        try {
            $this->tiktok->save([
                'id_tiktok'   => $this->request->getPost('id_tiktok'),
                'link_tiktok' => $this->request->getPost('link_tiktok'),
            ]);
            session()->setFlashdata('success', 'Data akun TikTok berhasil ditambahkan');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }

        return redirect()->to(base_url('tiktok'));
    }

    public function edit($id)
    {
        $data['tiktok'] = $this->tiktok->find($id);
        
        if (empty($data['tiktok'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }
        
        return view('tiktok/form', $data);
    }

    public function update($id)
    {
        // Validasi
        $rules = [
            'link_tiktok' => [
                'rules' => 'required|valid_url|max_length[255]',
                'errors' => [
                    'required' => 'Link TikTok harus diisi',
                    'valid_url' => 'Link TikTok tidak valid',
                    'max_length' => 'Link TikTok terlalu panjang'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $this->tiktok->update($id, [
                'link_tiktok' => $this->request->getPost('link_tiktok')
            ]);
            session()->setFlashdata('success', 'Data akun TikTok berhasil diupdate');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Gagal mengupdate data: ' . $e->getMessage());
        }

        return redirect()->to(base_url('tiktok'));
    }

    public function delete($id)
    {
        try {
            $this->tiktok->delete($id);
            session()->setFlashdata('success', 'Data akun TikTok berhasil dihapus');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
        return redirect()->to(base_url('tiktok'));
    }
}