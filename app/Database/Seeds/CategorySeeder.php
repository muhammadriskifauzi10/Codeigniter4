<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class CategorySeeder extends Seeder
{
    public function run()
    {

        $data = [
            [
                'category' => 'Web programming',
            ],
            [
                'category' => 'Web design',
            ],
            [
                'category' => 'Web solution',
            ]
        ];

        // $this->db->table('category')->insert($data);
        $this->db->table('category')->insertBatch($data);
    }
}
