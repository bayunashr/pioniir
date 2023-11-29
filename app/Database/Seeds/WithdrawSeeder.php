<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class WithdrawSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'withdrawId'        => 'e2583e6e-890f-42e7-bb18-c758a260e179',
                'creatorId'         => '8deb35e1-b7d8-4408-b8bb-77f7363bdf8c',
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
                'withdrawId'        => '5769e663-bdfc-445a-96fd-5ef06fb2c12c',
                'creatorId'         => '8deb35e1-b7d8-4408-b8bb-77f7363bdf8c',
                'withdrawAmount'    => 200000,
                'withdrawStatus'    => 'success',
            ],
        ];
    
            $this->db->table('Withdraw')->insertBatch($data);
    }
}
