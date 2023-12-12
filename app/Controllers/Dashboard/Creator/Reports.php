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

class Reports extends BaseController
{
    protected $userData, $creatorData, $userModel, $creatorModel, $postModel, $notifModel;
    function __construct()
    {
        $this->userModel = new UserModel();
        $this->creatorModel = new CreatorModel();
        $this->postModel = new PostModel();
        $this->notifModel = new NotificationModel();
        $this->userData = $this->userModel->where('userEmail', session()->get('userEmail'))->where('userName', session()->get('userName'))->first();
        $this->creatorData = $this->creatorModel->where('userId', $this->userData['userId'])->first();
    }

    public function communities()
    {
        $data = [
            'title' => 'Communities Report - Pioniir Creator',
            'user'      => $this->userData,
            'creator'   => $this->creatorData,
            'notif'     => $this->notifModel->selectAllById($this->creatorData['userId']),
        ];
        return view('dashboard/creator/reports/communities', $data);
    }

    public function finances()
    {
        $data = [
            'title' => 'Finances Report - Pioniir Creator',
            'user'      => $this->userData,
            'creator'   => $this->creatorData,
            'notif'     => $this->notifModel->selectAllById($this->creatorData['userId']),
        ];
        return view('dashboard/creator/reports/finances', $data);
    }
}
