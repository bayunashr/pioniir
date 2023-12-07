<?php

namespace App\Controllers\Dashboard\Creator;

use App\Controllers\BaseController;
use App\Models\ContentModel;
use App\Models\UserModel;
use App\Models\CreatorModel;
use App\Models\NotificationModel;
use Ramsey\Uuid\Uuid;

class Content extends BaseController
{
    protected $userData, $creatorData, $userModel, $creatorModel, $contentModel, $notifModel;
    function __construct()
    {
        $this->userModel = new UserModel();
        $this->creatorModel = new CreatorModel();
        $this->contentModel = new ContentModel();
        $this->notifModel = new NotificationModel();
        $this->userData = $this->userModel->where('userEmail', session()->get('userEmail'))->where('userName', session()->get('userName'))->first();
        $this->creatorData = $this->creatorModel->where('userId', $this->userData['userId'])->first();
    }

    public function index(): string
    {
        $data = [
            'notif' => $this->notifModel->selectAllById($this->creatorData['userId']),
            'content' => $this-> contentModel->where('creatorId', $this->creatorData['creatorId'])->findAll(),
            'title' => 'Dashboard - Pioniir Creator',
            'user'      => $this->userData,
            'creator'   => $this->creatorData,
        ];
        return view('dashboard/creator/content', $data);
    }

    public function add()
    {
        $data = [
            'notif' => $this->notifModel->selectAllById($this->creatorData['userId']),
            'title' => 'Dashboard - Pioniir Creator',
            'user'      => $this->userData,
            'creator'   => $this->creatorData,
        ];
        return view('dashboard/creator/contentAdd', $data);
    }

    public function edit($id)
    {
        $data = [
            'notif' => $this->notifModel->selectAllById($this->creatorData['userId']),
            'title' => 'Dashboard - Pioniir Creator',
            'user'      => $this->userData,
            'creator'   => $this->creatorData,
        ];
        return view('dashboard/creator/contentEdit', $data);
    }
}