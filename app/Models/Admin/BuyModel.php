<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class BuyModel extends Model
{
    protected $table            = 'Buy';
    protected $primaryKey       = 'buyId';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function selectAll()
    {
        return $this->select('Buy.*, User.userName AS user_name, Content.contentTitle AS content_title')
            ->join('User', 'User.userId = Buy.userId')
            ->join('Content', 'Content.contentId = Buy.contentId')
            ->orderBy('createdAt', 'desc')
            ->findAll();
    }

    public function getCountBuyCreator($creatorId) {
        return $this->select('Buy.buyId, Buy.userId AS buyerId, Buy.contentId, Content.creatorId, Creator.userId AS creatorUserId')
            ->join('Content', 'Buy.contentId = Content.contentId')
            ->join('Creator', 'Content.creatorId = Creator.creatorId')
            ->where('Creator.creatorId', $creatorId)
            ->countAllResults();
    }
}