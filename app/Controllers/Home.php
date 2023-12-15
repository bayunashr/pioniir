<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\CreatorModel;
use App\Models\SubscribeModel;
use App\Models\SocialModel;
use App\Models\MilestoneModel;
use App\Models\DonateModel;
use App\Models\PostModel;
use App\Models\ContentModel;
use Ramsey\Uuid\Uuid;

class Home extends BaseController
{
    protected $userData, $creatorData, $userModel, $creatorModel, $subsModel, $socialModel, $milestoneModel, $donateModel, $postModel, $contentModel;
    function __construct(){
        $this->userModel      = new UserModel();
        $this->creatorModel   = new CreatorModel();
        $this->subsModel      = new SubscribeModel();
        $this->socialModel    = new SocialModel();
        $this->milestoneModel = new MilestoneModel();
        $this->donateModel    = new DonateModel();
        $this->postModel      = new PostModel();
        $this->contentModel   = new ContentModel();

        if (session()->has('userEmail')) {
            $this->userData = $this->userModel->where('userEmail', session()->get('userEmail'))->where('userName', session()->get('userName'))->first();
            $this->creatorData = $this->creatorModel->where('userId', $this->userData['userId'])->first();
        }else{
            $this->userData['userId'] = 0;
            $this->creatorData['creatorId'] = 0;
        }
        
    }

    public function index(){
        $data = [
            'creator'   => $this->creatorModel->where('userId', $this->userData['userId'])->findAll(),
            'user'      => $this->userData,
        ];
        return view('front/home',$data);
    }

    public function explore($tag = null){
        
        $options = ['Animation','Art','Blogging','Comics And Cartoons','Commissions','Cosplay','Dance And Theatre','Design','Drawing And Painting','Education','Food And Drink','Fundraising','Gaming','Health And Fitness','Lifestyle','Money','Music','News','Photography','Podcast','Science And Tech','Social','Software','Streaming','Translator','Video And Film','Writing'];
        
        $tagExist = $this->creatorModel->whereNotIn('creatorId', [$this->creatorData['creatorId']])->findAll();
        $filteredOptions = [];
        foreach ($tagExist as $creator) {
            if (!empty($creator['creatorTag'])) {
                $tagsArray = array_map('trim', explode(',', $creator['creatorTag']));
                $filtered = array_intersect($options, $tagsArray);
                if (!empty($filtered)) {
                    $filteredOptions = array_merge($filteredOptions, array_values($filtered));
                } 
            }
        }
        
        if ($tag === null && $this->request->getGet('search')) {
            $creatorList = $this->creatorModel->whereNotIn('creatorId', [$this->creatorData['creatorId']])->like('creatorAlias', $this->request->getGet('search'))->findAll();
        }elseif ($tag && $this->request->getGet('search')) {
            $creatorList = $this->creatorModel->whereNotIn('creatorId', [$this->creatorData['creatorId']])->like('creatorTag', $tag)->like('creatorAlias', $this->request->getGet('search'))->findAll();
        }elseif ($tag === null) {
            $creatorList = $this->creatorModel->whereNotIn('creatorId', [$this->creatorData['creatorId']])->findAll();
        }else{
            $creatorList = $this->creatorModel->whereNotIn('creatorId', [$this->creatorData['creatorId']])->like('creatorTag', $tag)->findAll();
        }

        $data = [
            'creator'       => $this->creatorModel->where('userId', $this->userData['userId'])->findAll(),
            'user'          => $this->userData,
            'creatorList'   => $creatorList,
            'options'       => $filteredOptions
        ];
        return view('front/explore',$data);
    }

    public function registerCreator(){
        $options = ['Animation','Art','Blogging','Comics And Cartoons','Commissions','Cosplay','Dance And Theatre','Design','Drawing And Painting','Education','Food And Drink','Fundraising','Gaming','Health And Fitness','Lifestyle','Money','Music','News','Photography','Podcast','Science And Tech','Social','Software','Streaming','Translator','Video And Film','Writing'];
        if ($this->request->getPost()) {
            $data = [
                'creatorId'         => Uuid::uuid4(),
                'userId'            => $this->userData['userId'],
                'creatorAlias'      => str_replace(' ', '', $this->request->getPost('creatorAlias')),
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

    public function profilPage($userName){
        $data = [
            'creator'   => $this->creatorModel->getCreatorByAlias($userName),
            'subs'      => $this->subsModel->CountSubscribeByAlias($userName),
            'sosmed'    => $this->socialModel->getSocialByAlias($userName),
            'milestone' => $this->milestoneModel->getMilesByAlias($userName),
            'donate'    => $this->donateModel->getDonateByAlias($userName)
        ];
        
        return view('front/homeProfile',$data);
    }

    public function profilPost($userName){
        $data = [
            'creator'   => $this->creatorModel->getCreatorByAlias($userName),
            'subs'      => $this->subsModel->CountSubscribeByAlias($userName),
            'sosmed'    => $this->socialModel->getSocialByAlias($userName),
            'milestone' => $this->milestoneModel->getMilesByAlias($userName),
            'post'      => $this->postModel->getPostByAlias($userName)
        ];

        return view('front/postProfile',$data);
    }

    public function profilContent($userName){
        $data = [
            'creator'   => $this->creatorModel->getCreatorByAlias($userName),
            'subs'      => $this->subsModel->CountSubscribeByAlias($userName),
            'sosmed'    => $this->socialModel->getSocialByAlias($userName),
            'milestone' => $this->milestoneModel->getMilesByAlias($userName),
            'content'   => $this->contentModel->getContentByAlias($userName)
        ];

         //$coba = $this->milestoneModel->getMilesByAlias($userName);
        //echo json_encode($data['content']);
        return view('front/contentProfile',$data);
    }

    public function userProfile($user){
        $data = [
            'creator'   => $this->creatorModel->where('userId', $this->userData['userId'])->findAll(),
            'user'      => $this->userData,
        ];
        return view('front/userProfile',$data);
    }
}