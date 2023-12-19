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

class Dashboard extends BaseController
{

    public function index()
    {
        $buyModel = new BuyModel();
        $donateModel = new DonateModel;
        $subscribeModel = new SubscribeModel();
        $contentModel = new ContentModel();
        $postModel = new PostModel();
        $userModel = new UserModel;
        $creatorModel = new CreatorModel;
        $notifModel = new NotificationModel;

        $userData = $userModel->where('userEmail', session()->get('userEmail'))->where('userName', session()->get('userName'))->first();
        $creatorData = $creatorModel->where('userId', $userData['userId'])->first();

        $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $currentMonth = idate('m');
        $currentYear = idate('Y');

        $totalLoves = 0;
        foreach ($contentModel->getLoved($creatorData['creatorId']) as $item) {
            $totalLoves += $item['contentLike'];
        }

        foreach ($postModel->getLoved($creatorData['creatorId']) as $item) {
            $totalLoves += $item['postLike'];
        }

        //income dari penjualan konten
        //$contentIncomeThisMonth = array_column($buyModel->getBuyByCreatorTime($creatorData['creatorId'], $currentMonth, $currentYear), 'contentPrice');
        //$contentIncomeThisMonth = array_sum($contentIncomeThisMonth);
        //isi($contentIncomeThisMonth);

        // $subIncomeThisMonth = array_column($subscribeModel->getAllSubscriberWithMonth($creatorData['creatorId'], $currentMonth, $currentYear), 'creatorSubPrice');
        // $subIncomeThisMonth = array_sum($subIncomeThisMonth);
        //isi($subIncomeThisMonth);

        // $donateIncomeThisMonth = 0;
        // foreach ($donateModel->getDonateByTime($creatorData['creatorId'], $currentMonth, $currentYear) as $item) {
        //     $donateIncomeThisMonth += $item['donateAmount'];
        // }
        //isi($donateIncomeThisMonth);

        $income = [];
        for ($i = 0; $i < sizeof($month); $i++) {
            $contentIncomeThisMonth = 0;
            $contentIncomeThisMonth = array_column($buyModel->getBuyByCreatorTime($creatorData['creatorId'], $i + 1, $currentYear), 'contentPrice');
            $contentIncomeThisMonth = array_sum($contentIncomeThisMonth);

            $subIncomeThisMonth = 0;
            $subIncomeThisMonth = array_column($subscribeModel->getAllSubscriberWithMonth($creatorData['creatorId'], $i + 1, $currentYear), 'creatorSubPrice');
            $subIncomeThisMonth = array_sum($subIncomeThisMonth);

            $donateIncomeThisMonth = 0;
            foreach ($donateModel->getDonateByTime($creatorData['creatorId'], $i + 1, $currentYear) as $item) {
                $donateIncomeThisMonth += $item['donateAmount'];
            }

            $income[$i] = $contentIncomeThisMonth + $subIncomeThisMonth + $donateIncomeThisMonth;
        }

        $data = [
            'title'     => 'Dashboard - Pioniir Creator',
            'buy'       => $buyModel->getCountBuyCreator($creatorData['creatorId']),
            'donate'    => $donateModel->where('creatorId', $creatorData['creatorId'])->countAllResults(),
            'sub'       => $subscribeModel->selectActiveByIdCreator($creatorData['creatorId'])->countAllResults(),
            'content'   => $contentModel->where('creatorId', $creatorData['creatorId'])->countAllResults(),
            'post'      => $postModel->where('creatorId', $creatorData['creatorId'])->countAllResults(),
            'loves'     => $totalLoves,
            'income'    => $income,
            'notif'     => $notifModel->selectAllById($creatorData['userId']),
            'currentMonth'  => $currentMonth,
            'currentYear'   => $currentYear,
            'user'      => $userData,
            'creator'   => $creatorData,
            'month'     => $month,
        ];
        return view('dashboard/creator/dashboard', $data);
    }

    public function notificationIsRead($id)
    {
        $notifModel = new NotificationModel;
        $state = $this->request->getGet('s');
        $notifModel->update($id, ["isRead" => "yes"]);
        return redirect()->to(base_url($state));
        //isi($id);
    }

    public function notifHistory()
    {
        $userModel = new UserModel;
        $creatorModel = new CreatorModel;
        $notifModel = new NotificationModel;

        $userData = $userModel->where('userEmail', session()->get('userEmail'))->where('userName', session()->get('userName'))->first();
        $creatorData = $creatorModel->where('userId', $userData['userId'])->first();

        $data = [
            'title' => 'Notification - Pioniir Creator',
            'notif' => $notifModel->selectAllById($creatorData['userId']),
            'notifAll' => $notifModel->selectAll($creatorData['userId']),
            'user' => $userData,
            'creator' => $creatorData,
        ];

        return view('dashboard/creator/notifHistory', $data);
    }
}