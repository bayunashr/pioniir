<?php

namespace App\Controllers\Dashboard\Creator;

use App\Controllers\BaseController;
use App\Models\BuyModel;
use App\Models\DonateModel;
use App\Models\SubscribeModel;
use App\Models\ContentModel;
use App\Models\PostModel;
use App\Models\UserModel;
use App\Models\CreatorModel;
use App\Models\NotificationModel;

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
        $notifModel     = new NotificationModel;

        $userData       = $userModel->where('userEmail', session()->get('userEmail'))->where('userName', session()->get('userName'))->first();
        $creatorData    = $creatorModel->where('userId', $userData['userId'])->first();

        $data = [
            'title'     => 'Dashboard - Pioniir Creator',
            'buy'       => $buyModel->getCountBuyCreator($creatorData['creatorId']),
            'donate'    => $donateModel->where('creatorId', $creatorData['creatorId'])->countAllResults(),
            'sub'       => $subscribeModel->where('creatorId', $creatorData['creatorId'])->where('subscribeStatus', 'success')->countAllResults(),
            'content'   => $contentModel->where('creatorId', $creatorData['creatorId'])->countAllResults(),
            'post'      => $postModel->where('creatorId', $creatorData['creatorId'])->countAllResults(),
            'notif'     => $notifModel->selectAllById($creatorData['userId']),
            'user'      => $userData,
            'creator'   => $creatorData,
        ];

        return view('dashboard/creator/dashboard', $data);
    }
}