<?php

namespace App\Controllers;
use App\Models\PetugasModel;

class Petugas extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new PetugasModel();
    }

    public function index()
    {
        $data['petugas'] = $this->model->findAll();
        return view('petugas/index', $data);
    }

    public function create()
    {
        return view('petugas/form');
    }

    public function store()
    {
        // Validasi
        $rules = [
            'id_petugas' => [
                'rules' => 'required|is_unique[data_petugas.id_petugas]|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'ID Petugas harus diisi',
                    'is_unique' => 'ID Petugas sudah digunakan',
                    'min_length' => 'ID Petugas minimal 3 karakter',
                    'max_length' => 'ID Petugas maksimal 20 karakter'
                ]
            ],
            'nama_petugas' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Nama Petugas harus diisi',
                    'min_length' => 'Nama Petugas minimal 3 karakter',
                    'max_length' => 'Nama Petugas maksimal 100 karakter'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data
        $this->model->insert([
            'id_petugas'   => $this->request->getPost('id_petugas'),
            'nama_petugas' => $this->request->getPost('nama_petugas'),
        ]);

        session()->setFlashdata('success', 'Data petugas berhasil ditambahkan');
        return redirect()->to(base_url('petugas'));
    }

    public function edit($id)
    {
        $data['petugas'] = $this->model->find($id);
        
        if (empty($data['petugas'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }
        
        return view('petugas/form', $data);
    }

    public function update($id)
    {
        // Validasi
        $rules = [
            'nama_petugas' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Nama Petugas harus diisi',
                    'min_length' => 'Nama Petugas minimal 3 karakter',
                    'max_length' => 'Nama Petugas maksimal 100 karakter'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->model->update($id, [
            'nama_petugas' => $this->request->getPost('nama_petugas'),
        ]);

        session()->setFlashdata('success', 'Data petugas berhasil diupdate');
        return redirect()->to(base_url('petugas'));
    }

    public function delete($id)
    {
        $this->model->delete($id);
        session()->setFlashdata('success', 'Data petugas berhasil dihapus');
        return redirect()->to(base_url('petugas'));
    }
}