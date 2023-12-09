<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CreatorModel;
use App\Models\WithdrawModel;

class WebhookController extends BaseController
{
    use ResponseTrait;

    protected $creatorData, $creatorModel;
    function __construct()
    {
        $this->creatorModel = new CreatorModel();
        $this->withdrawModel = new WithdrawModel();
    }

    public function webhookXendit()
    {
        $xenditXCallbackToken = 'heUpo1YqqgBUOUdslVbRwWeWE6837d8HNcJBklZh4QHOP39P';
        $reqHeaders = getallheaders();
        if($_ENV['XENDIT_CALLBACK'] === $reqHeaders['X-Callback-Token']){
            $rawRequestInput = file_get_contents("php://input");
            $arrRequestInput = json_decode($rawRequestInput);

            $withdrawData   = $this->withdrawModel->where('withdrawId', $arrRequestInput->external_id)->first();
            $creatorData    = $this->creatorModel->where('creatorId', $withdrawData['creatorId'])->first();
            $totalBalance   = $creatorData['creatorBalance'] + $arrRequestInput->amount;

            if ($arrRequestInput->status === "PENDING") {
                $this->withdrawModel->update($withdrawData['withdrawId'], ['withdrawStatus' => 'pending']);
            }elseif ($arrRequestInput->status === "VOIDED" || $arrRequestInput->status === "FAILED" || $arrRequestInput->status === "EXPIRED") {
                $this->withdrawModel->update($withdrawData['withdrawId'], ['withdrawStatus' => 'fail']);
                $this->creatorModel->update($creatorData['creatorId'], ['creatorBalance' => $totalBalance]);
            }elseif ($arrRequestInput->status === "COMPLETED") {
                $this->withdrawModel->update($withdrawData['withdrawId'], ['withdrawStatus' => 'success']);
            }
            
            return $this->respond(200);
        }else{
            http_response_code(403);
        }
    }
}