<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class WithdrawModel extends Model
{
    protected $table            = 'Withdraw';
    protected $primaryKey       = 'withdrawId';
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
        return $this->select('Withdraw.*, Creator.creatorAlias AS creator_name')
            ->join('Creator', 'Creator.creatorId = Withdraw.creatorId')
            ->orderBy('createdAt', 'desc')
            ->findAll();
    }
}