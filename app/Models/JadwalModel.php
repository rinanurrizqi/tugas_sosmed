<?php

namespace App\Models;
use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table            = 'jadwal_tugas';
    protected $primaryKey       = 'id_jadwal';
    protected $useAutoIncrement = false;
    protected $allowedFields    = [
        'id_jadwal',
        'hari_jadwal',
        'jam_jadwal',
        'id_petugas',
        'id_instagram',
        'detail_tugas_instagram',
        'id_facebook',
        'detail_tugas_facebook',
        'id_tiktok',
        'detail_tugas_tiktok',
        'id_email',
        'detail_tugas_email',
        'id_website',
        'detail_tugas_website',
        'id_wa',
        'detail_tugas_wa'
    ];
    protected $useTimestamps    = false;

    public function getJadwalWithPetugas()
    {
        return $this->select('jadwal_tugas.*, petugas.nama_petugas')
                    ->join('petugas', 'petugas.id_petugas = jadwal_tugas.id_petugas', 'left')
                    ->orderBy('FIELD(hari_jadwal, "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu")', 'ASC')
                    ->orderBy('jam_jadwal', 'ASC')
                    ->findAll();
    }
}