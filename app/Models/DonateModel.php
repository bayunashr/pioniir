<?php

namespace App\Models;

use CodeIgniter\Model;

class DonateModel extends Model
{
    protected $table            = 'Donate';
    protected $primaryKey       = 'donateId';
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
        return $this->select('Donate.*, User.userName AS user_username, Creator.creatorAlias AS creator_name')
            ->join('User', 'User.userId = Donate.userId')
            ->join('Creator', 'Creator.creatorId = Donate.creatorId')
            ->orderBy('donateTimestamp', 'desc')
            ->findAll();
    }
}