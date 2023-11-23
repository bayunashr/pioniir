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
            ]
        ];

        $this->db->table('Post')->insertBatch($data);
    }
}
