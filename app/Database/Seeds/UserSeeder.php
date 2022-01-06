<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Muser;

class UserSeeder extends Seeder
{
    public function run()
    {
        //
        $this->user = new Muser();
        $data = [

            'nama' => 'admin',
            'username' => 'admin',
            'password'    => password_hash('admin', PASSWORD_BCRYPT),
            'level'    => 1

        ];

        $this->user->insert($data);
    }
}
