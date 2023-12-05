<?php

namespace App\Controllers\Dashboard\Creator;

use App\Controllers\BaseController;
use App\Models\NotificationModel;
use App\Models\CreatorModel;
use App\Models\UserModel;
use App\Models\SocialModel;

class Profile extends BaseController
{
    protected $userData, $creatorData, $userModel, $creatorModel, $notifModel, $socialModel;
    function __construct()
    {
        $this->userModel = new UserModel();
        $this->creatorModel = new CreatorModel();
        $this->notifModel = new NotificationModel();
        $this->socialModel = new SocialModel();
        $this->userData = $this->userModel->where('userEmail', session()->get('userEmail'))->where('userName', session()->get('userName'))->first();
        $this->creatorData = $this->creatorModel->where('userId', $this->userData['userId'])->first();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Dashboard - Pioniir Creator',
            'notif' => $this->notifModel->selectAllById($this->creatorData['userId']),
            'social' => $this->socialModel->selectAllById($this->creatorData['creatorId'])
        ];
        return view('dashboard/creator/profileCreator', $data);
    }

    public function socialDelete($id)
    {
        $this->socialModel->delete($id);
        return redirect()->to('dashboard/profile/creator');
    }
}
