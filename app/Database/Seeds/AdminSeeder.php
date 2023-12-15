<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'adminId'       => '3184a693-37b1-4a40-b7e8-e60fef26e8d3',
            'adminName'     => 'Administrator',
            'adminEmail'    => 'admin@pioniir.com',
            'adminPassword' => '$2a$12$G3L734KFl92IrEpBuWkMzOH53fpC35axI3V8gWnXnK6JctzqWDDcO'
        ];

        $this->db->table('Admin')->insert($data);
    }
}
