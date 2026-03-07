<?php

namespace App\Controllers;

use App\Models\ProgressModel;
use App\Models\JadwalModel;
use App\Models\PetugasModel;

class Progress extends BaseController
{
    protected $progress;
    protected $jadwal;
    protected $petugas;

    public function __construct()
    {
        $this->progress = new ProgressModel();
        $this->jadwal = new JadwalModel();
        $this->petugas = new PetugasModel();
    }

    public function index()
    {
        $data = [
            'progress' => $this->progress->getProgressWithJadwal(),
            'petugas' => $this->petugas->findAll()
        ];
        return view('progress/index', $data);
    }

    public function create()
    {
        $data = [
            'jadwal' => $this->jadwal->getJadwalWithPetugas()
        ];
        return view('progress/form', $data);
    }

    public function store()
    {
        $rules = [
            'id_progress' => 'required|is_unique[progress_harian.id_progress]',
            'id_jadwal' => 'required',
            'tanggal_progress' => 'required|valid_date'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id_progress' => $this->request->getPost('id_progress'),
            'id_jadwal' => $this->request->getPost('id_jadwal'),
            'tanggal_progress' => $this->request->getPost('tanggal_progress'),
            'progress_tugas_instagram' => $this->request->getPost('progress_tugas_instagram'),
            'progress_tugas_facebook' => $this->request->getPost('progress_tugas_facebook'),
            'progress_tugas_tiktok' => $this->request->getPost('progress_tugas_tiktok'),
            'progress_tugas_email' => $this->request->getPost('progress_tugas_email'),
            'progress_tugas_website' => $this->request->getPost('progress_tugas_website'),
            'progress_tugas_wa' => $this->request->getPost('progress_tugas_wa')
        ];

        $this->progress->save($data);
        session()->setFlashdata('success', 'Progress berhasil ditambahkan');
        return redirect()->to('/progress');
    }

    public function edit($id)
    {
        $data = [
            'progress' => $this->progress->find($id),
            'jadwal' => $this->jadwal->getJadwalWithPetugas()
        ];
        
        if (!$data['progress']) {
            return redirect()->to('/progress')->with('error', 'Data tidak ditemukan');
        }
        
        return view('progress/form', $data);
    }

    public function update($id)
    {
        $rules = [
            'id_jadwal' => 'required',
            'tanggal_progress' => 'required|valid_date'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id_jadwal' => $this->request->getPost('id_jadwal'),
            'tanggal_progress' => $this->request->getPost('tanggal_progress'),
            'progress_tugas_instagram' => $this->request->getPost('progress_tugas_instagram'),
            'progress_tugas_facebook' => $this->request->getPost('progress_tugas_facebook'),
            'progress_tugas_tiktok' => $this->request->getPost('progress_tugas_tiktok'),
            'progress_tugas_email' => $this->request->getPost('progress_tugas_email'),
            'progress_tugas_website' => $this->request->getPost('progress_tugas_website'),
            'progress_tugas_wa' => $this->request->getPost('progress_tugas_wa')
        ];

        $this->progress->update($id, $data);
        session()->setFlashdata('success', 'Progress berhasil diupdate');
        return redirect()->to('/progress');
    }

    public function delete($id)
    {
        $this->progress->delete($id);
        session()->setFlashdata('success', 'Progress berhasil dihapus');
        return redirect()->to('/progress');
    }

    public function filter()
    {
        $tanggal = $this->request->getPost('tanggal');
        $id_petugas = $this->request->getPost('id_petugas');

        if ($tanggal) {
            $progress = $this->progress->getProgressByDate($tanggal);
        } elseif ($id_petugas) {
            $progress = $this->progress->getProgressByPetugas($id_petugas);
        } else {
            $progress = $this->progress->getProgressWithJadwal();
        }

        $data = [
            'progress' => $progress,
            'petugas' => $this->petugas->findAll()
        ];

        return view('progress/index', $data);
    }
}