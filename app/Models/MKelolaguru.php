<?php

namespace App\Models;

use CodeIgniter\Model;

class MKelolaguru extends Model
{
    protected $table            = 'tbl_guru';
    protected $primaryKey       = 'id_guru';
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_user', 'nip', 'jns_kelamin'];

    public function hapus($id)
    {
        $this->user = new Muser();

        $sql = "DELETE users,tbl_guru 
        FROM users,tbl_guru
        WHERE users.id_user=tbl_guru.id_user  
        AND tbl_guru.id_user= $id";

        $this->user->query($sql, array($id));
    }
}
