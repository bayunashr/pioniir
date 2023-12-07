<?php

namespace App\Controllers\Dashboard\Creator;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\CreatorModel;
use App\Models\WithdrawModel;
use App\Models\NotificationModel;
use Ramsey\Uuid\Uuid;

class Transaction extends BaseController
{
    protected $userData, $creatorData, $userModel, $creatorModel, $notifModel;
    function __construct()
    {
        $this->userModel = new UserModel();
        $this->creatorModel = new CreatorModel();
        $this->notifModel = new NotificationModel();
        $this->withdrawModel = new WithdrawModel();
        $this->userData = $this->userModel->where('userEmail', session()->get('userEmail'))->where('userName', session()->get('userName'))->first();
        $this->creatorData = $this->creatorModel->where('userId', $this->userData['userId'])->first();
    }

    public function index()
    {
        $data = [
            'title'     => 'Balance - Pioniir Creator',
            'notif'     => $this->notifModel->selectAllById($this->creatorData['userId']),
            'user'      => $this->userData,
            'creator'   => $this->creatorData,
            'withdraw'  => $this->withdrawModel->where('creatorId', $this->creatorData['creatorId'])->findAll(),
        ];
        return view('dashboard/creator/balance', $data);
    }

    public function withdraw() {
        $endpoint = 'https://api.xendit.co/payouts';
        $id = Uuid::uuid4()->toString();

        $dataInsert = [
            'withdrawId' => $id,
            'creatorId' => $this->creatorData['creatorId'],
            'withdrawAmount' => $this->request->getPost('jumlah') + ($this->request->getPost('jumlah') * 0.03),
        ];


        if ($this->creatorData['creatorBalance'] < $dataInsert['withdrawAmount']) {
            print_r("Saldo tidak mencukupi");
            session()->setFlashData('error', 'Gagal Menarik Saldo, Saldo Tidak Mencukupi');
            return redirect()->to(base_url().'dashboard/balance');
            exit();
        }

        $this->withdrawModel->insert($dataInsert);
        $updateBalance = $this->creatorData['creatorBalance'] - $dataInsert['withdrawAmount'];
        $this->creatorModel->update($this->creatorData['creatorId'], ['creatorBalance' => $updateBalance]);

        $data = [
            'external_id' => $id,
            'amount' => $this->request->getPost('jumlah'),
            'email' => $this->userData['userEmail']
        ];

        $headers = [
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Basic ' . base64_encode($_ENV['XENDIT_API'] . ':')
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if ($response === false) {
            curl_close($ch);
            session()->setFlashData('error', 'Gagal Meminta Penarikan Saldo');
            return redirect()->to(base_url().'dashboard/balance');
        } else {
            curl_close($ch);
            session()->setFlashData('alert', 'Berhasil Menarik Saldo, Silahkan Cek Email Anda');
            return redirect()->to(base_url().'dashboard/balance');
        }
    }
}