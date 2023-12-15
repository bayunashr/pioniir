<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CreatorSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'creatorId'         => '8deb35e1-b7d8-4408-b8bb-77f7363bdf8c',
                'userId'            => '0edfc13d-6e74-4518-a6fd-abf2ace8e626',
                'creatorAlias'      => 'ahmadalim',
                'creatorTag'        => 'Streamer,Anime,Gamers',
                'creatorDescription'=> 'Halo, Saya adalah seorang Streamer,Anime,Gamers',
                'creatorSubPrice'   => '100000',
                'creatorBalance'    => '0',
                'creatorBanner'     => 'bannercreator.png',    
            ],
            [
                'creatorId'         => '16251304-60d5-4ae2-b52e-12fc6a18c7a9',
                'userId'            => '132937b3-af6e-4a76-8402-b83142295cbb',
                'creatorAlias'      => 'johnanime',
                'creatorTag'        => 'Actor,Musisi,Gamers',
                'creatorDescription'=> 'Halo, Saya adalah seorang Actor,Musisi,Gamers',
                'creatorSubPrice'   => '75000',
                'creatorBalance'    => '0',
                'creatorBanner'     => 'bannercreator.png',    
            ],
            [
                'creatorId'         => '5346f8aa-b430-428b-aaa4-3738a1f24fe2',
                'userId'            => '222c20fa-5f71-4fe6-8400-a2f7294bc81e',
                'creatorAlias'      => 'runitabodie',
                'creatorTag'        => 'Dancer,Musisi,Streamer',
                'creatorDescription'=> 'Halo, Saya adalah seorang Dancer,Musisi,Streamer',
                'creatorSubPrice'   => '125000',
                'creatorBalance'    => '0',
                'creatorBanner'     => 'bannercreator.png',    
            ],
            [
                'creatorId'         => '1fc022b8-42bf-44ad-8013-f4059bd9d2ec',
                'userId'            => 'bc13acad-6bbb-4231-b06a-d06a57c3a0db',
                'creatorAlias'      => 'coocaa',
                'creatorTag'        => 'video and film',
                'creatorDescription'=> 'good movie',
                'creatorSubPrice'   => '12000',
                'creatorBalance'    => '0',
                'creatorBanner'     => 'bannercreator.png',    
            ],
            [
                'creatorId'         => '3eb74ee1-fc68-4f5d-9dfe-8cb31b628f21',
                'userId'            => '3c85de5d-b7fc-4dd6-917e-ce9df3eee6a7',
                'creatorAlias'      => 'sastra',
                'creatorTag'        => 'news',
                'creatorDescription'=> 'sejarah terlengkap',
                'creatorSubPrice'   => '19000',
                'creatorBalance'    => '0',
                'creatorBanner'     => 'bannercreator.png',    
            ],
            [
                'creatorId'         => '44135a41-d63e-437a-92cb-a9ece6b4c320',
                'userId'            => 'd043be64-dcf7-4ee6-a40d-731ad3056c0e',
                'creatorAlias'      => 'jhoni',
                'creatorTag'        => 'art',
                'creatorDescription'=> 'digital design',
                'creatorSubPrice'   => '125000',
                'creatorBalance'    => '0',
                'creatorBanner'     => 'bannercreator.png',    
            ],
            [
                'creatorId'         => '7e752972-cde0-4caa-a11b-6f287dd1cf52',
                'userId'            => '0a8c0a27-9664-4afe-bd9f-b5f08062aeeb',
                'creatorAlias'      => 'meo',
                'creatorTag'        => 'photography',
                'creatorDescription'=> 'landscape',
                'creatorSubPrice'   => '45000',
                'creatorBalance'    => '0',
                'creatorBanner'     => 'bannercreator.png',    
            ]
        ];
    
        $this->db->table('Creator')->insertBatch($data);
    }
}