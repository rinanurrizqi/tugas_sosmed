<?php

namespace App\Models;
use CodeIgniter\Model;

class PetugasModel extends Model
{
    protected $table            = 'data_petugas';
    protected $primaryKey       = 'id_petugas';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['id_petugas', 'nama_petugas'];
    protected $useTimestamps    = false;
}