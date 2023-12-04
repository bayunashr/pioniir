<?php

namespace App\Controllers\Dashboard\Creator;

use App\Controllers\BaseController;
use App\Models\MilestoneModel;
use App\Models\CreatorModel;
use App\Models\UserModel;

use Ramsey\Uuid\Uuid;

class Milestone extends BaseController
{
    protected $milestoneModel, $userModel, $creatorModel,$userData, $creatorData, $cekPublish;

    function __construct() {
        $this->milestoneModel = new MilestoneModel;
        $this->userModel      = new UserModel;
        $this->creatorModel   = new CreatorModel;
        $this->userData       = $this->userModel->where('userEmail', session()->get('userEmail'))->where('userName', session()->get('userName'))->first();
        $this->creatorData    = $this->creatorModel->where('userId', $this->userData['userId'])->first();
        $this->cekPublish     = $this->milestoneModel->where('creatorId', $this->creatorData['creatorId'])->where('milestoneStatus', 'publish')->countAllResults();
    }

    public function index()
    {
        $data = [
            'title'         => 'Milestone - Pioniir Creator',
            'miles'         => $this->milestoneModel->where('creatorId', $this->creatorData['creatorId'])->orderBy("FIELD(milestoneStatus, 'publish', 'draft', 'archive', 'ended')", '', false)->findAll(),
            'milespublish'  => $this->milestoneModel->where('creatorId', $this->creatorData['creatorId'])->where('milestoneStatus', 'publish')->findAll()
        ];
        return view('dashboard/creator/milestone', $data);
    }

    public function add()
    {
        if ($this->request->getPost()) {
            $data = [
                'milestoneId'   => Uuid::uuid4(),
                'creatorId'     => $this->creatorData['creatorId'],
                'milestoneName' => $this->request->getPost('milestoneName'),
                'milestoneTarget' => $this->request->getPost('milestoneTarget'),
                'milestoneStatus' => $this->request->getPost('milestoneStatus'),
            ];
            if($this->request->getPost('milestoneStatus') == 'publish' && $this->cekPublish == 1){
                session()->setFlashData('alert', 'Hanya 1 Milestone Yang Dapat Di Publish');
                session()->setFlashdata('old_input', $this->request->getPost());
                return redirect()->to(base_url().'dashboard/milestone/add');
            }else{
                $this->milestoneModel->insert($data);
                session()->setFlashData('success', 'Berhasil Menambah Milestone');
                return redirect()->to(base_url().'dashboard/milestone');
            }
        } else {
            $data = [
                'title' => 'Milestone - Pioniir Creator'
            ];
            return view('dashboard/creator/milestoneAdd', $data);
        }
    }

    public function edit($id)
    {
        $miles = $this->milestoneModel->find($id);
        $getAllStatus = $this->milestoneModel->where('creatorId', $this->creatorData['creatorId'])->where('milestoneStatus', 'publish')->whereNotIn('milestoneId', [$id])->countAllResults();

        if ($miles['milestoneStatus'] === 'ended') {
            return redirect()->to(base_url().'dashboard/milestone');
            exit();
        }

        if ($this->request->getPost()) {
            $data = [
                'creatorId' => $this->creatorData['creatorId'],
                'milestoneName' => $this->request->getPost('milestoneName'),
                'milestoneTarget' => $this->request->getPost('milestoneTarget'),
                'milestoneStatus' => $this->request->getPost('milestoneStatus'),
            ];

            if($this->request->getPost('milestoneStatus') == 'publish' && $getAllStatus == 1){
                session()->setFlashData('alert', 'Hanya 1 Milestone Yang Dapat Di Publish');
                session()->setFlashdata('old_input', $this->request->getPost());
                return redirect()->to(base_url().'dashboard/milestone/edit/'.$id);
            }else{
                $this->milestoneModel->update($id, $data);
                session()->setFlashData('success', 'Berhasil Mengubah Milestone');
                return redirect()->to(base_url().'dashboard/milestone');
            }
        } else {
            $data = [
                'title' => 'Milestone - Pioniir Creator',
                'miles' => $miles
            ];
            return view('dashboard/creator/milestoneEdit', $data);
        }       
    }

    public function ended($id) {
        $update = [
            "milestoneStatus" => "ended",
        ];
        $this->milestoneModel->update($id, $update);
        session()->setFlashData('success', 'Berhasil Menyelesaikan Milestone');
        return redirect()->to(base_url().'dashboard/milestone');
    }
}