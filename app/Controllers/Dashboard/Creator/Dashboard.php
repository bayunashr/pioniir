<?php

namespace App\Controllers\Dashboard\Creator;

use App\Controllers\BaseController;
use App\Models\Admin\BuyModel;
use App\Models\Admin\DonateModel;
use App\Models\Admin\SubscribeModel;
use App\Models\Admin\ContentModel;
use App\Models\Admin\PostModel;
use App\Models\Admin\UserModel;
use App\Models\Admin\CreatorModel;

class Dashboard extends BaseController
{

    public function index()
    {
        $buyModel       = new BuyModel();
        $donateModel    = new DonateModel;
        $subscribeModel = new SubscribeModel();
        $contentModel   = new ContentModel();
        $postModel      = new PostModel();
        $userModel      = new UserModel;
        $creatorModel   = new CreatorModel;

        $userData       = $userModel->where('userEmail', session()->get('userEmail'))->where('userName', session()->get('userName'))->first();
        $creatorData    = $creatorModel->where('userId', $userData['userId'])->first();

        $data = [
            'title'     => 'Dashboard - Pioniir Creator',
            'buy'       => $buyModel->getCountBuyCreator($creatorData['creatorId']),
            'donate'    => $donateModel->where('creatorId', $creatorData['creatorId'])->countAllResults(),
            'sub'       => $subscribeModel->where('creatorId', $creatorData['creatorId'])->where('subscribeStatus', 'success')->countAllResults(),
            'content'   => $contentModel->where('creatorId', $creatorData['creatorId'])->countAllResults(),
            'post'      => $postModel->where('creatorId', $creatorData['creatorId'])->countAllResults(),
        ];

        return view('dashboard/creator/dashboard', $data);
    }
}