<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblSiswa extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_siswa'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_user'       => [
                'type'       => 'INT',
                'constraint' => '2',
            ],
            'nis'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tgl_lahir'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'agama'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'jns_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_kelas'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_ayah'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'pekerjaan_ayah'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'nama_ibu'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'pekerjaan_ibu'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'Alamat'       => [
                'type'       => 'VARCHAR',
                'constraint' => '300',
                'null' => true
            ],
        ]);
        $this->forge->addKey('id_siswa', true);
        $this->forge->createTable('tbl_siswa');
    }

    public function down()
    {
        //
        $this->forge->dropTable('tbl_siswa');
    }
}
