<?php

namespace App\Controllers\Dashboard\Creator;

use App\Controllers\BaseController;
use App\Models\NotificationModel;
use App\Models\CreatorModel;
use App\Models\UserModel;
use App\Models\SocialModel;
use Ramsey\Uuid\Uuid;

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

    public function socialAdd()
    {
        $data = [
            'socialId' => Uuid::uuid4(),
            'creatorId' => $this->creatorData['creatorId'],
            'socialMedia' => $this->request->getPost('socialMedia'),
            'socialLink' => $this->request->getPost('socialLink'),
            'notif' => $this->notifModel->selectAllById($this->creatorData['userId']),
        ];
        // var_dump($data); exit;
        $this->socialModel->insert($data);
        session()->setFlashData('success', 'Berhasil Menambah Data Post');
        return redirect()->to(base_url('dashboard/profile/creator'));
    }
}
