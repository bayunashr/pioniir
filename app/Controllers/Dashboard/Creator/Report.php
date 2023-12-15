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

class Report extends BaseController
{
    protected $userData, $creatorData, $userModel, $creatorModel, $contentModel, $postModel, $notifModel, $currentYear, $currentMonth, $totalDayOnCurrentMonth;
    protected $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    function __construct()
    {
        $this->userModel = new UserModel();
        $this->creatorModel = new CreatorModel();
        $this->contentModel = new ContentModel();
        $this->postModel = new PostModel();
        $this->notifModel = new NotificationModel();
        $this->userData = $this->userModel->where('userEmail', session()->get('userEmail'))->where('userName', session()->get('userName'))->first();
        $this->creatorData = $this->creatorModel->where('userId', $this->userData['userId'])->first();
        $this->currentMonth = idate('m');
        $this->currentYear = idate('Y');
        $this->totalDayOnCurrentMonth = idate('t');
    }

    public function content()
    {
        // Data for Chart

        $currentYearContentData = [];
        for ($i = 0; $i < sizeof($this->month); $i++) {
            $temp = $this->contentModel->countAllPerMonth($this->creatorData['creatorId'], $i + 1, $this->currentYear);
            $currentYearContentData[$i] = $temp;
        }

        $lastYearContentData = [];
        for ($i = 0; $i < sizeof($this->month); $i++) {
            $temp = $this->contentModel->countAllPerMonth($this->creatorData['creatorId'], $i + 1, $this->currentYear - 1);
            $lastYearContentData[$i] = $temp;
        }

        $currentMonthContentData = [];
        for ($i = 1; $i <= $this->totalDayOnCurrentMonth; $i++) {
            $temp = $this->contentModel->countAllPerDay($this->creatorData['creatorId'], $i, $this->currentMonth, $this->currentYear);
            $currentMonthContentData[$i] = $temp;
        }

        $lastMonthContentData = [];
        for ($i = 1; $i <= intval(date('t', strtotime(date('Y-m-d', strtotime('last month'))))); $i++) {
            $temp = $this->contentModel->countAllPerDay($this->creatorData['creatorId'], $i, $this->currentMonth - 1, $this->currentYear);
            $lastMonthContentData[$i] = $temp;
        }

        // Data for 10 Top Likes

        $topLoved = $this->contentModel->getTopLoves($this->creatorData['creatorId']);

        $data = [
            'title' => 'Content Report - Pioniir Creator',
            'user'      => $this->userData,
            'creator'   => $this->creatorData,
            'notif'     => $this->notifModel->selectAllById($this->creatorData['userId']),
            'month' => $this->month,
            'currentYearContentData' => $currentYearContentData,
            'lastYearContentData' => $lastYearContentData,
            'currentMonthContentData' => $currentMonthContentData,
            'lastMonthContentData' => $lastMonthContentData,
            'topLoved' => $topLoved,
        ];
        return view('dashboard/creator/contentReport', $data);
    }

    public function post()
    {
        $currentYearPostData = [];
        for ($i = 0; $i < sizeof($this->month); $i++) {
            $temp = $this->postModel->countAllPerMonth($this->creatorData['creatorId'], $i + 1, $this->currentYear);
            $currentYearPostData[$i] = $temp;
        }

        $lastYearPostData = [];
        for ($i = 0; $i < sizeof($this->month); $i++) {
            $temp = $this->postModel->countAllPerMonth($this->creatorData['creatorId'], $i + 1, $this->currentYear - 1);
            $lastYearPostData[$i] = $temp;
        }

        $currentMonthPostData = [];
        for ($i = 1; $i <= $this->totalDayOnCurrentMonth; $i++) {
            $temp = $this->postModel->countAllPerDay($this->creatorData['creatorId'], $i, $this->currentMonth, $this->currentYear);
            $currentMonthPostData[$i] = $temp;
        }

        $lastMonthPostData = [];
        for ($i = 1; $i <= intval(date('t', strtotime(date('Y-m-d', strtotime('last month'))))); $i++) {
            $temp = $this->postModel->countAllPerDay($this->creatorData['creatorId'], $i, $this->currentMonth - 1, $this->currentYear);
            $lastMonthPostData[$i] = $temp;
        }

        $data = [
            'title' => 'Post Report - Pioniir Creator',
            'user'      => $this->userData,
            'creator'   => $this->creatorData,
            'notif'     => $this->notifModel->selectAllById($this->creatorData['userId']),
            'month' => $this->month,
            'currentYearPostData' => $currentYearPostData,
            'lastYearPostData' => $lastYearPostData,
            'currentMonthPostData' => $currentMonthPostData,
            'lastMonthPostData' => $lastMonthPostData,
        ];
        return view('dashboard/creator/postReport', $data);
    }

    public function subscribe()
    {
    }

    public function donate()
    {
    }
}
