<?php

namespace App\Models;

use CodeIgniter\Model;

class Msiswa extends Model
{
    protected $table            = 'tbl_siswa';
    protected $primaryKey       = 'id_siswa';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_user','nis', 'jns_kelamin', 'id_kelas'];

    public function getAll()
    {
        $builder = $this->table('tbl_siswa');
        $builder->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas');
        $builder->join('users', 'users.id_user = tbl_siswa.id_user');
        $query = $builder->paginate(10, 'tbl_siswa');
        return $query;
    }

    public function hapus($id)
    {
        $this->user = new Muser();

        $sql = "DELETE users,tbl_siswa 
        FROM users,tbl_siswa
        WHERE users.id_user=tbl_siswa.id_user  
        AND tbl_siswa.id_user= $id";

        $this->user->query($sql, array($id));
    }
}
