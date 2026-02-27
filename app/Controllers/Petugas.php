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
        $this->model->insert([
            'id_petugas'   => $this->request->getPost('id_petugas'),
            'nama_petugas' => $this->request->getPost('nama_petugas'),
        ]);
        return redirect()->to(base_url('petugas'));
    }

    public function edit($id)
    {
        $data['petugas'] = $this->model->find($id);
        return view('petugas/form', $data);
    }

    public function update($id)
    {
        $this->model->update($id, [
            'nama_petugas' => $this->request->getPost('nama_petugas'),
        ]);
        return redirect()->to(base_url('petugas'));
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to(base_url('petugas'));
    }
}