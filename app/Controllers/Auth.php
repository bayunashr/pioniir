<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\NotificationModel;
use Google_Client;
use Ramsey\Uuid\Uuid;

class Auth extends BaseController
{
    protected $userModel;
    protected $client;

    function __construct() {
        $this->userModel = new UserModel;
        $this->notificationModel = new NotificationModel;
        $this->client = new Google_Client();
        $this->client->setClientId(getenv('GOOGLE_CLIENT_ID'));
        $this->client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
        $this->client->setRedirectUri(base_url()."login/auth-google");
        $this->client->addScope('email');
        $this->client->addScope('profile');
    }

    public function index()
    {
        $data = [
            'link'     => $this->client->createAuthUrl(),
        ];
        return view('front/login', $data);
    }

    public function register()
    {
        return view('front/register');
    }

    public function loginAuth() {
        $userData = $this->userModel->where('userEmail', $this->request->getPost('identitas'))->orWhere('userName', $this->request->getPost('identitas'))->first();
        
        if ($userData) {
            if ($userData['userPassword'] === null) {
                session()->setFlashData('error', 'Akun Ini Hanya Diijinkan Login Menggunakan Google');
            }elseif($userData['userStatus'] === 'ban') {
                $notif = $this->notificationModel->selectOneById($userData['userId']);
                session()->setFlashData('error', 'User '.$notif['user_name']." dibanned karena ".$notif['notificationMessage']);
                return redirect('login');
                exit;
            }elseif (password_verify($this->request->getPost('password'), $userData['userPassword'])) {
                session()->set([
                    'loginUser'     => true,
                    'userName'      => $userData['userName'],
                    'userFullName'  => $userData['userFullName'],
                    'userEmail'     => $userData['userEmail']
                ]);
                return redirect()->to(base_url());
                exit;
            }else{
                session()->setFlashData('error', 'Password Salah');
            }
        }else{
            session()->setFlashData('error', 'Akun Tidak Ditemukan / Belum Terdaftar');
        }
        
        return redirect('login');
    }

    public function authGoogle() {
        $token = $this->client->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
        if (!isset($token['error'])) {
            $this->client->setAccessToken($token['access_token']);
            $googleService = new \Google_Service_Oauth2($this->client);
            $data = $googleService->userinfo->get();

            $userData = $this->userModel->where('userEmail', $data['email'])->first();
            
            if ($userData === null) {
                $user = [
                    'userId'        => Uuid::uuid4(),
                    'userName'      => strtolower(str_replace(' ', '', $data['name'])),
                    'userFullName'  => $data['name'],
                    'userEmail'     => $data['email']
                ];
                $this->userModel->insert($user);
                $userData = $user;
            }elseif($userData['userStatus'] === 'ban') {
                $notif = $this->notificationModel->selectOneById($userData['userId']);
                session()->setFlashData('error', 'User '.$notif['user_name']." dibanned karena ".$notif['notificationMessage']);
                return redirect('login');
                exit;
            }

            session()->set([
                'loginUser'     => true,
                'userName'      => $userData['userName'],
                'userFullName'  => $userData['userFullName'],
                'userEmail'     => $userData['userEmail']
            ]);

            return redirect()->to(base_url());
        }
    }

    public function logout() {
        session()->remove('loginUser');
        session()->remove('userName');
        session()->remove('userFullName');
        session()->remove('userEmail'); 
        return redirect()->to(base_url()); 
    }
}