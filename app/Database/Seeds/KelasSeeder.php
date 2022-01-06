<?php

namespace App\Database\Seeds;

use App\Models\Mkelas;
use CodeIgniter\Database\Seeder;

class KelasSeeder extends Seeder
{
    public function run()
    {
        $this->user = new Mkelas();
        $data = [
            [
                'kelas' => 'Kelas 1',
            ],
            [
                'kelas' => 'Kelas 2',
            ],
            [
                'kelas' => 'Kelas 3',
            ],
            [
                'kelas' => 'Kelas 4',
            ],
            [
                'kelas' => 'Kelas 5',
            ],
            [
                'kelas' => 'Kelas 6',
            ]

        ];

        $this->user->insertbatch($data);        //
    }
}
