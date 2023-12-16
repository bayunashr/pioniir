<?php

namespace App\Controllers;
use App\Models\SubscribeModel;
use App\Models\CreatorModel;
use App\Models\DonateModel;
use App\Models\BuyModel;
use App\Models\ContentModel;
use Ramsey\Uuid\Uuid;

class Midtrans extends BaseController
{
   protected $subscribeModel, $creatorModel, $donateModel, $buyModel, $contentModel;

    public function __construct() {
        $this->subscribeModel = new SubscribeModel;
        $this->creatorModel   = new CreatorModel;
        $this->donateModel    = new DonateModel;
        $this->buyModel       = new BuyModel;
        $this->contentModel   = new ContentModel;
    }

    public function subscribe() {      
        \Midtrans\Config::$serverKey = $_ENV['MIDTRANS_SERVER_KEY'];
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $creatorId  = json_decode($this->request->getBody(), true)['creatorId'];
        $userId     = json_decode($this->request->getBody(), true)['userId'];

        $id = Uuid::uuid4();
        $data = [
            'subId'     => $id,
            'userId'    => $userId,
            'creatorId' => $creatorId
        ];
        
        $creator = $this->creatorModel->find($creatorId);

        $snapTransaction = array(
            'transaction_details'   => array(
                'order_id'          => $id,
                'gross_amount'      => $creator['creatorSubPrice'],
            ),
            'item_details' => array(
                array(
                    'id'        => $creatorId,
                    'price'     => $creator['creatorSubPrice'],
                    'quantity'  => 1,
                    'name'      => "Subscribe ".$creator['creatorAlias'],
                ),
            ),
            "custom_expiry" => array(
                "order_time"=> date('Y-m-d H:i:s'),
                "expiry_duration"=> 5,
                "unit"=> "minute"
            ),
            "enabled_payments" => array(
                "other_qris"
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($snapTransaction);
        if ($snapToken) {
            $this->subscribeModel->insert($data);
        }

        return $this->response->setJSON(['snapToken' => $snapToken],200);
    }

    public function donate(){
        \Midtrans\Config::$serverKey = $_ENV['MIDTRANS_SERVER_KEY'];
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $id = Uuid::uuid4();
        $data = [
            'donateId'          => $id,
            'userId'            => $this->request->getPost('userId') ? $this->request->getPost('userId') : null,
            'creatorId'         => $this->request->getPost('creatorId'),
            'donateName'        => $this->request->getPost('donateName'),
            'donateAmount'      => $this->request->getPost('donateAmount'),
            'donateDescription' => $this->request->getPost('donateDescription')
        ];

        $snapTransaction = array(
            'transaction_details'   => array(
                'order_id'          => $id,
                'gross_amount'      => $this->request->getPost('donateAmount'),
            ),
            'item_details' => array(
                array(
                    'id'        => $this->request->getPost('creatorId'),
                    'price'     => $this->request->getPost('donateAmount'),
                    'quantity'  => 1,
                    'category'  => $this->request->getPost('donateName'),
                    'name'      => "Donasi Creator",
                ),
            ),
            "custom_expiry" => array(
                "order_time"=> date('Y-m-d H:i:s'),
                "expiry_duration"=> 5,
                "unit"=> "minute"
            ),
            "enabled_payments" => array(
                "shopeepay"
            ),

        );

        $snapToken = \Midtrans\Snap::getSnapToken($snapTransaction);
        if ($snapToken) {
            $this->donateModel->insert($data);
        }

        return $this->response->setJSON(['snapToken' => $snapToken]);
    }

    public function buyContent($contentId) {
        \Midtrans\Config::$serverKey = $_ENV['MIDTRANS_SERVER_KEY'];
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $userId     = json_decode($this->request->getBody(), true)['userId'];

        $id = Uuid::uuid4();
        $data = [
            'buyId'     => $id,
            'userId'    => $userId,
            'contentId' => $contentId
        ];
        
        $content = $this->contentModel->find($contentId);

        // Send To Midtrans
        $snapTransaction = array(
            'transaction_details'   => array(
                'order_id'          => $id,
                'gross_amount'      => $content['contentPrice'],
            ),
            'item_details' => array(
                array(
                    'id'        => $contentId,
                    'price'     => $content['contentPrice'],
                    'quantity'  => 1,
                    'name'      => "Buy Content - ".$content['contentTitle'],
                ),
            ),
            "custom_expiry" => array(
                "order_time"=> date('Y-m-d H:i:s'),
                "expiry_duration"=> 5,
                "unit"=> "minute"
            ),
            "enabled_payments" => array(
                "other_qris"
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($snapTransaction);
        if ($snapToken) {
            $this->buyModel->insert($data);
        }

        return $this->response->setJSON(['snapToken' => $snapToken]);
    }
}