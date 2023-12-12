<?php

namespace App\Controllers\Dashboard\Creator;

use App\Controllers\BaseController;
use App\Models\ContentModel;
use App\Models\UserModel;
use App\Models\CreatorModel;
use App\Models\BuyModel;
use App\Models\NotificationModel;
use Ramsey\Uuid\Uuid;

class Content extends BaseController
{
    protected $userData, $creatorData, $userModel, $creatorModel, $contentModel, $notifModel, $buyModel;
    function __construct()
    {
        $this->userModel = new UserModel();
        $this->creatorModel = new CreatorModel();
        $this->contentModel = new ContentModel();
        $this->notifModel = new NotificationModel();
        $this->buyModel = new BuyModel();
        $this->userData = $this->userModel->where('userEmail', session()->get('userEmail'))->where('userName', session()->get('userName'))->first();
        $this->creatorData = $this->creatorModel->where('userId', $this->userData['userId'])->first();
    }

    public function index(): string
    {
        $data = [
            'notif'     => $this->notifModel->selectAllById($this->creatorData['userId']),
            'content'   => $this-> contentModel->where('creatorId', $this->creatorData['creatorId'])->orderBy('createdAt', 'desc')->findAll(),
            'title'     => 'Dashboard - Pioniir Creator',
            'user'      => $this->userData,
            'creator'   => $this->creatorData,
            'buy'       => $this->buyModel->selectByCreatorId($this->creatorData['creatorId'])
        ];
        return view('dashboard/creator/content', $data);
    }

    public function convertImage($base64,$id = null) {
        $folderPath = '../public/assets/uploads/thumbnail/';
        if ($id != null) {
            $contentData = $this->contentModel->find($id);
            $folderPath .= $contentData['contentPreview'];
            if (file_exists($folderPath)) {
                    unlink($folderPath);
                }
            }
        $image_parts = explode(";base64,", $base64);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        if (!is_dir($folderPath)) {
            mkdir($folderPath, 0777, true);
        }
        $randomFileName = uniqid() . '_' . bin2hex(random_bytes(8)) . '.' . $image_type;
        $file = $folderPath . $randomFileName;
        if (file_put_contents($file, $image_base64)) {
            return $randomFileName;
        }else{
            return '';
        }
    }

    public function add()
    {
        if ($this->request->getPost()) {
            $data = [
                'contentId'         => Uuid::uuid4(),
                'creatorId'         => $this->creatorData['creatorId'],
                'contentTitle'      => $this->request->getPost('contentTitle'),
                'contentValue'      => htmlspecialchars($this->request->getPost('contentValue')),
                'contentStatus'     => $this->request->getPost('contentStatus'),
                'contentPrice'      => $this->request->getPost('contentPrice'),
                'contentPreview'    => $this->convertImage($this->request->getPost('contentPreview')),
                'contentDownload'   => $this->request->getPost('contentDownload'),
            ];
            $insert = $this->contentModel->insert($data);
            if ($insert) {
                session()->setFlashData('success', 'Berhasil Menambah Data Konten');
            }else{
                session()->setFlashData('error', 'Gagal Menambah Data Konten');
            }
            return redirect()->to(base_url('dashboard/content'));
        } else {
            $data = [
                'notif' => $this->notifModel->selectAllById($this->creatorData['userId']),
                'title' => 'Content Add - Pioniir Creator',
                'user'      => $this->userData,
                'creator'   => $this->creatorData,
            ];
            return view('dashboard/creator/contentAdd', $data);
        }
    }

    public function edit($id)
    {
        if ($this->request->getPost()) {
            if ($this->request->getPost('contentPreviewNew')!== null && !empty($this->request->getPost('contentPreviewNew'))) {
                $data['contentPreview'] = $this->convertImage($this->request->getPost('contentPreviewNew'),$id);
            }else{
                $data['contentPreview'] = $this->request->getPost('contentPreview');
            }
            $data = [
                'contentId'         => Uuid::uuid4(),
                'creatorId'         => $this->creatorData['creatorId'],
                'contentTitle'      => $this->request->getPost('contentTitle'),
                'contentValue'      => htmlspecialchars($this->request->getPost('postValue')),
                'contentStatus'     => $this->request->getPost('postStatus'),
                'contentPrice'      => $this->request->getPost('contentPrice'),
                'contentDownload'   => $this->request->getPost('contentDownload'),
            ];
            $update = $this->contentModel->update($id,$data);
            if ($update) {
                session()->setFlashData('success', 'Berhasil Mengubah Data Konten');
            }else{
                session()->setFlashData('error', 'Gagal Mengubah Data Konten');
            }
            return redirect()->to(base_url('dashboard/content'));
        } else {
            $data = [
                'notif' => $this->notifModel->selectAllById($this->creatorData['userId']),
                'title' => 'Content Add - Pioniir Creator',
                'user'      => $this->userData,
                'creator'   => $this->creatorData,
                'content' => $this->contentModel->find($id),
            ];
            return view('dashboard/creator/contentEdit', $data);
        }
    }

    public function destroy($id)
    {
        $this->contentModel->delete($id);
        session()->setFlashData('success', 'Berhasil Menghapus Data Konten');
        return redirect()->to(base_url('dashboard/content'));
    }
}