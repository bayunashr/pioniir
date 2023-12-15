<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BuySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'buyId'     => 'a5d4e47d-87c7-11ee-8d7c-1413330bc309',
                'userId'    => '132937b3-af6e-4a76-8402-b83142295cbb',
                'contentId' => '83f31b3b-1a47-41a7-a315-44d55360a771',
            ],
            [
                'buyId'     => 'a5d4ef59-87c7-11ee-8d7c-1413330bc309',
                'userId'    => '38f0cdc9-7268-4b5b-aca9-b8adbefbbc70',
                'contentId' => 'f232ca35-87c5-11ee-8d7c-1413330bc309',
            ],
            [
                'buyId'     => 'a5d4f87f-87c7-11ee-8d7c-1413330bc309',
                'userId'    => '8cf4acff-66e6-4ef6-94c9-49c243cbd3c9',
                'contentId' => 'f232ca35-87c5-11ee-8d7c-1413330bc309',
            ],
            [
                'buyId'     => 'a5d5019a-87c7-11ee-8d7c-1413330bc309',
                'userId'    => '0edfc13d-6e74-4518-a6fd-abf2ace8e626',
                'contentId' => '83f31b3b-1a47-41a7-a315-44d55360a771',
            ],
        ];

        $this->db->table('Buy')->insertBatch($data);
    }
}
