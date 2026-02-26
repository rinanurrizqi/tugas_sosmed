<?php

namespace App\Models;
use CodeIgniter\Model;

class WaModel extends Model
{
    protected $table = 'akun_wa';
    protected $primaryKey = 'id_wa';
    protected $allowedFields = ['no_wa'];
}