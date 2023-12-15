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
            ],
            [
                'userId'        => '0a8c0a27-9664-4afe-bd9f-b5f08062aeeb',
                'userName'      => 'meo',
                'userFullName'  => 'meoning',
                'userEmail'     => 'meoning@gmail.com',
                'userPassword'  => '$2y$10$kMEY7Y6.V8knWE6tWpaO4ez4HjvU1Q5t41Km4zVnHfI3HwBxsocKq',
                'userStatus'    => 'active',
                'userAvatar'    => '5.jpg',
            ],
            [
                'userId'        => '3c85de5d-b7fc-4dd6-917e-ce9df3eee6a7',
                'userName'      => 'sastra',
                'userFullName'  => 'sastrawati',
                'userEmail'     => 'sastra@gmail.com',
                'userPassword'  => '$2y$10$WiTHYpCcbirXZJrWG2S/jORhb36EhPf1WC4U289d7St.T6iJWgNO6',
                'userStatus'    => 'active',
                'userAvatar'    => '5.jpg',
            ],
            [
                'userId'        => 'd043be64-dcf7-4ee6-a40d-731ad3056c0e',
                'userName'      => 'jhoni',
                'userFullName'  => 'jhoni peni',
                'userEmail'     => 'jhoni@gmail.com',
                'userPassword'  => '$2y$10$L2FW3c8eGBssuIrL1.q9Q..twgVfYY4sKv09.KkZuzmVIvmfnhm26',
                'userStatus'    => 'active',
                'userAvatar'    => '8.jpg',
            ],
            [
                'userId'        => '731b7a70-ab78-403b-89bd-431f71924492',
                'userName'      => 'jumawa',
                'userFullName'  => 'jumawa',
                'userEmail'     => 'jumawa@gmail.com',
                'userPassword'  => '$2y$10$o.Wfv1RuJUXemeB9hLXpE.yqDpMS7FrNDtv0HarUPIp8yR9sicF..',
                'userStatus'    => 'active',
                'userAvatar'    => '4.jpg',
            ],
            [
                'userId'        => 'cf234ed3-3a4a-4bea-be28-4aa8e25b12c0',
                'userName'      => 'sanny',
                'userFullName'  => 'sanny oni',
                'userEmail'     => 'sanny@gmail.com',
                'userPassword'  => '$2y$10$JgorKJSPMOFXEKgi/KJdjOcFNo//IJvjawTX0VGrGAwwZE/2TL4JS',
                'userStatus'    => 'active',
                'userAvatar'    => '5.jpg',
            ],
            [
                'userId'        => 'bc13acad-6bbb-4231-b06a-d06a57c3a0db',
                'userName'      => 'coocaa',
                'userFullName'  => 'aci acian',
                'userEmail'     => 'coocaa@gmail.com',
                'userPassword'  => '$2y$10$qbrn3jC5BtZc4tfani295.tGmfagLZbeFHmcEDPPKGbypePuCrMom',
                'userStatus'    => 'active',
                'userAvatar'    => '7.jpg',
            ]
        ];

        $this->db->table('User')->insertBatch($data);
    }
}
