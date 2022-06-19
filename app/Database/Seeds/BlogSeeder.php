<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BlogSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        
        for($i = 1; $i <= 100; $i++) {
            $data = [
                    'judul' => $faker->words(2, true),
                    'slug'    => $faker->slug(),
                    'author'    => $faker->name(),
                    'sampul'    => 'default.jpg',
                    'created_at'    => Time::createFromTimestamp($faker->unixTime()),
                    'updated_at'    => Time::createFromTimestamp($faker->unixTime()),
                ];
            $this->db->table('blog')->insert($data);
        }

        // Simple Queries
        //$this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        //$this->db->table('blog')->insert($data);
        //$this->db->table('blog')->insertBatch($data);
    }
}
