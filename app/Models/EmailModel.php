<?php

namespace App\Models;
use CodeIgniter\Model;

class EmailModel extends Model
{
    protected $table            = 'alamat_email';
    protected $primaryKey       = 'id_email';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['id_email', 'alamat_email'];
    protected $useTimestamps    = false;
}