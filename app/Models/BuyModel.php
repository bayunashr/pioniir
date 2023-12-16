<?php

namespace App\Models;

use CodeIgniter\Model;

class BuyModel extends Model
{
    protected $table = 'Buy';
    protected $primaryKey = 'buyId';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['userId', 'contentId', 'buyStatus'];

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function selectAll()
    {
        return $this->select('Buy.*, User.userName AS user_name, Content.contentTitle AS content_title')
            ->join('User', 'User.userId = Buy.userId')
            ->join('Content', 'Content.contentId = Buy.contentId')
            ->orderBy('createdAt', 'desc')
            ->findAll();
    }

    public function selectByCreatorId($creatorId)
    {
        return $this->select('Buy.*, User.userName, User.userEmail,, Content.contentTitle')
            ->join('Content', 'Content.contentId = Buy.contentId')
            ->join('Creator', 'Creator.creatorId = Content.creatorId')
            ->join('User', 'User.userId = Buy.userId')
            ->where(['Creator.creatorId' => $creatorId, 'buyStatus' => 'success'])
            ->findAll();
    }

    public function selectById($buyId)
    {
        return $this->select('Buy.*, Creator.creatorId AS creatorId, Content.contentTitle AS content_title')
            ->where('buyId', $buyId)
            ->join('Content', 'Content.contentId = Buy.contentId')
            ->join('Creator', 'Creator.creatorId = Content.creatorId')
            ->orderBy('createdAt', 'desc')
            ->first();
    }

    public function getCountBuyCreator($creatorId)
    {
        return $this->select('Buy.buyId, Buy.userId AS buyerId, Buy.contentId, Content.creatorId, Creator.userId AS creatorUserId')
            ->join('Content', 'Buy.contentId = Content.contentId')
            ->join('Creator', 'Content.creatorId = Creator.creatorId')
            ->where('Creator.creatorId', $creatorId)
            ->where('Buy.buyStatus', 'success')
            ->countAllResults();
    }

    public function getDataBuyByIdUser($userId) {
        return $this->select('Buy.contentId')
            ->where('userId', $userId)
            ->where('buyStatus', 'success')
            ->findAll();
    }

    // return jumlah content yang dibeli berdasarkan creator dan kontennya
    public function getCountBuyCreatorContent($creatorId, $contentId)
    {
        return $this->join('Content', 'Buy.contentId = Content.contentId')
            ->join('Creator', 'Content.creatorId = Creator.creatorId')
            ->where('Creator.creatorId', $creatorId)
            ->where('Buy.contentId', $contentId)
            ->where('Buy.buyStatus', 'success')
            ->countAllResults();
    }

    public function getBuyByCreatorTime($creatorId, $month, $year)
    {
        return $this->select('Content.contentPrice')
            ->join('Content', 'Buy.contentId = Content.contentId')
            ->join('Creator', 'Content.creatorId = Creator.creatorId')
            ->where('Creator.creatorId', $creatorId)
            ->where('MONTH(buyTimestamp)', $month)
            ->where('YEAR(buyTimestamp)', $year)
            ->where('Buy.buyStatus', 'success')
            ->findAll();
    }
}