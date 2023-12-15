<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CreatorModel;
use App\Models\WithdrawModel;
use App\Models\DonateModel;
use App\Models\SubscribeModel;
use App\Models\MilestoneModel;
use App\Models\BuyModel;

class WebhookController extends BaseController
{
    use ResponseTrait;

    protected $creatorData, $creatorModel, $donateModel, $subscribeModel, $buyModel, $milesModel;
    function __construct()
    {
        $this->creatorModel = new CreatorModel();
        $this->withdrawModel = new WithdrawModel();
        $this->donateModel = new DonateModel();
        $this->subscribeModel = new SubscribeModel();
        $this->buyModel = new BuyModel();
        $this->milesModel = new MilestoneModel();
    }

    public function webhookXendit()
    {
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

    public function cekTabel($id){
        $tabel = '';
        if ($this->donateModel->find($id) != null) {
            $tabel = 'Donate';
        }else if ($this->subscribeModel->find($id) != null) {
            $tabel = 'Subscribe';
        }else if ($this->buyModel->find($id) != null) {
            $tabel = 'Buy';
        }

        return $tabel;
    }

    public function webhookMidtrans() {        
        $json_result = file_get_contents('php://input');
		$request = json_decode($json_result);
        
        $hashed = hash("sha512",$request->order_id.$request->status_code.$request->gross_amount.$_ENV['MIDTRANS_SERVER_KEY']);
        if ($hashed == $request->signature_key) {
            $hasil = $this->cekTabel($request->order_id);
            
            if ($hasil) {
                if ($hasil === "Donate") {
                    $creator = $this->donateModel->where('donateId',$request->order_id)->first();
                }else if ($hasil === "Subscribe"){
                    $creator = $this->subscribeModel->where('subId', $request->order_id)->first();
                }else if ($hasil === "Buy"){
                    $creator = $this->buyModel->selectById($request->order_id); 
                }

                $creatorData    = $this->creatorModel->where('creatorId', $creator['creatorId'])->first();
                $totalBalance   = $creatorData['creatorBalance'] + $request->gross_amount;
                $cekMilestone   = $this->milesModel->where('creatorId', $creatorData['creatorId'])->where('milestoneStatus', 'publish')->first();
                $totalMiles     = $cekMilestone['milestoneBalance'] + $request->gross_amount;

                // Merubah Database
                if ($request->transaction_status == "expire" || $request->transaction_status == "cancel") {
                    if ($hasil === "Donate") {
                        $this->donateModel->delete($request->order_id);
                    }else if ($hasil === "Subscribe"){
                        $this->subscribeModel->delete($request->order_id);
                    }else if ($hasil === "Buy"){
                        $this->buyModel->delete($request->order_id);
                    }
                }else if ($request->transaction_status == "capture" || $request->transaction_status == "settlement") {
                    $this->creatorModel->update($creator['creatorId'], ['creatorBalance' => $totalBalance]);
                    if ($hasil === "Donate") {
                        $this->donateModel->update($request->order_id, ['donateStatus' => 'success']);
                        if (count($cekMilestone) >= 1) {
                            $this->milesModel->update($cekMilestone['milestoneId'], ['milestoneBalance' => $totalMiles]);
                        }
                    }else if ($hasil === "Subscribe"){
                        $this->subscribeModel->update($request->order_id, ['subscribeStatus' => 'success']);
                    }else if ($hasil === "Buy"){
                        $this->buyModel->update($request->order_id, ['buyStatus' => 'success']);
                    }
                }
                return $this->respond(['data' => $totalMiles],200);
            }
            return $this->respond(403);
        }else{
            return $this->respond(403);
        }
    }
}