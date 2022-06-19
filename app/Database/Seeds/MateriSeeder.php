<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MateriSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category_id' => 3,
                'materi' => 'Bootstrap 5',
            ],
            [
                'category_id' => 3,
                'materi' => 'Codeigniter 4',
            ],
            [
                'category_id' => 3,
                'materi' => 'Laravel 9',
            ]
        ];

        // $this->db->table('materi')->insert($data);
        $this->db->table('materi')->insertBatch($data);
    }
}
