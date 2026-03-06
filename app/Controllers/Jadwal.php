<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\PetugasModel;

class Jadwal extends BaseController
{
    protected $jadwal;
    protected $petugas;

    public function __construct()
    {
        $this->jadwal = new JadwalModel();
        $this->petugas = new PetugasModel();
    }

    public function index()
    {
        $data = [
            'jadwal' => $this->jadwal->getJadwalWithPetugas(),
            'petugas' => $this->petugas->findAll()
        ];
        return view('jadwal/index', $data);
    }

    public function create()
    {
        $data = [
            'petugas' => $this->petugas->findAll()
        ];
        return view('jadwal/form', $data);
    }

    public function store()
    {
        $rules = [
            'id_jadwal' => 'required|is_unique[jadwal_tugas.id_jadwal]',
            'id_petugas' => 'required',
            'hari_jadwal' => 'required',
            'jam_jadwal' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id_jadwal' => $this->request->getPost('id_jadwal'),
            'hari_jadwal' => $this->request->getPost('hari_jadwal'),
            'jam_jadwal' => $this->request->getPost('jam_jadwal'),
            'id_petugas' => $this->request->getPost('id_petugas'),
            'id_instagram' => $this->request->getPost('id_instagram'),
            'detail_tugas_instagram' => $this->request->getPost('detail_tugas_instagram'),
            'id_facebook' => $this->request->getPost('id_facebook'),
            'detail_tugas_facebook' => $this->request->getPost('detail_tugas_facebook'),
            'id_tiktok' => $this->request->getPost('id_tiktok'),
            'detail_tugas_tiktok' => $this->request->getPost('detail_tugas_tiktok'),
            'id_email' => $this->request->getPost('id_email'),
            'detail_tugas_email' => $this->request->getPost('detail_tugas_email'),
            'id_website' => $this->request->getPost('id_website'),
            'detail_tugas_website' => $this->request->getPost('detail_tugas_website'),
            'id_wa' => $this->request->getPost('id_wa'),
            'detail_tugas_wa' => $this->request->getPost('detail_tugas_wa')
        ];

        $this->jadwal->save($data);
        session()->setFlashdata('success', 'Jadwal berhasil ditambahkan');
        return redirect()->to('/jadwal');
    }

    public function edit($id)
    {
        $data = [
            'jadwal' => $this->jadwal->find($id),
            'petugas' => $this->petugas->findAll()
        ];
        
        if (!$data['jadwal']) {
            return redirect()->to('/jadwal')->with('error', 'Data tidak ditemukan');
        }
        
        return view('jadwal/form', $data);
    }

    public function update($id)
    {
        $rules = [
            'id_petugas' => 'required',
            'hari_jadwal' => 'required',
            'jam_jadwal' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'hari_jadwal' => $this->request->getPost('hari_jadwal'),
            'jam_jadwal' => $this->request->getPost('jam_jadwal'),
            'id_petugas' => $this->request->getPost('id_petugas'),
            'id_instagram' => $this->request->getPost('id_instagram'),
            'detail_tugas_instagram' => $this->request->getPost('detail_tugas_instagram'),
            'id_facebook' => $this->request->getPost('id_facebook'),
            'detail_tugas_facebook' => $this->request->getPost('detail_tugas_facebook'),
            'id_tiktok' => $this->request->getPost('id_tiktok'),
            'detail_tugas_tiktok' => $this->request->getPost('detail_tugas_tiktok'),
            'id_email' => $this->request->getPost('id_email'),
            'detail_tugas_email' => $this->request->getPost('detail_tugas_email'),
            'id_website' => $this->request->getPost('id_website'),
            'detail_tugas_website' => $this->request->getPost('detail_tugas_website'),
            'id_wa' => $this->request->getPost('id_wa'),
            'detail_tugas_wa' => $this->request->getPost('detail_tugas_wa')
        ];

        $this->jadwal->update($id, $data);
        session()->setFlashdata('success', 'Jadwal berhasil diupdate');
        return redirect()->to('/jadwal');
    }

    public function delete($id)
    {
        $this->jadwal->delete($id);
        session()->setFlashdata('success', 'Jadwal berhasil dihapus');
        return redirect()->to('/jadwal');
    }

    public function filter()
    {
        $hari = $this->request->getPost('hari');
        $id_petugas = $this->request->getPost('id_petugas');

        $query = $this->jadwal->select('jadwal_tugas.*, petugas.nama_petugas')
                              ->join('petugas', 'petugas.id_petugas = jadwal_tugas.id_petugas', 'left');

        if ($hari) {
            $query->where('hari_jadwal', $hari);
        }
        
        if ($id_petugas) {
            $query->where('jadwal_tugas.id_petugas', $id_petugas);
        }

        $data = [
            'jadwal' => $query->orderBy('hari_jadwal, jam_jadwal', 'ASC')->findAll(),
            'petugas' => $this->petugas->findAll()
        ];

        return view('jadwal/index', $data);
    }
}