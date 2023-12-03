<?php

namespace App\Controllers\Dashboard\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\BuyModel;
use App\Models\Admin\CommentModel;
use App\Models\Admin\ContentModel;
use App\Models\Admin\CreatorModel;
use App\Models\Admin\LoveModel;
use App\Models\Admin\DonateModel;
use App\Models\Admin\MilestoneModel;
use App\Models\Admin\NotificationModel;
use App\Models\Admin\PostModel;
use App\Models\Admin\SubscribeModel;
use App\Models\Admin\UserModel;
use App\Models\Admin\WithdrawModel;

use Ramsey\Uuid\Uuid;

class Admin extends BaseController
{
    public function index()
    {
        $donateModel = new DonateModel;
        $userModel = new UserModel();
        $creatorModel = new CreatorModel();
        $contentModel = new ContentModel();
        $postModel = new PostModel();
        $commentModel = new CommentModel();
        $loveModel = new LoveModel();
        $subscribeModel = new SubscribeModel();
        $buyModel = new BuyModel();
        $milestoneModel = new MilestoneModel();
        $withdrawModel = new WithdrawModel();

        $data = [
            'title' => 'Dashboard - Pioniir Admin',
            'donate' => $donateModel->countAllResults(),
            'user' => $userModel->countAllResults(),
            'creator' => $creatorModel->countAllResults(),
            'content' => $contentModel->countAllResults(),
            'post' => $postModel->countAllResults(),
            'comment' => $commentModel->countAllResults(),
            'love' => $loveModel->countAllResults(),
            'sub' => $subscribeModel->countAllResults(),
            'buy' => $buyModel->countAllResults(),
            'miles' => $milestoneModel->countAllResults(),
            'wd' => $withdrawModel->countAllResults()
        ];

        return view('dashboard/admin/dashboard', $data);
    }

    public function user(): string
    {
        $userModel = new UserModel();

        $data = [
            'title' => 'User - Pioniir Admin',
            'user' => $userModel->selectAll()
        ];
        return view('dashboard/admin/user', $data);
    }

    public function creator(): string
    {
        $creatorModel = new CreatorModel();

        $data = [
            'title' => 'Creator - Pioniir Admin',
            'creator' => $creatorModel->selectAll()
        ];
        return view('dashboard/admin/creator', $data);
    }

    public function content(): string
    {
        $contentModel = new ContentModel();

        $data = [
            'title' => 'Content - Pioniir Admin',
            'content' => $contentModel->selectAll()
        ];
        return view('dashboard/admin/content', $data);
    }

    public function post(): string
    {
        $postModel = new PostModel();

        $data = [
            'title' => 'Post - Pioniir Admin',
            'post' => $postModel->selectAll()
        ];
        return view('dashboard/admin/post', $data);
    }

    public function postBan($id)
    {
        $postModel = new PostModel();
        $notificationModel = new NotificationModel();

        $msg = $this->request->getGet('msg');

        $updateStatus = [
            "postStatus" => "ban",
        ];

        $newNotification = [
            "notificationId" => Uuid::uuid4(),
            "postId" => $id,
            "notificationType" => "bpost",
            "notificationMessage" => $msg,
        ];

        $postModel->update($id, $updateStatus);
        $notificationModel->insert($newNotification);

        // redirect('admin');
    }

    public function postUnban($id)
    {
        $postModel = new PostModel();
        $notificationModel = new NotificationModel();

        $msg = $this->request->getGet('msg');

        $updateStatus = [
            "postStatus" => "archive",
        ];

        $newNotification = [
            "notificationId" => Uuid::uuid4(),
            "postId" => $id,
            "notificationType" => "ubpost",
            "notificationMessage" => $msg,
        ];

        $postModel->update($id, $updateStatus);
        $notificationModel->insert($newNotification);

        // redirect('admin');
    }
    
    public function comment(): string
    {
        $commentModel = new CommentModel();

        $data = [
            'title' => 'Comment - Pioniir Admin',
            'comment' => $commentModel->selectAll()
        ];
        return view('dashboard/admin/comment', $data);
    }

    public function love(): string
    {
        $loveModel = new LoveModel();

        $data = [
            'title' => 'Love - Pioniir Admin',
            'love' => $loveModel->selectAll()
        ];
        return view('dashboard/admin/love', $data);
    }

    public function donate()
    {
        $donateModel = new DonateModel;

        $data = [
            'title' => 'Donate - Pioniir Admin',
            'donate' => $donateModel->selectAll()
        ];

        return view('dashboard/admin/donate', $data);
    }

    public function subscribe(): string
    {
        $subscribeModel = new SubscribeModel();

        $data = [
            'title' => 'Subscribe - Pioniir Admin',
            'sub' => $subscribeModel->selectAll()
        ];
        return view('dashboard/admin/subscribe', $data);
    }

    public function buy(): string
    {
        $buyModel = new BuyModel();

        $data = [
            'title' => 'Buy - Pioniir Admin',
            'buy' => $buyModel->selectAll()
        ];
        return view('dashboard/admin/buy', $data);
    }

    public function milestone(): string
    {
        $milestoneModel = new MilestoneModel();

        $data = [
            'title' => 'Milestone - Pioniir Admin',
            'miles' => $milestoneModel->selectAll()
        ];
        return view('dashboard/admin/milestone', $data);
    }

    public function withdraw(): string
    {
        $withdrawModel = new WithdrawModel();

        $data = [
            'title' => 'Withdraw - Pioniir Admin',
            'wd' => $withdrawModel->selectAll()
        ];
        return view('dashboard/admin/withdraw', $data);
    }
}