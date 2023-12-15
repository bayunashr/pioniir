<?php

namespace App\Controllers\Dashboard\Creator;

use App\Controllers\BaseController;
use App\Models\NotificationModel;
use App\Models\CreatorModel;
use App\Models\UserModel;
use App\Models\SocialModel;
use App\Models\SubscribeModel;
use Ramsey\Uuid\Uuid;

class Profile extends BaseController
{
    protected $userData, $creatorData, $userModel, $creatorModel, $notifModel, $socialModel;
    function __construct()
    {
        $this->userModel    = new UserModel();
        $this->creatorModel = new CreatorModel();
        $this->notifModel   = new NotificationModel();
        $this->socialModel  = new SocialModel();
        $this->subsModel    = new SubscribeModel();
        $this->userData     = $this->userModel->where('userEmail', session()->get('userEmail'))->where('userName', session()->get('userName'))->first();
        $this->creatorData  = $this->creatorModel->where('userId', $this->userData['userId'])->first();
    }

    public function index(){
        $options = ['Animation','Art','Blogging','Comics And Cartoons','Commissions','Cosplay','Dance And Theatre','Design','Drawing And Painting','Education','Food And Drink','Fundraising','Gaming','Health And Fitness','Lifestyle','Money','Music','News','Photography','Podcast','Science And Tech','Social','Software','Streaming','Translator','Video And Film','Writing'];
        
        if ($this->request->getPost()) {
            if (!empty($this->request->getPost('creatorSubPrice'))) {
                $update = $this->creatorModel->update($this->creatorData['creatorId'], ['creatorSubPrice' => $this->request->getPost('creatorSubPrice')]);
                if ($update) {
                    session()->setFlashData('success', 'Berhasil Mengubah Harga Subscription');
                } else {
                    session()->setFlashData('error', 'Gagal Mengubah Harga Subscription');
                }
            }else{
                if ($this->request->getPost('old_alias') != $this->request->getPost('alias')) {
                    $data['creatorAlias'] = str_replace(' ', '', $this->request->getPost('alias'));
                }

                $data = [
                    'creatorDescription'=> $this->request->getPost('description'),
                    'creatorTag'        => implode(',', $this->request->getPost('creatorTag'))
                ];
                $update = $this->creatorModel->update($this->creatorData['creatorId'], $data);
                if ($update) {
                    session()->setFlashData('success', 'Berhasil Mengubah Profile');
                } else {
                    session()->setFlashData('error', 'Gagal Mengubah Profile');
                }
            }
            return redirect()->to(base_url('dashboard/profile/creator')); 
        } else {
            $data = [
                'title'     => 'Dashboard - Pioniir Creator',
                'user'      => $this->userData,
                'creator'   => $this->creatorData,
                'notif'     => $this->notifModel->selectAllById($this->creatorData['userId']),
                'social'    => $this->socialModel->selectAllById($this->creatorData['creatorId']),
                'option'    => $options,
                'subs'      => $this->subsModel->selectAllById($this->creatorData['creatorId'])
            ];

            return view('dashboard/creator/profileCreator', $data);
        }    
    }

    public function socialDelete($id){
        $this->socialModel->delete($id);
        session()->setFlashData('success', 'Berhasil Menghapus Data Sosial Media');
        return redirect()->to(base_url('dashboard/profile/creator'));
    }

    public function socialAdd(){
        $data = [
            'socialId' => Uuid::uuid4(),
            'creatorId' => $this->creatorData['creatorId'],
            'socialMedia' => $this->request->getPost('socialMedia'),
            'socialLink' => strtolower(str_replace('/', '', preg_replace('#^https?://#', '', $this->request->getPost('socialLink')))),
            'notif' => $this->notifModel->selectAllById($this->creatorData['userId']),
        ];
        $this->socialModel->insert($data);
        session()->setFlashData('success', 'Berhasil Menambah Data Sosial Media');
        return redirect()->to(base_url('dashboard/profile/creator'));
    }

    public function socialEdit(){
        $this->socialModel->update($this->request->getPost('socialId'), ['socialLink' => strtolower($this->request->getPost('socialLink'))]);
        session()->setFlashData('success', 'Berhasil Mengubah Data Sosial Media');
        return redirect()->to(base_url('dashboard/profile/creator'));
    }

    public function profilePicture() {
        $input = $this->validate([
            'userAvatar' => 'uploaded[userAvatar]|max_size[userAvatar,5120]|ext_in[userAvatar,png,jpg,jpeg],'
        ]);

       if (!$input) { 
            session()->setFlashData('error', 'Hanya Diijinkan Mengirim png,jpg,jpeg');
       }else{
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
                    $update = $this->userModel->update($this->userData['userId'], ['userAvatar' => $newName]);
                    if ($update) {
                        session()->setFlashdata('success', 'Berhasil Mengubah Profile Picture');
                    }else{
                        session()->setFlashdata('success', 'Gagal Menyimpan Ke Database');
                    }
                }else{
                    session()->setFlashdata('error', 'Gagal Mengubah Profile Picture');
                }
            }
       }
        return redirect()->to(base_url('dashboard/profile/creator')); 
    }

    public function validateBase64Image($base64Data){
        if (preg_match('/^data:image\/(\w+);base64,/', $base64Data)) {
            $image = base64_decode(substr($base64Data, strpos($base64Data, ',') + 1));
            $allowedFormats = ['jpeg', 'jpg', 'png'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_buffer($finfo, $image, FILEINFO_MIME_TYPE);
            finfo_close($finfo);

            if (!in_array($mimeType, ['image/jpeg', 'image/jpg', 'image/png'])) {
                return 'File harus berformat JPG, JPEG, atau PNG.';
            }
            $maxFileSize = 5 * 1024 * 1024; 
            if (strlen($image) > $maxFileSize) {
                return 'Ukuran file tidak boleh melebihi 5MB.';
            }

            return true;
        }

        return 'Data yang diberikan bukanlah data gambar Base64 yang valid.';
    }

    public function banner() {
        $creatorBanner = $this->request->getJSON()->creatorBanner;
        $validationResult = $this->validateBase64Image($creatorBanner);
        if ($validationResult !== true) {
            return $this->response->setJSON(['success' => false, 'message' => $validationResult]);
        } else {
            if($creatorBanner) {
                $folderPath = '../public/assets/uploads/banner/';
                if (!empty($this->creatorData['creatorBanner'])) {
                    $filePath = $folderPath . $this->creatorData['creatorBanner'];
                    if (file_exists($filePath) && $this->creatorData['creatorBanner'] !== 'bannercreator.png') {
                        unlink($filePath);
                    }
                }

                $image_parts = explode(";base64,", $creatorBanner);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);

                if (!is_dir($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }
                $randomFileName = uniqid() . '_' . bin2hex(random_bytes(8)) . '.' . $image_type;
                $file = $folderPath . $randomFileName;
                file_put_contents($file, $image_base64);
                $update = $this->creatorModel->update($this->creatorData['creatorId'], ['creatorBanner' => $randomFileName]);
                if ($update) {
                    session()->setFlashData('success', 'Berhasil Mengubah Banner');
                    return $this->response->setJSON(['success' => true, 'message' => 'Berhasil Mengubah Banner']);
                } else {
                    session()->setFlashData('error', 'Gagal Mengubah Banner');
                    return $this->response->setJSON(['success' => false, 'message' => 'Gagal Mengubah Banner']);
                }
            }
        }
    }
}