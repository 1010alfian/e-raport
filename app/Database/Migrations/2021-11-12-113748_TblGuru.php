<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblGuru extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_guru'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_user'       => [
                'type'       => 'INT',
                'constraint' => '2',
            ],
            'nip'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jns_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id_guru', true);
        $this->forge->createTable('tbl_guru');
    }

    public function down()
    {
        //
        $this->forge->dropTable('tbl_guru');
    }
}
