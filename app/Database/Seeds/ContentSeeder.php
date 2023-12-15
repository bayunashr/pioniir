<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'contentId'         => 'f232ca35-87c5-11ee-8d7c-1413330bc309',
                'creatorId'         => '8deb35e1-b7d8-4408-b8bb-77f7363bdf8c',
                'contentTitle'      => 'Walpaper Hd',
                'contentValue'      => '<div><img class=\'w-100\' src=\'<?= base_url(\'\') ?>assets/dashboard/media/photos/photo32.jpg\' alt=\'\'><br><p>Walpaper Hd</p></div>',
                'contentStatus'     => 'draft',
                'contentPrice'      => '5000',
                'contentPreview'    => '<div><img src=\'<?= base_url(\'\') ?>assets/dashboard/media/photos/photo32.jpg\' alt=\'\'></div>',
                'contentDownload'   => 'https://drive.google.com/drive/folders/1IeYvFRIgYrlMrz3LYfBapdCo9OcW607A',
                'contentLike'       => '0'
            ],  
            [
                'contentId'         => '83f31b3b-1a47-41a7-a315-44d55360a771',
                'creatorId'         => '8deb35e1-b7d8-4408-b8bb-77f7363bdf8c',
                'contentTitle'      => 'Music',
                'contentValue'      => '<div><img class=\'w-100\' src=\'<?= base_url(\'\') ?>assets/dashboard/media/photos/photo32.jpg\' alt=\'\'><br><p>Musik</p></div>',
                'contentStatus'     => 'publish',
                'contentPrice'      => '50000',
                'contentPreview'    => '<div><img src=\'<?= base_url(\'\') ?>assets/dashboard/media/photos/photo32.jpg\' alt=\'\'></div>',
                'contentDownload'   => 'https://drive.google.com/drive/folders/1IeYvFRIgYrlMrz3LYfBapdCo9OcW607A',
                'contentLike'       => '0'
            ],  
            [
                'contentId'         => '51670990-da2b-4c3d-ada2-3c195bff0a51', 
                'creatorId'         => '8deb35e1-b7d8-4408-b8bb-77f7363bdf8c',
                'contentTitle'      => 'Gambar Vektor',
                'contentValue'      => '<div><img class=\'w-100\' src=\'<?= base_url(\'\') ?>assets/dashboard/media/photos/photo32.jpg\' alt=\'\'><br><p>Gambar Vector</p></div>',
                'contentStatus'     => 'archive',
                'contentPrice'      => '15000',
                'contentPreview'    => '<div><img src=\'<?= base_url(\'\') ?>assets/dashboard/media/photos/photo32.jpg\' alt=\'\'></div>',
                'contentDownload'   => 'https://drive.google.com/drive/folders/1IeYvFRIgYrlMrz3LYfBapdCo9OcW607A',
                'contentLike'       => '0'
            ],  
            [
                'contentId'         => '22c9414e-66bf-4269-8369-f3e64fabc960',
                'creatorId'         => '5346f8aa-b430-428b-aaa4-3738a1f24fe2',
                'contentTitle'      => 'Walpaper Anime',
                'contentValue'      => '<div><img class=\'w-100\' src=\'<?= base_url(\'\') ?>assets/dashboard/media/photos/photo32.jpg\' alt=\'\'><br><p>Walpaper Anime</p></div>',
                'contentStatus'     => 'publish', 
                'contentPrice'      => '9000',
                'contentPreview'    => '<div><img src=\'<?= base_url(\'\') ?>assets/dashboard/media/photos/photo32.jpg\' alt=\'\'></div>',
                'contentDownload'   => 'https://drive.google.com/drive/folders/1IeYvFRIgYrlMrz3LYfBapdCo9OcW607A',
                'contentLike'       => '0'
            ],  
        ];

        $this->db->table('Content')->insertBatch($data);
    }
}
