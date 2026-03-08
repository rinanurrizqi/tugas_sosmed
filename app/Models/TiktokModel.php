<?php

namespace App\Models;
use CodeIgniter\Model;

class TiktokModel extends Model
{
    protected $table            = 'akun_tiktok';
    protected $primaryKey       = 'id_tiktok';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['id_tiktok', 'link_tiktok'];
    protected $useTimestamps    = false;
}