<?php

namespace App\Controllers\Dashboard\Creator;

use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\UserModel;
use App\Models\CreatorModel;
use App\Models\NotificationModel;
use Ramsey\Uuid\Uuid;

class Post extends BaseController
{
    protected $userData, $creatorData, $userModel, $creatorModel, $postModel;
    function __construct()
    {
        $this->userModel = new UserModel();
        $this->creatorModel = new CreatorModel();
        $this->postModel = new PostModel();
        $this->notifModel = new NotificationModel();
        $this->userData = $this->userModel->where('userEmail', session()->get('userEmail'))->where('userName', session()->get('userName'))->first();
        $this->creatorData = $this->creatorModel->where('userId', $this->userData['userId'])->first();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Dashboard - Pioniir Creator',
            'post' => $this->postModel->selectAll(),
            'notif' => $this->notifModel->selectAllById($this->creatorData['userId']),
        ];
        return view('dashboard/creator/post', $data);
    }

    public function add()
    {
        if ($this->request->getPost()) {
            $data = [
                'postId' => Uuid::uuid4(),
                'creatorId' => $this->creatorData['creatorId'],
                'postTitle' => $this->request->getPost('postTitle'),
                'postValue' => $this->request->getPost('postValue'),
                'postStatus' => $this->request->getPost('postStatus'),
                'notif' => $this->notifModel->selectAllById($this->creatorData['userId']),
            ];
            $this->postModel->insert($data);
            session()->setFlashData('success', 'Berhasil Menambah Data Post');
            return redirect()->to(base_url('dashboard/post'));
        } else {
            $data = [
                'title' => 'Dashboard - Pioniir Creator',
                'notif' => $this->notifModel->selectAllById($this->creatorData['userId']),
            ];
            return view('dashboard/creator/postAdd', $data);
        }
        
    }

    public function edit($id)
    {
        if ($this->request->getPost()) {
            $data = [
                'creatorId' => $this->creatorData['creatorId'],
                'postTitle' => $this->request->getPost('postTitle'),
                'postValue' => $this->request->getPost('postValue'),
                'postStatus' => $this->request->getPost('postStatus'),
                'notif' => $this->notifModel->selectAllById($this->creatorData['userId']),
            ];
            $this->postModel->update($id, $data);
            session()->setFlashData('success', 'Berhasil Mengubah Data Post');
            return redirect()->to(base_url('dashboard/post'));
        } else {
            $data = [
                'title' => 'Dashboard - Pioniir Creator',
                'post' => $this->postModel->find($id),
                'notif' => $this->notifModel->selectAllById($this->creatorData['userId']),
            ];
            return view('dashboard/creator/postEdit', $data);
        }
        
    }

    public function destroy($id)
    {
        $this->postModel->delete($id);
        session()->setFlashData('success', 'Berhasil Menghapus Data Post');
        return redirect()->to(base_url('dashboard/post'));
    }
}