<?php

namespace App\Controllers;

use App\Models\PetugasModel;
use App\Models\JadwalModel;
use App\Models\ProgressModel;
use App\Models\InstagramModel;
use App\Models\FacebookModel;
use App\Models\TiktokModel;
use App\Models\EmailModel;
use App\Models\WebsiteModel;
use App\Models\WhatsappModel;

class Home extends BaseController
{
    public function index()
    {
        // Load models
        $petugasModel = new PetugasModel();
        $jadwalModel = new JadwalModel();
        $progressModel = new ProgressModel();
        $instagramModel = new InstagramModel();
        $facebookModel = new FacebookModel();
        $tiktokModel = new TiktokModel();
        $emailModel = new EmailModel();
        $websiteModel = new WebsiteModel();
        $waModel = new WhatsappModel();

        // Data untuk statistik
        $data['total_petugas'] = $petugasModel->countAll();
        $data['total_jadwal'] = $jadwalModel->countAll();
        $data['total_progress'] = $progressModel->countAll();
        
        // Jadwal hari ini
        $hari_ini = date('l');
        $hari_indonesia = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu'
        ];
        $data['jadwal_hari_ini'] = $jadwalModel->where('hari_jadwal', $hari_indonesia[$hari_ini])->countAllResults();
        
        // Jadwal terdekat - AMBIL SEMUA DULU
        $jadwal = $jadwalModel->select('jadwal_tugas.*, data_petugas.nama_petugas')
                              ->join('data_petugas', 'data_petugas.id_petugas = jadwal_tugas.id_petugas', 'left')
                              ->findAll();
        
        // URUTKAN DENGAN PHP
        $hari_urut = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        usort($jadwal, function($a, $b) use ($hari_urut) {
            $pos_a = array_search($a['hari_jadwal'], $hari_urut);
            $pos_b = array_search($b['hari_jadwal'], $hari_urut);
            if ($pos_a == $pos_b) {
                return strtotime($a['jam_jadwal']) - strtotime($b['jam_jadwal']);
            }
            return $pos_a - $pos_b;
        });
        
        // Ambil 5 jadwal teratas
        $data['jadwal_terdekat'] = array_slice($jadwal, 0, 5);

        // Total akun media sosial
        $data['total_instagram'] = $instagramModel->countAll();
        $data['total_facebook'] = $facebookModel->countAll();
        $data['total_tiktok'] = $tiktokModel->countAll();
        $data['total_email'] = $emailModel->countAll();
        $data['total_website'] = $websiteModel->countAll();
        $data['total_wa'] = $waModel->countAll();

        // Progress berdasarkan status (jika ada kolom status)
        // Jika tidak ada kolom status, bisa dihilangkan
        $data['progress_selesai'] = 0;
        $data['progress_proses'] = 0;
        $data['progress_tertunda'] = 0;

        return view('dashboard', $data);
    }
}