<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'userId'        => '0edfc13d-6e74-4518-a6fd-abf2ace8e626',
                'userName'      => 'ahmadalim',
                'userFullName'  => 'Ahmad Halimawan',
                'userEmail'     => 'ahmadhalim@gmail.com',
                'userPassword'  => '$2a$12$G3L734KFl92IrEpBuWkMzOH53fpC35axI3V8gWnXnK6JctzqWDDcO',
                'userStatus'    => 'active',
                'userAvatar'    => 'avatar1.png',
            ],
            [
                'userId'        => '132937b3-af6e-4a76-8402-b83142295cbb',
                'userName'      => 'johnsmith',
                'userFullName'  => 'John Andreas Smith',
                'userEmail'     => 'johnsmith@gmail.com',
                'userPassword'  => '$2a$12$G3L734KFl92IrEpBuWkMzOH53fpC35axI3V8gWnXnK6JctzqWDDcO',
                'userStatus'    => 'active',
                'userAvatar'    => 'avatar1.png',
            ],
            [
                'userId'        => '38f0cdc9-7268-4b5b-aca9-b8adbefbbc70',
                'userName'      => 'robertbrown',
                'userFullName'  => 'Ahmad Robert Brown',
                'userEmail'     => 'robertbrown@gmail.com',
                'userPassword'  => '$2a$12$G3L734KFl92IrEpBuWkMzOH53fpC35axI3V8gWnXnK6JctzqWDDcO',
                'userStatus'    => 'active',
                'userAvatar'    => 'avatar1.png',
            ],
            [
                'userId'        => '222c20fa-5f71-4fe6-8400-a2f7294bc81e',
                'userName'      => 'rudiahmad',
                'userFullName'  => 'Rudi Ahmad Tabudi',
                'userEmail'     => 'rudiahmad@gmail.com',
                'userPassword'  => '$2a$12$G3L734KFl92IrEpBuWkMzOH53fpC35axI3V8gWnXnK6JctzqWDDcO',
                'userStatus'    => 'active',
                'userAvatar'    => 'avatar1.png',
            ],
            [
                'userId'        => '8cf4acff-66e6-4ef6-94c9-49c243cbd3c9',
                'userName'      => 'jonesahay',
                'userFullName'  => 'Jones Ahay Gunawan',
                'userEmail'     => 'jonesahay@gmail.com',
                'userPassword'  => '$2a$12$G3L734KFl92IrEpBuWkMzOH53fpC35axI3V8gWnXnK6JctzqWDDcO',
                'userStatus'    => 'ban',
                'userAvatar'    => 'avatar1.png',
            ]
        ];

        $this->db->table('User')->insertBatch($data);
    }
}
