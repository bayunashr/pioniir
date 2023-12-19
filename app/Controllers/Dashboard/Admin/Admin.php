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
use App\Models\AdminModel;

use Ramsey\Uuid\Uuid;

class Admin extends BaseController
{
    protected $adminModel, $userModel, $creatorModel, $postModel, $contentModel, $commentModel, $loveModel, $subscribeModel, $buyModel, $milestoneModel, $donateModel, $withdrawModel, $notificationModel;
    function __construct()
    {
        $this->userModel = new UserModel();
        $this->adminModel = new AdminModel();
        $this->creatorModel = new CreatorModel();
        $this->postModel = new PostModel();
        $this->contentModel = new ContentModel();
        $this->commentModel = new CommentModel();
        $this->loveModel = new LoveModel();
        $this->subscribeModel = new SubscribeModel();
        $this->buyModel = new BuyModel();
        $this->milestoneModel = new MilestoneModel();
        $this->donateModel = new DonateModel();
        $this->withdrawModel = new WithdrawModel();
        $this->notificationModel = new NotificationModel();
    }

    public function index()
    {
        $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $currentMonth = idate('m');
        $currentYear = idate('Y');

        $wd = [];
        $tax = [];
        $taxSum = [];
        for ($i = 0; $i < sizeof($month); $i++) {
            $wdThisMonth = 0;
            $wdThisMonth = array_column($this->withdrawModel->getByMonth($i + 1, $currentYear), 'withdrawAmount');
            $wdThisMonth = array_sum($wdThisMonth);

            $wd[$i] = $wdThisMonth;

            $taxThisMonth = 0;
            $taxThisMonth = array_column($this->withdrawModel->getByMonth($i + 1, $currentYear), 'withdrawAmount');
            
            if(empty($taxThisMonth)){
                $tax[$i] = 0;
            }else{
                for ($j=0; $j<sizeof($taxThisMonth); $j++){
                    $tax[$i][$j] = $taxThisMonth[$j] * 0.03;
                }
                if($tax != 0){
                    $taxSum[$i] = array_sum($tax[$i]);
                }
            }
            if(empty($taxSum[$i])){
                $taxSum[$i] = 0;
            }
        }

        $data = [
            'title' => 'Dashboard - Pioniir Admin',
            'donate' => $this->donateModel->countAllResults(),
            'user' => $this->userModel->countAllResults(),
            'creator' => $this->creatorModel->countAllResults(),
            'content' => $this->contentModel->countAllResults(),
            'post' => $this->postModel->countAllResults(),
            'comment' => $this->commentModel->countAllResults(),
            'love' => $this->loveModel->countAllResults(),
            'sub' => $this->subscribeModel->countAllResults(),
            'buy' => $this->buyModel->countAllResults(),
            'miles' => $this->milestoneModel->countAllResults(),
            'wd' => $this->withdrawModel->countAllResults(),
            'month' => $month,
            'currentMonth' => $currentMonth,
            'currentYear' => $currentYear,
            'wdw' => $wd,
            'tax' => $taxSum,
        ];
        return view('dashboard/admin/dashboard', $data);
    }

    public function login()
    {
        if($this->request->getPost()){
            $adminData = $this->adminModel->where('adminEmail', "admin@pioniir.com")->first();

            if (password_verify($this->request->getPost('password'), $adminData['adminPassword'])){
                session()->set([
                    'loginAdmin'    => true,
                    'adminName'     => $adminData['adminName'],
                ]);
                return redirect()->to(base_url('admin'));
                exit;
            } else{
                session()->setFlashData('error', 'Password Salah');
            }

            return redirect()->to(base_url('admin/login'));
        }else{
            $data = [
                "title" => "Login - Pioniir Admin",
            ];
            return view('dashboard/admin/login', $data);
        }
    }

    public function logout()
    {
        session()->remove('loginAdmin');
        session()->remove('adminName');
        return redirect()->to(base_url('admin/login'));
    }

    public function user(): string
    {
        $data = [
            'title' => 'User - Pioniir Admin',
            'user' => $this->userModel->selectAll()
        ];
        return view('dashboard/admin/user', $data);
    }

    public function creator(): string
    {
        $data = [
            'title' => 'Creator - Pioniir Admin',
            'creator' => $this->creatorModel->selectAll()
        ];
        return view('dashboard/admin/creator', $data);
    }

    public function content(): string
    {
        $data = [
            'title' => 'Content - Pioniir Admin',
            'content' => $this->contentModel->selectAll()
        ];
        return view('dashboard/admin/content', $data);
    }

    public function ban($id)
    {
        $msg = $this->request->getGet('msg');
        $type = $this->request->getGet('type');

        $newNotification = [
            "notificationId" => Uuid::uuid4(),
            "notificationMessage" => strtolower($msg),
        ];

        if($type == "post"){
            $updateStatus = [
                "postStatus" => "ban",
            ];
            $post = $this->postModel->selectOneByPostId($id);
            $newNotification["userId"] = $post['user_id'];
            $newNotification["postId"] = $id;
            $newNotification["notificationType"] = "bpost";
            $this->postModel->update($id, $updateStatus);
            session()->setFlashData('success', 'Berhasil banned postingan.');
        } elseif($type == "content"){
            $updateStatus = [
                "contentStatus" => "ban",
            ];
            $content = $this->contentModel->selectOneByContentId($id);
            $newNotification["contentId"] = $id;
            $newNotification["userId"] = $content['user_id'];
            $newNotification["notificationType"] = "bcontent";
            $this->contentModel->update($id, $updateStatus);
            session()->setFlashData('success', 'Berhasil banned konten.');
        } elseif($type == "comment"){
            $updateStatus = [
                "commentStatus" => "ban",
            ];
            $comment = $this->commentModel->selectOneByCommentId($id);
            $newNotification["userId"] = $comment['user_id'];
            $newNotification["commentId"] = $id;
            $newNotification["notificationType"] = "bcomment";
            $this->commentModel->update($id, $updateStatus);
            session()->setFlashData('success', 'Berhasil banned komentar.');
        } elseif($type == "user"){
            $updateStatus = [
                "userStatus" => "ban",
            ];
            $newNotification["userId"] = $id;
            $newNotification["notificationType"] = "buser";
            $this->userModel->update($id, $updateStatus);
            session()->setFlashData('success', 'Berhasil banned user.');
        }

        $this->notificationModel->insert($newNotification);

        return redirect()->to(base_url('admin/'.$type));
    }

    public function unban($id)
    {
        $msg = $this->request->getGet('msg');
        $type = $this->request->getGet('type');

        $newNotification = [
            "notificationId" => Uuid::uuid4(),
            "notificationMessage" => strtolower($msg),
        ];

        if($type == "post"){
            $updateStatus = [
                "postStatus" => "archive",
            ];
            $post = $this->postModel->selectOneByPostId($id);
            $newNotification["userId"] = $post['user_id'];
            $newNotification["postId"] = $id;
            $newNotification["notificationType"] = "ubpost";
            $this->postModel->update($id, $updateStatus);
            session()->setFlashData('success', 'Berhasil unban postingan.');
        } elseif($type == "content"){
            $updateStatus = [
                "contentStatus" => "archive",
            ];
            $content = $this->contentModel->selectOneByContentId($id);
            $newNotification["userId"] = $content['user_id'];
            $newNotification["contentId"] = $id;
            $newNotification["notificationType"] = "ubcontent";
            $this->contentModel->update($id, $updateStatus);
            session()->setFlashData('success', 'Berhasil unban konten.');
        } elseif($type == "comment"){
            $updateStatus = [
                "commentStatus" => "publish",
            ];
            $comment = $this->commentModel->selectOneByCommentId($id);
            $newNotification["userId"] = $comment['user_id'];
            $newNotification["commentId"] = $id;
            $newNotification["notificationType"] = "ubcomment";
            $this->commentModel->update($id, $updateStatus);
            session()->setFlashData('success', 'Berhasil unban komentar.');
        } elseif($type == "user"){
            $updateStatus = [
                "userStatus" => "active",
            ];
            $newNotification["userId"] = $id;
            $newNotification["notificationType"] = "ubuser";
            $this->userModel->update($id, $updateStatus);
            session()->setFlashData('success', 'Berhasil unban user.');
        }

        $this->notificationModel->insert($newNotification);

        return redirect()->to(base_url('admin/'.$type));
    }

    public function post(): string
    {
        $data = [
            'title' => 'Post - Pioniir Admin',
            'post' => $this->postModel->selectAll()
        ];
        return view('dashboard/admin/post', $data);
    }
    
    public function comment(): string
    {
        $data = [
            'title' => 'Comment - Pioniir Admin',
            'comment' => $this->commentModel->selectAll()
        ];
        return view('dashboard/admin/comment', $data);
    }

    public function love(): string
    {
        $data = [
            'title' => 'Love - Pioniir Admin',
            'love' => $this->loveModel->selectAll()
        ];
        return view('dashboard/admin/love', $data);
    }

    public function donate()
    {
        $data = [
            'title' => 'Donate - Pioniir Admin',
            'donate' => $this->donateModel->selectAll()
        ];

        return view('dashboard/admin/donate', $data);
    }

    public function subscribe(): string
    {
        $data = [
            'title' => 'Subscribe - Pioniir Admin',
            'sub' => $this->subscribeModel->selectAll()
        ];
        return view('dashboard/admin/subscribe', $data);
    }

    public function buy(): string
    {
        $data = [
            'title' => 'Buy - Pioniir Admin',
            'buy' => $this->buyModel->selectAll()
        ];
        return view('dashboard/admin/buy', $data);
    }

    public function milestone(): string
    {
        $data = [
            'title' => 'Milestone - Pioniir Admin',
            'miles' => $this->milestoneModel->selectAll()
        ];
        return view('dashboard/admin/milestone', $data);
    }

    public function withdraw(): string
    {
        $data = [
            'title' => 'Withdraw - Pioniir Admin',
            'wd' => $this->withdrawModel->selectAll()
        ];
        return view('dashboard/admin/withdraw', $data);
    }
}