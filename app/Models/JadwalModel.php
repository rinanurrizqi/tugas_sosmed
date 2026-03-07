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
        // Ambil data dari database dengan JOIN ke data_petugas
        $jadwal = $this->select('jadwal_tugas.*, data_petugas.nama_petugas') // <-- PERBAIKAN
                       ->join('data_petugas', 'data_petugas.id_petugas = jadwal_tugas.id_petugas', 'left') // <-- PERBAIKAN
                       ->findAll();
        
        // Urutkan dengan PHP
        $hari_urut = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        
        usort($jadwal, function($a, $b) use ($hari_urut) {
            $pos_a = array_search($a['hari_jadwal'], $hari_urut);
            $pos_b = array_search($b['hari_jadwal'], $hari_urut);
            
            if ($pos_a == $pos_b) {
                return strtotime($a['jam_jadwal']) - strtotime($b['jam_jadwal']);
            }
            return $pos_a - $pos_b;
        });
        
        return $jadwal;
    }

    public function getJadwalByHari($hari)
    {
        return $this->select('jadwal_tugas.*, data_petugas.nama_petugas') // <-- PERBAIKAN
                    ->join('data_petugas', 'data_petugas.id_petugas = jadwal_tugas.id_petugas', 'left') // <-- PERBAIKAN
                    ->where('hari_jadwal', $hari)
                    ->orderBy('jam_jadwal', 'ASC')
                    ->findAll();
    }

    public function getJadwalByPetugas($id_petugas)
    {
        return $this->select('jadwal_tugas.*, data_petugas.nama_petugas') // <-- PERBAIKAN
                    ->join('data_petugas', 'data_petugas.id_petugas = jadwal_tugas.id_petugas', 'left') // <-- PERBAIKAN
                    ->where('jadwal_tugas.id_petugas', $id_petugas)
                    ->orderBy('hari_jadwal', 'ASC')
                    ->orderBy('jam_jadwal', 'ASC')
                    ->findAll();
    }
}