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
        $dayMonthMap = [];
        $currentMonth = idate('m');
        $currentYear = idate('Y');
        $currentDayMonth = idate('t');

        for ($i = 0; $i < sizeof($month); $i++) {
            $dayMonthMap[$month[$i]] = idate('t', mktime(0, 0, 0, $i + 1, 1, 2023));
        }
        $dayMonthMap = array_values($dayMonthMap);

        // Daily Chart
        $chartDataSubD = [];
        for ($i = 0; $i < $currentDayMonth; $i++) {
            $temp = $subscribeModel->CountAllByDayAndId($creatorData['creatorId'], $i + 1, $currentMonth, $currentYear);
            $chartDataSubD[$i] = $temp;
        }
        $chartDataSubD = array_values($chartDataSubD);

        // Monthly Chart
        $chartDataSubM = [];
        for ($i = 0; $i < sizeof($month); $i++) {
            $temp = $subscribeModel->CountAllByMonthAndId($creatorData['creatorId'], $i + 1, $currentYear);
            $chartDataSubM[$month[$i]] = $temp;
        }
        $chartDataSubM = array_values($chartDataSubM);

        $data = [
            'title' => 'Dashboard - Pioniir Creator',
            'buy' => $buyModel->getCountBuyCreator($creatorData['creatorId']),
            'donate' => $donateModel->where('creatorId', $creatorData['creatorId'])->countAllResults(),
            'sub' => $subscribeModel->where('creatorId', $creatorData['creatorId'])->where('subscribeStatus', 'success')->countAllResults(),
            'content' => $contentModel->where('creatorId', $creatorData['creatorId'])->countAllResults(),
            'post' => $postModel->where('creatorId', $creatorData['creatorId'])->countAllResults(),
            'notif' => $notifModel->selectAllById($creatorData['userId']),
            'user' => $userData,
            'creator' => $creatorData,
            'chartMonth' => $month,
            'currentDayMonth' => $currentDayMonth,
            'chartDataSubM' => $chartDataSubM,
            'chartDataSubD' => $chartDataSubD,
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
}
