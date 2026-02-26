<?php

namespace App\Models;
use CodeIgniter\Model;

class InstagramModel extends Model
{
    protected $table = 'akun_instagram';
    protected $primaryKey = 'id_instagram';
    protected $allowedFields = ['link_instagram'];
}