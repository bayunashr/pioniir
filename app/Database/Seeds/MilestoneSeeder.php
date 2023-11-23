<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MilestoneSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'milestoneId'       => 'afa6cc3a-97c2-4dff-ab62-bf852661ea81',
                'creatorId'         => '8deb35e1-b7d8-4408-b8bb-77f7363bdf8c',
                'milestoneName'     => 'Membeli Pc', 
                'milestoneBalance'  => '0',
                'milestoneTarget'   => '100000',
                'milestoneStatus'   => 'publish',

            ],          
            [
                'milestoneId'       => '1e3f7f28-1339-44d4-b681-927745ae22c6',
                'creatorId'         => '8deb35e1-b7d8-4408-b8bb-77f7363bdf8c',
                'milestoneName'     => 'Membantu Anak Yatim', 
                'milestoneBalance'  => '0', 
                'milestoneTarget'   => '150000', 
                'milestoneStatus'   => 'draft',

            ],          
            [
                'milestoneId'       => '0c444ead-2ccd-4f9a-94aa-5b3325ac3af5',
                'creatorId'         => '8deb35e1-b7d8-4408-b8bb-77f7363bdf8c', 
                'milestoneName'     => 'Jumat Berbagi', 
                'milestoneBalance'  => '0', 
                'milestoneTarget'   => '500000', 
                'milestoneStatus'   => 'archive'

            ],          
            [
                'milestoneId'       => '3f65fae3-da78-47cf-bd95-27e06eae3dd4',
                'creatorId'         => '5346f8aa-b430-428b-aaa4-3738a1f24fe2', 
                'milestoneName'     => 'Membeli Meja Baru', 
                'milestoneBalance'  => '0', 
                'milestoneTarget'   => '150000', 
                'milestoneStatus'   => 'publish'

            ],          
        ];

        $this->db->table('Milestone')->insertBatch($data);
    }
}
