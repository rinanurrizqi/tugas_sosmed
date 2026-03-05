<?php

namespace App\Models;
use CodeIgniter\Model;

class TiktokModel extends Model
{
    protected $table = 'akun_tiktok';
    protected $primaryKey = 'id_tiktok';
    protected $allowedFields = ['link_tiktok'];
}