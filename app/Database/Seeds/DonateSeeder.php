<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DonateSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'donateId'          => 'bde28478-58f8-4972-a23c-7f09d20c3cb3',
                'userId'            => '0edfc13d-6e74-4518-a6fd-abf2ace8e626',
                'creatorId'         => '8deb35e1-b7d8-4408-b8bb-77f7363bdf8c',
                'donateName'        => 'Jhony',  
                'donateAmount'      => 5000,
                'donateDescription' => 'Semangat Bang'

            ],
            [
                'donateId'          => '911b747a-a6c5-41fb-b176-f069839fd6ac',
                'userId'            => '132937b3-af6e-4a76-8402-b83142295cbb',
                'creatorId'         => '5346f8aa-b430-428b-aaa4-3738a1f24fe2',
                'donateName'        => 'Aku Anak Mama',
                'donateAmount'      => 10000,
                'donateDescription' => 'Halo Bang',

            ],
            [
                'donateId'          => '98522d14-f823-4349-84cf-13f48d86518a',  
                'userId'            => '0edfc13d-6e74-4518-a6fd-abf2ace8e626',
                'creatorId'         => '16251304-60d5-4ae2-b52e-12fc6a18c7a9',
                'donateName'        => 'Papadopulo', 
                'donateAmount'      => 20000,
                'donateDescription' => 'Sebut Namaku Bang',

            ],
            [
                'donateId'          => 'd24fbdf8-5a98-4d45-bece-33c90ab4c75a',  
                'userId'            => '0edfc13d-6e74-4518-a6fd-abf2ace8e626',
                'creatorId'         => '16251304-60d5-4ae2-b52e-12fc6a18c7a9',
                'donateName'        => 'Gplane', 
                'donateAmount'      => 100000, 
                'donateDescription' => 'Jangan Lupa Subrek Yt:Gplane',

            ],
                        
        ];

        $this->db->table('Donate')->insertBatch($data);
    }
}
