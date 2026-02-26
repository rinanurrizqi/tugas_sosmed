<?php

namespace App\Controllers;
use App\Models\PetugasModel;

class Petugas extends BaseController
{
    protected $petugas;

    public function __construct()
    {
        $this->petugas = new PetugasModel();
    }

    public function index()
    {
        $data['petugas'] = $this->petugas->findAll();
        return view('petugas/index', $data);
    }

    public function create()
    {
        return view('petugas/form');
    }

    public function store()
    {
        $this->petugas->save([
            'nama_petugas' => $this->request->getPost('nama_petugas')
        ]);

        return redirect()->to('/petugas');
    }

    public function edit($id)
    {
        $data['petugas'] = $this->petugas->find($id);
        return view('petugas/form', $data);
    }

    public function update($id)
    {
        $this->petugas->update($id, [
            'nama_petugas' => $this->request->getPost('nama_petugas')
        ]);

        return redirect()->to('/petugas');
    }

    public function delete($id)
    {
        $this->petugas->delete($id);
        return redirect()->to('/petugas');
    }
}