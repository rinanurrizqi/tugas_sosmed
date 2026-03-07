<?php

namespace App\Models;
use CodeIgniter\Model;

class ProgressModel extends Model
{
    protected $table            = 'progress_harian';
    protected $primaryKey       = 'id_progress';
    protected $useAutoIncrement = false;
    protected $allowedFields    = [
        'id_progress',
        'id_jadwal',
        'tanggal_progress',
        'progress_tugas_instagram',
        'progress_tugas_facebook',
        'progress_tugas_tiktok',
        'progress_tugas_email',
        'progress_tugas_website',
        'progress_tugas_wa'
    ];
    protected $useTimestamps    = false;

    public function getProgressWithJadwal()
    {
        return $this->select('progress_harian.*, jadwal_tugas.hari_jadwal, jadwal_tugas.jam_jadwal, data_petugas.nama_petugas')
                    ->join('jadwal_tugas', 'jadwal_tugas.id_jadwal = progress_harian.id_jadwal', 'left')
                    ->join('data_petugas', 'data_petugas.id_petugas = jadwal_tugas.id_petugas', 'left')
                    ->orderBy('progress_harian.tanggal_progress', 'DESC')
                    ->orderBy('jadwal_tugas.jam_jadwal', 'ASC')
                    ->findAll();
    }

    public function getProgressByDate($tanggal)
    {
        return $this->select('progress_harian.*, jadwal_tugas.hari_jadwal, jadwal_tugas.jam_jadwal, data_petugas.nama_petugas')
                    ->join('jadwal_tugas', 'jadwal_tugas.id_jadwal = progress_harian.id_jadwal', 'left')
                    ->join('data_petugas', 'data_petugas.id_petugas = jadwal_tugas.id_petugas', 'left')
                    ->where('progress_harian.tanggal_progress', $tanggal)
                    ->orderBy('jadwal_tugas.jam_jadwal', 'ASC')
                    ->findAll();
    }

    public function getProgressByPetugas($id_petugas)
    {
        return $this->select('progress_harian.*, jadwal_tugas.hari_jadwal, jadwal_tugas.jam_jadwal, data_petugas.nama_petugas')
                    ->join('jadwal_tugas', 'jadwal_tugas.id_jadwal = progress_harian.id_jadwal', 'left')
                    ->join('data_petugas', 'data_petugas.id_petugas = jadwal_tugas.id_petugas', 'left')
                    ->where('jadwal_tugas.id_petugas', $id_petugas)
                    ->orderBy('progress_harian.tanggal_progress', 'DESC')
                    ->orderBy('jadwal_tugas.jam_jadwal', 'ASC')
                    ->findAll();
    }
}