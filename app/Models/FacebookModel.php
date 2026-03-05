<?php

namespace App\Models;
use CodeIgniter\Model;

class FacebookModel extends Model
{
    protected $table = 'akun_facebook';
    protected $primaryKey = 'id_facebook';
    protected $allowedFields = ['link_facebook'];
}