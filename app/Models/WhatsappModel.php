<?php

namespace App\Models;

use CodeIgniter\Model;

class WhatsappModel extends Model
{
    protected $table = 'akun_wa';
    protected $primaryKey = 'id_wa';
    protected $allowedFields = ['no_wa'];
    
    
    // Untuk mengambil semua data
    public function getAllWa()
    {
        return $this->orderBy('id_wa', 'DESC')->findAll();
    }
    
    // Untuk mengambil data berdasarkan ID
    public function getWaById($id)
    {
        return $this->where('id_wa', $id)->first();
    }
}