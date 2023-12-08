<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\CreatorModel;
use Ramsey\Uuid\Uuid;

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

    public function index(){
        $data = [
            'creator'   => $this->creatorModel->where('userId', $this->userData['userId'])->findAll(),
            'user'      => $this->userData,
        ];
        return view('front/home',$data);
    }

    public function explore(){
        return view('front/explore');
    }

    public function registerCreator(){
        $options = ['Animation','Art','Blogging','Comics And Cartoons','Commissions','Cosplay','Dance And Theatre','Design','Drawing And Painting','Education','Food And Drink','Fundraising','Gaming','Health And Fitness','Lifestyle','Money','Music','News','Photography','Podcast','Science And Tech','Social','Software','Streaming','Translator','Video And Film','Writing'];
        if ($this->request->getPost()) {
            $data = [
                'creatorId'         => Uuid::uuid4(),
                'userId'            => $this->userData['userId'],
                'creatorAlias'      => $this->request->getPost('creatorAlias'),
                'creatorTag'        => $this->request->getPost('creatorTag'),
                'creatorDescription'=> $this->request->getPost('creatorDescription'),
                'creatorBanner'     => 'bannercreator.png'
            ];
            $insert = $this->creatorModel->insert($data);
            if ($insert) {
                session()->setFlashData('success', 'Registrasi Creator Berhasil, Enjoy');
                return redirect()->to(base_url('dashboard/profile/creator'));
            }else{
                session()->setFlashdata('old_input', $this->request->getPost());  
                session()->setFlashData('validation',$this->creatorModel->errors());
                return redirect()->to(base_url('register/creator')); 
            }
        }else{
            $data['option'] = $options;
            return view('front/regCreator',$data);
        }
    }
}