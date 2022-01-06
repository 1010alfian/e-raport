<?php

namespace App\Models;

use CodeIgniter\Model;

class Mkelas extends Model
{
    protected $table            = 'tbl_kelas';
    protected $primaryKey       = 'id_kelas';
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_kelas', 'kelas'];
}
