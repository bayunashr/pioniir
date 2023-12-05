<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\CreatorModel;

class Home extends BaseController
{
    protected $userData, $creatorData, $userModel, $creatorModel;
    function __construct()
    {
        $this->userModel = new UserModel();
        $this->creatorModel = new CreatorModel();
        if (session()->has('userEmail')) {
            $this->userData = $this->userModel->where('userEmail', session()->get('userEmail'))->where('userName', session()->get('userName'))->first();
            $this->creatorData = $this->creatorModel->where('userId', $this->userData['userId'])->findAll();
        }else{
            $this->userData['userId'] = 0;
        }
        
    }

    public function index()
    {
        $data = [
            'creator' => $this->creatorModel->where('userId', $this->userData['userId'])->findAll(),
            'user'  => $this->userData
        ];
        return view('front/home',$data);
    }

    public function explore(){
        return view('front/explore');
    }

    public function registerCreator(){
        return view('front/regCreator');
    }
}