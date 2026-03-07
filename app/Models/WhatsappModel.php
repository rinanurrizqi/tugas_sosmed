<?php

namespace App\Models;
use CodeIgniter\Model;

class WhatsappModel extends Model
{
    protected $table            = 'akun_wa'; // nama tabel di database
    protected $primaryKey       = 'id_wa';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['id_wa', 'no_wa'];
    protected $useTimestamps    = false;
}