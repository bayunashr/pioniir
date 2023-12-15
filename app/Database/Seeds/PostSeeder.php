<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'postId'        => '330c970a-adf9-487d-90a8-31914fa2f396',
                'creatorId'     => '8deb35e1-b7d8-4408-b8bb-77f7363bdf8c',
                'postTitle'     => 'Intro',
                'postValue'     => 'Halo Semua !!!',
                'postStatus'    => 'publish',
                'postLike'      => '0'

            ],
            [
                'postId'        => '87dbbef1-3f84-4629-bb61-8f6625b59a6e',
                'creatorId'     => '8deb35e1-b7d8-4408-b8bb-77f7363bdf8c',
                'postTitle'     => 'Cita Cita',
                'postValue'     => 'Siapa yang cita citanya ingin menjadi youtuber ?',
                'postStatus'    => 'draft',
                'postLike'      =>  '0'
            ],
            [
                'postId'        => '9978dd4c-1087-45bd-b2f0-f7aa2d2ce1d7',
                'creatorId'     => '8deb35e1-b7d8-4408-b8bb-77f7363bdf8c',
                'postTitle'     => 'Selamat Hari Ibu',
                'postValue'     => 'Selamat hari ibu untuk calon ibu dari anak anakku hehehe',
                'postStatus'    => 'archive',
                'postLike'      => '0'
            ],
            [
                'postId'        => '67375b71-dd90-47ad-a136-f6481d6f1622',
                'creatorId'     => '16251304-60d5-4ae2-b52e-12fc6a18c7a9',
                'postTitle'     => 'Intro',
                'postValue'     => 'Halo Semua, Saya adalah seorang Gamer',
                'postStatus'    => 'publish',
                'postLike'      => '0'
            ],
            [
                'postId'        => 'f0d072eb-694f-4d99-8464-fd44c6e5ecdd',
                'creatorId'     => '1fc022b8-42bf-44ad-8013-f4059bd9d2ec',
                'postTitle'     => 'movies',
                'postValue'     => 'Memberikan pengalaman menonton film action yang berbedza',
                'postStatus'    => 'publish',
                'postLike'      => '0'
            ],
            [
                'postId'        => '6c229dc5-b063-4dda-bbf7-7ef5e37fe477',
                'creatorId'     => '3eb74ee1-fc68-4f5d-9dfe-8cb31b628f21',
                'postTitle'     => 'Pengetahuan',
                'postValue'     => 'ilmu sejarah',
                'postStatus'    => 'publish',
                'postLike'      => '0'
            ],
            [
                'postId'        => 'd9f3d375-20be-4856-80db-11e57372c334',
                'creatorId'     => '44135a41-d63e-437a-92cb-a9ece6b4c320',
                'postTitle'     => 'Desain',
                'postValue'     => 'Memberikan video tutorial desain serta template',
                'postStatus'    => 'publish',
                'postLike'      => '0'
            ],
            [
                'postId'        => '855e52d8-d850-464f-a0e6-886410d91852',
                'creatorId'     => '7e752972-cde0-4caa-a11b-6f287dd1cf52',
                'postTitle'     => 'Desain',
                'postValue'     => 'Memberikan video tutorial desain serta template',
                'postStatus'    => 'publish',
                'postLike'      => '0'
            ]
        ];

        $this->db->table('Post')->insertBatch($data);
    }
}
