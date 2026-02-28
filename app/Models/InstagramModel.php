<?php

namespace App\Models;
use CodeIgniter\Model;

class InstagramModel extends Model
{
    protected $table = 'akun_instagram';
    protected $primaryKey = 'id_instagram';
    protected $allowedFields = ['id_instagram', 'link_instagram'];
    protected $useAutoIncrement = false;
    protected $useTimestamps = false;
    
    protected $validationRules = [
        'id_instagram' => 'required|min_length[3]|max_length[20]|is_unique[akun_instagram.id_instagram]',
        'link_instagram' => 'required|valid_url|max_length[255]'
    ];
    
    protected $validationMessages = [
        'id_instagram' => [
            'required' => 'ID Instagram harus diisi',
            'min_length' => 'ID Instagram minimal 3 karakter',
            'max_length' => 'ID Instagram maksimal 20 karakter',
            'is_unique' => 'ID Instagram sudah digunakan'
        ],
        'link_instagram' => [
            'required' => 'Link Instagram harus diisi',
            'valid_url' => 'Link Instagram tidak valid',
            'max_length' => 'Link Instagram terlalu panjang'
        ]
    ];
}