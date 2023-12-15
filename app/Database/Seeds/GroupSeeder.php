<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GroupSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('CreatorSeeder');
        $this->call('PostSeeder');
        $this->call('SubscribeSeeder');
        $this->call('ContentSeeder');
        $this->call('BuySeeder');
        $this->call('LoveSeeder');
        $this->call('DonateSeeder');
        $this->call('MilestoneSeeder');
        $this->call('CommentSeeder');
        $this->call('WithdrawSeeder');
        $this->call('SocialSeeder');
        $this->call('AdminSeeder');
    }
}
