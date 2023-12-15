<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SubscribeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'subId'     => 'b16ec7f4-27a5-4495-97a8-b05306e59d54',
                'userId'    => '0a8c0a27-9664-4afe-bd9f-b5f08062aeeb',
                'creatorId' => '16251304-60d5-4ae2-b52e-12fc6a18c7a9'

            ],
            [
                'subId'     => '69cf82bc-e743-4b52-8157-fa0e735f6f72',
                'userId'    => '0a8c0a27-9664-4afe-bd9f-b5f08062aeeb',
                'creatorId' => '1fc022b8-42bf-44ad-8013-f4059bd9d2ec'

            ],
            [
                'subId'     => 'ad1f09be-3005-4be2-bd3b-612ac820ea60',
                'userId'    => 'cf234ed3-3a4a-4bea-be28-4aa8e25b12c0',
                'creatorId' => '16251304-60d5-4ae2-b52e-12fc6a18c7a9'

            ],
            [
                'subId'     => 'ab90d084-6810-42df-afc8-eea20f6b9088',
                'userId'    => 'cf234ed3-3a4a-4bea-be28-4aa8e25b12c0',
                'creatorId' => '16251304-60d5-4ae2-b52e-12fc6a18c7a9',

            ],
            [
                'subId'     => '77e70889-95ef-4182-b35e-b8d2af5c032d',
                'userId'    => '731b7a70-ab78-403b-89bd-431f71924492',
                'creatorId' => '1fc022b8-42bf-44ad-8013-f4059bd9d2ec',

            ],
            [
                'subId'     => '365c5122-b660-4542-887c-40a46d13d438',
                'userId'    => '731b7a70-ab78-403b-89bd-431f71924492',
                'creatorId' => '3eb74ee1-fc68-4f5d-9dfe-8cb31b628f21',

            ],
            [
                'subId'     => '853aa9fc-f973-4146-bec8-5888a0269cbb',
                'userId'    => '3c85de5d-b7fc-4dd6-917e-ce9df3eee6a7',
                'creatorId' => '44135a41-d63e-437a-92cb-a9ece6b4c320',

            ],
            [
                'subId'     => 'fbb28dc9-95a6-4c31-977e-0ff0869d2e8b',
                'userId'    => '3c85de5d-b7fc-4dd6-917e-ce9df3eee6a7',
                'creatorId' => '1fc022b8-42bf-44ad-8013-f4059bd9d2ec',

            ],
            
        ];

        $this->db->table('Subscribe')->insertBatch($data);
    }
}