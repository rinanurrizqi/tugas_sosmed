<?php

namespace App\Models;
use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwal_tugas';
    protected $primaryKey = 'id_jadwal';

    protected $allowedFields = [
        'hari_jadwal',
        'jam_jadwal',
        'id_petugas',
        'id_instagram',
        'detail_tugas_insta',
        'id_facebook',
        'detail_tugas_fb',
        'id_tiktok',
        'detail_tugas_tiktok',
        'id_email',
        'detail_tugas_email',
        'id_website',
        'detail_tugas_web',
        'id_wa',
        'detail_tugas_wa'
    ];
}