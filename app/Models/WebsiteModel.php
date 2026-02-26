<?php

namespace App\Models;
use CodeIgniter\Model;

class WebsiteModel extends Model
{
    protected $table = 'website';
    protected $primaryKey = 'id_website';
    protected $allowedFields = ['link_website'];
}