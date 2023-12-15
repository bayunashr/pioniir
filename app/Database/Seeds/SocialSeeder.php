<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SocialSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'socialId'      => '941d846d-76fd-4002-b053-823d321af2b3',
                'creatorId'     => '8deb35e1-b7d8-4408-b8bb-77f7363bdf8c',
                'socialMedia'   => 'facebook',
                'socialLink'    => 'ahmadalim'
            ],
            [
                'socialId'      => '88c4b194-ed6e-42e1-8bf1-1800876d4e9f',
                'creatorId'     => '8deb35e1-b7d8-4408-b8bb-77f7363bdf8c',
                'socialMedia'   => 'instagram',
                'socialLink'    => 'ahmadalim'
            ],
            [
                'socialId'      => '74aefb9a-6796-45f6-8193-00af7afe42cf',
                'creatorId'     => '8deb35e1-b7d8-4408-b8bb-77f7363bdf8c',
                'socialMedia'   => 'twitch',
                'socialLink'    => 'ahmadalim'
            ],
            [
                'socialId'      => 'd33f1011-6903-4ced-8a0c-042aff938a95',
                'creatorId'     => '8deb35e1-b7d8-4408-b8bb-77f7363bdf8c',
                'socialMedia'   => 'website',
                'socialLink'    => 'ahmadalim.my.id'
            ],
        ];

        $this->db->table('Social')->insertBatch($data);
    }
}