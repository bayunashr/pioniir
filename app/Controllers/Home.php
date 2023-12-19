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
use App\Models\BuyModel;
use App\Models\CommentModel;
use App\Models\LoveModel;
use Ramsey\Uuid\Uuid;

class Home extends BaseController
{
    protected $userData, $creatorData, $userModel, $creatorModel, $subsModel, $socialModel, $milestoneModel, $donateModel, $postModel, $contentModel, $buyModel, $commentModel, $loveModel;
    function __construct(){
        $this->userModel      = new UserModel();
        $this->creatorModel   = new CreatorModel();
        $this->subsModel      = new SubscribeModel();
        $this->socialModel    = new SocialModel();
        $this->milestoneModel = new MilestoneModel();
        $this->donateModel    = new DonateModel();
        $this->postModel      = new PostModel();
        $this->contentModel   = new ContentModel();
        $this->buyModel       = new BuyModel();
        $this->commentModel   = new CommentModel();
        $this->loveModel      = new LoveModel();

        if (session()->has('userEmail')) {
            $this->userData = $this->userModel->where('userEmail', session()->get('userEmail'))->where('userName', session()->get('userName'))->first();
            $this->creatorData = $this->creatorModel->where('userId', $this->userData['userId'])->first();
            $this->creatorData['creatorId'] = ($this->creatorData == null) ? '00000000-00000000-00000000-00000000' : $this->creatorData['creatorId'];
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
        
        $arrayOption = ['Animation','Art','Blogging','Comics And Cartoons','Commissions','Cosplay','Dance And Theatre','Design','Drawing And Painting','Education','Food And Drink','Fundraising','Gaming','Health And Fitness','Lifestyle','Money','Music','News','Photography','Podcast','Science And Tech','Social','Software','Streaming','Translator','Video And Film','Writing'];
        $options = array_map('strtolower', $arrayOption);
        $tagExist = $this->creatorModel->whereNotIn('creatorId', [$this->creatorData['creatorId']])->findAll();
        $uniqueTags = [];

        foreach ($tagExist as $creator) {
            if (!empty($creator['creatorTag'])) {
                $tagsArray = array_map('trim', explode(',', $creator['creatorTag']));

                foreach ($tagsArray as $tags) {
                    if (!in_array($tags, $uniqueTags) && in_array($tags, $options)) {
                        $uniqueTags[] = $tags;
                    }
                }
            }
        }
        sort($uniqueTags);

        $query = $this->creatorModel->getCreatorWithoudId();
        if ($tag !== null) {
            $query->like('creatorTag', $tag);
        }
        if ($this->request->getGet('search')) {
            $query->like('creatorAlias', $this->request->getGet('search'));
        }

        $creatorList = $query->findAll();

        $data = [
            'creator'       => $this->creatorModel->where('userId', $this->userData['userId'])->findAll(),
            'user'          => $this->userData,
            'creatorList'   => $creatorList,
            'options'       => $uniqueTags,
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
            'user'          => $this->userData,
            'creator'       => $this->creatorModel->where('userId', $this->userData['userId'])->findAll(),
            'creatorData'   => $this->creatorModel->getCreatorByAlias($userName),
            'subs'          => $this->subsModel->CountSubscribeByAlias($userName),
            'sosmed'        => $this->socialModel->getSocialByAlias($userName),
            'milestone'     => $this->milestoneModel->getMilesByAlias($userName),
            'donate'        => $this->donateModel->getDonateByAlias($userName),
            'ceksubs'       => $this->subsModel->getStatusSubscribe($userName,$this->userData['userId'])
        ];
        
        return view('front/homeProfile',$data);
    }

    public function profilPost($userName){
        $data = [
            'user'          => $this->userData,
            'creator'       => $this->creatorModel->where('userId', $this->userData['userId'])->findAll(),
            'creatorData'   => $this->creatorModel->getCreatorByAlias($userName),
            'subs'          => $this->subsModel->CountSubscribeByAlias($userName),
            'sosmed'        => $this->socialModel->getSocialByAlias($userName),
            'milestone'     => $this->milestoneModel->getMilesByAlias($userName),
            'post'          => $this->postModel->getPostByAlias($userName),
            'ceksubs'       => $this->subsModel->getStatusSubscribe($userName,$this->userData['userId'])
        ];

        return view('front/postProfile',$data);
    }

    public function profilContent($userName){
        $data = [
            'user'          => $this->userData,
            'creator'       => $this->creatorModel->where('userId', $this->userData['userId'])->findAll(),
            'creatorData'   => $this->creatorModel->getCreatorByAlias($userName),
            'subs'          => $this->subsModel->CountSubscribeByAlias($userName),
            'sosmed'        => $this->socialModel->getSocialByAlias($userName),
            'milestone'     => $this->milestoneModel->getMilesByAlias($userName),
            'content'       => $this->contentModel->getContentByAlias($userName),
            'ceksubs'       => $this->subsModel->getStatusSubscribe($userName,$this->userData['userId']),
            'dataBuy'       => $this->buyModel->getDataBuyByIdUser($this->userData['userId'])
        ];

        //echo json_encode($data['content']);
        return view('front/contentProfile',$data);
    }
    
    public function userProfile(){
        if ($this->request->getPost()) {
            if ($this->request->getPost('password')) {
                if (strlen($this->request->getPost('password')) >= 8) {
                    if ($this->request->getPost('password') == $this->request->getPost('passwordConfirm')) {
                        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
                        $update = $this->userModel->update($this->userData['userId'], ['userPassword' => $password]);
                        if ($update) {
                            session()->setFlashData('success', 'Berhasil Merubah Password');
                        }else{
                            session()->setFlashData('error', "Gagal Merubah Password");
                        }
                    }else{
                        session()->setFlashData('error', "Konfirmasi Password Tidak Sesuai");
                    }
                }else{
                    session()->setFlashData('error', "Password Minimal 8 Karakter");
                }
                return redirect()->to(base_url('user/profile'));
            }else{
                // Cek UserName
                if ($this->request->getPost('old_userName') != $this->request->getPost('userName')) {
                    $data['userName'] = str_replace(' ', '', $this->request->getPost('userName'));
                }
                // Cek UserEmail
                if ($this->request->getPost('old_userEmail') != $this->request->getPost('userEmail')) {
                    $data['userEmail'] = $this->request->getPost('userEmail');
                }

                $data['userFullName'] = $this->request->getPost('userFullName');

                $update = $this->userModel->update($this->userData['userId'], $data);
                if ($update) {
                    // Update Foto Profile
                    if($file = $this->request->getFile('userAvatar')) {
                        if ($file->isValid() && ! $file->hasMoved()) {
                            // Hapus Gambar Sebelumnya
                            $foto_default = array('1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg');
                            $pathToOriginalFile = '../public/assets/uploads/photo_profile/';
                            if (!empty($this->userData['userAvatar'])) {
                                $pathToOriginalFile .= $this->userData['userAvatar'];
                                if (file_exists($pathToOriginalFile)) {
                                    if (!in_array($this->userData['userAvatar'], $foto_default)) {
                                        unlink($pathToOriginalFile);
                                    }
                                }
                            }
                            $name = $file->getName();
                            $ext = $file->getClientExtension();
                            $newName = $file->getRandomName(); 
                            $file->move('../public/assets/uploads/photo_profile', $newName);
                            $data['userAvatar'] = $newName;
                            $this->userModel->update($this->userData['userId'], $data);
                        }
                    }
                    session()->set($data);
                    session()->setFlashdata('success', 'Berhasil Mengubah Profile User');
                }else{
                    session()->setFlashdata('success', 'Gagal Menyimpan Ke Database');
                }
                return redirect()->to(base_url('user/profile'));
            }
        }else{
            $data = [
                'creator'       => $this->creatorModel->where('userId', $this->userData['userId'])->findAll(),
                'user'          => $this->userData,
            ];
            return view('front/userProfile',$data);
        }
    }

    public function userTip(){
        $currentPage = $this->request->getVar('page') ? intval($this->request->getVar('page')) : 1;

        $data = [
            'creator'       => $this->creatorModel->where('userId', $this->userData['userId'])->findAll(),
            'user'          => $this->userData,
            'dataDonate'    => $this->donateModel->getDonateByIdUser($this->userData['userId'])->paginate(10,'default'),
            'pager'         => $this->donateModel->pager,
            'currentPage'   => $currentPage
        ];

        return view('front/userTip',$data);
    }

    public function userFollow(){
        $currentPage = $this->request->getVar('page') ? intval($this->request->getVar('page')) : 1;

        $data = [
            'creator'       => $this->creatorModel->where('userId', $this->userData['userId'])->findAll(),
            'user'          => $this->userData,
            'dataSubs'      => $this->subsModel->selectAllByIdUser($this->userData['userId'])->paginate(20),
            'pager'         => $this->subsModel->pager,
            'currentPage'   => $currentPage
        ];

        return view('front/userFollow',$data);
    }

    public function contentView($contentId){
        $data = [
            'creator'    => $this->creatorModel->where('userId', $this->userData['userId'])->findAll(),
            'user'       => $this->userData,
            'content'    => $this->contentModel->selectOneByContentId($contentId),
            'comment'    => $this->commentModel->selectAllByContentId($contentId),
            'cekLove'    => $this->loveModel->selectDataByUserAndContent($this->userData['userId'], $contentId),
        ];
        return view('front/content', $data);
    }

    public function postView($postId){
        $data = [
            'creator'   => $this->creatorModel->where('userId', $this->userData['userId'])->findAll(),
            'user'      => $this->userData,
            'post'      => $this->postModel->selectOneByPostId($postId),
            'comment'   => $this->commentModel->selectAllByPostId($postId),
            'cekLove'   => $this->loveModel->selectDataByUserAndPost($this->userData['userId'], $postId),
        ];

        return view('front/post', $data);
    }

    public function addComment() {
        if ($this->request->getPost('postId')) {
            $data = [
                'commentId'     => Uuid::uuid4(),
                'userId'        => $this->userData['userId'],
                'postId'        => $this->request->getPost('postId'),
                'commentValue'  => $this->request->getPost('commentValue')
            ];
    
            $insert = $this->commentModel->insert($data);
            if ($insert) {
                session()->setFlashData('success', 'Berhasil Menambah Komentar');
            }else{
                session()->setFlashdata('error', 'Gagal Menambah Komentar');  
            }
            return redirect()->to(base_url('view/post/'.$data['postId']));
        }else if($this->request->getPost('contentId')){
            $data = [
                'commentId'     => Uuid::uuid4(),
                'userId'        => $this->userData['userId'],
                'contentId'     => $this->request->getPost('contentId'),
                'commentValue'  => $this->request->getPost('commentValue')
            ];
    
            $insert = $this->commentModel->insert($data);
            if ($insert) {
                session()->setFlashData('success', 'Berhasil Menambah Komentar');
            }else{
                session()->setFlashdata('error', 'Gagal Menambah Komentar');  
            }
            return redirect()->to(base_url('view/content/'.$data['contentId']));
        }
    }

    public function love() {
        if ($this->request->getPost('post_id')) {
            $data = [
                'loveId' => Uuid::uuid4(),
                'userId' => $this->userData['userId'],
                'postId' => $this->request->getPost('post_id')
            ];
    
            $dataPost = $this->postModel->where('postId', $data['postId'])->first();
            $insertLove = $this->loveModel->insert($data);
            $updatePost = $this->postModel->update($dataPost['postId'], ['postLike' => ($dataPost['postLike'] + 1)]);
            if ($insertLove && $updatePost) {
                $response = ['success' => true];
            }else{
                $response = ['success' => false];
            }
        }elseif ($this->request->getPost('content_id')) {
            $data = [
                'loveId'    => Uuid::uuid4(),
                'userId'    => $this->userData['userId'],
                'contentId' => $this->request->getPost('content_id')
            ];
    
            $dataContent    = $this->contentModel->where('contentId', $data['contentId'])->first();
            $insertLove     = $this->loveModel->insert($data);
            $updateContent  = $this->contentModel->update($dataContent['contentId'], ['contentLike' => ($dataContent['contentLike'] + 1)]);
            if ($insertLove && $updateContent) {
                $response = ['success' => true];
            }else{
                $response = ['success' => false];
            }
        }

        return $this->response->setJSON($response);
    }

    public function unlove() {
        if ($this->request->getPost('post_id')) {
            $dataLove = $this->loveModel->where('userId', $this->userData['userId'])->where('postId', $this->request->getPost('post_id'))->first();
            $dataPost = $this->postModel->where('postId', $this->request->getPost('post_id'))->first();

            $deleteLove = $this->loveModel->delete($dataLove['loveId']);
            $updatePost = $this->postModel->update($dataPost['postId'], ['postLike' => ($dataPost['postLike'] - 1)]);
            if ($deleteLove && $updatePost) {
                $response = ['success' => true];
            }else{
                $response = ['success' => false];
            }
        }elseif ($this->request->getPost('content_id')) {
            $dataLove       = $this->loveModel->where('userId', $this->userData['userId'])->where('contentId', $this->request->getPost('content_id'))->first();
            $dataContent    = $this->contentModel->where('contentId', $this->request->getPost('content_id'))->first();

            $deleteLove     = $this->loveModel->delete($dataLove['loveId']);
            $updateContent  = $this->contentModel->update($dataContent['contentId'], ['contentLike' => ($dataContent['contentLike'] - 1)]);
            if ($deleteLove && $updateContent) {
                $response = ['success' => true];
            }else{
                $response = ['success' => false];
            }
        }

        return $this->response->setJSON($response);
    }
}