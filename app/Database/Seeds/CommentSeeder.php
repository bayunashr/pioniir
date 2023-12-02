<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'commentId' => '291b262e-e34f-4e8a-91e7-5ca3dbd11f4b',
                'userId'    => '0edfc13d-6e74-4518-a6fd-abf2ace8e626',
                'contentId' => '22c9414e-66bf-4269-8369-f3e64fabc960',
                'postId'    => NULL,
                'commentValue'    => 'Mantap Bosku',

            ],
            [
                'commentId' => 'fcd0fafe-6738-446a-a4dd-e8e469eca11d',
                'userId'    => '0edfc13d-6e74-4518-a6fd-abf2ace8e626',
                'contentId' => '22c9414e-66bf-4269-8369-f3e64fabc960',
                'postId'    => NULL,
                'commentValue'    => 'Wow', 
            ],
            [
                'commentId' => 'e73fead2-4f46-4856-aa86-5e38ec43da3e',
                'userId'    => '38f0cdc9-7268-4b5b-aca9-b8adbefbbc70',
                'contentId' => '51670990-da2b-4c3d-ada2-3c195bff0a51',
                'postId'    => NULL, 
                'commentValue'    => 'Great'

            ],
            [
                'commentId' => '7e715d62-b585-4a5f-8ffa-8c2e33bec8b8', 
                'userId'    => '38f0cdc9-7268-4b5b-aca9-b8adbefbbc70',
                'contentId' => '51670990-da2b-4c3d-ada2-3c195bff0a51',
                'postId'    => NULL,
                'commentValue'    => 'God Job'

            ],
            [
                'commentId' => '8f23ff2d-2161-4b3e-bd69-fa896ffe0248', 
                'userId'    => '38f0cdc9-7268-4b5b-aca9-b8adbefbbc70',
                'contentId' => NULL,
                'postId'    => '87dbbef1-3f84-4629-bb61-8f6625b59a6e',
                'commentValue'    => 'Sebut namaku bang'

            ],
            
        ];

        $this->db->table('Comment')->insertBatch($data);
    }
}
