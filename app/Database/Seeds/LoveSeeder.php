<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LoveSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'loveId'    => 'd67d0f21-8a08-11ee-9add-1413330bc309',
                'userId'    => '8cf4acff-66e6-4ef6-94c9-49c243cbd3c9',
                'contentId' => '83f31b3b-1a47-41a7-a315-44d55360a771',
                'postId'    => NULL
            ],
            [
                'loveId'    => '2178c70a-8a09-11ee-9add-1413330bc309',
                'userId'    => '0edfc13d-6e74-4518-a6fd-abf2ace8e626',
                'contentId' => '51670990-da2b-4c3d-ada2-3c195bff0a51',
                'postId'    => NULL
            ],
            [
                'loveId'    => '2178d0eb-8a09-11ee-9add-1413330bc309',
                'userId'    => '8cf4acff-66e6-4ef6-94c9-49c243cbd3c9',
                'contentId' => NULL,
                'postId'    => '9978dd4c-1087-45bd-b2f0-f7aa2d2ce1d7'
            ],
            [
                'loveId'    => 'a0ef5536-8a09-11ee-9add-1413330bc309',
                'userId'    => '132937b3-af6e-4a76-8402-b83142295cbb',
                'contentId' => 'f232ca35-87c5-11ee-8d7c-1413330bc309',
                'postId'    => NULL
            ],
            [
                'loveId'    => 'a0ef5fa2-8a09-11ee-9add-1413330bc309',
                'userId'    => '222c20fa-5f71-4fe6-8400-a2f7294bc81e',
                'contentId' => NULL,
                'postId'    => '87dbbef1-3f84-4629-bb61-8f6625b59a6e'
            ]
        ];

        $this->db->table('Love')->insertBatch($data);
    }
}
