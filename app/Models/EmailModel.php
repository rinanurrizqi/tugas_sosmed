<?php

namespace App\Models;
use CodeIgniter\Model;

class EmailModel extends Model
{
    protected $table = 'akun_email';
    protected $primaryKey = 'id_email';
    protected $allowedFields = ['alamat_email'];
}