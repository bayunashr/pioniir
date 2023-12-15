<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class WithdrawSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'withdrawId'        => '288c8957-5da1-4e7a-bb4f-f07ad0d09607',
                'creatorId'         => '8deb35e1-b7d8-4408-b8bb-77f7363bdf8c',
                'withdrawAmount'    => 100000,
                'withdrawStatus'    => 'success',
            ],
            [
                'withdrawId'        => '8904bc16-1dc4-4860-b60b-036aa5631251',
                'creatorId'         => '7e752972-cde0-4caa-a11b-6f287dd1cf52',
                'withdrawAmount'    => 500000,
                'withdrawStatus'    => 'success',
            ],
            [
                'withdrawId'        => 'e2583e6e-890f-42e7-bb18-c758a260e179',
                'creatorId'         => '8deb35e1-b7d8-4408-b8bb-77f7363bdf8c',
                'withdrawAmount'    => 300000,
                'withdrawStatus'    => 'success',
            ],
            [
                'withdrawId'        => 'c7b207eb-c6a4-4144-adef-d3fa9d8a14a2',
                'creatorId'         => '3eb74ee1-fc68-4f5d-9dfe-8cb31b628f21',
                'withdrawAmount'    => 100000,
                'withdrawStatus'    => 'success',
            ],
            [
                'withdrawId'        => 'a7090c25-9284-438d-b41b-d06640763393',
                'creatorId'         => '16251304-60d5-4ae2-b52e-12fc6a18c7a9',
                'withdrawAmount'    => 100000,
                'withdrawStatus'    => 'success',
            ],
            [
                'withdrawId'        => '9cc727db-b23c-4570-ba8d-5e93a0a76719',
                'creatorId'         => '5346f8aa-b430-428b-aaa4-3738a1f24fe2',
                'withdrawAmount'    => 50000,
                'withdrawStatus'    => 'success',
            ],
            [
                'withdrawId'        => 'dabe9077-ffac-4a0e-9a24-dcbc681fbb7c',
                'creatorId'         => '44135a41-d63e-437a-92cb-a9ece6b4c320',
                'withdrawAmount'    => 50000,
                'withdrawStatus'    => 'success',
            ],
            [
                'withdrawId'        => '5769e663-bdfc-445a-96fd-5ef06fb2c12c',
                'creatorId'         => '8deb35e1-b7d8-4408-b8bb-77f7363bdf8c',
                'withdrawAmount'    => 200000,
                'withdrawStatus'    => 'success',
            ],
            [
                'withdrawId'        => '8f648d36-1a6b-4e90-b732-4db39b6047f3',
                'creatorId'         => '1fc022b8-42bf-44ad-8013-f4059bd9d2ec',
                'withdrawAmount'    => 900000,
                'withdrawStatus'    => 'success',
            ],
        ];
    
            $this->db->table('Withdraw')->insertBatch($data);
    }
}