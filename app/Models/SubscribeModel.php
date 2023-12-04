<?php

namespace App\Models;

use CodeIgniter\Model;

class SubscribeModel extends Model
{
    protected $table            = 'Subscribe';
    protected $primaryKey       = 'subscribeId';
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
        return $this->select('Subscribe.*, User.userName AS user_name, Creator.creatorAlias AS creator_name')
            ->join('User', 'User.userId = Subscribe.userId')
            ->join('Creator', 'Creator.creatorId = Subscribe.creatorId')
            ->orderBy('createdAt', 'desc')
            ->findAll();
    }
}