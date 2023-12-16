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
    protected $userData, $creatorData, $userModel, $creatorModel, $contentModel, $postModel, $buyModel, $subscribeModel, $notifModel, $currentYear, $currentMonth, $totalDayOnCurrentMonth;
    protected $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    function __construct()
    {
        $this->userModel = new UserModel();
        $this->creatorModel = new CreatorModel();
        $this->contentModel = new ContentModel();
        $this->postModel = new PostModel();
        $this->buyModel = new BuyModel();
        $this->subscribeModel = new SubscribeModel();
        $this->notifModel = new NotificationModel();
        $this->userData = $this->userModel->where('userEmail', session()->get('userEmail'))->where('userName', session()->get('userName'))->first();
        $this->creatorData = $this->creatorModel->where('userId', $this->userData['userId'])->first();
        $this->currentMonth = idate('m');
        $this->currentYear = idate('Y');
        $this->totalDayOnCurrentMonth = idate('t');
    }

    public function content()
    {
        // data chart
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

        // data 10 top love
        $topLoved = $this->contentModel->getTopLoved($this->creatorData['creatorId']);

        // jumlah dibeli
        //isi($this->buyModel->getCountBuyCreatorContent($this->creatorData['creatorId'], '83f31b3b-1a47-41a7-a315-44d55360a771'););

        // semua konten
        $allContentByCreator = $this->contentModel->getContentByCreatorId($this->creatorData['creatorId']);
        //isi($allContentByCreator);

        // jumlah konten
        $contentCountByCreator = $this->contentModel->countContentByCreatorId($this->creatorData['creatorId']);
        //isi($contentCountByCreator);

        // key-value judul konten => jumlah dibeli
        // kondisi loop sampai jumlah konten
        $purchased = [];
        for ($i = 0; $i < $contentCountByCreator; $i++) {
            $purchased[$allContentByCreator[$i]['contentTitle']] = $this->buyModel->getCountBuyCreatorContent($this->creatorData['creatorId'], $allContentByCreator[$i]['contentId']);
        }
        arsort($purchased);
        $topPurchased = array_slice($purchased, 0, 10);
        // arrsort gawe ngurut paling gede
        // slice gawe motong
        //isi($purchased);

        // total pendapatan dari konten bulan ini tok
        $incomeThisMonth = array_column($this->buyModel->getBuyByCreatorTime($this->creatorData['creatorId'], $this->currentMonth, $this->currentYear), 'contentPrice');
        $incomeThisMonth = array_sum($incomeThisMonth);
        //isi($incomeThisMonth);
        //isi($this->buyModel->getBuyByCreatorMonth($this->creatorData['creatorId'], $this->currentMonth));

        $totalLoveThisMonth = array_column($this->contentModel->getContentLikeByCreatorTime($this->creatorData['creatorId'], $this->currentMonth, $this->currentYear), 'contentLike');
        $totalLoveThisMonth = array_sum($totalLoveThisMonth);
        //isi($totalLoveThisMonth);

        $data = [
            'title' => 'Content Report - Pioniir Creator',
            'user' => $this->userData,
            'creator' => $this->creatorData,
            'notif' => $this->notifModel->selectAllById($this->creatorData['userId']),
            'month' => $this->month,
            'currentMonth' => $this->currentMonth,
            'currentYear' => $this->currentYear,
            'currentYearContentData' => $currentYearContentData,
            'lastYearContentData' => $lastYearContentData,
            'currentMonthContentData' => $currentMonthContentData,
            'lastMonthContentData' => $lastMonthContentData,
            'topLoved' => $topLoved,
            'topPurchased' => $topPurchased,
            'incomeThisMonth' => $incomeThisMonth,
            'loveThisMonth' => $totalLoveThisMonth,
        ];
        return view('dashboard/creator/contentReport', $data);
    }

    public function post()
    {
        //data chart
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

        //data 10 top love
        $topLoved = $this->postModel->getTopLoved($this->creatorData['creatorId']);

        //total love bulan iki
        $totalLoveThisMonth = array_column($this->postModel->getPostLikeByCreatorTime($this->creatorData['creatorId'], $this->currentMonth, $this->currentYear), 'postLike');
        $totalLoveThisMonth = array_sum($totalLoveThisMonth);

        $data = [
            'title' => 'Post Report - Pioniir Creator',
            'user' => $this->userData,
            'creator' => $this->creatorData,
            'notif' => $this->notifModel->selectAllById($this->creatorData['userId']),
            'month' => $this->month,
            'currentMonth' => $this->currentMonth,
            'currentYear' => $this->currentYear,
            'currentYearPostData' => $currentYearPostData,
            'lastYearPostData' => $lastYearPostData,
            'currentMonthPostData' => $currentMonthPostData,
            'lastMonthPostData' => $lastMonthPostData,
            'topLoved' => $topLoved,
            'loveThisMonth' => $totalLoveThisMonth,
        ];
        return view('dashboard/creator/postReport', $data);
    }

    public function subscribe()
    {
        //isi($this->subscribeModel->getAllSubscriber($this->creatorData['creatorId'], $this->currentMonth - 1, $this->currentYear)->findAll());
        $totalSub = $this->subscribeModel->getAllSubscriber($this->creatorData['creatorId'], $this->currentMonth, $this->currentYear)->countAllResults();
        $totalSubLastMonth = $this->subscribeModel->getAllSubscriber($this->creatorData['creatorId'], $this->currentMonth - 1, $this->currentYear)->countAllResults();
        $diffsub = $totalSub - $totalSubLastMonth;
        //isi($diffsub);

        $totalSubPerMonth = [];
        for ($i = 0; $i < sizeof($this->month); $i++) {
            $temp = $this->subscribeModel->getAllSubscriber($this->creatorData['creatorId'], $i + 1, $this->currentYear)->countAllResults();
            $totalSubPerMonth[$i] = $temp;
        }
        //isi($totalSubPerMonth);

        $totalSubPerMonthLastYear = [];
        for ($i = 0; $i < sizeof($this->month); $i++) {
            $temp = $this->subscribeModel->getAllSubscriber($this->creatorData['creatorId'], $i + 1, $this->currentYear - 1)->countAllResults();
            $totalSubPerMonthLastYear[$i] = $temp;
        }

        $topSubscribedUser = $this->subscribeModel->getAllSubscriberAllTime($this->creatorData['creatorId']);
        //isi($this->subscribeModel->getAllSubscriberAllTime($this->creatorData['creatorId']));

        $incomeThisMonth = 0;
        foreach ($this->subscribeModel->getAllSubscriberWithMonth($this->creatorData['creatorId'], $this->currentMonth, $this->currentYear) as $item) {
            $incomeThisMonth += $item['timeSubscribed'] * $item['creatorSubPrice'];
        }
        //isi($this->subscribeModel->getAllSubscriberWithMonth($this->creatorData['creatorId'], $this->currentMonth, $this->currentYear));
        //isi($incomeThisMonth);

        $data = [
            'title' => 'Subscribe Report - Pioniir Creator',
            'user' => $this->userData,
            'creator' => $this->creatorData,
            'notif' => $this->notifModel->selectAllById($this->creatorData['userId']),
            'month' => $this->month,
            'currentYear' => $this->currentYear,
            'totalSub' => $totalSub,
            'diffSub' => $diffsub,
            'totalSubPerMonth' => $totalSubPerMonth,
            'totalSubPerMonthLastYear' => $totalSubPerMonthLastYear,
            'topSubscribedUser' => $topSubscribedUser,
            'incomeThisMonth' => $incomeThisMonth,
        ];
        return view('dashboard/creator/subscribeReport', $data);
    }

    public function donate()
    {
        $data = [
            'title' => 'Subscribe Report - Pioniir Creator',
            'user' => $this->userData,
            'creator' => $this->creatorData,
            'notif' => $this->notifModel->selectAllById($this->creatorData['userId']),
        ];
        return view('dashboard/creator/donateReport', $data);
    }
}
