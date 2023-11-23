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
                'creatorBanner'     => 'banner1.png',    
            ],
            [
                'creatorId'         => '16251304-60d5-4ae2-b52e-12fc6a18c7a9',
                'userId'            => '132937b3-af6e-4a76-8402-b83142295cbb',
                'creatorAlias'      => 'johnanime',
                'creatorTag'        => 'Actor,Musisi,Gamers',
                'creatorDescription'=> 'Halo, Saya adalah seorang Actor,Musisi,Gamers',
                'creatorSubPrice'   => '75000',
                'creatorBalance'    => '0',
                'creatorBanner'     => 'banner1.png',    
            ],
            [
                'creatorId'         => '5346f8aa-b430-428b-aaa4-3738a1f24fe2',
                'userId'            => '222c20fa-5f71-4fe6-8400-a2f7294bc81e',
                'creatorAlias'      => 'runitabodie',
                'creatorTag'        => 'Dancer,Musisi,Streamer',
                'creatorDescription'=> 'Halo, Saya adalah seorang Dancer,Musisi,Streamer',
                'creatorSubPrice'   => '125000',
                'creatorBalance'    => '0',
                'creatorBanner'     => 'banner1.png',    
            ]
        ];
    
        $this->db->table('Creator')->insertBatch($data);
    }
}
