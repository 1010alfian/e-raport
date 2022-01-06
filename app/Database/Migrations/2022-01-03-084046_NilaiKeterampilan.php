<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NilaiKeterampilan extends Migration
{
    public function up()
    {
        ////
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_siswa'          => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'id_mapel'          => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'tgs'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 200,
                'null'           => true
            ],
            'uts'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 200,
                'null'           => true
            ],
            'uas'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 200,
                'null'           => true
            ],
            'deskripsi'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 1000,
                'null'           => true
            ],
            'rata_rata'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 1000,
                'null'           => true
            ],
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('nilai_keterampilan');
    }

    public function down()
    {
        //
        $this->forge->dropTable('nilai_keterampilan');
    }
}
