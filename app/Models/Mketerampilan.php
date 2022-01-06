<?php

namespace App\Models;

use CodeIgniter\Model;

class Mketerampilan extends Model
{
    protected $table            = 'nilai_keterampilan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_siswa', 'id_mapel', 'tgs', 'uts','uas','deskripsi','rata_rata'];

    
 
}
