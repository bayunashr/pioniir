<?php

namespace App\Controllers\Dashboard\Admin;

use App\Controllers\BaseController;
use App\Models\BuyModel;
use App\Models\CommentModel;
use App\Models\ContentModel;
use App\Models\CreatorModel;
use App\Models\LoveModel;
use App\Models\DonateModel;
use App\Models\MilestoneModel;
use App\Models\NotificationModel;
use App\Models\PostModel;
use App\Models\SubscribeModel;
use App\Models\UserModel;
use App\Models\WithdrawModel;

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

    public function ban($id)
    {
        $contentModel = new ContentModel();
        $postModel = new PostModel();
        $notificationModel = new NotificationModel();
        $commentModel = new CommentModel();

        $msg = $this->request->getGet('msg');
        $type = $this->request->getGet('type');

        $newNotification = [
            "notificationId" => Uuid::uuid4(),
            "notificationMessage" => $msg,
        ];

        if($type == "post"){
            $updateStatus = [
                "postStatus" => "ban",
            ];
            $newNotification["postId"] = $id;
            $newNotification["notificationType"] = "bpost";
            $postModel->update($id, $updateStatus);
        } elseif($type == "content"){
            $updateStatus = [
                "contentStatus" => "ban",
            ];
            $newNotification["contentId"] = $id;
            $newNotification["notificationType"] = "bcontent";
            $contentModel->update($id, $updateStatus);
        } elseif($type == "comment"){
            $updateStatus = [
                "commentStatus" => "ban",
            ];
            $newNotification["commentId"] = $id;
            $newNotification["notificationType"] = "bcomment";
            $commentModel->update($id, $updateStatus);
        }

        $notificationModel->insert($newNotification);

        return redirect('admin/'.$type);
    }

    public function unban($id)
    {
        $contentModel = new ContentModel();
        $postModel = new PostModel();
        $notificationModel = new NotificationModel();
        $commentModel = new CommentModel();

        $msg = $this->request->getGet('msg');
        $type = $this->request->getGet('type');

        $newNotification = [
            "notificationId" => Uuid::uuid4(),
            "notificationMessage" => $msg,
        ];

        if($type == "post"){
            $updateStatus = [
                "postStatus" => "archive",
            ];
            $newNotification["postId"] = $id;
            $newNotification["notificationType"] = "ubpost";
            $postModel->update($id, $updateStatus);
        } elseif($type == "content"){
            $updateStatus = [
                "contentStatus" => "archive",
            ];
            $newNotification["contentId"] = $id;
            $newNotification["notificationType"] = "ubcontent";
            $contentModel->update($id, $updateStatus);
        } elseif($type == "comment"){
            $updateStatus = [
                "commentStatus" => "publish",
            ];
            $newNotification["commentId"] = $id;
            $newNotification["notificationType"] = "ubcomment";
            $commentModel->update($id, $updateStatus);
        }

        $notificationModel->insert($newNotification);

        return redirect('admin/'.$type);
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