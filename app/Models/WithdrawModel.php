<?php

namespace App\Models;

use CodeIgniter\Model;

class WithdrawModel extends Model
{
    protected $table            = 'Withdraw';
    protected $primaryKey       = 'withdrawId';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['creatorId', 'withdrawAmount', 'withdrawStatus'];

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function selectAll()
    {
        return $this->select('Withdraw.*, Creator.creatorAlias AS creator_name')
            ->where('withdrawStatus', 'success')
            ->join('Creator', 'Creator.creatorId = Withdraw.creatorId')
            ->orderBy('createdAt', 'desc')
            ->findAll();
    }

    public function getByMonth($month, $year){
        return $this->select('Withdraw.creatorId, Creator.creatorAlias, Withdraw.withdrawAmount')
            ->join('Creator', 'Creator.creatorId = Withdraw.creatorId')
            ->where('MONTH(withdrawTimestamp)', $month)
            ->where('YEAR(withdrawTimestamp)', $year)
            ->where('Withdraw.withdrawStatus', 'success')
            ->findAll();
    }
}