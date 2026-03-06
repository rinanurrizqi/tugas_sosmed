<?php

namespace App\Controllers;

use App\Models\WebsiteModel;

class Website extends BaseController
{
    public function index()
    {
        $model = new WebsiteModel();
        $data['website'] = $model->findAll();
        return view('website/index', $data);
    }

    public function create()
    {
        return view('website/form');
    }

    public function store()
    {
        $model = new WebsiteModel();
        
        $data = [
            'id_website'   => $this->request->getPost('id_website'),
            'link_website' => $this->request->getPost('link_website')
        ];

        if ($model->insert($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data');
        }

        return redirect()->to('/website');
    }

    public function edit($id)
    {
        $model = new WebsiteModel();
        $data['website'] = $model->find($id);
        
        if (empty($data['website'])) {
            return redirect()->to('/website');
        }
        
        return view('website/form', $data);
    }

    public function update($id)
    {
        $model = new WebsiteModel();
        
        $data = [
            'link_website' => $this->request->getPost('link_website')
        ];

        if ($model->update($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diupdate');
        } else {
            session()->setFlashdata('error', 'Gagal mengupdate data');
        }

        return redirect()->to('/website');
    }

    public function delete($id)
    {
        $model = new WebsiteModel();
        
        if ($model->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data');
        }

        return redirect()->to('/website');
    }
}