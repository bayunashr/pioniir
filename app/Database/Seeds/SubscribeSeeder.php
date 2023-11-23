<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SubscribeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'subId'     => '40951a73-87c3-11ee-8d7c-1413330bc309',
                'userId'    => '0edfc13d-6e74-4518-a6fd-abf2ace8e626',
                'creatorId' => '16251304-60d5-4ae2-b52e-12fc6a18c7a9'

            ],
            [
                'subId'     => '409522c1-87c3-11ee-8d7c-1413330bc309',
                'userId'    => '8cf4acff-66e6-4ef6-94c9-49c243cbd3c9',
                'creatorId' => '5346f8aa-b430-428b-aaa4-3738a1f24fe2'

            ],
            [
                'subId'     => '40952940-87c3-11ee-8d7c-1413330bc309',
                'userId'    => '38f0cdc9-7268-4b5b-aca9-b8adbefbbc70',
                'creatorId' => '16251304-60d5-4ae2-b52e-12fc6a18c7a9'

            ],
            [
                'subId'     => '4095300b-87c3-11ee-8d7c-1413330bc309',
                'userId'    => '222c20fa-5f71-4fe6-8400-a2f7294bc81e',
                'creatorId' => '16251304-60d5-4ae2-b52e-12fc6a18c7a9',

            ],
            
        ];

        $this->db->table('Subscribe')->insertBatch($data);
    }
}
