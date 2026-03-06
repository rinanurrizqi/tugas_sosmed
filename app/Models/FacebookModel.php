<?php

namespace App\Models;
use CodeIgniter\Model;

class FacebookModel extends Model
{
    protected $table            = 'akun_facebook';
    protected $primaryKey       = 'id_facebook';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['id_facebook', 'link_facebook'];
    protected $useTimestamps    = false;
}