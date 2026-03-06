<?php

namespace App\Models;
use CodeIgniter\Model;

class WebsiteModel extends Model
{
    protected $table      = 'website';
    protected $primaryKey = 'id_website';
    protected $allowedFields = ['id_website', 'link_website'];
    protected $useAutoIncrement = false;
    protected $useTimestamps = false;
}