<?php

namespace App\Controllers\Dashboard\Creator;

use App\Controllers\BaseController;
use App\Models\DonateModel;
use App\Models\UserModel;
use App\Models\CreatorModel;

class Donate extends BaseController
{
    public function index()
    {
        $donateModel    = new DonateModel;
        $userModel      = new UserModel;
        $creatorModel   = new CreatorModel;

        $userData       = $userModel->where('userEmail', session()->get('userEmail'))
                        ->where('userName', session()->get('userName'))->first();
        $creatorData    = $creatorModel->where('userId', $userData['userId'])->first();

        $data = [
            'title'     => 'Dashboard - Pioniir Creator',
            'donate'    => $donateModel->where('creatorId', $creatorData['creatorId'])->where('donateStatus', 'success')->orderBy('donateTimestamp', 'DESC')->findAll()
        ];

        return view('dashboard/creator/donate', $data);
    }
}